<template>
  <div id="wrapper" class="container">
    <Header />
    <div class="row justify-content-center mt-3">
      <div class="col-8"></div>
      <div class="col-12" v-if="loading">
        {{ loading }}
      </div>
      <SearchBar @restaurant="setSearchedData" />
      <h1 class="mt-3">Ristoranti</h1>

      <div
        class="col-4 mt-3"
        v-for="restaurant in restaurantToShow"
        :key="restaurant.id"
      >
        <div class="card p-3">
          <img
            :src="restaurant.image_url"
            :alt="'image of ' + restaurant.name_restaurant"
          />
          <p class="card-text">{{ restaurant.name_restaurant }}</p>
          <p class="card-text">{{ restaurant.address }}</p>
          <router-link :to="{ name: 'menu', params: { id: restaurant.id } }">
            <button class="btn btn-primary rounded-pill text-uppercase">
              menu
            </button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from "../components/Header";
import SearchBar from "../components/SearchBar";

export default {
  name: "Home",

  components: {
    Header,
    SearchBar,
  },
  data() {
    return {
      loading: true,
      restaurants: [],
      searchedRestaurant: [],
    };
  },
  methods: {
    setSearchedData(restaurant) {
      this.searchedRestaurant = restaurant;
    },
  },
  created() {
    this.loading = true;
    axios.get("/api/restaurant").then((response) => {
      this.restaurants = response.data;
      this.loading = false;
    });
  },
  computed: {
    randomRestaurants() {
      return this.restaurants
        .sort(() => Math.random() - Math.random())
        .slice(0, 10);
    },

    restaurantToShow() {
      if (this.searchedRestaurant.length == 0) {
        return this.randomRestaurants;
      } else {
        return this.searchedRestaurant;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/app.scss";

div#wrapper {
  h1 {
    color: $rich-black-fogra-29;
    font-family: $font-family-headings;
  }
}
</style>
