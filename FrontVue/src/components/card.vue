<template>
  <div class="card">
    <img :src="postImage" class="card-img-top" alt="...">
    <div class="card-body">
      <router-link :to="{ name: 'Page', params: { id: postKey}}">
        <h5 class="card-title">{{ postTitle }}</h5>
      </router-link>
      <p class="card-text">{{ postContent }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['postKey', 'postContent', 'postImage', 'postTitle']
}
</script>

<style scoped>

</style>