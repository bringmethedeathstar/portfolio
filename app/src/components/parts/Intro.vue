<script>
import api from '@/resources/base';
import Card from '@/components/cards/Card';

export default {
  components: { Card },

  data() {
    return {
      intro: {
        title: '',
        slug: '',
        text: '',
        hero: {},
        profile: {},
      },
    };
  },

  methods: {
    fetch() {
      api.get('/intro').then(intro => {
        this.intro = intro.data;
      });
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <section class="intro" :style="`background-image: url('${intro.hero.url}')`">
    <div class="container text-center">
      <img class="profile" :src="intro.profile.url" :alt="intro.profile.title">

      <h1>{{ intro.title }}</h1>

      <div v-html="intro.text"></div>
    </div>

    <pre>{{ intro }}</pre>
  </section>
</template>

<style lang="scss" scoped>
.intro {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: top;
  position: relative;
  padding: 0;
}
</style>
