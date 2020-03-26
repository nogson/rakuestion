<template>
  <div>
    <article v-for="question in questions" :index="question.id">
      <question :useLinkBtn="true" :data="question"/>
      <div class="avatars">
        <span class="avatar" v-for="answer in question.answers" :index="answer.id">
          <avatar :type="answer.avatar" direction="left" width="30px"/>
        </span>
      </div>
    </article>
    <button @click="getQuestions">aa</button>
  </div>
</template>

<script>
  import Question from '~/components/Question.vue'
  import Avatar from "../components/Avatar";

  export default {
    layout: 'base',
    components: {
      Avatar,
      Question
    },
    data() {
      return {
        questions: [],
        maxCount: null,
        currentPage:1
      }
    },
    async asyncData({$axios}) {
      const res = await $axios.$get('api/questions', {params: {page: 1}})
      console.log(res)
      return {questions: res.data.questions.data, maxCount: res.data.max_count}
    },
    methods:{
      async getQuestions(){
        this.currentPage ++
        const res = await this.$axios.$get('api/questions', {params: {page: this.currentPage}})
        this.questions = this.questions.concat(res.data.questions.data)
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
