<script>
import Block from '~/components/Block';

export default {
  transition: 'page',

  components: { Block },

  async asyncData({ $axios, error }) {
    try {
      const page = await $axios.$get('contact');

      return { page };
    } catch (e) {
      console.error(e);
      error(e.message);
    }
  },

  data: () => ({ page: {} }),
};
</script>

<template>
  <div class="container">
    <Block
      :flip="true"
      title="Get in Touch"
      :text="page.simple"
      :image="page.main"
      grayscale
    />
    <!-- :link="{ to: '/about', title: 'Hire Me' }" -->

    <!-- <form class="push mx-auto" name="contact" method="POST">
      <label class="block font-bold text-primary leading-loose">
        Name
        <input
          class="block border-2 text-black border-gray-300 px-3 py-2 mb-6 w-full leading-snug"
          type="text"
          name="name"
          required
        />
      </label>

      <label class="block font-bold text-primary leading-loose">
        Email
        <input
          class="block border-2 text-black border-gray-300 px-3 py-2 mb-6 w-full leading-snug"
          type="email"
          name="email"
          required
        />
      </label>

      <label class="block font-bold text-primary leading-loose">
        Message
        <textarea
          class="block border-2 text-black border-gray-300 px-3 py-2 mb-8 w-full leading-snug"
          name="message"
          required
        ></textarea>
      </label>

      <button class="btn" type="submit">Send</button>
    </form> -->
  </div>
</template>

<style scoped>
form {
  max-width: 600px;
}
</style>
