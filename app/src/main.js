import Vue from 'vue';
import Meta from 'vue-meta';
import VueAnalytics from 'vue-analytics';

import App from './App';
import router from './router';

Vue.config.productionTip = false;

Vue.use(Meta);
Vue.use(require('vue-moment'));

Vue.use(VueAnalytics, {
  id: 'UA-120605101-1',
  router,
  debug: {
    sendHitTask: process.env.NODE_ENV === 'production',
  },
});

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>',
});
