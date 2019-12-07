<script>
import Block from '~/components/Block';

export default {
  components: { Block },

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
    <Block
      flip="true"
      title="Leah Walker"
      :text="page.simple"
      :image="page.main"
      :link="{ to: '/about', title: 'Hire Me' }"
    />

    <h2>My Work</h2>
    <Block
      :flip="i % 2"
      :title="work.title"
      :text="work.intro"
      :image="work.main"
      :link="{ to: `/work/${work.slug}`, title: 'Read Story' }"
      v-for="(work, i) in page.featuredWork"
      :key="work.id"
    />

    <div class="push text-center">
      <n-link class="text-primary" to="/work">See my portfolio &rarr;</n-link>
    </div>
  </div>
</template>

<style scoped>
</style>
