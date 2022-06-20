

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './views/App';
import index from './pages/index';
import vuex from 'vuex';
Vue.use(vuex);

import id from './pages/checkout/id';


const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            name: 'home',
            component: index
        },
        {
            path: '/product/:id',
            name: 'single-product',
            component: id
        }
    ]
    /* routes: require('./routes.js').default */
});

const store = new vuex.Store({
    state: {
        cart: [],
        dishes: [],
        order:{}
    },
    mutations: {
        updateProduct(state, prodotto) {
            state.dishes = prodotto;
        },
        addToCart(state, prodotto) {
            let productInCart = state.cart.find(item => item.id === prodotto.id);
            if (!productInCart == - 1) {
                state.cart[productInCart].quantity++;
                return;
            }
            prodotto.quantity = 1;
            state.cart.push(prodotto);
        },

        removeFromCart(state, index) {
            /* let productInCart = state.cart.find(item => item.id === product.id);
            if (productInCart.quantity > 1) {
                state.cart[productInCart].quantity--;
                return;
            } */
            state.cart.splice(index, 1);
        },
        updateOrder(state, order) {
            state.order = order;
        },
        updateCart(state, cart) {
            state.cart = cart;
        }
    },
    actions: {
        /* getProducts({commit}) {
            axios.get('/api/dishes')
                .then(response => {
                    commit('updateProduct', response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        }, */
        clearCart({commit}) {
            commit('updateCart', []);
        }
    }

});



const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
    store,
});
