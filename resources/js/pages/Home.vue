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
            <div class="row py-3">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="container">
                        <Post
                            v-for="post in postsData"
                            :key="post.id"
                            :post="post"
                        >
                        </Post>
                    </div>
                    <div class="row d-flex justify-content-center">
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
                <div class="col-3">
                    <h1>Categorie</h1>
                    <v-simple-table >
                        <thead>
                            <tr>
                                <th class="text-left">Categoria</th>
                                <th class="text-left">Posts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <Categories
                                v-for="category in categoriesData"
                                :key="category.id"
                                :category="category"
                            ></Categories>
                        </tbody>
                    </v-simple-table>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </v-app>
</template>

<script>
import Post from "../components/Post.vue";
import Footer from "../components/Footer.vue";
import Categories from "../components/Categories.vue";

export default {
    name: "Home",
    components: {
        Post,
        Footer,
        Categories,
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
            axios
                .get("/api/posts?page=" + this.pagination.current)
                .then((resp) => {
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
