<template>
  <q-layout view="lhr Lpr lFf" class=" helvetica">
    <router-view />
  </q-layout>
</template>

<script>
/* eslint-disable */

export default {
  name: "MainLayouts",
  created() {
    this.authCheck()
   
  },
  methods: {
    authCheck() {
      this.$api.get(
        "auth",
        (data, status, message, full) => {
          if (status == 200) {
            if (data.is_customer == 1) this.$router.push({ name: "cms-jamaah-index" })
            else return true
          }
        },
        (e) => {
          if (e.status == 401) {
            this.Handle.clearAllLS()
            this.Handle.errorMessage("Tidak ada sesi untuk anda")
            this.$router.push({ name: "login" })
          }
        }
      )
    },
  },
}
</script>
