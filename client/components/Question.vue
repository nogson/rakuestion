<template>
  <article class="question_box">
    <dl class="l_flex">
      <dt>
        <h2 class="question">あいうでおあいうえおあいうえおあいうでおあいうえおあいうえおあいうでおあいうえおあいうえお</h2>
        <ul class="question_state">
          <li>2019/10/22 10:11</li>
          <li><span class="margin_r_s">回答数</span><span>10</span></li>
        </ul>
      </dt>
      <dd>
        <b-button class="answer_btn" variant="primary">回答する</b-button>
      </dd>
    </dl>
    <div class="answer">
      回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります
    </div>
  </article>

</template>

<script>
  export default {
    name: "Question"
  }
</script>

<style scoped lang="scss">
  .question_box {
    padding: $size-m;

    .question {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: $size-m;
    }

    .question_state{
      font-size: 12px;
    }

    dd {
      margin-left: auto;
      margin-bottom: 0;
    }

    .answer {
      font-size: 16px;
    }
  }
</style>