<template>
  <s-loading :load="loading" />
  <s-drawer @refresh="refresh" :useModal="useModal" form @submit="submit" @back="back" :Meta="Meta">
    <div>
      <s-form class="q-px-md q-py-lg" icon="person" title="Edit Profile">
        <t-input col="4" label="name" r-icon="person" required v-model="model.name" />
        <t-input col="4" label="username" r-icon="person" required v-model="model.username" />
        <t-input col="4" label="email" r-icon="mail" required v-model="model.email" />
        <t-input col="4" type="password" label="password" r-icon="lock" v-model="model.password" />
        <t-input col="4" label="address" r-icon="home" v-model="model.address" />
        <t-input col="4" label="phone" v-model="model.phone" />
        <t-file-image col="4" label="Photo" v-model="model.avatar" />
      </s-form>
    </div>
  </s-drawer>
</template>

<script>
import Meta from "./meta"

export default {
  name: 'MeForm',
  props: ["modal", "id", "submitOnModal"],
  created() {
    this.$Handle.loadingStart()
    this.Meta.model = {}
    this.$Handle.loadingStop()
    this.profile()
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
    profile() {
      this.$api.get(
        "me",
        (data, status, message, full) => {
          if (status == 200) {
            this.model = data
            this.$Handle.loadingStop()
          }
        },
        (e) => {
          if (e.status == 401) {
            this.$Handle.clearAllLS()
            this.$Handle.errorMessage("Tidak ada sesi untuk anda")
            this.$router.push({ name: "login" })
          }
        }
      )
    },
    async submit() {
      this.$Handle.loadingStart()
      delete this.model.is_customer
      this.model = await this.$Handle.loopingForm(this.model);
      this.editData()

    },
    editData() {
      let endpoint = 'profile'
      this.$api.post(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.profile()
          this.$Handle.successMessage('Profile Edited')
          this.$Handle.loadingStop()
        }
      })
    },

  },
}
</script>
