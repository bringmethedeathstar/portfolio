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
  font-family: 'PT Serif', serif;
  // font-family: 'Roboto', sans-serif;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.5;
  color: #222;
}

a {
  color: inherit;

  &:hover {
    color: inherit;
    text-decoration: none;
  }
}

p {
  margin-bottom: 25px;
}

h1 {
  // font-weight: 400;
  font-size: 46px;
  margin-bottom: 35px;
}

section {
  padding: 60px;
}

img {
  width: 100%;
}

.under {
  display: inline-block;
  position: relative;
  padding-bottom: 10px;
  margin-bottom: 45px;

  &:after {
    content: '';
    position: absolute;
    background: $purple;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    transition: width 0.3s ease-in-out;
    width: 60px;
    height: 2px;
    bottom: 0;
    transform: skewX(-25deg);
  }
}
</style>
