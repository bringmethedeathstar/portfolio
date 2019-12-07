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
      <div class="flex -mx-8 push">
        <div class="w-5/12 px-8 pt-12">
          <h1 class="mb-8">Leah Walker</h1>
          <div class="mb-16" v-html="page.simple"></div>

          <n-link class="text-primary" to="/contact">Hire Me &rarr;</n-link>
        </div>

        <div class="w-7/12 px-8">
          <img class="w-full profile" :src="page.main.profile" alt />
        </div>
      </div>

      <h2>My Work</h2>
      <div
        class="flex -mx-8 push"
        :class="{ 'flex-row-reverse': i % 2 }"
        v-for="(work, i) in page.featuredWork"
        :key="work.id"
      >
        <div class="w-7/12 px-8">
          <img class="w-full" :src="work.main.featured" alt />
        </div>

        <div class="w-5/12 px-8 pt-12">
          <p class="mb-8 text-3xl font-bold leading-tight">{{ work.title }}</p>
          <p class="mb-16">{{ work.intro }}</p>

          <n-link class="text-primary" :to="`/work/${work.slug}`">Read Story &rarr;</n-link>
        </div>
      </div>

      <div class="push text-center">
        <n-link class="text-primary" to="/work">See my portfolio &rarr;</n-link>
      </div>
    </div>
  </div>
</template>

<style scoped>
.profile {
  filter: grayscale();
}
</style>
