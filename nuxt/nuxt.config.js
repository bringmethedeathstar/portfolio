import dotenv from 'dotenv/config';
import axios from 'axios';

export default {
  mode: 'universal',

  head: {
    title: 'Creative Copywriter 🖋️ Leah Walker',

    meta: [
      { lang: 'en' },
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content:
          'Creative copywriter with experience in crafting content that resonates with the target audience and drives high volumes of traffic.',
      },
      { name: 'msapplication-TileColor', content: '#800020' },
      { name: 'theme-color', content: '#800020' },
    ],

    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        href:
          'https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap',
        rel: 'stylesheet',
      },
      {
        rel: 'apple-touch-icon',
        sizes: '180x180',
        href: '/apple-touch-icon.png',
      },
      {
        rel: 'icon',
        sizes: '32x32',
        type: 'image/png',
        href: '/favicon-32x32.png',
      },
      {
        rel: 'icon',
        sizes: '16x16',
        type: 'image/png',
        href: '/favicon-16x16.png',
      },
      { rel: 'manifest', href: '/site.webmanifest' },
      { rel: 'mask-icon', href: '/safari-pinned-tab.svg', color: '#800020' },
    ],
  },

  loading: { color: '#e53e3e' },

  css: [],

  plugins: [],

  buildModules: ['@nuxtjs/tailwindcss'],

  modules: ['@nuxtjs/axios', '@nuxtjs/dotenv', '~/modules/static/'],

  axios: { baseURL: process.env.API_URL },

  generate: {
    routes() {
      return axios
        .get(`${process.env.API_URL}rest/generate`)
        .then(({ data }) => data)
        .catch(e => console.error(e));
    },

    fallback: true,
  },

  purgeCSS: {
    mode: 'postcss',
    extractors: [
      {
        extractor: class {
          static extract(content) {
            return content.match(/[A-Za-z0-9-_/:]*[A-Za-z0-9-_/]+/g) || [];
          }
        },
      },
    ],
    whitelistPatterns: [
      /-(leave|enter|appear)(|-(to|from|active))$/,
      /^(?!(|.*?:)cursor-move).+-move$/,
      /^nuxt-link(|-exact)-active$/,
    ],
  },

  build: {
    extend(config, ctx) {},
  },
};
