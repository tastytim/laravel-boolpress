<template>
<div>
<v-card class="mb-5">
        <v-img
        v-if="post.thumb"
            :src="`../storage/` + post.thumb"
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

        <v-card-actions>
            <router-link
                :to="{ name: 'posts.show', params: { slug: post.slug } }"
            >
                <v-btn color="primary">Leggere</v-btn>
            </router-link>
        </v-card-actions>
    </v-card>
    
    
  

</div>
    
   
</template>

<script>
export default {
    name: "Post",
    props: {
        post: {
            type: Object,
            required: true,
        },
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
