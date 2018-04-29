<script>
import Head from '@/components/parts/Head';

export default {
  ccomponents: {
    Head,
  },

  name: 'App',
};
</script>

<template>
  <div id="app">
    <Head />

    <router-view/>
  </div>
</template>

<style lang="scss">
@import '../node_modules/bootstrap/scss/bootstrap.scss';

#app {
  font-family: 'Open Sans', sans-serif;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.25;
}

section {
  padding: 60px;
}

.under {
  position: relative;
  margin-bottom: 15px;

  &:after {
    content: '';
    position: absolute;
    width: 60px;
    height: 2px;
    background-color: purple;
    bottom: 0;
    left: 2px;
  }
}
</style>
