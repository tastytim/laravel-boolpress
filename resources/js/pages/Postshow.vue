<template>
    <!-- <div class="container">
        <div class="card">
            <div class="card-body">
                <img
                    class="width-100"
                    :src="post.thumb"
                    onError="this.src = 'https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg'"
                />
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">Testo - {{ post.body }}</p>

                <p class="card-text">{{ createDajsDate }}</p>

                <div class="d-flex">
                    <div
                        v-for="item in post.tags"
                        :key="item.id"
                        class="badge bg-dark text-white mr-3 fs-3"
                    >
                        {{ item.name }}
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <v-app>
        <v-container>
    <v-card class="mb-5">
        <v-img
            :src="post.thumb"
            onError="this.src= 'https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg'"
            aspect-ratio="2.75"
        ></v-img>

        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0">{{ post.title }}</h3>
                <div>{{ post.body }}</div>
            </div>
        </v-card-title>

        <v-layout >
            <div class="text-center">
                <v-chip
                    v-for="item in post.tags"
                    :key="item.id"
                    class="ma-2"
                    color="secondary"
                    >{{ item.name }}
                </v-chip>
            </div>
        </v-layout>

    </v-card>
        </v-container>
    </v-app>
</template>

<script>
import axios from "axios";
import dayjs from "dayjs";
export default {
    data() {
        return {
            post: {
                type: Object,
                default: () => ({}),
            },
        };
    },
    methods: {
        fetchPost() {
            const url = "/api/posts/" + this.$route.params.slug;

            window.axios
                .get(url)
                .then((resp) => {
                    this.post = resp.data;
                })
                .catch(() => {
                    this.$router.push({ name: "not-found" });
                });
        },
    },
    mounted() {
        this.fetchPost();
    },
    computed: {
        createDajsDate() {
            return window
                .dayjs(this.post.created_at)
                .format("DD/MM/YYYY HH:mm:ss");
        },
    },
};
</script>

<style></style>
