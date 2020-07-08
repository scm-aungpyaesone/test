import Vue from "vue";
import VueRouter from "vue-router";

import Login from "../pages/user/Login";
import Home from "../pages/home/Home";
import Place from "../pages/planning/Place";
import store from "../store/index";

Vue.use(VueRouter);

/**
 * This is router setup for frontend side.
 */
const routes = [
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  ,
  {
    path: "/home",
    name: "home",
    component: Home,
    meta: {
      authorize: [],
    },
  },
  {
    path: "/planning/place",
    name: "place",
    component: Place,
  },
  {
    path: "/*",
    redirect: "/home",
  },
  ,
  {
    path: "",
    redirect: "/home",
  },
];

const router = new VueRouter({
  mode: "history",
  routes,
});

/**
 * This is to handle and check authentication for routing.
 */
router.beforeEach((to, from, next) => {
  const loggedIn = store.getters.isLoggedIn;
  if (!loggedIn && to.name != "login") {
    return next("/login");
  } else if (loggedIn && to.name == "login") {
    return next("/home");
  }
  next();
});

export default router;
