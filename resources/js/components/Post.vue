<template>
    <div class="card">
        <div class="card-body">
            <router-link :to="{name:'posts.show', params:{slug:post.slug}}">
                <img
                    class="width-100"
                    :src="post.thumb"
                    onError="this.src = 'https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg'"
                />
                <h5 class="card-title">Titolo - {{ post.title }}</h5>
                <p class="card-text">Testo - {{ post.body }}</p>
                <p class="card-text">Categoria - {{ post.category.name }}</p>
                <p class="card-text">
                    {{ post.user.name }} -
                    <small class="text-muted">{{ createDajsDate }}</small>
                </p>

                <div class="d-flex">
                    <div
                        v-for="item in post.tags"
                        :key="item.id"
                        class="badge bg-dark text-white mr-3 fs-3"
                    >
                        {{ item.name }}
                    </div>
                </div>
            </router-link>
        </div>
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
