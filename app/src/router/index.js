import Vue from 'vue';
import Router from 'vue-router';

import Home from '@/components/single/Home';
import Lost from '@/components/single/Lost';
import WorkItem from '@/components/work/Item';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      component: Home,
    },
    {
      path: '/work/:slug',
      component: WorkItem,
    },
    {
      path: '*',
      component: Lost,
    },
  ],
});
