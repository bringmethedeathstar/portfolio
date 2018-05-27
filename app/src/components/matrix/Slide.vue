<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div>
    <div v-html="block.text"></div>

    <img v-if="block.image.url" :src="block.image.url" :alt="block.image.title" />
  </div>
</template>

<style lang="scss" scoped>
</style>
