<template>
    <div class="col-4 mt-3">
        <div class="card p-3" v-if="restaurant">
            <img :src="restaurant.image_url" :alt="'image of ' + restaurant.name_restaurant">
            <p class="card-text">{{ restaurant.name_restaurant }}</p>
            <p class="card-text">{{ restaurant.address}}</p>
            <!-- <p class="card-text">{{ restaurant. }}</p> -->
            <router-link :to="{ name: 'single-restaurant', params: { id: restaurant.id } }">
            <button class="btn btn-primary rounded-pill text-uppercase">menu</button>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Restaurant",

    props: {
        restaurant: {
            type: Object,
            required: false
        }
    },

    methods: {},
};
</script>

<style lang="scss" scoped>
@import "../../sass/app.scss";

div.card {
    background-color: $cambridge-blue;
    border: none !important;
}
</style>
