<template>
    <Posts></Posts>
</template>

<script>
import Posts from "../views/Posts.vue";
import axios from "axios";
export default {
    name: "App",
    components: {
        Posts,
    },
    data() {
        return {
            postsData: [],
        };
    },

    mounted() {
        axios.get("/api/posts").then((resp) => {
            this.postsData = resp.data;
        });
    },
};
</script>

<style></style>
