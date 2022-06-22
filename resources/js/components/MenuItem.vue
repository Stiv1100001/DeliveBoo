<template> 
  <div class="container">
          <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ item.name }}</h5>
            <p class="card-text">{{ item.description }}</p>
            <p class="card-text">Ingredienti: {{ item.ingredients }}</p>
            <p class="card-text">prezzo: {{ item.price }} &euro;</p> 
            <div class="q-holder w-100 d-flex justify-content-center">
              <button class="btn btn-info w-25" @click="plus()">+</button>
              <input
                type="number"
                class="quantity form-control d-inline-block w-50"
                min="0"
                step="1"
                v-model="quantity"
              />
              <button class="btn btn-info w-25" @click="minus()">-</button>
            </div>
          </div> 
        </div>
    
  </div>
  
  
</template>

<script>
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

  created() {
    const cart = this.$store.getters.getCart;

    const dish = cart.find((el) => el.dish.id == this.item.id);

    if (dish) {
      this.quantity = dish.quantity;
    }
  },

  methods: {
    plus() {
      this.quantity++;
      this.addToCart();
    },

    minus() {
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
