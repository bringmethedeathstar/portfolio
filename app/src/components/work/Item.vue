<script>
import api from '@/resources/base';
import Card from '@/components/parts/Card';

export default {
  components: { Card },

  data() {
    return {
      item: {
        title: '',
        date: {},
        slug: '',
        image: {},
        url: '',
        intro: '',
        link: '',
        clients: [
          {
            title: '',
            slug: '',
          },
        ],
        topics: [
          {
            title: '',
            slug: '',
          },
        ],
      },
    };
  },

  methods: {
    fetch() {
      api.get(`/work/${this.$route.params.slug}`).then(work => {
        this.item = work.data.data;
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
      <h1 class="alive">ayy</h1>
    </div>
  </section>
</template>

<style scoped>
</style>
