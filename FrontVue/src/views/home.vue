<template>
  <div class="container pb-5">
    <div class="row">
      <div v-for="(post, key) in posts" class="col-12 mt-5">
        <card :post-key="key" :post-title="post.title" :post-content="post.content" :post-image="post.image"></card>
      </div>
    </div>
  </div>
</template>

<script>
import card from "../components/card.vue";
import axios from 'axios';

export default {
  data() {
    return {
      posts: []
    }
  },
  mounted() {
    let app = this;
    axios.get('http://localhost/post')
        .then(function (response) {
          app.posts = response.data.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });
  },
  components: {
    card
  },
  name: "home"
}
</script>