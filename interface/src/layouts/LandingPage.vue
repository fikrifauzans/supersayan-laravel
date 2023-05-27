<template>
  <q-layout view="lHr lpR lfr" v-if="content">
    <cms-navbar />
    <q-drawer v-model="leftDrawerOpen" side="left">
      <!-- drawer content -->
    </q-drawer>

    <q-drawer v-model="rightDrawerOpen" side="right">
      <!-- drawer content -->
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>

    <div class="q-pt-xl">
      <cms-footer />
    </div>

  </q-layout>
</template>

<script>
import { ref } from 'vue'

export default {

  created() {
    this.getContents()
  },
  data() {
    return {
      leftDrawerOpen: false,
      rightDrawerOpen: false,
      content: false
    }
  },
  methods: {
    getContents() {
      this.$Handle.loadingStart()
      let endpoint = 'contents'
      this.$api.get(
        endpoint, (data, status, message, full) => {
          if (status == 200) {
            this.$Handle.setLS('contents', data.data)
            this.$Handle.loadingStop()
            this.content = true

          }
        },
        (e) => { }
      )
    }
  },
}
</script>