<template>
  <div class="answer_box">
    <div class="answer l_flex">
      <div class="answer_balloon">
        <p class="answer_desc" v-html="syncData.answer">
        </p>
        <ul class="answer_state">
          <li>{{date}}</li>
          <li v-if="syncData.like_count" class="l_flex">
            <span class="margin_r_xs">
              <b-icon icon="heart-fill" class="h5 icon"></b-icon>
            </span>
            <span>{{syncData.like_count}}</span>
          </li>
          <li class="margin_l_auto">
            <b-icon @click="like" :icon="icon" variant="secondary" class="h3 btn_elm margin_b_zero"></b-icon>
          </li>
        </ul>
      </div>
      <avatar direction="left" :type="syncData.avatar"/>
    </div>
  </div>
</template>

<script>
  import Avatar from "./Avatar";

  export default {
    name: "Answer",
    components: {Avatar},
    data() {
      return {
        liked: false
      }
    },
    props: {
      data: {
        type: Object,
      }
    },
    computed: {
      date() {
        return this.$moment(this.data.updated_at).format('YYYY/MM/DD HH:mm:ss')
      },
      icon() {
        return this.liked ? 'heart-fill' : 'heart'
      },
      syncData: {
        get() {
          return this.data
        },
        set(value) {
          console.log(value)
          this.$emit('update:data', value)
        }
      }
    },
    methods: {
      like() {
        if(this.liked){
          return
        }
        this.$axios.$post(`api/answer/${this.data.id}/like`).then(res => {
          this.liked = true
          this.$set(this.syncData,'like_count',res.data.answer.like_count)
        })
      }
    }
  }
</script>

<style scoped lang="scss">
  .answer_box {
    margin-left: $avatar-size + $size-xl;
  }

  .answer {
    position: relative;

    .answer_desc {
      font-size: 14px;
      line-height: 1.8;
    }

    .answer_balloon {
      width: 100%;
      padding: $size-m;
      box-sizing: border-box;
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

        .icon {
          margin-bottom: 0;
          color: $color-gray2;
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