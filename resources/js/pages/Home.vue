<template>
  <div>
    <div class="position-absolute loader h-100 w-100" :class="{ 'd-none': !loading }">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <Header />
    <div id="wrapper" class="container">
      <div class="row justify-content-start mt-3">
        <SearchBar @restaurant="setSearchedData" />
        <h1 class="mt-3">Ristoranti</h1>

        <div
          class="col-6 col-md-4 col-lg-3 mt-3 align-self-stretch"
          v-for="restaurant in restaurantToShow"
          :key="restaurant.id">
          <div class="card rounded-3">
            <img
              :src="getUrlImage(restaurant.image_url)"
              :alt="'image of ' + restaurant.name_restaurant"
              class="card-img-top" />
            <div class="card-body">
              <h4>{{ restaurant.name_restaurant }}</h4>
              <h5 class="fst-italic">{{ restaurant.address }}</h5>
              <router-link :to="{ name: 'menu', params: { id: restaurant.id } }">
                <button class="btn btn-primary rounded-pill text-uppercase">menu</button>
              </router-link>
            </div>
          </div>
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

      getUrlImage(image) {
        if (image.startsWith("http")) return image;
        else return "/storage/" + image;
      },
    },
    created() {
      this.loading = true;
      axios.get("/api/restaurant").then((response) => {
        this.restaurants = response.data;
        setTimeout(() => {
          this.loading = false;
        }, 2000);
      });
    },
    computed: {
      randomRestaurants() {
        return this.restaurants.sort(() => Math.random() - Math.random()).slice(0, 10);
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

  .loader {
    background-color: white;
    top: 0;
    left: 0;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
  }

  div#wrapper {
    h1 {
      color: $rich-black-fogra-29;
      font-family: $font-family-headings;
    }
  }
</style>
