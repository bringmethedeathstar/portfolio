<script>
import Block from '~/components/Block';

export default {
  transition: 'page',

  components: { Block },

  async asyncData({ $axios, error }) {
    try {
      const page = await $axios.$get('rest/intro');

      return { page };
    } catch (e) {
      console.error(e);
      error(e.message);
    }
  },

  data: () => ({ page: {} }),
};
</script>

<template>
  <div class="container">
    <Block
      :flip="true"
      title="Leah Walker"
      :text="page.simple"
      :image="page.main"
      grayscale
    />
    <!-- :link="{ to: '/about', title: 'Hire Me' }" -->

    <h2>My Work</h2>
    <Block
      :flip="!!(i % 2)"
      :title="work.title"
      :text="work.intro"
      :image="work.main"
      :link="{ to: `/work/${work.slug}`, title: 'Read Story' }"
      v-for="(work, i) in page.featuredWork"
      :key="work.id"
    />

    <div class="push text-center">
      <n-link class="btn" to="/work">See my Portfolio &rarr;</n-link>
    </div>
  </div>
</template>

<style scoped></style>
