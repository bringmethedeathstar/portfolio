<script>
/* eslint-disable no-unused-vars */

import logo from '@/assets/logo.svg';

// import api from '@/resources/base';

export default {
  // data() {
  //   return {
  //     layout: {},
  //   };
  // },
  // methods: {
  //   fetch() {
  //     api.get('layout').then(res => {
  //       this.layout = res.data.data;
  //     });
  //   },
  // },
  // created() {
  //   this.fetch();
  // },
};
</script>

<template>
  <header class="container">
    <router-link to="/"><svg class="logo"><use xlink:href="#logo" /></svg></router-link>

    <!-- <div class="text-right">
      <router-link v-for="item in layout" :key="item.slug" :to="`/${item.slug === 'intro' ? '' : item.slug}`" class="nav-item">
        {{ item.title }}
      </router-link>
    </div> -->
  </header>
</template>

<style lang="scss" scoped>
header {
  padding: 15px 0;
}

.logo {
  width: 50px;
  height: 42px;
}

.nav-item {
  display: inline-block;
  padding: 5px;
}
</style>
