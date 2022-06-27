<template>
  <div id="header-guest" class="">
    <nav class="navbar d-flex px-2">
      <!-- Logo -->
      <a href="/" class="logo text-decoration-none">
        <img src="/img/Deliveboo_Logo.png" alt="DeliveBoo logo" />
      </a>

      <div class="right-side d-flex align-items-center justify-content-between">
        <!-- Login/Register -->
        <div class="login-control d-flex">
          <div class="d-flex align-items-center">
            <a href="/login" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold">
              Login
            </a>
          </div>
          <div class="d-flex align-items-center d-none d-sm-inline">
            <a href="/register" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold">
              Register
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
  export default {
    name: "Header",
  };
</script>

<style lang="scss" scoped>
  @import "../../sass/app.scss";

  div#header-guest {
    nav {
      // border-bottom: 1px solid black;
      a.logo {
        img {
          width: 180px;
        }
      }
      // span {
      //   font-size: 2rem;
      //   color: $rich-black-fogra-29;
      //   font-family: $font-family-headings;

      //   &:hover {
      //     -webkit-text-fill-color: transparent;
      //     -webkit-text-stroke-width: 1px;
      //   }
      // }
    }
  }
</style>
