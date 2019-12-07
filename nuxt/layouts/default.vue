<script>
import Dash from '~/components/Dash';

export default {
  components: { Dash },
};
</script>

<template>
  <div class="relative overflow-hidden">
    <div class="container">
      <header class="py-4 mb-16 border-b">
        <nav class="flex items-center justify-center">
          <n-link class="mx-4" to="/">Home</n-link>
          <n-link class="mx-4" to="/work">Portfolio</n-link>
          <!-- <n-link class="mx-4 flex flex-col items-center" to="/about">
            <Dash />Hire Me
            <Dash rotate="true" />
          </n-link>-->
        </nav>
      </header>
    </div>

    <nuxt />

    <!-- <footer class="bg-primary py-8 text-center">
      <n-link class="text-white flex flex-col items-center" to="/about">
        <Dash />Hire Me
        <Dash rotate="true" />
      </n-link>
    </footer>-->
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
h2 {
  @apply text-4xl font-bold leading-tight text-primary mb-8;
}

.nuxt-link-exact-active,
a:hover {
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
  @apply inline-block py-2 px-4 bg-primary text-white rounded-full border-2 border-primary;

  &:hover {
    @apply bg-white text-primary;
  }
}
</style>
