<template>
  <s-loading :load="loading" />
  <s-drawer @refresh="refresh" :useModal="useModal" form @submit="submit" @back="back" :Meta="Meta">
    <div class="q-px-md">

      <s-form class="q-px-md q-py-lg" title="Permission">
        <div class="q-mb-lg">
          <q-toggle v-model="multipleForm" label="multiple" />
        </div>

        <div class='col-12 row' v-if="!multipleForm">
          <t-input col="12" label="name" required v-model="model.name" />
          <t-input col="12" label="slug" required v-model="model.slug" />
        </div>
        <div class="col-12 " v-else>
          <div class="row justify-end q-mb-md">
            <q-btn label="add" size="sm" color="primary" type="button"
              @click="multipleModel.push({ name: null, slug: null })" />
          </div>
          <div class='col-12 row bg-grey-2 q-pt-md q-px-md' v-for="item, index in multipleModel" :key="index">
            <div class='col-12 q-my-sm q-px-sm'>
              <q-btn icon="delete" size="xs" round rounded color="red" @click="multipleModel.splice(index, 1)" />
            </div>
            <t-input col="6" label="name" required v-model="item.name" />
            <t-input col="6" label="slug" required v-model="item.slug" />
          </div>
        </div>
      </s-form>
    </div>
  </s-drawer>
</template>

<script>
import Meta from "./meta"

export default {
  name: Meta.name + 'Form',
  props: ["modal", "id", "submitOnModal"],
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
      multipleModel: [{ name: null, slug: null }],
      multipleForm: false
    }
  },

  watch: {
    submitOnModal: function (val) {
      if (val.isTrusted) this.submit()
    },
  },
  methods: {
    findId(id) {
      let endpoint = Meta.module + "/" + id
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
      else {
        if (this.multipleForm == true) {
          await this.multipleModel.forEach(model => {
            this.postData(model)
          });
          this.back()

        }
        else await this.postData(this.model)
        this.back()

      }
    },
    editData(id) {
      let endpoint = this.Meta.module + "/" + id
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
      this.$api.post(endpoint, model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          // this.back()
        }
      })
    },
    back() {
      if (this.useModal == true) this.$emit("closeModal")
      else
        return this.$router.push({ name: Meta.module, query: { ...this.$route.query } })
    },
  },
}
</script>
