<template>
  <div id="header-guest" class="container">
    <nav class="navbar d-flex">
      <!-- Logo -->
      <a href="/" class="logo text-decoration-none">
        <!-- <span>DeliveBoo</span> -->
        <img src="/img/Deliveboo_Logo.png" alt="DeliveBoo logo" />
      </a>

      <div class="right-side d-flex align-items-center justify-content-between">
        <!-- Login/Register -->
        <div class="login-control">
          <a
            href="/login"
            class="btn btn-outline-dark text-uppercase rounded-pill me-2"
          >
            Login
          </a>
          <a
            href="/register"
            class="btn btn-outline-dark text-uppercase rounded-pill"
          >
            Register
          </a>
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
