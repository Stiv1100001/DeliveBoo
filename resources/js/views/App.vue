<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",

  created() {
    this.$store.dispatch("syncRestaurants");
    this.$store.dispatch("initCart");
  },
};
</script>

style
