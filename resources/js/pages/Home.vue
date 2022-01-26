<template>
    <div class="container">
        <div class="container mt-3">
            <Post v-for="post in postsData" :key="post.id" :post="post"> </Post>
        </div>
        <div class="row py-5 d-flex justify-content-center">
            <div class="pagination">
                <button
                    class="page-link"
                    v-if="currentPage != 1"
                    @click="getDates(currentPage - 1)"
                >
                    Prev
                </button>
                <button
                    class="page-link"
                    v-for="page in lastPage"
                    :key="page"
                    @click="getDates(page)"
                >
                    {{ page }}
                </button>
                <button
                    class="page-link"
                    v-if="currentPage != lastPage"
                    @click="getDates(currentPage + 1)"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Post from '../components/Post.vue'
import axios from "axios";
import * as dayjs from "dayjs";

export default {
    name: "Home",
    components: {
        Post,
    },
    data() {
        return {
            postsData: [],
            currentPage: 1,
            lastPage: null,
        };
    },

    methods: {
        getDates(page = 1) {
            axios.get("/api/posts?page=" + page).then((resp) => {
                this.postsData = resp.data.data;
                this.currentPage = resp.data.current_page;
                this.lastPage = resp.data.last_page;
            });
        },
    },

    mounted() {
        this.getDates();
    },
};
</script>

<style>

</style>