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
          <input
            type="text"
            class="form-control"
            id="name_customer"
            name="name_customer"
            v-model="form.name_customer" />
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
  import Swal from "sweetalert2";

  export default {
    name: "cart",
    components: {
      Header,
      CreditCard,
    },

    data: () => ({
      token: "",
      form: {
        nonce: "",
        email: "",
        name_customer: "",
        address_customer: "",
        phone_number_customer: "",
        order: [],
      },
    }),

    methods: {
      ...mapActions(["clearCart", "removeItem"]),

      setNonce(nonce) {
        this.form.nonce = nonce;
      },

      pay() {
        if (this.$store.getters.getTotalNumberOfItemInCart === 0) {
          Swal.fire({
            position: "center",
            icon: "warning",
            title: "Non puoi acquistare 0 piatti!",
            showConfirmButton: true,
            timer: 5000,
          });

          return;
        }

        this.form.order = this.$store.getters.getCart.map((item) => {
          return { id: item.dish.id, quantity: item.quantity };
        });

        axios
          .post("/api/order/make", this.form)
          .then((res) => {
            if (res.data.success) {
              Swal.fire({
                position: "center",
                icon: "success",
                title: "Pagamento avvenuto con successo. Grazie per aver aquistato su DELIVEBOO.",
                showConfirmButton: true,
                timer: 2000,
                didOpen: (_toast) => {
                  setTimeout(() => {
                    this.$router.push({ name: "thanks", params: { id: res.data.orderID } });
                  }, 2000);
                },
              });
            } else {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Il pagamento non è andato a buon fine, riprova più tardi",
                showConfirmButton: true,
                timer: 5000,
              });
            }
          })
          .catch(() => {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Il pagamento non è andato a buon fine, riprova più tardi",
              showConfirmButton: true,
              timer: 5000,
            });
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
