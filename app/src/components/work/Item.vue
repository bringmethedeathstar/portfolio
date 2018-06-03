<script>
import api from '@/resources/base';
import Date from '@/components/parts/Date';
import Matrix from '@/components/matrix/Blocks';

export default {
  components: { Date, Matrix },

  data() {
    return {
      item: {
        date: {},
        client: { slug: '' },
        topics: [],
        article: [],
      },
    };
  },

  methods: {
    fetch() {
      api.get(`/work/${this.$route.params.slug}`).then(work => {
        this.item = work.data;
      });
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <div>
    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <!-- <router-link :to="`/clients/${item.client.slug}`" class="client" v-if="item.client.slug"> -->
            <div class="client" v-if="item.client.slug">
              <img :src="item.client.icon" :alt="`${item.client.title} Brand`">
              {{ item.client.title }}
            </div>
            <!-- </router-link> -->

            <h1>{{ item.title }}</h1>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <p class="date text-center under"><Date :date="item.date.date" /></p>

            <p v-if="item.intro">{{ item.intro }}</p>
          </div>
        </div>
      </div>
    </section>

    <Matrix :blocks="item.article" />
  </div>
</template>

<style lang="scss" scoped>
section {
  padding-bottom: 0;
}

.client {
  display: block;
  font-style: 14px;
  margin-bottom: 30px;

  img {
    display: block;
    margin: 0 auto;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-bottom: 10px;
  }
}

.date {
  font-style: italic;
  display: block;
  font-size: 14px;
}
</style>
