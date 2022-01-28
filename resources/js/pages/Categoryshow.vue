<template>
    <div class="container">
        <h2
            class="mb-5 text-center"
            v-if="!category.posts || category.posts.length === 0"
        >
            nessun dato
        </h2>

        <template v-else>
            <Post
                v-for="post in category.posts"
                :key="post.id"
                :post="post"
            ></Post>
        </template>
    </div>
</template>

<script>
import axios from "axios";
import dayjs from "dayjs";
import Post from '../components/Post';
export default {
    components:{Post},
    data() {
        return {
            category: {
                type: Object,
                default: () => ({}),
            },
        };
    },
    methods: {
        fetchPost() {
            const url = "/api/categories/" + this.$route.params.category;

            window.axios
                .get(url)
                .then((resp) => {
                    this.category = resp.data;
                })
                .catch(() => {
                    this.$router.push({ name: "not-found" });
                });
        },
    },
    mounted() {
        this.fetchPost();
    },
};
</script>

<style></style>
