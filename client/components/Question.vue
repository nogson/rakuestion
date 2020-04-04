<template>
  <div class="question l_flex">
    <avatar :type="data.avatar"/>
    <div class="question_balloon_wrap">
      <div class="question_balloon">
        <div class="question_desc" v-html="data.question">
        </div>
        <div class="margin_b_s">
          <span class="tag" @click="showSameTagQuestion(tag)" v-for="(tag,index) in data.tags" :key="index">{{tag}}</span>
        </div>
        <ul class="question_state">
          <li>{{date}}</li>
          <li v-if="answerCount" class="l_flex">
            <span class="margin_r_xs">
              <b-icon icon="chat-fill" class="h5 icon"></b-icon>
            </span>
            <span>{{answerCount}}</span>
          </li>
          <li v-if="useLinkBtn" class="answer_btn margin_l_auto">
            <b-button :to="`/detail/?id=${data.id}`" variant="outline-light" size="sm">
              <span class="margin_l_m">見る</span>
              <b-icon icon="chevron-right" class="h5 icon margin_l_xs margin_b_zero"/>
            </b-button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
  import Avatar from "./Avatar"

  export default {
    name: "Question",
    components: {
      Avatar
    },
    props: {
      data: {
        type: Object
      },
      useLinkBtn: {
        type: Boolean,
        default: false
      },
      answerCount:{
        type:Number
      }
    },
    computed:{
      date(){
        return this.$moment(this.data.updated_at).format('YYYY/MM/DD HH:mm:ss')
      }
    },
    methods:{
      showSameTagQuestion(tag) {
        this.$router.push({path:'/search',query:{tag:tag}})
      }
    }
  }
</script>

<style scoped lang="scss">
  .question {
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
      margin-bottom: 0;
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

        .icon {
          margin-bottom: 0;
          color: #FFF;
          height: 16px;
        }
      }

      .answer_btn {
        margin-right: 0;
      }
    }

    .tag {
      font-size: 12px;
      color: #FFF;
      margin-right: $size-xs;
      cursor: pointer;

      &:before {
        content: '#';
        display: inline;
      }
    }
  }
</style>