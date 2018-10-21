<script>
import Date from '@/components/parts/Date';

export default {
  props: ['card'],

  components: { Date },

  computed: {
    url() {
      return `/work/${this.card.slug}`;
    },

    client() {
      return this.card.client[0];
    },
  },
};
</script>

<template>
  <div class="crd">
    <router-link :to="url" class="card-image">
      <img v-if="card.main" :src="card.main.work" :alt="card.main.title" />
    </router-link>

    <div class="card-inner">
      <span class="card-date">
        <!-- <router-link :to="client.slug">{{ client.title }}</router-link> -->
        {{ client.title }}
        <div class="date"><Date :date="card.date.date" /></div>
      </span>

      <router-link :to="url">
        <span class="card-title">{{ card.title }}</span>
        <span class="card-intro">{{ card.intro }}</span>
      </router-link>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.crd {
  margin-bottom: 60px;
}

.card-image {
  display: block;
  border-radius: 5px;
  overflow: hidden;

  img {
    width: 100%;
    transition: transform 0.3s ease;
  }

  &:hover img {
    transform: scale(1.025);
  }
}

.card-inner {
  padding: 25px 5px 0 5px;
}

.card-date {
  margin-bottom: 10px;
  display: block;
  font-size: 12px;
  color: #7d6dff;

  .date {
    float: right;
  }
}

.card-title {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

.card-intro {
  font-size: 12px;
}
</style>
