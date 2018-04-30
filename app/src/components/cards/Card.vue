<script>
export default {
  props: ['card'],
};
</script>

<template>
  <div class="crd">
    <img class="card-image" :src="card.image.url" :alt="card.image.title" />

    <span class="card-date">
      <span v-for="client in card.clients">{{ client.title }} | </span>
      {{ card.date.date | moment('Do MMM YYYY') }}
    </span>

    <span class="card-title">{{ card.title }}</span>
    <span class="card-intro">{{ card.intro }}</span>
  </div>
</template>

<style lang="scss" scoped>
.crd {
  margin-bottom: 30px;
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
