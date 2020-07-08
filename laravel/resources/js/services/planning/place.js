import Axios from "axios";

export default {
  data() {
    return {
      items: [],
      places: [],
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
    setItems(items) {
      this.items = items;
      this.places = this.items[0].children;
      console.log(this.places);
    },
  },
};
