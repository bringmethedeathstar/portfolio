<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div class="pr-16">
    <h2>{{ block.label }}</h2>
    <div class="stack" v-html="block.text"></div>
  </div>
</template>

<style scoped></style>
