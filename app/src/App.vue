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

a {
  color: inherit;

  &:hover {
    color: inherit;
    text-decoration: none;
  }
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
  padding-bottom: 10px;
  margin-bottom: 45px;

  &:after, &:before {
    content: '';
    position: absolute;
    background: $purple;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    transition: width .3s ease-in-out;
  }

  &:after {
    width: 80px;
    height: 2px;
    bottom: 0;
  }
  &:before {
    // width: 100%;
    // height: 100%;
  }

  &:hover:after {
    width: calc(100% - 5px);
  }
}
</style>
