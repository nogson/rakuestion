<template>
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
        questions: []
      }
    },
    async asyncData({$axios,query}) {
       const data = await $axios.$get('api/questions/search', {params:{keyword: query.keyword}})
      return {questions: data.data.questions}
    },
    watch: {
      '$route' (to) {
        this.$axios.$get('api/questions/search', {params:{keyword: to.query.keyword}}).then(res => {
          this.questions = res.data.questions
        })
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
