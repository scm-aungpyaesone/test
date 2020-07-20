export default {
  data() {
    return {
      items: [],
      carTypes: [],
      carTypeIdList: [],
      carBrands: [],
      carBrandIdList: [],
      selectedCarItems: {
        carType: {
          id: null,
          parent_id: null,
          children: null,
          price: 0,
        },
        carBrand: {
          id: null,
          parent_id: null,
          images: null,
          price: 0,
        },
      },
    };
  },
  async beforeRouteEnter(to, from, next) {
    const items = await axios
      .get("/items")
      .then((response) => {
        return response.data;
      })
      .catch((err) => {
        console.log(err);
        return err.response.data;
      });
    next((vm) => vm.setItems(items));
  },
  methods: {
    /**
     * This is to set items.
     * @param {array} items
     */
    setItems(items) {
      this.items = items;
      // set car type list to show radio button
      this.carTypes = this.items[4].children[0].children;
      this.carTypeIdList = this.carTypes.map((carType) => carType.id);

      // set initial selected car type info
      this.setCarTypeInfo(this.carTypes[0]);

      // set car brand list
      this.setInitialCarBrand();

      console.log(this.carTypes);
      console.log(this.selectedCarItems);
      console.log(this.getDraftCarTotalPrice());
    },

    selectCarType(carType) {
      // set selected car type info
      this.setCarTypeInfo(carType);

      // to refresh brand
      this.setInitialCarBrand();
      console.log(this.getDraftCarTotalPrice());
    },

    selectCarBrand(carBrand) {
      this.setCarBrandInfo(carBrand);
      console.log(this.getDraftCarTotalPrice());
    },

    setInitialCarBrand() {
      // set car brand list to show radio button
      if (this.selectedCarItems.carType["children"]) {
        this.carBrands = this.selectedCarItems.carType.children[0].children;
        this.carBrandIdList = this.carBrands.map((carBrand) => carBrand.id);
      } else {
        this.carBrands = [];
        this.carBrandIdList = [];
      }
      // set initial selected car brand info
      if (this.carBrands.length && this.carBrandIdList.length) {
        this.setCarBrandInfo(this.carBrands[0]);
      } else {
        this.setCarBrandInfo(null);
      }
    },

    /**
     * This is to set car brand information.
     * @param {object} carBrand car brand object
     * @returns void
     */
    setCarBrandInfo(carBrand) {
      if (!carBrand) {
        this.selectedCarItems.carBrand["id"] = null;
        this.selectedCarItems.carBrand["parent_id"] = null;
        this.selectedCarItems.carBrand["images"] = null;
        this.selectedCarItems.carBrand["price"] = 0;
      } else {
        this.selectedCarItems.carBrand["id"] = carBrand.id;
        this.selectedCarItems.carBrand["parent_id"] = carBrand.parent_id;
        this.selectedCarItems.carBrand["images"] = carBrand.images;
        this.selectedCarItems.carBrand["price"] = carBrand.price;
      }
    },

    /**
     * This is to set car type information.
     * @param {object} carType car type object
     * @returns void
     */
    setCarTypeInfo(carType) {
      if (!carType) {
        this.selectedCarItems.carType["id"] = null;
        this.selectedCarItems.carType["parent_id"] = null;
        this.selectedCarItems.carType["children"] = null;
        this.selectedCarItems.carType["price"] = 0;
      } else {
        this.selectedCarItems.carType["id"] = carType.id;
        this.selectedCarItems.carType["parent_id"] = carType.parent_id;
        this.selectedCarItems.carType["children"] = carType.children;
        this.selectedCarItems.carType["price"] = carType.price;
      }
    },

    /**
     * This is to get src for images
     * @param {string} imagePath
     */
    getSrc(imagePath) {
      return imagePath ? require(`../../../${imagePath}`) : "";
    },

    /**
     * This is to get draft car total price.
     * @returns totalPrice number
     */
    getDraftCarTotalPrice() {
      return Object.values(this.selectedCarItems).reduce(
        (total, each) => total + each.price,
        0
      );
    },
  },
};
