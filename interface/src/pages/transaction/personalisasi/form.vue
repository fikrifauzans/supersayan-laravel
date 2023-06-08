
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg' title='Form Personalisasi'>
          <div class="col-12 ">
            <div class="text-bold"> verifikasi </div>
            <div>Verifikasi personalisasi</div>
            <div>
              <q-toggle v-model="model.verifikasi" />
            </div>
          </div>
          <div class="col-12 q-mb-md">

            <q-separator />
          </div>

          <t-input col='4' label='name' v-model='model.name' topLabel='name' />
          <t-currency col='4' label='age' currency v-model='model.age' topLabel='age' />
          <t-currency col='4' label='kehamilan_ke' currency v-model='model.kehamilan_ke' topLabel='kehamilan_ke' />
          <t-currency col='4' label='usia_anak_terakhir' currency v-model='model.usia_anak_terakhir'
            topLabel='usia_anak_terakhir' />
          <t-input col='4' label='hpht' v-model='model.hpht' topLabel='hpht' />
          <t-currency col='4' label='usia_kehamilan' currency v-model='model.usia_kehamilan' topLabel='usia_kehamilan' />
          <t-input col='4' label='gph' v-model='model.gph' topLabel='gph' />
          <t-text-editor col='12' label='keluhan' type='textarea' v-model='model.keluhan' />
          <t-text-editor col='12' label='Review' type='textarea' v-model='model.review' />

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
    this.Meta.model = {}
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
    editData(id) {
      let endpoint = this.Meta.module + '/' + id
      this.$api.put(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          this.back()
        }
      })
    },
    postData(model) {
      let endpoint = this.Meta.module
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
      else
        return this.$router.push({ name: Meta.module, query: { ...this.$route.query } })
    },
  },
}
</script>
