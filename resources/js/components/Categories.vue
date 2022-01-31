<template>
    <!-- <div>
        <div >
            <router-link
                :to="{
                    name: 'category.show',
                    params: { category: category.id },
                }"
                >{{ category.name }}</router-link
            >
        </div>
    </div> -->

    <router-link
        :to="{
            name: 'category.show',
            params: { category: category.id },
        }"
        tag="tr"
    >
        <td>{{ category.name }}</td>
        <td>{{ category.posts.length }}</td>
    </router-link>
</template>

<script>
export default {
    name: "Categories",
    props: ["category"],
    data: () => ({}),
    methods: {
      
    },
};
</script>

<style></style>
