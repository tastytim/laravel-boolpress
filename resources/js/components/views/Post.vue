<template>
  <div class="card">
  <div class="card-body">
    <img class="width-100" :src="post.thumb">
    <h5 class="card-title">Titolo - {{post.title}}</h5>
    <p class="card-text">Testo - {{post.body}} </p>
    <p class="card-text">Categoria - {{post.category.name}}</p>
    <p class="card-text">Scritto da - {{post.user.name}}</p>
  </div>
</div>
</template>

<script>
export default {
    name: 'Post',
    props:{
       post:{
           type: Object,
           required: true,
       }
    }
}
</script>

<style>

</style>