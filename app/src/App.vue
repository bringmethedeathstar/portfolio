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

$purple: #982898;

#app {
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.25;
  color: #222;
}

h1 {
  @extend .under;

  // font-weight: 400;
  font-size: 46px;
}

section {
  padding: 60px;
}

.under {
  display: inline-block;
  position: relative;
  padding-bottom: 5px;
  margin-bottom: 20px;

  &:after, &:before {
    content: '';
    position: absolute;
    background: $purple;
    left: 2px;
    transition: width .3s ease-in-out;
  }

  &:after {
    width: 60px;
    height: 3px;
    bottom: 0;
  }
  &:before {
    width: 100%;
    height: 100%;
  }

  &:hover:after {
    width: calc(100% - 5px);
  }

  &.alive:before {
    width: 0;
  }
}
</style>
