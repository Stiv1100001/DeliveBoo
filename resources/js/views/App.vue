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
    this.$store.dispatch("syncRestaurants");
    this.$store.dispatch("initCart");
  },
};
</script>
