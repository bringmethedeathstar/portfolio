<script>
import { mapState } from 'vuex';

export default {
  props: {
    title: String,
    text: String,
    image: Object,
    grayscale: Boolean,
    flip: Boolean,
    link: Object,
  },

  computed: mapState(['ready']),
};
</script>

<template>
  <div
    class="block flex flex-wrap items-center -mx-8 push"
    :class="{ 'md:flex-row-reverse': flip }"
  >
    <div class="w-full md:w-1/2 lg:w-7/12 px-8">
      <transition name="down" appear>
        <div v-show="ready" :style="{ transitionDelay: '.7s' }">
          <picture
            v-if="image"
            class="w-full"
            :class="{ grayscale }"
            :alt="title"
          >
            <source media="(max-width: 799px)" :srcset="image.work" />
            <source media="(min-width: 800px)" :srcset="image.featured" />
            <img :src="image.featured" />
          </picture>
        </div>
      </transition>
    </div>

    <div class="w-full md:w-1/2 lg:w-5/12 px-8 pt-6">
      <transition name="right" appear>
        <div v-show="ready" :style="{ transitionDelay: '.35s' }">
          <h1 class="mb-8">{{ title }}</h1>
          <div v-html="text"></div>

          <n-link
            v-if="link"
            class="inline-block mt-12 text-primary"
            :to="link.to"
          >
            {{ link.title }} &rarr;
          </n-link>
        </div>
      </transition>
    </div>
  </div>
</template>

<style scoped>
.grayscale * {
  filter: grayscale();
}

.block {
  min-height: 400px;
}
</style>
