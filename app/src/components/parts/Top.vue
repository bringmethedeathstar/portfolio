<script>
import api from '@/resources/base';

export default {
  data() {
    return {
      layout: {},
    };
  },

  methods: {
    fetch() {
      api.get('layout').then(res => {
        this.layout = res.data.data;
      });
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <div class="container">
    <div class="text-right">
      <router-link v-for="item in layout" :key="item.slug" :to="item.slug === 'intro' ? '/' : item.slug" class="nav-item">
        {{ item.title }}
      </router-link>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.head {
  // padding: 30px 0;
}

.nav-item {
  display: inline-block;
  padding: 5px;
}
</style>
