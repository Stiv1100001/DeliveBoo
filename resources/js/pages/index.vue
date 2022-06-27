<template>
  <div>
    <Header />
      <div id="wrapper" class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-8"></div>
        <div class="col-12" v-if="loading">
          {{ loading }}
        </div>
<<<<<<< HEAD
        <div id="full-width-div" class="mb-5">
          <Jumbo />
          <div id="searchbar" class="position-absolute">
            <SearchBar @restaurant="setSearchedData" />
          </div>
        </div>
        <div id="main" class="row">
          <h1>Ristoranti</h1>
          <div
            id="restaurants"
            v-for="restaurant in randomRestaurants"
            :key="restaurant.id"
            class="col-md-6 col-lg-4 mt-3 mb-5"
          >
            <!-- <div class="restaurant-wrapper"> -->
=======
        <SearchBar @restaurant="setSearchedData" />
        <h1 class="mt-3">Ristoranti</h1>

        <div
          class="col-4 mt-3"
          v-for="restaurant in restaurantToShow"
          :key="restaurant.id"
        >
          <div class="card p-3">
>>>>>>> main
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
  </div>

</template>

<script>
import Header from "../components/Header";
import SearchBar from "../components/SearchBar";
<<<<<<< HEAD
import Footer from "../components/Footer";
import Jumbo from "../components/Jumbo.vue";
=======
>>>>>>> main

export default {
  name: "index",

  components: {
    Header,
    SearchBar,
<<<<<<< HEAD
    Footer,
    Jumbo,
=======
>>>>>>> main
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
// <<<<<<< HEAD

div#full-width-div {
  position: absolute;
  width: 100vw;
  left: 0;
  padding: 50px 0;
  border-radius: 60px;
  background-color: $cambridge-blue;

  div#searchbar {
    top: 40%;
    left: 30%;
    background-color: hsla(39, 39%, 85%, 1);
    padding: 30px 40px;
    border-radius: 20px;
    box-shadow: 7.3px 5.4px 6.4px rgba(0, 0, 0, 0.06),
      27.3px 20px 21.4px rgba(0, 0, 0, 0.022),
      82px 60px 96px rgba(0, 0, 0, 0.007);
  }
}
div#main {
  img {
    // border-radius: 20px 20px 0px 0px;
    border-radius: 20px;
  }
  margin-top: 40rem;
// =======

// div#wrapper {
// >>>>>>> main
  h1 {
    color: $rich-black-fogra-29;
    font-family: $font-family-headings;
  }

  div#restaurants {
    //   background-color: $cambridge-blue;
    h4 {
      font-family: $font-family-headings;
      font-size: 1.5rem;
      color: $rich-black-fogra-29;
    }
    div.txt {
      width: 100%;
      //   border-bottom: 1px solid $rich-black-fogra-29;
      div#address {
        width: 60%;
        p {
          font-family: $font-family-txt;
          font-size: 0.9rem;
          color: $rich-black-fogra-29;
          //   border-right: 1px solid $rich-black-fogra-29;
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

}
</style>
