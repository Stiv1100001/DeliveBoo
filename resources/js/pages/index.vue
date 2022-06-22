<template>
    <div id="wrapper" class="container">
        <Header />
        <div class="row justify-content-center">
            <div class="col-12" v-if="loading">
            {{ loading }}
            </div>
            <h1 class="mt-5">Ristoranti</h1>

            <!-- searchbar -->

            <Restaurant
            v-for="(restaurant, index) in randomRestaurants"
            :key="index"
            :restaurant="restaurant"
            />
        </div>
    </div>
</template>

<script>
import Header from "../components/Header";
import Restaurant from "../components/Restaurant";

export default {
    name: "Restaurant",
    components: {
        Header,
        Restaurant,
    },
    data() {
        return {
            loading: true,
            ristoranti: [],
        };
    },
    mmounted() {
            this.loading = true;
            axios.get('/api/restaurant').then((response) => {
                this.ristoranti = response.data;
                this.loading = false;
                console.log(this.ristoranti);
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
