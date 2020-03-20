<template>
  <section class="base">
    <header id="header">
      <h1><a href="/">Rakuestion</a> </h1>
      <b-button to="/create-question" class="margin_l_auto" variant="secondary" text-variant="light">質問する</b-button>
    </header>
    <nuxt/>
  </section>
</template>

<style lang="scss" scoped>


  .base {
    padding: 0 $size-xl;

    #header{
      padding: $size-l 0;
      display: flex;
      align-items: center;
    }

    h1{
      font-size: 24px;
    }
  }


</style>
