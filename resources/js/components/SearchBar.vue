<template>
    <div>
        <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" placeholder="Scegli la tipologia" label="name_type" track-by="name_type" :searchable="false" :taggable="true" @tag="addTag">
        </multiselect>
        <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
    name: 'SearchBar',
    components: {
        Multiselect
    },
    props: ['types'],
    data: function(){
        return{
            typesList: [],
            value: [],
            options: []
        }
    },
    methods:{
        getTypes(){
            axios.get("/api/types")
                .then((response)=>{
                    console.log(response.data);
                    this.typesList = response.data;
                    this.typesList.forEach(types => {
                        this.options.push(types)
                    });
                    console.log(this.options);
                    console.log(this.value);
                })
                .catch( (error) => {
                    console.warn(error);
                });
        },
        addTag (newTag) {
            const tag = {
            name: newTag,
            code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        }
    },
    created() {
        this.getTypes();
    },
}

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>

</style>