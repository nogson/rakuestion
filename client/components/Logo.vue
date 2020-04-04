<template>
  <h1 class="logo"><img to="/" src="~/assets/images/logo.png" /></h1>
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
