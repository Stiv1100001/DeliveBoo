    <template>
    <div>
    <div
        class="position-absolute loader h-100 w-100"
        :class="{ 'd-none': !loading }">
        <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div class="container">
        <Header></Header>
        <div class="d-flex justify-content-between align-items-center mt-3">
        <h1 class="" v-if="restaurant">
            {{ restaurant.name_restaurant }}
        </h1>
        </div>
        <h6 v-if="restaurant" class="mb-5">
        <span
            class="badge bg-primary me-2"
            v-for="type in restaurant.types"
            :key="type.id"
            >{{ type.name_type }}</span
        >
        </h6>

        <h5>Menu</h5>

        <div class="d-flex">
        <div
            class="menu-container row row-cols-2 row-cols-lg-3 align-items-stretch g-3 w-75">
            <div class="col" v-for="dish in availableDishes" :key="dish.id">
            <MenuItem :item="dish" />
            </div>
        </div>
        <div class="cart w-25">
            <div class="card w-100">
            <div class="card-header">Carrello</div>
            <div class="card body p-1">
                <ul class="list-group mb-3">
                <li
                    class="list-group-item d-flex justify-content-between"
                    v-for="item in getCart"
                    :key="item.dish.id">
                    <span> {{ item.dish.name }}</span>
                    <span> {{ item.quantity }}</span>
                </li>
                </ul>
            </div>
            <div
                class="card-footer d-flex justify-content-between align-items-center">
                <h5 class="m-0">
                Totale: &euro; {{ getTotalCartPrice.toFixed(2) }}
                </h5>
                <router-link :to="{ name: 'checkout' }">
                <button class="btn btn-info">Checkout</button>
                </router-link>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </template>

    <script>
    import { mapGetters } from "vuex";
    import MenuItem from "../components/MenuItem.vue";
    import Header from "../components/Header.vue";
    export default {
    components: { MenuItem, Header },
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

    ...mapGetters([
        "getTotalNumberOfItemInCart",
        "getTotalCartPrice",
        "getCart",
    ]),
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
    top: 0;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    }
    </style>
