<template>
  <div class="wrapper position-relative d-flex flex-column">
    <div class="jumbo d-flex justify-content-between">
      <div class="img-left d-flex w-100">
        <img
          src="/img/friends_delivery.jpeg"
          class="img-fluid w-75 shadow rounded"
          alt="Image of friends eating"
        />
      </div>
      <div
        class="img-right w-100 d-flex justify-content-end align-items-center"
      >
        <img
          src="/img/delivery.jpeg"
          class="img-fluid w-75 shadow rounded"
          alt="Delivery image"
        />
      </div>
    </div>

    <div id="searchbar" class="shadow p-3 rounded-3 text-center m-0">
      <h2>Ordina online dai tuoi ristoranti preferiti</h2>
      <multiselect
        v-model="value"
        :options="options"
        :multiple="true"
        :close-on-select="false"
        :clear-on-select="false"
        placeholder="Scegli la tipologia"
        label="name_type"
        track-by="name_type"
        :searchable="false"
        :taggable="true"
        @tag="addTag"
        @select="search"
        @remove="remove"
      >
      </multiselect>
    </div>
    <!-- <pre class="language-json"><code>{{ value  }}</code></pre> -->
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  name: "SearchBar",
  components: {
    Multiselect,
  },
  props: ["types"],
  data: function () {
    return {
      typesList: [],
      value: [],
      options: [],
    };
  },
  methods: {
    getTypes() {
      axios
        .get("/api/types")
        .then((response) => {
          console.log(response.data);
          this.typesList = response.data;
          this.typesList.forEach((types) => {
            this.options.push(types);
          });
          console.log(this.options);
          console.log(this.value);
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    addTag(newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
      };
      this.options.push(tag);
      this.value.push(tag);
    },

    search(selectedOption, _id) {
      const toSearch = this.value.map((val) => {
        return val.id;
      });

      toSearch.push(selectedOption.id);

      axios
        .post("api/restaurant/search", {
          types: toSearch,
        })
        .then((res) => {
          this.$emit("restaurant", res.data);
        });
    },

    remove(removedOption, _id) {
      const newValue = this.value.filter((val) => val.id !== removedOption.id);

      const toSearch = newValue.map((val) => {
        return val.id;
      });

      axios
        .post("api/restaurant/search", {
          types: toSearch,
        })
        .then((res) => {
          this.$emit("restaurant", res.data);
        });
    },
  },
  created() {
    this.getTypes();
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css">
div#searchbar {
  position: absolute;
  top: 10px;
  left: 250px;
  z-index: 1;
  width: 100%;
  background-color: hsla(111, 17%, 77%, 1);
  /* -webkit-filter: blur(5px);
  filter: blur(5px); */
}
</style>
