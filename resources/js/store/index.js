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

    getTotalCartPrice(state) {
      let total = 0;

      function reduceFn(accumulator, next) {
        return accumulator + next.product.price * next.quantity;
      }

      total = state.cart.reduce(reduceFn, 0);

      return total;
    },

    getTotalNumberOfItemInCart(state) {
      let number = 0;

      state.cart.forEach((p) => {
        number += p.quantity;
      });

      return number;
    },
  },

  mutations: {
    updateRestaurant(state, restaurants) {
      state.restaurants = restaurants;
    },

    addProductToCart(state, { product, quantity = 1 }) {
      if (!state.cart.length) {
        if (product.user_id != state.cart[0]) {
          return false;
        }
      }

      let toPush = true;

      state.cart.forEach((p) => {
        if (p.product.id == product.id) {
          p.quantity += quantity;
          toPush = false;
        }
      });

      if (toPush) state.cart.push({ product, quantity });

      // Salvo nel local storage
      localStorage.setItem("cart", store.cart);
      return true;
    },

    removeProductFromCart(state, { product, quantity = 1 }) {
      const newCart = [];

      state.cart.forEach((p) => {
        if (p.product.id == product.id) {
          p.quantity -= quantity;
          if (p.quantity > 0) newCart.push(p);
        } else {
          newCart.push(p);
        }
      });

      state.cart = newCart;

      localStorage.setItem("cart", store.cart);
    },

    fillCart(state, cart) {
      state.cart = cart;
      localStorage.setItem("cart", store.cart);
    },

    updateOrder(state, order) {
      state.order = order;
    },
  },

  actions: {
    async syncRestaurants({ commit }) {
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
        commit("fillCart", localStorage.getItem("cart"));
      }
    },

    clearCart({ commit }) {
      commit("fillCart", []);
    },
  },
});
