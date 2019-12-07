<script>
import Block from '~/components/Block';

export default {
  components: { Block },

  async asyncData({ $axios, error, route }) {
    try {
      const page = await $axios.$get(`/work/${route.params.slug}`);

      return { page };
    } catch (e) {
      error(e);
    }
  },

  data: () => ({ page: [] }),
};
</script>

<template>
  <div class="container">
    <Block :title="page.title" :text="page.intro" :image="page.main" />

    <pre>{{ page }}</pre>
  </div>
</template>

<style scoped>
</style>
