<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div>
    <img v-if="block.image" :src="block.image.url" :alt="block.image.title" />

    <div v-html="block.text" class="text"></div>
  </div>
</template>

<style lang="scss" scoped>
.text {
  padding: 30px 45px;
  padding-bottom: 0;
}
</style>
