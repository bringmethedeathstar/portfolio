<script>
import List from '~/components/blocks/List';
import Block from '~/components/Block';

export default {
  transition: 'page',

  components: { Block, List },

  async asyncData({ $axios, error, route }) {
    try {
      const page = await $axios.$get(route.params.slug);

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
      :title="page.title"
      :text="page.simple"
      :image="page.main"
      grayscale
    />

    <List :blocks="page.basic" />
  </div>
</template>

<style scoped></style>
