<template>
  <img v-if="type" class="avatar" :class="{left:direction === 'left'}" :style="style" :src="img"/>
</template>

<script>
  export default {
    name: "Avatar",
    props: {
      direction: {
        type: String,
        default: 'right'
      },
      type: {
        type: Number,
        default: null
      },
      width: {
        type: String,
        default: '50px'
      }
    },
    computed: {
      img() {
        return require('~/assets/images/avatar_' + this.type + '.png')

      },
      style() {
        return {width: this.width}
      }
    }
  }
</script>

<style scoped lang="scss">

  .left {
    transform: scale(-1, 1);
  }
</style>