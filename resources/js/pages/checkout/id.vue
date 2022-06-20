<template>
  <div class="text">
    {{ $route.params.id }}
  </div>
</template>

<script>
export default {
  name: "id",
  data: function () {
    return {
      product: [],
    };
  },
  methods: {
    getProduct() {
      axios.get("/api/dishes/" + this.$route.params.id).then((response) => {
        this.product = response.data.data;
        console.log(this.product);
      });
    },
  },
  created() {
    this.getProduct(this.$route.params.id);
    console.log(this.$route.params.id);
  },
};
</script>

<style></style>
