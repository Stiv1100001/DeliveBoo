<template>
  <div>
    <router-view></router-view>
    <!-- {{ getRestaurants }} -->
  </div>
</template>

<script>
import index from "../pages/index.vue";
import { mapGetters } from "vuex";

export default {
  name: "App",
  components: {
    index,
  },
  computed: {
    ...mapGetters(["getRestaurants"]),
  },
  created() {
    this.$store.dispatch("getRestaurants");
    this.$store.dispatch("initCart");
    // console.log(localStorage.getItem("cart"));
  },
};
</script>
