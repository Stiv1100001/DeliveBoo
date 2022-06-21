<template>
  <div class="container">
   <ul class="checkout-list">
      <li v-for="product in products" :key="product.dish.id">
        <h3 >{{ product.dish.name }}</h3>
        <span>{{ product.dish.price }} </span>
        <span>{{ product.dish.description }} </span> 
      </li>
    </ul>
  </div>
</template>

<script>
export default {
    name: "cart", 
    data: function(){
      return{
        products:[],
      }
    }, 
    created() {
    this.products= this.$store.getters.getCart;
  },
}
</script>

<style>

</style>