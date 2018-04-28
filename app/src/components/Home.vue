<script>
import api from '@/resources/base';

export default {
  components: { api },

  data() {
    return {
      list: [
        {
          title: '',
          date: {},
          slug: '',
          image: '',
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
  <div class="container-fluid">
    <!-- <pre>{{ list }}</pre> -->
    <div class="row">
      <div class="col-sm-4" v-for="entry in list" :key="entry.title">
        <img :src="entry.image" :alt="entry.title" />

        <span class="card-date">{{ entry.company }} {{ entry.date.date }}</span>
        <span class="card-title">{{ entry.title }}</span>
        <span class="card-intro">{{ entry.intro }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card-date {
  font-size: 10px;
}

.card-title {
  font-weight: 400;
  display: block;
  margin-bottom: 4px;
}

img {
  width: 100%;
}
</style>
