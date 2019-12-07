import dotenv from 'dotenv/config';

export default {
  mode: 'universal',

  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.npm_package_description || '',
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

  loading: { color: '#fff' },

  css: [],

  plugins: [],

  buildModules: ['@nuxtjs/tailwindcss'],

  modules: ['@nuxtjs/axios', '@nuxtjs/dotenv'],

  axios: {
    baseURL: process.env.API_URL,
  },

  build: {
    extend(config, ctx) {},
  },
};
