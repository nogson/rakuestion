(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{314:function(t,o,n){"use strict";n.r(o);n(22);var r={layout:"base-no-question-btn",components:{Question:n(255).a},data:function(){return{form:{avatar:Math.floor(33*Math.random()+1)}}},computed:{question:function(){return{question:this.form.question?this.form.question.replace(/\r?\n/g,"<br>"):"↓に質問を入力してね！",tags:this.form.tags,avatar:this.form.avatar}},disabledSubmitBtn:function(){return!this.form.question||""===this.form.question}},methods:{onSubmit:function(){var t=this;this.$bvModal.msgBoxConfirm("質問を登録しますか？").then((function(o){o&&t.create()}))},create:function(){var t=this,o=Object.assign({},this.form);o.question=o.question.replace(/\r?\n/g,"<br>"),this.$axios.$post("/api/question/create",o).then((function(){t.$router.push("/")}))}}},e=n(39),component=Object(e.a)(r,(function(){var t=this,o=t.$createElement,n=t._self._c||o;return n("section",[n("h1",{staticClass:"ttl_1"},[t._v("質問を作成")]),t._v(" "),n("question",{attrs:{data:t.question}}),t._v(" "),n("b-form",{on:{submit:function(o){return o.preventDefault(),t.onSubmit(o)}}},[n("b-form-group",{attrs:{label:"内容","label-for":"input-1"}},[n("b-form-textarea",{attrs:{placeholder:"質問内容を入力",rows:"3","max-rows":"6"},model:{value:t.form.question,callback:function(o){t.$set(t.form,"question",o)},expression:"form.question"}})],1),t._v(" "),n("b-form-group",{attrs:{label:"タグ","label-for":"input-2"}},[n("b-form-tags",{staticClass:"mb-2",attrs:{"input-id":"tags-basic",placeholder:"タグを追加","tag-variant":"primary"},model:{value:t.form.tags,callback:function(o){t.$set(t.form,"tags",o)},expression:"form.tags"}})],1),t._v(" "),n("div",{staticClass:"l_flex margin_t_l"},[n("b-button",{attrs:{to:"/",variant:"outline-primary"}},[n("b-icon",{staticClass:"h5 icon margin_r_xs margin_b_zero",attrs:{icon:"chevron-left"}}),t._v("\n        戻る\n      ")],1),t._v(" "),n("b-button",{directives:[{name:"b-modal",rawName:"v-b-modal.confirmModal",modifiers:{confirmModal:!0}}],staticClass:"margin_l_auto",attrs:{type:"submit",variant:"primary",disabled:t.disabledSubmitBtn}},[t._v("登録\n      ")])],1)],1),t._v(" "),n("div")],1)}),[],!1,null,null,null);o.default=component.exports}}]);