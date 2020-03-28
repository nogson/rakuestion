<template>
  <div>
    <slot/>
  </div>
</template>

<script>
  export default {
    name: "ScrollBox",
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
    },
    methods: {
      handleScroll() {
        const sh = document.body.scrollHeight
        const ch = document.body.clientHeight
        const sy = window.scrollY

        if (ch + sy >= sh - 100) {
          this.$emit('scrollend')
        }
      }
    }
  }
</script>

<style scoped>

</style>