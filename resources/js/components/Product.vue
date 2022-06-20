<template>
  <div class="col-4 mt-3">
    <div class="card p-3">
      <h5 class="card-title">{{ product.name }}</h5>
      <p class="card-text">{{ product.description }}</p>
      <p class="card-text">{{ product.ingredients }}</p>
      <p class="card-text">&euro;{{ product.price }}</p>
      <router-link :to="{ name: 'single-product', params: { id: product.id } }">
        <button class="btn btn-primary">ACQUISTA</button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Product",

  props: ["product"],

  methods: {},
};
</script>

<style lang="scss" scoped></style>
