
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg'>
          <div class="text-bold">
            Soal Simulasi
          </div>
          <div class="col-12 q-mb-sm">tambahkan pertanyaan anda untuk menentukan nilai dari simulasi</div>
          <t-input type="textarea" col='12' label='name' v-model='model.question' />
          <t-input col='12' label='jawaban' v-model='model.answer_value' readonly />
          <!-- <t-input col='6' label='value' v-model='model.value' /> -->
          <div class="text-bold row justify-between col-12">
            <div>
              Opsi Simulasi
            </div>
            <div>
              <q-btn size="sm" icon="add" color="primary" label="tambah jawaban simulasi" @click="() => {
                model.childs.push({ answer: '', value: $Static.getWord()[model.childs.length] })
              }" />
            </div>
          </div>

          <div class="col-12">tambahkan opsi simulasi pertanyaan anda untuk menentukan nilai dari simulasi</div>
          <div class="col-12 q-mt-md">
            <div class="col-12 row items-start " v-for="(item,index) in model.childs" :key="item">
              <q-radio :val="item.value" color="teal" v-model='model.answer_value' />
              <t-input label='Answer' v-model='item.answer' />
              <q-btn :color="item.value == model.answer_value ? 'positive' : 'primary'"
                :flat="item.value != model.answer_value" round rounded :label="item.value" class="q-mr-xs"/>
              <q-btn color="negative"
                 label="delete"  @click="model.childs.splice(index,1)" />
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
    this.model =  this.$Handle.resetObjectValue(this.Meta.model)
    console.log(this.model);
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
