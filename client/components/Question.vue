<template>
  <article class="question_box">
    <div class="question l_flex">
      <avatar/>
      <div class="question_balloon_wrap">
        <div class="question_balloon">
          <h2 class="question_desc">あいうでおあいうえおあいうえおあいうでおあいうえおあいうえおあいうでおあいうえおあいうえお</h2>
          <ul class="question_state">
            <li>2019/10/22 10:11</li>
            <li class="l_flex">
            <span class="margin_r_xs">
              <b-icon icon="chat-fill" class="h5 icon"></b-icon>
            </span>
              <span>10</span>
            </li>
            <li class="answer_btn margin_l_auto">
              <b-button variant="outline-light" size="sm"><b-icon icon="chat-fill" class="h5 icon margin_r_xs" />回答する</b-button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <answer/>
    <div class="more_btn_box">
      <b-button class="more_btn" variant="link">もっと見る</b-button>
    </div>
  </article>

</template>

<script>
  import Answer from "./Answer";
  import Avatar from "./Avatar";

  export default {
    name: "Question",
    components: {Avatar, Answer}
  }
</script>

<style scoped lang="scss">
  .question_box {
    padding: $size-m;

    .question {
      margin-bottom: $size-xl;

      .question_avatar {
        width: $avatar-size;
        margin-right: $size-xl;
      }

      .question_balloon_wrap {
        width: 100%;
        padding-right: $avatar-size + $size-xl;
        box-sizing: border-box;
      }

      .question_balloon {
        box-sizing: border-box;
        padding: $size-m;
        background: $primary;
        border-radius: 6px;
        position: relative;
        margin-left: $size-xl;

        &::before {
          content: "";
          display: inline-block;
          position: absolute;
          transform: translateY(-50%);
          top: 50%;
          left: -24px;
          border: 8px solid transparent;
          border-right: 24px solid $primary;
          -webkit-transform: rotate(35deg);
          transform: rotate(35deg);
        }
      }

      .question_desc {
        font-size: 16px;
        line-height: 1.8;
        font-weight: bold;
        margin-bottom: $size-m;
        color: #FFF;
      }

      .question_state {
        font-size: 12px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 0;

        li {
          margin-right: $size-m;
          color: #FFF;

          .icon{
            margin-bottom: 0;
            color: #FFF;
            height: 16px;
          }
        }

        .answer_btn{
          margin-right: 0;
        }
      }
    }

    .more_btn_box {
      text-align: center;
      margin-top: $size-l;
    }
  }
</style>