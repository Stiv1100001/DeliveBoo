<template>
  <div class="text"> 
    {{ $route.params.id }} 
    <h3 class="product-name">{{ product.name }}</h3>
        <span class="product-price">{{ product.price }} </span>
        <span class="product-price">{{ product.description }} </span>  
    <!-- <router-link :to="{ name: 'carello', params:{  } }" >
       <button class="btn btn-primary" @click="addCart(product)">Aggiungi al carello</button>
    </router-link> -->
    
  </div>
</template>

<script> 
// import cart from "./cart.vue";
export default {
  name: "id",
  // components:{
  //       cart,

  //     },
  data: function () {
    return {
      prodotti: [],
    };
  },
  methods: { 
    addCart:function(){
      this.$store.commit("addProductToCart", {
        product: this.product, 
        quantity: 1
      })
    },
    // getProduct() {
    //   axios.get("/api/dishes/" + this.$route.params.id).then((response) => {
    //     this.prodotti = response.data.data;
    //     console.log(this.prodotti);
    //   });
    // },
  },
  // created() {
  //   this.getProduct(this.$route.params.id);
  //   console.log(this.$route.params.id);
  // },
};
</script>

<style></style>
