<template>
  <q-btn
    icon="fa-brands fa-whatsapp"
    flat
    color="positive"
    round
    rounded
    @click="callApi"
  />
</template>
<script>
export default {
  props: ["phone"],
  methods: {
    callApi() {
      let api = ""
      api += "https://api.whatsapp.com/send?phone="
      api += "62"
      if (this.phone[0] == "0") api += this.phone.slice(1)
      window.open(api, "_blank")
    },
  },
}
</script>
<style lang=""></style>
