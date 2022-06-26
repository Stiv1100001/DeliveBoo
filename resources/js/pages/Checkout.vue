<template>
  <div>
    <Header class="mb-5"></Header>
    <div class="container pb-4">
      <ul class="list-group mb-2">
        <li
          v-for="product in getCart"
          :key="product.dish.id"
          class="list-group-item d-flex justify-content-between align-items-center">
          <h4>{{ product.dish.name }} - {{ product.quantity }} pezzo/i</h4>
          <button class="btn btn-warning" @click="removeItem(product.dish)">-</button>
        </li>
        <li class="list-group-item d-flex justify-content-end">
          <h4>Il totale del carrello è: {{ getTotalCartPrice }} €</h4>
        </li>
      </ul>

      <div class="d-flex justify-content-end">
        <button href="#" class="btn btn-danger fw-bold" @click.prevent="clearCart()">Svuota carrello</button>
      </div>
      <form>
        <div class="mb-1">
          <label for="exampleInputEmail1" class="form-label">Indirizzo mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" v-model="form.email" />
          <div id="emailHelp" class="form-text">Non condivideremo la password con nessuno</div>
        </div>
        <div class="mb-1">
          <label for="name_customer" class="form-label">Nome & Cognome</label>
          <input type="text" class="form-control" id="name_customer" name="name_customer" v-model="form.name_customer" />
        </div>
        <div class="mb-1">
          <label for="address_customer" class="form-label">Indirizzo</label>
          <input
            type="text"
            class="form-control"
            id="address_customer"
            name="address_customer"
            v-model="form.address_customer" />
        </div>
        <div class="mb-1">
          <label for="phone_number_customer" class="form-label">Numero di telefono</label>
          <input
            type="tel"
            class="form-control"
            id="phone_number_customer"
            name="phone_number_customer"
            v-model="form.phone_number_customer" />
        </div>

        <CreditCard v-if="token !== ''" :token="token" @nonce="setNonce" class="mb-3" />
      </form>
      <button class="btn btn-info w-100" mb-5 @click="pay">Paga</button>
    </div>
  </div>
</template>

<script>
  import { mapActions, mapGetters } from "vuex";
  import Header from "../components/Header.vue";
  import CreditCard from "../components/CreditCard.vue";
  import axios from "axios";

  export default {
    name: "cart",
    components: {
      Header,
      CreditCard,
    },
    data: function () {
      return {
        token: "",
        form: {
          nonce: "",
          email: "",
          name_customer: "",
          address_customer: "",
          phone_number_customer: "",
          order: [],
        },
      };
    },
    methods: {
      ...mapActions(["clearCart", "removeItem"]),
      setNonce(nonce) {
        this.form.nonce = nonce;
      },

      pay() {
        this.form.order = this.$store.getters.getCart.map((item) => {
          console.log(res.data);
          return { id: item.dish.id, quantity: item.quantity };
        });

        axios.post("/api/order/make", this.form).then((res) => {
          console.log(res);
          if (res.data.success) {
            this.$router.push({ name: "thanks", params: { id: res.data.orderID } });
          } else {
            alert("Errore nella creazione dell'ordine");
          }
        });
      },
    },

    computed: {
      ...mapGetters(["getTotalCartPrice", "getTotalNumberOfItemInCart", "getCart"]),
    },

    created() {
      axios.get("/api/order/token").then((res) => {
        this.token = res.data.token;
      });
    },
  };
</script>

<style></style>
