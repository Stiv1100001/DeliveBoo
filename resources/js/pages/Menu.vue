<template>
  <div>
    <div
      class="position-absolute loader h-100 w-100"
      :class="{ 'd-none': !loading }"
    >
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <div class="container">
      <h1 class="mt-3" v-if="restaurant">
        {{ restaurant.name_restaurant }}
      </h1>
      <h6 v-if="restaurant" class="mb-5">
        <span
          class="badge bg-primary"
          v-for="type in restaurant.types"
          :key="type.id"
          >{{ type.name_type }}</span
        >
      </h6>

      <h5>Menu</h5>
        <div>
            <a href="/cart" class="btn btn-warning"> Carello</a>
          </div>
      <div
        class="menu-container row row-cols-2 row-cols-lg-3 align-items-stretch g-3"
      >
        <div class="col" v-for="dish in availableDishes" :key="dish.id">  
          <MenuItem :item="dish" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MenuItem from "../components/MenuItem.vue";
export default {
  components: { MenuItem },
  name: "Menu",

  data: () => ({
    restaurant: null,
    dishes: [],
    loading: true,
  }),

  computed: {
    availableDishes() {
      return this.dishes.filter((dish) => dish.availability);
    },
  },

  async created() {
    const dishes = (await axios.get("/api/dishes/" + this.$route.params.id))
      .data.data;
    const restaurant = (
      await axios.get("/api/restaurant/" + this.$route.params.id)
    ).data;

    this.dishes = dishes;
    this.restaurant = restaurant;

    this.loading = false;
  },
};
</script>

<style lang="scss" scoped>
.loader {
  background-color: white;
  z-index: 10;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
