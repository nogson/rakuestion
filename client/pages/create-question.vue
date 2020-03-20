<template>
  <section>
    <b-form @submit="onSubmit">
      <b-form-group
              id="input-group-1"
              label="内容"
              label-for="input-1"
              description="We'll never share your email with anyone else."
      >
        <vue-editor
                id="editor"
                v-model="form.question"
        />
        <!--        <b-form-input-->
        <!--                id="input-1"-->
        <!--                v-model="form.email"-->
        <!--                type="email"-->
        <!--                required-->
        <!--                placeholder="Enter email"-->
        <!--        ></b-form-input>-->
      </b-form-group>

      <b-form-group id="input-group-2" label="タグ" label-for="input-2">
        <b-form-tags input-id="tags-basic" v-model="form.tags" placeholder="タグを追加" class="mb-2" tag-variant="primary"></b-form-tags>
      </b-form-group>

      <b-form-group id="input-group-3" label="サムネイル" label-for="input-3">
        <b-form-select
                id="input-3"
                v-model="form.food"
                :options="foods"
                required
        ></b-form-select>
      </b-form-group>
      <div class="l_flex">
        <b-button to="/" variant="outline-primary">
          <b-icon icon="chevron-left" class="h5 icon margin_r_xs margin_b_zero"/>
          戻る
        </b-button>
        <b-button type="submit" class="margin_l_auto" variant="primary">作成</b-button>
      </div>

    </b-form>
  </section>
</template>

<script>

  export default {
    layout: 'default',
    components: {},
    data() {
      return {
        form: {}
      }
    },
    methods: {
      onSubmit() {

      }
    }
  }
</script>

<style>

</style>
