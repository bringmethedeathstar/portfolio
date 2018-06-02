<script>
import Date from '@/components/parts/Date';

export default {
  props: ['card'],

  components: { Date },

  computed: {
    url() {
      return `/work/${this.card.slug}`;
    },
  },
};
</script>

<template>
  <div class="crd">
    <router-link :to="url">
      <img class="card-image" :src="card.image.url" :alt="card.image.title" />
    </router-link>

    <span class="card-date">
      <!-- <router-link :to="card.client.slug">{{ card.client.title }}</router-link> -->
      {{ card.client.title }}
      <div class="date"><Date :date="card.date.date" /></div>
    </span>

    <router-link :to="url">
      <span class="card-title">{{ card.title }}</span>

      <span class="card-intro">{{ card.intro }}</span>
    </router-link>
  </div>
</template>

<style lang="scss" scoped>
.crd {
  margin-bottom: 45px;
}

.card-image {
  border-radius: 3px;
  margin-bottom: 5px;
}

.card-date {
  display: block;
  font-size: 10px;
  margin-bottom: 7.5px;
  color: #888;

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

img {
  width: 100%;
}
</style>
