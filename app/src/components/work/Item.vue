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
        article: [
          {
            type: '',
            text: '',
            image: {},
          },
        ],
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
    <section class="hero" :style="`background-image: url('${item.image.url}')`">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 offset-sm-2">
            <h2>{{ item.title }}</h2>

            <div v-html="item.intro"></div>
          </div>

          <div class="col-sm-4 text-right">
            <div>{{ item.date.date | moment('Do MMM YYYY') }}</div>
            <router-link :to="item.client.slug">{{ item.client.title }}</router-link>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <div class="project">
              <div v-for="block in item.article" class="block" :class="block.type">
                <div v-if="block.type === 'intro'">
                  <img :src="block.image.url" :alt="block.image.title" />

                  <div v-html="block.text" class="project-text"></div>
                </div>

                <div v-else>
                  <div v-html="block.text"></div>

                  <img :src="block.image.url" :alt="block.image.title" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style lang="scss" scoped>
.hero {
  min-height: 400px;
  position: relative;
  color: white;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  font-weight: normal;
  padding-top: 100px;
  padding-bottom: 145px;

  &:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(#444, .8)
  }
}

h2 {
  font-weight: normal;
}

section {
  background-color: #f5f5f5;
  padding: 0;
}

.project {
  background-color: #f5f5f5;
  margin-top: -115px;
  position: relative;

  &:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 115px;
    top: 0;
    left: 0;
    z-index: 0;
    box-shadow: 0px -2px 41px -5px rgba(0,0,0,0.75);
  }
}

.block {
  margin-bottom: 30px;
  padding: 0 45px;
  margin-bottom: 45px;
  position: relative;
  z-index: 1;

  &.intro {
    padding: 0;
  }
}

.project-text {
  padding: 30px 45px;
  padding-bottom: 0;
}
</style>
