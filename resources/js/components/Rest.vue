<template>
  <div class="card">
    <p class="text">{{ restaurant.name_restaurant }}</p>
    <p class="text">{{ restaurant.address }}</p>
    <p class="text">{{ restaurant.name_restaurant }}</p>
    <!-- <router-link :to="{ name: 'single-restaurant', params: { id: restaurant.id } }">
        <button class="btn btn-primary rounded-pill text-uppercase">menu</button>
    </router-link> -->
  </div>
</template>

<script>
export default {
    name: 'Rest',
    props: [ 'restaurant' ]
}
</script>

<style>

</style>
