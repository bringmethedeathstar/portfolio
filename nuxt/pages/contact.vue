<script>
import Block from '~/components/Block';

export default {
  transition: 'page',

  components: { Block },

  async asyncData({ $axios, error }) {
    try {
      const page = await $axios.$get('rest/contact');

      return { page };
    } catch (e) {
      console.error(e);
      error(e.message);
    }
  },

  data: () => ({
    state: '',
    page: {},
    form: { name: '', email: '', message: '' },
  }),

  methods: {
    submit() {
      this.state = 'sending';

      this.$axios
        .$post('actions/postal', this.form)
        .then(res => {
          this.state = 'success';
        })
        .catch(e => {
          this.state = 'failure';
          console.error(e);
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

    <transition name="down" mode="out-in" appear>
      <div
        v-if="state === 'success'"
        class="py-12 text-center text-2xl text-green-500"
      >
        Thanks, I'll be in touch soon.
      </div>

      <div
        v-else-if="state === 'failure'"
        class="py-12 text-center text-2xl text-red-500"
      >
        Oh no, something went wrong! Please refresh and try again.
      </div>

      <form
        v-else
        @submit.prevent="submit"
        class="push mx-auto"
        :class="{ 'opacity-50 pointer-events-none': state === 'sending' }"
      >
        <label class="block font-bold text-primary">
          Name
          <input
            class="block border-b-2 text-black border-gray-400 px-1 py-2 mb-12 w-full leading-snug"
            type="text"
            name="name"
            v-model="form.name"
            required
            :disabled="state !== ''"
          />
        </label>

        <label class="block font-bold text-primary">
          Email
          <input
            class="block border-b-2 text-black border-gray-400 px-1 py-2 mb-12 w-full leading-snug"
            type="email"
            name="email"
            v-model="form.email"
            required
            :disabled="state !== ''"
          />
        </label>

        <label class="block font-bold text-primary">
          Message
          <textarea
            class="block border-b-2 text-black border-gray-400 px-1 py-2 mb-12 w-full leading-snug"
            name="message"
            v-model="form.message"
            required
            :disabled="state !== ''"
          ></textarea>
        </label>

        <div class="text-right">
          <button class="btn" type="submit" :disabled="state !== ''">
            Send
          </button>
        </div>
      </form>
    </transition>
  </div>
</template>

<style scoped>
form {
  max-width: 600px;
}
</style>
