<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12" v-if="loading">
        {{ loading }}
      </div>
      <Product
        v-for="(product, index) in prodotti"
        :key="index"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
import Product from "../components/Product";
export default {
  name: "ExampleComponent",
  components: {
    Product,
  },
  data() {
    return {
      loading: true,
      prodotti: [],
    };
  },
  methods: {
    getProduct() {
      this.loading = true;
      axios.get("/api/dishes").then((response) => {
        this.prodotti = response.data.data;
        this.loading = false;
        console.log(this.prodotti);
      });
      /* .finally(() => {
                    setTimeout(() => {
                    this.loading = false;
                    }, 5000);
                }) */
    },
  },

  created() {
    this.getProduct();
  },
};
</script>
<style lang="scss" scoped></style>
