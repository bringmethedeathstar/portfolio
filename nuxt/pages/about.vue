<script>
// import Block from '~/components/Block';

export default {
  transition: 'page',

  // components: { Block },

  async asyncData({ $axios, error }) {
    try {
      const page = await $axios.$get('about');

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
  <div class="container"></div>
</template>

<style scoped>
</style>
