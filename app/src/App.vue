<script>
// import Top from '@/components/parts/Top';

export default {
  // components: { Top },

  name: 'App',

  metaInfo: {
    title: 'Leah Walker',
  },
};
</script>

<template>
  <div id="app">
    <!-- <Top /> -->

    <router-view/>
  </div>
</template>

<style lang="scss">
@import '../node_modules/bootstrap/scss/bootstrap.scss';

$purple: #7d6dff;

#app {
  font-family: 'PT Serif', serif;
  // font-family: 'Roboto', sans-serif;
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
    color: $purple;
  }
}

p {
  margin-bottom: 25px;
}

b,
strong {
  font-weight: bold;
}

h1 {
  // font-weight: 400;
  font-size: 28px;
  margin-bottom: 35px;

  @media only screen and (min-width: 480px) {
    font-size: 46px;
  }
}

section {
  padding: 15px;

  @media only screen and (min-width: 480px) {
    padding: 60px;
  }
}

img {
  width: 100%;
}

.under {
  display: inline-block;
  position: relative;
  padding-bottom: 30px;
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
