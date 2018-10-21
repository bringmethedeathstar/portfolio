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
      intro: {
        main: {},
        simple: '',
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

  computed: {
    description() {
      return this.intro.simple.replace(/(<([^>]+)>)/gi, '');
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
          <div class="profile"><img :src="intro.main.profile" :alt="intro.main.title"></div>

          <h1 class="main-title under">Leah Walker</h1>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div v-html="intro.simple"></div>
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
  padding-top: 30px;
  padding-bottom: 30px;
}

.profile {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  margin: 0 auto;
  margin-bottom: 30px;

  img {
    margin-left: -1px;
    margin-top: -1px;
    width: 102px;
    height: 102px;
  }
}
</style>
