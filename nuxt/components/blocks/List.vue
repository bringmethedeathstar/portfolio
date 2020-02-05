<script>
import ColumnsBlock from '~/components/blocks/Columns';
import TextBlock from '~/components/blocks/Text';

export default {
  props: ['blocks'],
  components: { ColumnsBlock, TextBlock },
};
</script>

<template>
  <div class="blocks">
    <component
      v-for="block in blocks"
      :is="`${block.type}Block`"
      :key="block.id"
      :block="block"
    ></component>
  </div>
</template>

<style lang="postcss" scoped>
.blocks > * {
  @apply mb-0;
}
.blocks > * + * {
  @apply mt-16;
}
</style>
