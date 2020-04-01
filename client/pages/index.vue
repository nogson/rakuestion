<template>
  <scroll-box @scrollend="getQuestions">
    <div>
      <article v-for="question in questions" :index="question.id">
        <question :useLinkBtn="true" :data="question" :answer-count="question.answers.length"/>
        <div class="avatars">
        <span class="avatar" v-for="answer in question.answers" :index="answer.id">
          <avatar :type="answer.avatar" direction="left" width="30px"/>
        </span>
        </div>
      </article>
    </div>
    <spinner v-if="loading"/>
  </scroll-box>
</template>

<script>
  import Question from '~/components/Question.vue'
  import Avatar from "~/components/Avatar"
  import ScrollBox from "~/components/ScrollBox"
  import Spinner from "../components/Spinner";

  export default {
    layout: 'base',
    components: {
      Spinner,
      ScrollBox,
      Avatar,
      Question
    },
    data() {
      return {
        questions: [],
        currentPage: 0,
        loading: false,
        maxCount: null,
        limit:5
      }
    },
    async asyncData({$axios}) {
      const res = await $axios.$get('/api/questions', {params: {offset: 0, limit: 5}})
      return {questions: res.data.questions, maxCount: res.data.max_count}
    },
    methods: {
      async getQuestions() {
        if (this.loading || this.maxCount <= this.currentPage*this.limit ) {
          return
        }

        this.loading = true
        this.currentPage++
        const res = await this.$axios.$get('api/questions',{params: {offset: this.currentPage * this.limit, limit: this.limit}})
        this.questions = this.questions.concat(res.data.questions)
        this.loading = false
      }
    }
  }
</script>

<style lang="scss" scoped>
  .avatars {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-top: $size-s;
    margin-bottom: $size-xl;
    margin-left: $avatar-size + $size-xl;

    > * {
      margin-right: $size-s;
      padding: $size-s;
    }
  }
</style>
