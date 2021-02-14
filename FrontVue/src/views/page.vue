<template>
  <div class="container pb-5" id="blog">
    <div class="row">
      <div class="card">
        <img :src="post.image" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>
          <p class="card-text">{{ post.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from "axios";

export default {
  name: "page",
  data() {
    return {
      post: {
        title: '',
        image: '',
        content: ''
      }
    }
  },
  mounted() {
    let id = this.$route.params.id;

    let app = this;
    axios.get('http://localhost/post/' + id)
        .then(function (response) {
          app.post = response.data.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
        });
  }
}
</script>