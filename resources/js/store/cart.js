import { defineStore } from "pinia";
import { useStorage } from "@vueuse/core";

export const useStore = defineStore("cart", {
    state: () => {
        return {
            products: useStorage("cart", []),
        };
    },

    getters: {
        totalPrice(state) {
            let total = 0;
            state.products.forEach((p) => {
                total += p.price;
            });

            return total;
        },

        nProducts(state) {
            return state.products.length;
        },
    },

    actions: {
        addPrdocutsToCart(product) {
            this.products.push(product);

            // Salvo nel local storage
            localStorage.setItem("cart", this.products);
        },
    },
});
