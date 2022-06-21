<template>
    <!-- <form action="/action_page.php">
        <label for="cars">Choose a car:</label>
        <select name="cars" id="cars" multiple>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form> -->
    <!-- <div>
        <h5 class="card-title">{{ types.name_type }}</h5>
    </div> -->
<div>
    <multiselect class="form-select" v-model="value" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" placeholder="Scegli la tipologia" label="name_type" track-by="name_type" :searchable="false" :taggable="true" @tag="addTag">
        <!-- <template slot="selection" slot-scope="{ values, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template> -->
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
    //     getLista(){
    //         this.options.push(this.types);
    //         console.log(this.options);
    //     }
    // },
    // created() {
    //     this.getLista();
    // },
}
</script>

<style>

</style>