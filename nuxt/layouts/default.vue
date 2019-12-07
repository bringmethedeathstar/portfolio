<template>
  <div class="relative overflow-hidden">
    <div class="container">
      <header class="py-4 mb-12 text-center border-b">
        <nav>
          <n-link to="/">Home</n-link>
          <n-link to="/work">Portfolio</n-link>
          <n-link to="/contact">Contact</n-link>
        </nav>
      </header>
    </div>

    <nuxt />
  </div>
</template>

<style lang="postcss">
html {
  @apply font-roboto tracking-wide;
  scroll-behavior: smooth;
  line-height: 1.6;
  font-size: 18px;
}

h1 {
  @apply font-bold text-red-500;
}

a:hover {
  @apply text-red-500;
}

pre {
  @apply p-4 mb-4 text-xs text-white bg-gray-800 overflow-scroll;
}

.container-thin {
  @apply mx-auto;
  max-width: 1000px;
}
</style>
