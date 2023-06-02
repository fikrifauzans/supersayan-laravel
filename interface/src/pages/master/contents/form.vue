
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg' title='Form Contents'>
          <div v-for="item in allowForm" :key="item" class="col-12 row">
            <t-input v-if="item.field == 'group'" col='12' :label='item.label' v-model='model.group' topLabel='group' />
            <t-input v-if="item.field == 'name'" col='12' :label='item.label' v-model='model.name' topLabel='name' />
            <t-input v-if="item.field == 'page'" col='12' :label='item.label' v-model='model.page' topLabel='page' />
            <t-input v-if="item.field == 'device'" col='12' :label='item.label' v-model='model.device'
              topLabel='device' />
            <t-input v-if="item.field == 'title'" col='12' :label='item.label' v-model='model.title' topLabel='title' />
            <t-input v-if="item.field == 'subtitle'" col='12' :label='item.label' v-model='model.subtitle'
              topLabel='subtitle' />
            <t-input v-if="item.field == 'path'" col='12' :label='item.label' v-model='model.path' topLabel='path' />
            <t-input v-if="item.field == 'link'" col='12' :label='item.label' v-model='model.link' topLabel='link' />
            <t-input v-if="item.field == 'sort'" col='12' :label='item.label' v-model='model.sort' topLabel='sort' />
            <t-file-image v-if="item.field == 'photo_id'" col='12' :label='item.label' v-model="model.photo" fullFile />
            <t-input v-if="item.field == 'description'" col='12' :label='item.label' v-model='model.description'
              topLabel='description' type="textarea" />
            <t-text-editor v-if="item.field == 'remark'" col='12' :label='item.label' type='textarea'
              v-model='model.remark' />
            <t-text-editor v-if="item.field == 'details'" col='12' :label='item.label' type='textarea'
              v-model='model.details' />
          </div>
        </s-form>
      </div>
    </s-drawer>
  </div>
</template>

<script>
import Meta from './meta'

export default {
  name: Meta.name + 'Form',
  props: ['modal', 'id', 'submitOnModal'],
  created() {
    this.$Handle.loadingStart()
    this.allowForm = this.Meta.table.columns(this.$route.query.tab)
    console.log(this.allowForm);
    this.Meta.model = { ...Meta.model }
    if (this.$route.params.id) {
      this.param = this.$route.params.id ? this.$route.params.id : null
    }
    if (this.id) this.param = this.id ? this.id : null
    if (this.modal && this.modal.add === true) this.useModal = true
    if (this.modal && this.modal.edit === true) this.useModal = true
    if (this.param !== null) this.findId(this.param)
    this.$Handle.loadingStop()
  },
  data() {
    return {
      Meta,
      useModal: false,
      model: Meta.model,
      loading: false,
      edit: false,
      param: null,
      allowForm: []
    }
  },

  watch: {
    submitOnModal: function (val) {
      if (val.isTrusted) this.submit()
    },
  },
  methods: {
    findId(id) {
      let endpoint = Meta.module + '/' + id
      this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.model = data
          this.$Handle.loadingStop()
        }
      })
    },
    async submit() {
      this.$Handle.loadingStart()
      if (this.$route.query.tab != null) this.model.group = this.$route.query.tab
      if (this.param !== null) await this.editData(this.param)
      else await this.postData(this.model)
    },
    async editData(id) {
      if (this.model.photo) {
        let fileUploaded = await this.$api.fileHandler(this.model.photo, null, this.model.photo.method)
        this.model.photo_id = fileUploaded.id
      }

      let endpoint = this.Meta.module + '/' + id
      this.$api.put(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          this.back()
        }
      })
    },
    async postData(model) {
      let endpoint = this.Meta.module
      if (this.model.photo) {
        let fileUploaded = await this.$api.fileHandler(this.model.photo, null, this.model.photo.method)
        model.photo_id = fileUploaded.id
      }
      this.$api.post(endpoint, model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          this.back()
        }
      })
    },
    back() {
      if (this.useModal == true) this.$emit('closeModal')
      else return this.$router.push({ name: Meta.module, query: { ...this.$route.query } })
    },
  },
}
</script>
