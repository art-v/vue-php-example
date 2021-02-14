<template>
  <div class="container pb-5">
    <div class="row">
      <form>
        <div class="mb-3">
          <label class="form-label">Название</label>
          <input v-model="post.title" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Ссылка на картинку</label>
          <input v-model="post.image" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Контент</label>
          <textarea v-model="post.content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" v-on:click.prevent="savePost()">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
import "firebase/database";
import axios from "axios";

export default {
  data() {
    return {
      post: {
        title: '',
        image: '',
        content: '',
      }
    }
  },
  methods: {
    savePost() {
      axios.post('http://localhost/post', this.post)
          .then(function (response) {
            app.posts = response.data.data;
            alert('Успешно');
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          })
          .then(function () {
            // always executed
          });
    }
  },
  name: "admin"
}
</script>

<style scoped>

</style>