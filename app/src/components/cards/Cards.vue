<script>
import api from '@/resources/base';
import Card from '@/components/cards/Card';

export default {
  components: { Card },

  data() {
    return {
      list: [
        {
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
      ],
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
  background-color: #f5f5f5;
}
</style>
