import Axios from "axios";

export default {
  data() {
    return {
      items: [],
      places: [],
      selectedPaceItemList: {
        // place id
        placeId: "",
        // place parent id (title id)
        placeTitleId: "",
        // place detail (like days and members)
        placeDetail: {},
        // place custom fields
        placeCustom: {},
      },
      placeIdList: [],
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
     * This is to get validation state
     * @param {Object} param0 
     */
    getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
    },
    /**
     * This is to get src for images
     * @param {string} imagePath 
     */
    getSrc(imagePath) {
      return imagePath ? require(`../../../${imagePath}`) : "";
    },
    /**
     * This is to set items.
     * @param {array} items 
     */
    setItems(items) {
      this.items = items;
      // get only place items
      this.places = this.items[0].children;

      // selected initial place items
      this.selectedPaceItemList.placeId = this.places[0].id;
      this.selectedPaceItemList.placeTitleId = this.places[0].parent_id;
      this.placeIdList = this.places.map((place) => place.id);
      this.setPlanDetail(
        this.placeIdList.indexOf(this.selectedPaceItemList.placeId)
      );
    },
    /**
     * This is to set plan detail like days and members
     * @param {integer} planIndex 
     */
    setPlanDetail(planIndex) {
      this.places[planIndex].children.forEach((element) => {
        if (element.children[0].is_customizable) {
          this.selectedPaceItemList.placeCustom[element.id] = {};
        }
        this.selectedPaceItemList.placeDetail[element.id] =
          element.children[0].id;
      });
      console.log(this.selectedPaceItemList);
    },
    /**
     * This is to select place.
     * @param {Object} place 
     */
    selectPlace(place) {
      this.selectedPaceItemList.placeTitleId = place.parent_id;
      this.selectedPaceItemList.placeDetail = {};
      this.setPlanDetail(
        this.placeIdList.indexOf(this.selectedPaceItemList.placeId)
      );
    },
    /**
     * This is to select place detail.
     * @param {object} placeDetailChild 
     */
    selectPlaceDetail(placeDetailChild) {
      this.selectedPaceItemList.placeCustom[placeDetailChild.parent_id] = {};
      let tmpPlanDetail = this.selectedPaceItemList.placeDetail;
      this.selectedPaceItemList.placeDetail = {};
      tmpPlanDetail[placeDetailChild.parent_id] = placeDetailChild.id;
      this.selectedPaceItemList.placeDetail = tmpPlanDetail;
      console.log(this.selectedPaceItemList);
    },
  },
};
