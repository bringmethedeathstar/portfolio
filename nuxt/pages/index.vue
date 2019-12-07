<script>
export default {
  async asyncData({ $axios, error }) {
    try {
      const page = await $axios.$get('intro');

      return { page };
    } catch (e) {
      error(e);
    }
  },

  data: () => ({ page: {} }),
};
</script>

<template>
  <div class="container">
    <div class="container-thin">
      <div class="intro push">
        <h1 class="text-xl">Leah Walker</h1>
        <div v-html="page.simple"></div>
      </div>

      <div
        class="flex -mx-8 push"
        :class="{ 'flex-row-reverse': i % 2 }"
        v-for="(work, i) in page.featuredWork"
        :key="work.id"
      >
        <div class="w-7/12 px-8">
          <img class="w-full" :src="work.main.work" alt="" />
        </div>

        <div class="w-5/12 px-8 pt-12">
          <p class="mb-8 text-3xl font-bold leading-tight">{{ work.title }}</p>
          <p class="mb-16">{{ work.intro }}</p>

          <n-link :to="`/work/${work.slug}`">
            Read Story &rarr;
          </n-link>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.intro {
  max-width: 600px;
}
</style>
