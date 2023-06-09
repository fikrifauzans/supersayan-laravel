<template>
  <q-layout view="lHr lpR lfr" v-if="content">
    <cms-navbar @clickLeftMenu="rightDrawerOpen = !rightDrawerOpen" >
      <slot name="right" />
    </cms-navbar>
    <q-drawer v-model="leftDrawerOpen" side="left" style="z-index: 10000 !important;">
      <!-- drawer content -->
    </q-drawer>

    <q-drawer v-model="rightDrawerOpen" side="right">
      <!-- drawer content -->
      
       <div class="q-pa-md">
          <cms-logo width="200" />
        <q-separator class="q-mt-xl" />
        <cms-menu column :data="$Handle.getContent('', 'Menu')" />
     
      </div>
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
export default {
  created() {
     this.$router.push({ path: '/login' })
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
            return true
          }
        },
        (e) => { }
      )
      return true
    }
  },
}
</script>