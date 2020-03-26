<template>
  <div>
    <h1 v-if="keyword" class="ttl_1">検索条件　{{keyword}}</h1>
    <h1 v-else-if="tags" class="ttl_1">検索条件　<span v-for="(tag,index) in tags" :index="index">#{{tag}}</span></h1>
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
        questions: [],
        keyword: null,
        tags:null
      }
    },
    async asyncData({$axios, query}) {
      if(query.keyword){
        const res = await $axios.$get('api/questions/search', {params: {keyword: query.keyword}})
        return {questions: res.data.questions, keyword: res.data.keyword}
      }else if(query.tag){
        const res = await $axios.$get('api/questions/same_tag', {params: {tag: query.tag}})
        return {questions: res.data.questions, tags: res.data.tags}
      }

    },
    watch: {
      '$route'(to) {
        this.$axios.$get('api/questions/search', {params: {keyword: to.query.keyword}}).then(res => {
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
