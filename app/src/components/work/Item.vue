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
    <!-- <section class="hero" :style="`background-image: url('${item.image.url}')`">
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
    </section> -->

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 text-center">
            <router-link :to="item.client.slug" class="client">
              <img :src="item.client.icon" :alt="`${item.client.title} Brand`">
              {{ item.client.title }}
            </router-link>

            <h1>{{ item.title }}</h1>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-sm-6 text-center">
            <p class="date text-center under">{{ item.date.date | moment('Do MMMM YYYY') }}</p>

            <div v-html="item.intro"></div>
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

                  <img v-if="block.image.url" :src="block.image.url" :alt="block.image.title" />
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
    background: rgba(#444, 0.8);
  }
}

h2 {
  font-weight: normal;
  margin-bottom: 60px;
}

section {
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
  padding-bottom: 30px;
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
