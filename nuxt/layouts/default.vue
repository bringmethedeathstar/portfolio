<script>
import { mapState, mapMutations } from 'vuex';
import Dash from '~/components/Dash';

export default {
  components: { Dash },

  computed: mapState(['ready']),

  methods: mapMutations(['setReady']),

  mounted() {
    setTimeout(() => {
      this.setReady(true);
    }, 500);
  },
};
</script>

<template>
  <div class="relative overflow-hidden">
    <div class="container">
      <header class="pt-8 pb-4 mb-16 border-b">
        <div class="brand mx-auto mb-8">
          <n-link to="/">
            <transition name="down" appear>
              <img v-show="ready" src="/logo.svg" role="presentation" />
            </transition>
          </n-link>
        </div>

        <nav class="flex flex-wrap items-center justify-center">
          <n-link class="nav-item" to="/">Home</n-link>
          <n-link class="nav-item" to="/about">About</n-link>
          <n-link class="nav-item" to="/services">Services</n-link>
          <n-link class="nav-item" to="/work">Portfolio</n-link>
          <n-link class="nav-item flex flex-col items-center" to="/contact">
            <Dash />Hire Me
            <Dash rotate="true" />
          </n-link>
        </nav>
      </header>
    </div>

    <nuxt />

    <footer class="mt-32 bg-primary py-8 text-center">
      <n-link class="text-white flex flex-col items-center" to="/contact">
        <Dash />Hire Me
        <Dash rotate="true" />
      </n-link>
    </footer>
  </div>
</template>

<style lang="postcss">
html {
  @apply font-roboto tracking-wide;
  /* scroll-behavior: smooth; */
  line-height: 1.6;
  font-size: 18px;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  @apply font-bold leading-tight text-primary mb-6;
}
h1,
h2 {
  @apply text-4xl mb-8;
}
h3 {
  @apply text-3xl;
}
h4 {
  @apply text-2xl;
}
h5 {
  @apply text-xl;
}
h6 {
  @apply text-lg;
}

.stack > * {
  @apply mb-0;
}
.stack > * + * {
  @apply mt-8;
}

.nav-item {
  @apply text-black mx-2 text-xs;

  @screen sm {
    @apply text-base mx-4;
  }
}
.nav-item:hover {
  @apply text-primary;
}

.nav-item.nuxt-link-exact-active {
  @apply text-primary !important;
}

a {
  @apply text-primary;
}

pre {
  @apply p-4 mb-4 text-xs text-white bg-gray-800 overflow-scroll;
}

.container {
  max-width: 1000px;
}

.push {
  margin-bottom: 8rem;
}

.intro {
  max-width: 600px;
}

.btn {
  @apply inline-block py-2 px-4 bg-primary text-white rounded-sm border-2 border-primary;

  &:hover {
    @apply bg-white text-primary;
  }
}

.brand {
  @apply w-full;
  max-width: 300px;
  height: 155px;
}
.brand img {
  width: inherit;
  height: inherit;
}
</style>
