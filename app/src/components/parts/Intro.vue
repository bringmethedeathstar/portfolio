<script>
import api from '@/resources/base';

export default {
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
  <section class="intro">
    <div class="container">
      <!-- <img class="profile" :src="intro.profile.url" :alt="intro.profile.title"> -->

      <div class="row">
        <div class="col-sm-8">
          <h1>Leah Walker</h1>

          <div v-html="intro.text"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
.intro {
  font-size: 18px;
  padding-bottom: 30px;
}

.profile {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}
</style>
