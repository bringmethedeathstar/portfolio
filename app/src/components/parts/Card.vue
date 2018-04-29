<script>
export default {
  props: ['card'],
};
</script>

<template>
  <div>
    <img :src="card.image.url" :alt="card.image.title" />

    <span class="card-date">{{ card.company }} {{ card.date.date }}</span>
    <span class="card-title">{{ card.title }}</span>
    <span class="card-intro">{{ card.intro }}</span>
  </div>
</template>

<style lang="scss" scoped>
.card-date {
  font-size: 10px;
}

.card-title {
  font-weight: 400;
  display: block;
  margin-bottom: 4px;
}

img {
  width: 100%;
}
</style>
