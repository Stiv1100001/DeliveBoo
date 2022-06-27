<template>
  <div id="header-guest" class="w-100 p-0">
    <div class="container">
      <nav class="navbar d-flex mb-3">
      <!-- Logo -->
      <a href="/" class="logo text-decoration-none">
        <img src="/img/Deliveboo_Logo.png" alt="DeliveBoo logo" />
      </a>

      <div class="right-side d-flex align-items-center justify-content-between">

        <!-- Login/Register -->
        <div class="login-control d-flex">
          <div  class="d-flex align-items-center">
            <a href="/login" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold"> Login </a>
            </div>
          <div class="d-flex align-items-center d-none d-sm-inline">
            <a href="/register" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold"> Register </a>
          </div>
        </div>
      </div>
    </nav>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Header",
  };
</script>


<style lang="scss" scoped>
  @import "../../sass/app.scss";
</style>