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
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <div class="project">
              <pre>{{ item }}</pre>
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
  padding-bottom: 180px;

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
}

.project {
  padding: 30px;
  background-color: #f5f5f5;
  margin-top: -150px;
}
</style>
