<script>
export default {
  props: ['title', 'text', 'image', 'flip', 'link'],
};
</script>

<template>
  <div class="flex flex-wrap items-center -mx-8 push" :class="{ 'md:flex-row-reverse': flip }">
    <div class="w-full md:w-1/2 lg:w-7/12 px-8">
      <picture class="w-full" :class="{ grayscale: title === 'Leah Walker' }" :alt="title">
        <source media="(max-width: 799px)" :srcset="image.work" />
        <source media="(min-width: 800px)" :srcset="image.featured" />
        <img :src="image.featured" />
      </picture>
    </div>

    <div class="w-full md:w-1/2 lg:w-5/12 px-8 pt-6">
      <h1 class="mb-8">{{ title }}</h1>
      <div class="mb-12" v-html="text"></div>

      <n-link v-if="link" class="text-primary" :to="link.to">{{ link.title }} &rarr;</n-link>
    </div>
  </div>
</template>

<style scoped>
.grayscale * {
  filter: grayscale();
}
</style>
