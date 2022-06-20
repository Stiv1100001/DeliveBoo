<template>
    <div>
        <router-view></router-view>

    </div>


</template>

<script>

import index from '../pages/index.vue';

export default{
    name: "App",
    components:{
        index,


    },

}

</script>
