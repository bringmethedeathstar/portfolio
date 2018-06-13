<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div>
    <div v-html="block.text"></div>

    <div class="images">
      <img :class="image.layout" v-for="image in block.image" :key="image.url" :src="image.url" :alt="image.title" />
    </div>

    <div v-html="block.under"></div>
  </div>
</template>

<style lang="scss" scoped>
.images {
  margin-bottom: 25px;
  text-align: center;
}

img {
  margin-bottom: 25px;

  &:last-child {
    margin-bottom: 0;
  }
}

.contain {
  max-width: 400px;
}
</style>
