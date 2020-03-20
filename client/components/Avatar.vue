<template>
  <img class="avatar" :class="{left:direction === 'left'}" src="~/assets/images/avatar_01.png"/>
</template>

<script>
  export default {
    name: "Avatar",
    props: {
      direction: {
        type: String,
        default: 'right'
      }
    }
  }
</script>

<style scoped lang="scss">
  .avatar {
    width: $avatar-size;
  }

  .left {
    transform: scale(-1, 1);
  }
</style>