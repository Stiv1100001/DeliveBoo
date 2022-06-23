<template>
  <div class="container">
    <p>Quantity Totale: {{ getTotalNumberOfItemInCart }}</p>
    <ul class="checkout-list">
      <li v-for="product in getCart" :key="product.dish.id">
        <h3>{{ product.dish.name }}</h3>
        <span>{{ product.dish.price }} </span>
        <span>{{ product.dish.description }} </span>
        <h1>{{ product.quantity }}</h1>
        <button class="btn btn-info w-25" @click="removeItem(product.dish)">
          -
        </button>
      </li>
    </ul>
    <div>
      <p>
        Il tot del carrello è: {{ getTotalCartPrice }} €
        <button href="#" class="btn btn-danger" @click.prevent="clearCart()">
          Svuota carrello
        </button>
      </p>
    </div>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
        <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="name" class="form-control" id="name" />
      </div>
      <div class="mb-3">
        <label for="cognome" class="form-label">Cognome</label>
        <input type="cognome" class="form-control" id="cognome" />
      </div>
      <div class="mb-3">
        <label for="indirizzo" class="form-label">Indirizzo</label>
        <input type="name" class="form-control" id="indirizzo" />
      </div>

      <a href="/checkout" type="submit" class="btn btn-primary">Checkout</a>
    </form>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  name: "cart",
  data: function () {
    return {
      products: [],
    };
  },
  methods: {
    //FIRMA DELLA FUNZIONE---KISS KISS
    ...mapActions(["clearCart", "removeItem"]),
  },

  computed: {
    //FIRMA DELLA FUNZIONE
    ...mapGetters([
      "getTotalCartPrice",
      "getTotalNumberOfItemInCart",
      "getCart",
    ]),
  },

  created() {
    //this.products = this.$store.getters.getCart;
  },
};
</script>

<style></style>
