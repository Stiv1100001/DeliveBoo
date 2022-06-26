<template>
  <div class="card">
    <img :src="item.img_url" class="img-fluid" alt="" />
    <div class="card-body">
      <h5 class="card-title">{{ item.name }}</h5>
      <p class="card-text">{{ item.description }}</p>
      <p class="card-text">Ingredienti: {{ item.ingredients }}</p>
      <p class="card-text">prezzo: {{ item.price }} &euro;</p>

      <div
        class="q-holder w-100 d-flex justify-content-between align-items-center">
        <button
          class="btn btn-info w-25"
          @click="minus()"
          :disabled="quantity.length == 0">
          -
        </button>
        <span class="">{{ quantity }}</span>
        <button class="btn btn-info w-25" @click="plus()">+</button>
      </div>
    </div>

    <div
      class="q-holder w-100 d-flex justify-content-between align-items-center">
      <button
        class="btn btn-info w-25"
        @click="minus()"
        :disabled="quantity.length == 0">
        -
      </button>
      <span class="">{{ quantity }}</span>
      <button class="btn btn-info w-25" @click="plus()">+</button>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "MenuItem",
  data: () => ({
    quantity: 0,
  }),

  props: {
    item: {
      type: Object,
      required: true,
    },
  },

  computed: {
    ...mapGetters(["getRestaurantOrderId"]),
  },

  created() {
    const cart = this.$store.getters.getCart;

    const dish = cart.find((el) => el.dish.id == this.item.id);

    if (dish) {
      this.quantity = dish.quantity;
    }
  },

  methods: {
    plus() {
      if (
        this.getRestaurantOrderId &&
        this.getRestaurantOrderId !== this.item.user_id
      ) {
        this.$emit("insertError");
        return;
      }

      this.quantity++;
      this.addToCart();
    },

    minus() {
      if (this.quantity === 0) return;
      this.quantity--;
      this.removeFromCart();
    },

    addToCart() {
      this.quantity = parseInt(this.quantity);
      if (this.quantity <= 0) return;

      const payload = {
        dish: this.item,
        quantity: 1,
      };

      this.$store.commit("addProductToCart", payload);
    },

    removeFromCart() {
      this.quantity = parseInt(this.quantity);

      const payload = {
        dish: this.item,
        quantity: 1,
      };

      this.$store.commit("removeProductFromCart", payload);
    },
  },
};
</script>

<style lang="scss" scoped></style>
