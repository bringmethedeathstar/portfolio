import dotenv from 'dotenv/config';
import axios from 'axios';

export default {
  mode: 'universal',

  head: {
    title: 'Creative Copywriter 🖋️ Leah Walker',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: '',
      },
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        href:
          'https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap',
        rel: 'stylesheet',
      },
    ],
  },

  loading: { color: '#e53e3e' },

  css: [],

  plugins: [],

  buildModules: ['@nuxtjs/tailwindcss'],

  modules: ['@nuxtjs/axios', '@nuxtjs/dotenv'],

  axios: {
    baseURL: process.env.API_URL,
  },

  generate: {
    routes() {
      return axios
        .get(`${process.env.API_URL}generate`)
        .then(({ data }) => data)
        .catch(e => console.error(e));
    },

    fallback: true,
  },

  build: {
    extend(config, ctx) {},
  },
};
