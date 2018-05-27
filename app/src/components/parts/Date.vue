<script>
export default {
  props: ['date'],
};
</script>

<template>
  <span>{{ date | moment('Do MMMM YYYY') }}</span>
</template>

<style lang="scss" scoped>
</style>
