<template>
  <scroll-box>
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
    <spinner v-if="loading"/>
  </scroll-box>
</template>

<script>
  import Question from '~/components/Question.vue'
  import Avatar from "../components/Avatar";
  import ScrollBox from "../components/ScrollBox";
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
        keyword: null,
        tags: null,
        currentPage: 0,
        loading: false,
        maxCount: null,
        limit: 5
      }
    },
    async asyncData({app, error, query}) {
      try {
        if (query.keyword) {
          const res = await app.$axios.$get('/api/questions/search', {
            params: {
              offset: 0,
              limit: 5,
              keyword: query.keyword
            }
          })
          return {questions: res.data.questions, maxCount: res.data.max_count, keyword: res.data.keyword}
        } else if (query.tag) {
          const res = await app.$axios.$get('/api/questions/same_tag', {
            params: {
              offset: 0,
              limit: 5,
              tag: query.tag
            }
          })
          return {questions: res.data.questions, maxCount: res.data.max_count, tags: res.data.tags}
        }
      } catch (err) {
        console.log(err)
        // error({
        //   statusCode: err.response.status,
        //   message: err.response.data.message,
        // });
      }
    },
    methods: {
      async getQuestions() {
        if (this.loading || this.maxCount <= this.currentPage * this.limit) {
          return
        }

        this.loading = true
        this.currentPage++

        let params = null

        if (query.keyword) {
          params = {offset: this.currentPage * this.limit, limit: this.limit, keyword: this.$route.query.keyword}
        } else {
          params = {offset: this.currentPage * this.limit, limit: this.limit, tag: this.$route.query.tag}
        }

        const res = await this.$axios.$get('/api/questions/search', {params: params})
        this.questions = this.questions.concat(res.data.questions)
        this.loading = false
      }
    },
    watch: {
      '$route'(to) {
        this.currentPage = 0
        this.$axios.$get('/api/questions/search', {params: {keyword: to.query.keyword}}).then(res => {
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
