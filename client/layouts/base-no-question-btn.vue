<template>
  <section class="base">
    <header id="header">
      <logo />
    </header>
    <nuxt/>
  </section>
</template>

<script>
  import Logo from "../components/Logo";
  export default {
    components: {Logo}
  }
</script>

<style lang="scss" scoped>
  .base {
    padding: 0 $size-xl;

    #header{
      padding: $size-l 0 $size-xl;
      display: flex;
      align-items: center;
    }
  }
</style>