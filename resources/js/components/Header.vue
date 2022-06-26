<template>
    <div id="header-guest" class="w-100 p-0 shadow">
        <div class="container">
            <nav class="navbar d-flex p-0">
                <!-- Logo -->
                <a href="/" class="logo text-decoration-none">
                    <span>DeliveBoo</span>
                </a>

                <div class="right-side d-flex align-items-center justify-content-between">
                    <!-- Cart -->
                    <div class="cart align-items-center me-3">
                        <a href="#" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="6" cy="19" r="2" />
                                <circle cx="17" cy="19" r="2" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                            <span class="badge rounded-circle badge-notification bg-danger"></span>
                        </a>
                    </div>

                    <!-- Login/Register -->
                    <div class="login-control">
                        <a href="/login" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold">
                            Login
                        </a>
                        <a href="/register" class="btn btn-outline-dark rounded-pill border border-2 border-dark me-2 fw-bold">
                            Register
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" >
@import "../../sass/app.scss";

</style>
