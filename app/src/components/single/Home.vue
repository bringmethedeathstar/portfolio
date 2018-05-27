<script>
import api from '@/resources/base';
import Intro from '@/components/parts/Intro';

export default {
  components: { Intro },

  data() {
    return {
      grid: {},
    };
  },

  methods: {
    fetch() {
      api.get('grid').then(res => {
        this.grid = res.data.data[0];
      });
    },
  },

  created() {
    this.fetch();
  },
};
</script>

<template>
  <div>
    <Intro />

    <div class="container-fluid text-center">
      <div class="row justify-content-center align-items-center">
        <div class="col-6 grid-item">
          {{ grid.work }}
          My Work
        </div>

        <div class="col-6 grid-item">
          {{ grid.work }}
        </div>
      </div>

      <div class="row">
        <div class="col-6 grid-item">
          {{ grid.profile }}
        </div>

        <div class="col-6 grid-item">
          {{ grid.blog }}
          Blog
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.grid-item {
  font-size: 32px;
  height: 250px;
  border: 1px solid black;
}
</style>
