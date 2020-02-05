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

  data: () => ({
    page: {},
    form: {
      name: 'name',
      email: 'email@address',
      message: 'message',
    },
  }),

  methods: {
    submit() {
      this.$axios
        .$post('contact-form', this.form)
        .then(res => {
          console.log(res.data);
        })
        .catch(e => {
          console.log(e);
        });
    },
  },
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

    <!-- <form @submit.prevent="submit" class="push mx-auto">
      <label class="block font-bold text-primary">
        Name
        <input
          class="block border-b-2 text-black border-gray-400 px-3 py-2 mb-12 w-full leading-snug"
          type="text"
          name="name"
          v-model="form.name"
          required
        />
      </label>

      <label class="block font-bold text-primary">
        Email
        <input
          class="block border-b-2 text-black border-gray-400 px-3 py-2 mb-12 w-full leading-snug"
          type="email"
          name="email"
          v-model="form.email"
          required
        />
      </label>

      <label class="block font-bold text-primary">
        Message
        <textarea
          class="block border-b-2 text-black border-gray-400 px-3 py-2 mb-12 w-full leading-snug"
          name="message"
          v-model="form.message"
          required
        ></textarea>
      </label>

      <div class="text-right">
        <button class="btn" type="submit">Send</button>
      </div>
    </form> -->
  </div>
</template>

<style scoped>
form {
  max-width: 600px;
}
</style>
