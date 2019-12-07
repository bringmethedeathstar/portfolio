<script>
export default {
  async asyncData({ $axios, error }) {
    try {
      const { data: work } = await $axios.$get('work');

      return { work };
    } catch (e) {
      error(e);
    }
  },

  data: () => ({ work: [] }),
};
</script>

<template>
  <div class="container">
    <div class="flex flex-wrap -mx-6">
      <n-link
        :to="`/work/${item.slug}`"
        v-for="item in work"
        :key="item.id"
        class="px-6 mb-16 w-1/3"
      >
        <img class="mb-4" :src="item.main.work" alt />
        <p class="mb-4 font-bold text-primary">{{ item.title }}</p>
        <span>{{ item.intro }}</span>
        <!-- <pre>{{item}}</pre> -->
      </n-link>
    </div>
  </div>
</template>

<style scoped>
</style>
