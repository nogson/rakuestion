<template>
    <div class="detail">
      <div class="question">
        <question :data="question"/>
      </div>
      <div class="answer">
        <answer v-for="answer in answers" :index="answer.id" :data.sync="answer"/>
      </div>
      <div class="answer_create_box" :class="{closed:closed === true}">
          <button class="toggle_btn" @click="toggleAnswerBox">
            <b-icon :icon="toggleIcon" class="h5 icon margin_r_xs margin_b_zero"/>
          </button>
          <h2 class="ttl_2 l_flex">
            <b-icon icon="chat-fill" variant="primary" class="h5 icon margin_b_zero margin_r_xs" />
            回答を入力してね
          </h2>
        <b-form @submit.prevent="onSubmit">
        <b-form-group
                  id="input-group-1"
                  label-for="input-1"
          >
            <b-form-textarea
                    v-model="form.answer"
                    placeholder="回答を入力"
                    rows="3"
                    max-rows="6"
            ></b-form-textarea>
          </b-form-group>
          <div class="l_flex margin_t_l">
            <b-button to="/" variant="outline-primary">
              <b-icon icon="chevron-left" class="h5 icon margin_r_xs margin_b_zero"/>
              戻る
            </b-button>
            <b-button type="submit" class="margin_l_auto" variant="primary">登録
            </b-button>
          </div>
        </b-form>
      </div>
    </div>
</template>

<script>
  import Answer from "../components/Answer";
  import Question from "../components/Question";

  export default {
    layout: 'base-no-question-btn',
    components: {Question, Answer},
    data() {
      return {
        form: {
          avatar: Math.floor(Math.random() * 33 + 1)
        },
        answers: [],
        question: {},
        closed: false
      }
    },
    // async asyncData({app,error,query}) {
    //   try {
    //     console.log(query.id)
    //     return
    //     // const answers = await app.$axios.$get(`/api/question/${query.id}/answers`)
    //     // const question = await app.$axios.$get(`/api/question/${query.id}`)
    //     // return {
    //     //   answers: answers.data.answers,
    //     //   question: question.data.question
    //     // }
    //   }catch(err){
    //     console.log('err',err)
    //     // error({
    //     //   statusCode: err.response.status,
    //     //   message: err.response.data.message,
    //     // });
    //   }
    // },
    async created() {
      if (this.$route.query.id) {
        const answers = await this.$axios.$get(`/api/question/${this.$route.query.id}/answers`)
        const question = await this.$axios.$get(`/api/question/${this.$route.query.id}`)

        this.answers = answers.data.answers
        this.question = question.data.question
      }

    },
    methods: {
      onSubmit() {
        this.$axios.$post(`/api/answer/${this.$route.query.id}/create`, this.form).then((res) => {
          this.form.answer = ''
          this.answers = res.data.answers
        })
      },
      toggleAnswerBox() {
        this.closed = !this.closed
      }
    },
    computed: {
      toggleIcon() {
        return this.closed ? 'chevron-up' : 'chevron-down'
      }
    }
  }
</script>

<style scoped lang="scss">

  .detail {
    margin-bottom: 300px;
  }

  .question {
    margin-bottom: $size-xl;
  }

  .answer {
    margin-bottom: $size-l;
  }

  .answer_create_box {
    width: 100%;
    position: fixed;
    bottom: 0px;
    left: 0;
    background: rgba(#FFF, 0.7);
    border-top: 1px solid $color-border;
    padding: $size-l $size-xl;
    transition: all 300ms 0s ease;

    .toggle_btn {
      position: absolute;
      left: $size-xl;
      top: -30px;
      width: 50px;
      text-align: center;
      border: 1px solid $color-border;
      border-width: 1px 1px 0 1px;
      border-radius: 4px 4px 0 0;
    }

    &.closed {
      bottom: -180px;
    }
  }

</style>