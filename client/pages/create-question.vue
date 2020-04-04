<template>
  <section>
    <h1 class="ttl_1">質問を作成</h1>
    <question :data="question"/>
    <b-form @submit.prevent="onSubmit">
      <b-form-group
              label="内容"
              label-for="input-1"
      >
        <b-form-textarea
                v-model="form.question"
                placeholder="質問内容を入力"
                rows="3"
                max-rows="6"
        ></b-form-textarea>
        <!--        <vue-editor-->
        <!--                id="editor"-->
        <!--                v-model="form.content"-->
        <!--        />-->
      </b-form-group>

      <b-form-group label="タグ" label-for="input-2">
        <b-form-tags input-id="tags-basic" v-model="form.tags" placeholder="タグを追加" class="mb-2"
                     tag-variant="primary"></b-form-tags>
      </b-form-group>
      <div class="l_flex margin_t_l">
        <b-button to="/" variant="outline-primary">
          <b-icon icon="chevron-left" class="h5 icon margin_r_xs margin_b_zero"/>
          戻る
        </b-button>
        <b-button v-b-modal.confirmModal type="submit" class="margin_l_auto" variant="primary"
                  :disabled="disabledSubmitBtn">登録
        </b-button>
      </div>
    </b-form>
    <div>
    </div>
  </section>
</template>

<script>

  import Question from "~/components/Question";

  export default {
    layout: 'base',
    components: {Question},
    data() {
      return {
        form: {
          avatar: Math.floor(Math.random() * 33 + 1)
        }
      }
    },
    computed: {
      question() {
        return {
          question: this.form.question ? this.form.question.replace(/\r?\n/g, '<br>') : '↓に質問を入力してね！',
          tags: this.form.tags,
          avatar: this.form.avatar
        }
      },
      disabledSubmitBtn() {
        return !this.form.question || this.form.question === ''
      }
    },
    methods: {
      onSubmit() {
        this.$bvModal.msgBoxConfirm('質問を登録しますか？').then(res => {
          if (res) {
            this.create()
          }
        })
      },
      create() {
        let params = Object.assign({}, this.form)
        params.question = params.question.replace(/\r?\n/g, '<br>')

        this.$axios.$post('/api/question/create', params).then(() => {
          this.$router.push('/')
        })
      }
    }
  }
</script>

<style>

</style>
