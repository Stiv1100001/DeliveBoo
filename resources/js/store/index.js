import Vue from "vue";
import vuex from "vuex";

Vue.use(vuex);

export const store = new vuex.Store({
  state: {
    cart: [],
    restaurants: [],
    order: {},
  },

  getters: {
    getRestaurants(state) {
      return state.restaurants;
    },
  },

  mutations: {
    updateRestaurant(state, restaurants) {
      state.restaurants = restaurants;
    },

    addToCart(state, { product, quantity = 1 }) {
      let productInCart = state.cart.find((item) => item.id === product.id);

      if (productInCart) {
        state.cart[productInCart].quantity += quantity; // TODO controllare
        return;
      }

      product.quantity = quantity;

      state.cart.push(product);
      localStorage.setItem("cart", store.cart);
    },

    removeFromCart(state, index) {
      /* let productInCart = state.cart.find(item => item.id === product.id);
            if (productInCart.quantity > 1) {
                state.cart[productInCart].quantity--;
                return;
            } */
      state.cart.splice(index, 1);
    },
    updateOrder(state, order) {
      state.order = order;
    },
    updateCart(state, cart) {
      state.cart = cart;
      localStorage.setItem("cart", store.cart);
    },
  },
  actions: {
    async getRestaurants({ commit }) {
      try {
        let restaurants = (await axios.get("/api/restaurant")).data;
        commit("updateRestaurant", restaurants);
      } catch (e) {
        console.error(e);
      }
    },

    initCart({ commit }) {
      if (localStorage.getItem("cart") === null) {
        localStorage.setItem("cart", []);
      } else {
        commit("updateCart", localStorage.getItem("cart"));
      }
    },

    clearCart({ commit }) {
      commit("updateCart", []);
    },
  },
});

// import { defineStore } from "pinia";
// import { useStorage } from "@vueuse/core";

// export const useStore = defineStore("cart", {
//     state: () => {
//         return {
//             products: useStorage("cart", []),
//         };
//     },

//     getters: {
//         totalPrice(state) {
//             let total = 0;
//             state.products.forEach((p) => {
//                 total += p.product.price * p.quantity;
//             });

//             return total;
//         },

//         nProducts(state) {
//             return state.products.length;
//         },
//     },

//     actions: {
//         addProductsToCart(product, quantity = 1) {
//             let toPush = true;

//             this.products.forEach((p) => {
//                 if (p.product.id == product.id) {
//                     p.quantity += quantity;
//                     toPush = false;
//                 }
//             });

//             if (toPush) this.products.push({ product, quantity });

//             // Salvo nel local storage
//             localStorage.setItem("cart", this.products);
//         },

//         removeProductsToCart(product, quantity = 1) {
//             const new_products = [];

//             this.products.forEach((p) => {
//                 if (p.product.id == product.id) {
//                     p.quantity -= quantity;
//                     if (p.quantity > 0) new_products.push(p);
//                 } else {
//                     new_products.push(p);
//                 }
//             });

//             this.products = new_products;

//             localStorage.setItem("cart", this.products);
//         },
//     },
// });
