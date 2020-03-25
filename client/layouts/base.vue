<template>
  <section class="base">
    <header id="header">
      <logo/>
      <b-form @submit.prevent="onSearch" class="margin_l_auto">
        <div class="search_box">
          <b-form-input v-model="keyword" placeholder="" type="search" class="search"/>
          <b-button type="submit" class="margin_l_s search_btn" variant="outline-primary" text-variant="light">
            <b-icon icon="search" class="h4 margin_b_zero" font-scale="1"></b-icon>
          </b-button>
        </div>
      </b-form>
      <b-button to="/create-question" class="margin_l_l" variant="secondary" text-variant="light">質問する</b-button>
    </header>
    <nuxt/>
  </section>
</template>

<script>
  import Logo from "../components/Logo";

  export default {
    components: {Logo},
    data() {
      return {
        keyword: ''
      }
    },
    methods: {
      onSearch() {
        this.$router.push({path:'/search',query:{keyword:this.keyword}})
      }
    }
  }
</script>

<style lang="scss" scoped>


  .base {
    padding: 0 $size-xl;

    #header {
      padding: $size-l 0 $size-xl;
      display: flex;
      align-items: center;
    }

    h1 {
      font-size: 24px;
    }
  }

  .search_box {
    display: flex;
    align-items: center;
  }

  .search {
    width: 200px;
  }

  .search_btn {
    width: 40px !important;
    min-width: auto;
  }

</style>