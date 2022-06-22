import index from "./pages/index.vue";
import Menu from "./pages/Menu.vue";
// import id from "./pages/checkout/id.vue";

export default [
  {
    path: "/",
    name: "home",
    component: index,
  },
  {
    path: "/restaurant/:id/menu",
    name: "menu",
    component: Menu,
  },
  //   {
  //     path: "/product/:id",
  //     name: "single-product",
  //     component: id,
  //   },
];
