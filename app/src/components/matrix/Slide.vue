<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div>
    <div v-html="block.text"></div>

    <img :class="{ push: block.under }" v-if="block.image.url" :src="block.image.url" :alt="block.image.title" />

    <div v-html="block.under"></div>
  </div>
</template>

<style lang="scss" scoped>
.push {
  margin-bottom: 20px;
}
</style>
