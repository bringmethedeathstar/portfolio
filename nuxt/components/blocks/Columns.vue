<script>
export default {
  props: ['block'],
};
</script>

<template>
  <div class="flex flex-wrap -mx-8">
    <div class="sm:w-1/2 px-8" v-for="column in block.columns" :key="column.id">
      <h3>{{ column.label }}</h3>
      <div class="stack mb-12" v-html="column.text"></div>
    </div>
  </div>
</template>

<style scoped></style>
