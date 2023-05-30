
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg' title='Form Contents'>
          <!-- <t-input col='4' label='code' v-model='model.code' topLabel='code' />
          <t-currency col='4' label='parent_id' currency v-model='model.parent_id' topLabel='parent_id' /> -->
          <t-input col='4' label='group' v-model='model.group' topLabel='group' />
          <t-input col='4' label='name' v-model='model.name' topLabel='name' />
          <t-input col='4' label='page' v-model='model.page' topLabel='page' />
          <t-input col='4' label='device' v-model='model.device' topLabel='device' />
          <t-input col='4' label='title' v-model='model.title' topLabel='title' />
          <t-input col='4' label='subtitle' v-model='model.subtitle' topLabel='subtitle' />
          <t-input col='4' label='description' v-model='model.description' topLabel='description' />
          <t-input col='4' label='path' v-model='model.path' topLabel='path' />
          <t-input col='4' label='link' v-model='model.link' topLabel='link' />
          <t-input col='4' label='sort' v-model='model.sort' topLabel='sort' />
          <t-file-image col='4' label="image" v-model="model.photo" fullFile  />
          {{ model.photo }}
          <t-text-editor col='12' label='remark' type='textarea' v-model='model.remark' />
          <t-text-editor col='12' label='details' type='textarea' v-model='model.details' />
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
      if (this.param !== null) await this.editData(this.param)
      else await this.postData(this.model)
    },
    async editData(id) {
      let fileUploaded = await this.$api.fileHandler(this.model.photo, null, this.model.photo.method)
      this.model.photo_id = fileUploaded.id

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
      let fileUploaded = await this.$api.fileHandler(this.model.photo, null, this.model.photo.method)
      model.photo_id = fileUploaded.id
      console.log(model.photo_id);
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
