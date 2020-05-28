import Vue from "vue";
import VueRouter from "vue-router";

import Login from "../pages/user/Login";
import Home from "../pages/home/Home";
import store from "../store/index";

Vue.use(VueRouter);

/**
 * This is router setup for frontend side.
 */
const routes = [
    {
        path: "/vue/login",
        name: "login",
        component: Login
    }, ,
    {
        path: "/vue/home",
        name: "home",
        component: Home,
        meta: {
            authorize: []
        }
    },
    {
        path: "/vue/*",
        redirect: "/vue/home"
    },
    ,
    {
        path: "/vue",
        redirect: "/vue/home"
    }
]

const router = new VueRouter({
    mode: "history",
    routes
});

/**
 * This is to handle and check authentication for routing.
 */
router.beforeEach((to, from, next) => {
    const loggedIn = store.getters.isLoggedIn;
    if (!loggedIn && to.name != "login") {
        return next("/vue/login");
    } else if (loggedIn && to.name == "login") {
        return next("/vue/home");
    }
    next();
});

export default router;