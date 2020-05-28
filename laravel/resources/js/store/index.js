import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import constants from "../constants/constants";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

axios.defaults.baseURL = constants.API_BASE_URL;

export default new Vuex.Store({
  state: {
    user: null,
  },
  mutations: {
    setUserData(state, userData) {
      state.user = userData;
    },
  },
  actions: {
    /**
     * This is to login user and save logged in user in vuex store.
     * @param {Function} commit commit function
     * @param {Object} credentials user name and password
     */
    login({ commit }, credentials) {
      return axios.post("/auth/login", credentials).then(({ data }) => {
        commit("setUserData", data);
      });
    },
    /**
     * This is to logout user and reset user in vuex store.
     * @param {Function} param0 commit function
     * @param {Object} credentials credentials
     */
    logout({ commit }, credentials) {
      return axios.post("/auth/logout", credentials).then(({ data }) => {
        commit("setUserData", null);
      });
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.user,
  },
  plugins: [createPersistedState()],
});
