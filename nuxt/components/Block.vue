<script>
export default {
  props: ['title', 'text', 'image', 'flip', 'link'],
};
</script>

<template>
  <div class="flex -mx-8 push" :class="{ 'flex-row-reverse': flip }">
    <div class="w-7/12 px-8">
      <img class="w-full profile" :src="image" :alt="title" />
    </div>

    <div class="w-5/12 px-8 pt-12">
      <h1 class="mb-8">{{ title }}</h1>
      <div class="mb-16" v-html="text"></div>

      <n-link class="text-primary" :to="link.to">{{ link.title }} &rarr;</n-link>
    </div>
  </div>
</template>

<style scoped>
</style>
