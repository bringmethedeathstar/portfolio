import Vue from 'vue';
import Router from 'vue-router';

import Home from '@/components/single/Home';
import Lost from '@/components/single/Lost';

import Work from '@/components/work/Index';
import WorkItem from '@/components/work/Item';

// import Blog from '@/components/blog/Index';
// import BlogItem from '@/components/blog/Item';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      component: Home,
    },

    {
      path: '/work',
      component: Work,
    },
    {
      path: '/work/:slug',
      component: WorkItem,
    },

    // {
    //   path: '/blog',
    //   component: Blog,
    // },
    // {
    //   path: '/blog/:slug',
    //   component: BlogItem,
    // },

    {
      path: '/admin',
      beforeEnter() {
        window.location = process.env.API;
      },
    },

    {
      path: '*',
      component: Lost,
    },
  ],
});
