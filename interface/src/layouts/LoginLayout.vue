<template>
  <div class="window-height window-width row">
    <div v-if="$q.screen.lt.md" class="col-md-4 col-12 row justify-center">
      <router-view />
    </div>
    <div v-if="$q.screen.gt.sm" class="col-md-5 col-12 row justify-center bg-primary">
      <router-view />
    </div>
    <div v-if="$q.screen.gt.sm" class="col-md-7 relative-position bg-secondary">
      <div class="fit row justify-center items-center relative-position">
        <q-img src="~assets/images/icon.png" style="width: 400px;" />
        <div class="col-8 text-primary">
          Aplikasi ini dibuat untuk membantu kamu dalam
          mengembangkan kompetensi dan keterampilan yang
          diperlukan dalam praktik klinis pada stase kehamilan
        </div>
      </div>
    </div>


  </div>
</template>
<script>
export default {
  name: "LoginLayout",
  created() {
    this.user = this.$Handle.getLS("_user")
    if (this.$Handle.getLS("_user") && this.$Handle.getLS("_token")) {
      if (this.user.is_customer == 1) this.$router.push({ name: "cms-jamaah-index" })
      else {
        this.menus = this.$Handle.getLS("menus")
        let firstMenu = this.menus && this.menus[0].menu != undefined ? this.menus[0].menu : { path: 'login' }
        this.$router.push({ name: firstMenu.path })
      }
    }
    // if()
  },
  data() {
    return {
      user: null,
      menus: null,
      tab: "login",
      dataModel: { username: null, password: null },
      errors: null,
    }
  },
  methods: {},
}
</script>
