<template>
  <div class="text"> 
    {{ $route.params.id }} 
    <h3 class="product-name">{{ product.name }}</h3>
        <span class="product-price">{{ product.price }} </span>
        <span class="product-price">{{ product.description }} </span>   
    
  </div> 
  
</template>

<script> 
// import cart from "./cart.vue";
export default {
  name: "id",
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
  },

};
</script>

<style></style>
