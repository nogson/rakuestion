<template>
  <div class="spinner">
    <b-spinner variant="primary" label="Spinning"></b-spinner>
  </div>
</template>

<script>
  export default {
    name: "Spinner"
  }
</script>

<style scoped lang="scss">
.spinner{
  text-align: center;
  margin-bottom: $size-l;
}
</style>