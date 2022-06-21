<template>
  <div class="col-4 mt-3">
    <div class="card p-3">
      <h5 class="card-title">{{ restaurant.name }}</h5>
      <p class="card-text">{{ restaurant.description }}</p>
      <p class="card-text">{{ restaurant.ingredients }}</p>
      <p class="card-text">{{ restaurant.price }}</p>
      <router-link :to="{ name: 'single-restaurant', params: { id: restaurant.id } }">
        <button class="btn btn-primary text-uppercase">menu</button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Restaurant",

  props: ["restaurant"],

  methods: {},
};
</script>

<style lang="scss" scoped>
@import "../../sass/app.scss";

// background-color: $cambridge-blue;
</style>
