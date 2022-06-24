<template>
  <div id="wrapper" class="container mb-5">
    <Header />
    <div class="row my-3">
      <!-- <div class="col-8"></div> -->
      <div class="col-12" v-if="loading">
        {{ loading }}
      </div>
      <SearchBar @restaurant="setSearchedData" />
      <h1 class="my-3">Ristoranti</h1>
      <div class="row">
        <div
          id="restaurants"
          v-for="restaurant in randomRestaurants"
          :key="restaurant.id"
          class="col-md-4 mb-5"
        >
          <!-- <div class="restaurant-wrapper"> -->
          <img
            :src="restaurant.image_url"
            class="mb-2"
            :alt="'image of ' + restaurant.name_restaurant"
          />
          <h4>{{ restaurant.name_restaurant }}</h4>
          <div class="txt mt-3 d-flex">
            <!-- <div class="wrapper d-flex"> -->
            <div id="address">
              <p class="card-text pb-2 pe-2">{{ restaurant.address }}</p>
            </div>
            <div
              class="menu-btn d-flex px-2 justify-content-center align-items-center"
            >
              <router-link
                :to="{
                  name: 'menu',
                  params: { id: restaurant.id },
                }"
              >
                <button class="btn rounded-pill text-uppercase">menu</button>
              </router-link>
            </div>
            <!-- </div> -->
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from "../components/Header";
import SearchBar from "../components/SearchBar";
import Footer from "../components/Footer";

export default {
  name: "index",

  components: {
    Header,
    SearchBar,
    Footer,
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
h1 {
  color: $rich-black-fogra-29;
  font-family: $font-family-headings;
}
div#restaurants {
  img {
    border-radius: 20px;
  }
  h4 {
    font-family: $font-family-headings;
    font-size: 1.5rem;
    color: $rich-black-fogra-29;
  }
  div.txt {
    width: 100%;
    border-bottom: 1px solid $rich-black-fogra-29;
    div#address {
      width: 60%;
      p {
        font-family: $font-family-txt;
        font-size: 0.9rem;
        color: $rich-black-fogra-29;
        border-right: 1px solid $rich-black-fogra-29;
      }
    }
    div.menu-btn {
      width: 40%;
      button {
        font-family: $font-family-txt;
        font-size: 0.8rem;
        color: $rich-black-fogra-29;
        background-color: $bright-yellow-crayola;
        cursor: pointer;

        &:hover {
          background-color: $rich-black-fogra-29;
          color: white;
          border: 1px solid $rich-black-fogra-29;
        }
      }
    }
  }
}
</style>
