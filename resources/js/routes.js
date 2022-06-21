import index from "./pages/index.vue";
import id from "./pages/checkout/id.vue";
import Home from "./pages/Home.vue";

export default [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/product/:id",
    name: "single-product",
    component: id,
  },
];
