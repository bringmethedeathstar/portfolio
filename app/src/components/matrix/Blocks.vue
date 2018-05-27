<script>
import intro from '@/components/matrix/Intro';
import slide from '@/components/matrix/Slide';

export default {
  components: { intro, slide },
  props: ['blocks'],
};
</script>

<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        
        <div v-for="block in blocks" class="block" :class="block.type">
          <component :is="block.type" :block="block" />
        </div>
      
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.block {
  margin-bottom: 30px;
  padding: 0 45px;
  margin-bottom: 45px;
  position: relative;
  z-index: 1;

  &.intro {
    padding: 0;
  }
}

h2 {
  font-weight: normal;
  margin-bottom: 60px;
}
</style>
