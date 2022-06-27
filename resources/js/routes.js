import Home from "./pages/Home.vue";
import Menu from "./pages/Menu.vue";
import cart from "./pages/checkout/cart.vue";

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
    path: "/cart",
    name: "carrello",
    component: cart,
  },
];
