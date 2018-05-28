<script>
import api from '@/resources/base';
import Card from '@/components/parts/Card';

export default {
  components: { Card },

  data() {
    return {
      list: [],
    };
  },

  methods: {
    fetch() {
      api.get('/work').then(work => {
        this.list = work.data.data;
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
    <div class="container">
      <h1>My Work</h1>

      <div class="row">
        <div class="col-sm-6 col-md-4" v-for="entry in list" :key="entry.title">
          <Card :card="entry" />
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
section {
  padding-top: 30px;
}
</style>
