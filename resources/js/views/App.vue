<template>
  <div>
    <Header/>
    <router-view>

    </router-view>

  </div>
</template>

<script>
import Header from "../components/Header.vue";
export default {
  name: "App",
    components: {
        Header,
    },

  created() {
    this.$store.dispatch("syncRestaurants");
    this.$store.dispatch("initCart");
  },
};
</script>

style
