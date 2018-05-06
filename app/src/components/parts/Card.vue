<script>
export default {
  props: ['card'],

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
      <router-link :to="card.client.slug">{{ card.client.title }}</router-link>
      {{ card.date.date | moment('Do MMM YYYY') }}
    </span>

    <router-link :to="url">
      <span class="card-title">{{ card.title }}</span>
    </router-link>

    <span class="card-intro">{{ card.intro }}</span>
  </div>
</template>

<style lang="scss" scoped>
.crd {
  margin-bottom: 45px;
}

.card-image {
  border-radius: 5px;
  margin-bottom: 15px;
}

.card-date {
  display: block;
  font-size: 10px;
  margin-bottom: 5px;
  color: #888;
}

.card-title {
  font-weight: 500;
  display: block;
  margin-bottom: 10px;
}

img {
  width: 100%;
}
</style>
