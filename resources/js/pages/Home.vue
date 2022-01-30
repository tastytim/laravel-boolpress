<template>
    <v-app>
        <div class="container">
            <span class="progress" v-show="loading">
                <div
                    class="progress-bar progress-bar-striped progress-bar-animated"
                    role="progressbar"
                    aria-valuenow="75"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 100%"
                ></div>
            </span>
            <div class="row">
                <div class="col-8">
                    <div class="container mt-3">
                        <Post
                            v-for="post in postsData"
                            :key="post.id"
                            :post="post"
                        >
                        </Post>
                    </div>
                    <div class="row py-5 d-flex justify-content-center">
                        <!-- PAGINATION VUETIFY -->
                        <v-pagination
                            v-model="pagination.current"
                            :length="pagination.total"
                            :total-visible="7"
                            @input="onPageChange"
                        >
                            <!-- <v-btn
                            class="page-link"
                            v-if="currentPage != 1"
                            @click="getDates(currentPage - 1)"
                        >
                            Prev
                        </v-btn>
                        <v-btn
                            class="page-link"
                            v-for="page in lastPage"
                            :key="page"
                            @click="getDates(page)"
                        >
                            {{ page }}
                        </v-btn>
                        <v-btn
                            class="page-link"
                            v-if="currentPage != lastPage"
                            @click="getDates(currentPage + 1)"
                        >
                            Next
                        </v-btn> -->
                        </v-pagination>
                    </div>
                </div>
                <div class="col-4">
                    <h1>Categories</h1>

                    <div v-for="category in categoriesData" :key="category.id">
                        <router-link
                            :to="{
                                name: 'category.show',
                                params: { category: category.id },
                            }"
                            >{{ category.name }}</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </v-app>
</template>

<script>
import Post from "../components/Post.vue";
import Footer from "../components/Footer.vue";

export default {
    name: "Home",
    components: {
        Post,
        Footer,
    },
    data() {
        return {
            postsData: [],
            // currentPage: 1,
            // lastPage: null,
            categoriesData: null,
            loading: false,
            pagination: {
                current: 1,
                total: 0,
            },
        };
    },

    methods: {
        getDates() {
            axios.get("/api/posts?page=" + this.pagination.current).then((resp) => {
                this.postsData = resp.data.data;
                this.pagination.current = resp.data.current_page;
                this.pagination.total = resp.data.last_page;
            });
        },

        getCategories() {
            this.loading = true;
            axios.get("/api/categories").then((resp) => {
                this.categoriesData = resp.data;
                this.loading = false;
            });
        },
        onPageChange() {
            this.getDates();
        },
    },
    mounted() {
        this.getDates();
        this.getCategories();
    },
};
</script>

<style></style>
