<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">Home</h1>
            </div>
            <div class="col-8">
                <SearchBar
                v-for="(types, index) in typesList"
                :key="index"
                :types="types"
                />
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
    },
    data: function(){
    return{
        typesList: [],
    }
    },
    methods:{
        getTypes(){
            axios.get("/api/types")
                .then((response)=>{
                    console.log(response.data);
                    this.typesList = response.data;
                })
                .catch( (error) => {
                    console.warn(error);
                });
        }
    },
    created() {
        this.getTypes();
    },
}
</script>

<style>

</style>