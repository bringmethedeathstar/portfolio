<script>
import api from '@/resources/base';

export default {
  data() {
    return {
      list: [],
    };
  },

  methods: {
    fetch() {
      api.get('/blog').then(blog => {
        this.list = blog.data.data;
      });
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <section>
    <div class="container text-center">
      <h1>Blog</h1>

      <div class="row justify-content-center" v-for="entry in list" :key="entry.slug">
        <div class="col-sm-10">
          <p>{{ entry.title }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>
