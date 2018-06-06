<script>
import api from '@/resources/base';

export default {
  metaInfo() {
    return {
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content: this.description,
        },
      ],
    };
  },

  data() {
    return {
      intro: {},
    };
  },

  methods: {
    fetch() {
      api.get('/intro').then(intro => {
        this.intro = intro.data;
      });
    },
  },

  computed: {
    description() {
      const regex = /(<([^>]+)>)/gi;
      return this.intro.text.replace(regex, '');
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <section class="intro">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div><img class="profile" :src="intro.profile.url" :alt="intro.profile.title"></div>
          <!-- <div class="client" v-if="item.client.slug">
            <img :src="item.client.icon" :alt="`${item.client.title} Brand`">
            {{ item.client.title }}
          </div> -->

          <h1 class="main-title under">Leah Walker</h1>

          <!-- <div class="under"></div> -->
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <!-- <p class="date text-center under"><Date :date="item.date.date" /></p> -->

          <div v-html="intro.text"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.main-title {
  font-family: 'Great Vibes', cursive;
  font-size: 52px;
}

.intro {
  font-size: 18px;
  padding-bottom: 30px;
}

.profile {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 30px;
}
</style>
