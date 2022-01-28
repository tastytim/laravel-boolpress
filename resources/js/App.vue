<template>
    <div>
        <Navbar></Navbar>
        <router-view></router-view>
      
    </div>
    
</template>
<script>
import Navbar from './components/Navbar.vue'
export default {
    name: "App",
    components: {
      Navbar
    },

    mounted(){
        console.log(this.$router);
        console.log(this.$route);
    }
};
</script>

<style></style>
