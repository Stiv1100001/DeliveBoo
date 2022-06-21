<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Home</h1>
            </div>
            <div class="col-8">
                <SearchBar/>
            </div>
        </div>
    </div>
</template>

<script>
import SearchBar from "../components/SearchBar"
export default {
    name: 'HomePage',
    components: {
        SearchBar,
    }
}
</script>

<style>

</style>