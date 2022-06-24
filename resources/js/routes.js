import Home from "./pages/Home.vue";
import Menu from "./pages/Menu.vue";
import Checkout from "./pages/checkout.vue";

export default [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/restaurant/:id/menu",
    name: "menu",
    component: Menu,
  },
  {
    path: "/checkout",
    name: "checkout",
    component: Checkout,
  },
];
