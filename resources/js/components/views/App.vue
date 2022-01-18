<template>
    <div class='container mt-3'>
        <Post v-for="post in postsData" :key="post.id" :post="post"> </Post>
    </div>
</template>

<script>
import Post from "../views/Post.vue";
import axios from "axios";
export default {
    name: "App",
    components: {
        Post,
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
