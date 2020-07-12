import "./bootstrap";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Vue from "vue";
import Layout from "./components/Layout";
import router from "./routes/routes";
import store from "./store/index";
import axios from "axios";
import moment from "moment";
import { BootstrapVue } from "bootstrap-vue";
import { ValidationProvider } from "vee-validate";
import { extend } from "vee-validate";
Vue.use(BootstrapVue);
// Set Vue globally
window.Vue = Vue;

Vue.prototype.moment = moment;
Vue.prototype.$axios = axios;
extend("minmax", {
  validate(value, { min, max }) {
    return parseInt(value) >= min && parseInt(value) <= max;
  },
  params: ["min", "max"],
  message: (fieldName, placeholders) => {
    return `This field must have between ${placeholders.min} and ${placeholders.max}.`;
  },
});
// Load Index
Vue.component("app-layout", Layout);
Vue.component("ValidationProvider", ValidationProvider);
const app = new Vue({
  el: "#app",
  router,
  store,
  /**
   * This is to set token to any request to server side.
   * @returns Resquest with configurations
   */
  created() {
    axios.interceptors.request.use(
      function(config) {
        if (store.state.user) {
          const tokenType = store.state.user.data.token_type;
          const token = store.state.user.data.access_token;
          if (token) config.headers.Authorization = `${tokenType} ${token}`;
        }
        return config;
      },
      function(error) {
        return Promise.reject(error);
      }
    );
  },
});
