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
                total += p.product.price * p.quantity;
            });

            return total;
        },

        nProducts(state) {
            return state.products.length;
        },
    },

    actions: {
        addProductsToCart(product, quantity = 1) {
            let toPush = true;

            this.products.forEach((p) => {
                if (p.product.id == product.id) {
                    p.quantity += quantity;
                    toPush = false;
                }
            });

            if (toPush) this.products.push({ product, quantity });

            // Salvo nel local storage
            localStorage.setItem("cart", this.products);
        },

        removeProductsToCart(product, quantity = 1) {
            const new_products = [];

            this.products.forEach((p) => {
                if (p.product.id == product.id) {
                    p.quantity -= quantity;
                    if (p.quantity > 0) new_products.push(p);
                } else {
                    new_products.push(p);
                }
            });

            this.products = new_products;

            localStorage.setItem("cart", this.products);
        },
    },
});
