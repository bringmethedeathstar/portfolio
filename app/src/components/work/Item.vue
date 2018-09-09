<script>
import api from '@/resources/base';
import Date from '@/components/parts/Date';
import Matrix from '@/components/matrix/Blocks';

export default {
  metaInfo() {
    return {
      title: this.item.title,
      meta: [
        { vmid: 'description', name: 'description', content: this.item.intro },
      ],
    };
  },

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

  computed: {
    clients() {
      return this.item.clients ? this.item.clients.reverse() : [];
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
            <div class="clients">
              <div v-for="client in clients" :key="client.id" class="client">
                <img :class="`client-${client.iconStyle}`" :src="client.icon" :alt="`${client.title} Brand`">
                <div v-if="client.show" class="client-name">{{ client.title }}</div>
              </div>
            </div>

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

.clients {
  position: relative;
}

.client {
  display: block;
  font-style: 14px;
  margin-bottom: 30px;

  img {
    background-color: #fff;
    display: block;
    margin: 0 auto;
    width: 50px;
    height: 50px;
    margin-bottom: 10px;

    &.client-circle {
      border-radius: 50%;
    }
  }

  & + & {
    border-radius: 50%;
    width: 24px;
    height: 24px;
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(10px);
    margin: 0;

    .client-name {
      display: none;
    }

    img {
      width: 100%;
      height: 100%;
    }
  }
}

.date {
  font-style: italic;
  display: block;
  font-size: 14px;
}
</style>
