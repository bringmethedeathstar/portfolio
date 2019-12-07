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

  data: () => ({ page: {}, full: false }),

  computed: {
    screenshot() {
      return this.page.screenshot
        ? this.page.screenshot[`screenshot${this.full ? 'Full' : 'Crop'}`]
        : '';
    },

    client() {
      return this.page.client[1] || this.page.client[0];
    },
  },
};
</script>

<template>
  <div class="container">
    <Block :title="page.title" :text="page.intro" :image="page.main" />

    <div v-if="screenshot" class="push relative shadow-2xl">
      <img :src="screenshot" alt="Full article screenshot" />

      <div
        v-if="!full"
        class="overlay absolute bottom-0 left-0 right-0 flex justify-center pb-8 pt-32 text-white cursor-pointer"
        @click="full = true"
      >
        <span>&darr;</span>
        <span class="mx-4">Expand</span>
      </div>
    </div>

    <div class="flex justify-center">
      <a
        class="btn push"
        :href="page.external"
        target="_blank"
        rel="noopener"
      >View on {{ client.title }} &rarr;</a>
    </div>
  </div>
</template>

<style scoped>
.overlay {
  background: linear-gradient(
    to TOP,
    rgba(32, 32, 32, 0.9) 0%,
    rgba(32, 32, 32, 0) 100%
  );
}
</style>
