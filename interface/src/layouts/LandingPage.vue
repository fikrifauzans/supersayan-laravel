<template>
  <q-layout view="lhr lpr lFf" class="bg-grey-3 helvetica">
    <!-- <router-view /> -->
  </q-layout>
</template>

<script>
export default {
  name: "LandingPage",
  created() {
    this.$router.push({ name: "login" })
  },
  methods: {},
}
</script>
