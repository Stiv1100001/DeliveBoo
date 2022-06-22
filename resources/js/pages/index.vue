<template>
    <div id="wrapper" class="container">
        <Header />
        <div class="row justify-content-center">
            <div class="col-12" v-if="loading">
            {{ loading }}
            </div>
            <h1 class="mt-5">Ristoranti</h1>

            <!-- searchbar -->
            <!-- <p v-for="(restaurant, index) in randomRestaurants" :key="index">{{ restaurant.name_restaurant }}</p> -->
            <div v-if="ristoranti.length">
                <Rest v-for="restaurant in randomRestaurants" :key="restaurant.id"></Rest>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "../components/Header";
import Rest from '../components/Rest.vue';


export default {
    name: "Restaurant",
    components: {
        Header,
        Rest
    },

        Restdata() {
        return {
            loading: true,
            ristoranti: [],
        };
    },
    created() {
            this.loading = true;
            axios.get('/api/restaurant').then((response) => {
                this.ristoranti = response.data;
                this.loading = false;
                console.log(this.ristoranti);
            }).catch(error => {
                console.error(error);
            });
            /* .finally(() => {
                        setTimeout(() => {
                        this.loading = false;
                        }, 5000);
                    }) */
    },
    computed: {
        // this.getRestaurant();
        randomRestaurants() {
            return this.ristoranti.sort(() => Math.random() - Math.random()).slice(0, 10);
        }
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
