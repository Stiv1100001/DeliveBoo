window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import App from "./views/App";
import { store } from "./store";

const router = new VueRouter({
  mode: "history",
  routes: require("./routes.js").default,
});

const app = new Vue({
  el: "#root",
  render: (h) => h(App),
  router,
  store,
});
