<template>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">{{post.title}}</h5>
    <p class="card-text"> {{post.body}} </p>
  </div>
  <div class="card-body">
    <a href="{{route()}}" class="card-link">Continua a leggere</a>
    
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