/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/* import { createPinia, PiniaVuePlugin } from "pinia";
Vue.use(PiniaVuePlugin);
const pinia = createPinia();
 */
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    // render: h => h(App),
    pinia,
});

//** delete single item car in db*/
const deleteForms = document.querySelectorAll('.delete');
deleteForms.forEach(singleForm => {
    singleForm.addEventListener('submit', function (event) {
        event.preventDefault(); // § blocchiamo l'invio del form
        userConfirmation = window.confirm(`Sei sicuro di voler eliminare ${this.getAttribute('dish-model')}?`);
        if (userConfirmation) {
            this.submit();
        }
    })
});
