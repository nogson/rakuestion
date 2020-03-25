<template>
  <article class="question_box">
    <question :data="question" :use-answer-btn="true"/>
    <answer class="answer" v-for="answer in question.answers" :index="answer.id" :data="answer"/>
    <div class="more_btn_box">
      <b-button class="more_btn" variant="link">もっと見る</b-button>
    </div>
  </article>

</template>

<script>
  import Answer from "./Answer";
  import Question from "./Question";

  export default {
    name: "QuestionRow",
    components: {Question, Answer},
    props: {
      question: {
        type: Object
      }
    }
  }
</script>

<style scoped lang="scss">
  .question_box {
    padding: $size-m;

    .more_btn_box {
      text-align: center;
      margin-top: $size-l;
    }
  }

  .answer{
    margin-bottom: $size-l;
  }
</style>