<template>
  <div class="col-4 mt-3">
    <div class="card p-3">
      <h5 class="card-title">{{ restaurant.image_url }}</h5>
      <p class="card-text">{{ restaurant.name_restaurant }}</p>
      <p class="card-text">{{ restaurant.address}}</p>
      <p class="card-text">{{ restaurant.price }}</p>
      <router-link :to="{ name: 'single-restaurant', params: { id: restaurant.id } }">
        <button class="btn btn-primary rounded-pill text-uppercase">menu</button>
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

div.card {
    background-color: $cambridge-blue;

}
</style>
