<template>
  <h1 class="logo"><a href="/"><img src="~/assets/images/logo.png" /></a></h1>
</template>
<script>
  export default{
    name:'Logo'
  }
</script>
<style scoped lang="scss">
  .logo{
    font-size: 24px;

    img{
      width: 170px;
    }

    @media screen and (max-width:480px) {
      display: none;
    }
  }


</style>
