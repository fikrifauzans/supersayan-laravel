
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form v-if="$route.params.id" class='q-px-md q-py-lg' title='Rekap Simulasi'>
          <t-select-api col='4' equired label='user' v-model='model.user_id' topLabel='user' api="users" r />
          <t-currency col='4' label='total_pertanyaan' currency v-model='model.total_pertanyaan'
            topLabel='total_pertanyaan' />
          <t-currency col='4' label='jawaban_benar' currency v-model='model.jawaban_benar' topLabel='jawaban_benar' />
          <t-currency col='4' label='jawaban_salah' currency v-model='model.jawaban_salah' topLabel='jawaban_salah' />
          <t-currency col='4' label='persentasi_skor' currency v-model='model.persentasi_skor'
            topLabel='persentasi_skor' />
        </s-form>
        <s-form v-else class='q-px-md q-py-lg' title='Rekap Simulasi'>
          <div class="col-12 q-mt-md" v-for="(item, index) in model" :key="index">
            <div class="q-mb-md">
              {{ index + 1 }}. {{ item.question }}
            </div>
            <div class="col-12 row items-center " v-for="i in item.childs" :key="i">
              <q-radio :val="i.value" color="teal" v-model='item.answer_value' />
              {{ i.answer }}
              <q-btn :color="i.value == model.answer_value ? 'positive' : 'primary'" :flat="i.value != model.answer_value"
                round rounded :label="item.value" />
            </div>

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
    this.Meta.model = {}
    if (this.$route.params.id) {
      this.param = this.$route.params.id ? this.$route.params.id : null
    } else {
      this.model = []
      this.getSimulasiData()

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
      soalSumulasi: []
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
      // this.$Handle.loadingStart()
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
      let answers = model.map(val => {
        return { id: val.id, answer_value: val.answer_value }
      })
      let question = model.map(val => {
        return { ...val }
      })

      let endpoint = this.Meta.module
      this.$api.post(endpoint, { answers, question }, (data, status, message, full) => {
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


    getSimulasiData() {
      this.$api.get('simulasi?select=id,question,childs', (data, status) => {
        if (status == 200) this.model = data
      }, (e) => { })
    }
  },
}
</script>
