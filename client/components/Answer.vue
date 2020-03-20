<template>
  <div class="answer_box">
    <div class="answer l_flex">
      <div class="answer_balloon">
        <h2 class="answer_desc">
          回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります
        </h2>
        <ul class="answer_state">
          <li>2019/10/22 10:11</li>
          <li class="l_flex">
            <span class="margin_r_xs">
              <b-icon icon="heart-fill" class="h5 icon"></b-icon>
            </span>
            <span>10</span>
          </li>
          <li class="margin_l_auto">
            <b-icon icon="heart" variant="secondary" class="h3"></b-icon>
          </li>
        </ul>
      </div>
      <avatar direction="left"/>
    </div>
  </div>
</template>

<script>
  import Avatar from "./Avatar";
  export default {
    name: "Answer",
    components: {Avatar}
  }
</script>

<style scoped lang="scss">
  .answer_box {
    margin-left: $avatar-size + $size-xl;
  }

  .answer {
    position: relative;

    .answer_desc {
      font-size: 16px;
      line-height: 1.8;
    }

    .answer_balloon {
      padding: $size-m;
      background: #FFF;
      border-radius: 6px;
      background: $color-gray1;
      position: relative;
      margin-right: $size-xl;

      &::before {
        content: "";
        display: inline-block;
        position: absolute;
        transform: translateY(-50%);
        border: 8px solid transparent;
        -webkit-transform: rotate(-35deg);
        transform: rotate(-35deg);
      }

      &::before {
        top: 50%;
        right: -24px;
        border-left: 24px solid $color-gray1;
      }
    }

    .answer_state {
      font-size: 12px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      margin-bottom: 0;

      li {
        margin-right: $size-m;

        .icon{
          margin-bottom: 0;
          color:$color-gray2;
          height: 16px;
        }
      }
    }
  }

  .more_btn_box {
    text-align: center;
    margin-top: $size-l;
  }
</style>