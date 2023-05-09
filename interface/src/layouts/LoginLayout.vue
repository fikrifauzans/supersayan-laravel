<template>
  <div class="window-height window-width row">
    <q-img v-if="$q.screen.lt.md" src="images/magfirah.png" class="text-left col-12 q-ma-md" style="width:120px" />
    <span v-if="$q.screen.lt.md" class="text-primary col-12 text-center">
      <h6 v-if="$q.screen.lt.md" style="line-height: 0; margin: 0; padding: 0" class="text-primary">Digital Ekosistem
      </h6>
      <br>
      <h4 v-if="$q.screen.lt.md" style="line-height: 0; margin: 20px 0 50px 0; padding: 0; font-weight: 800"
        class="text-primary">Supersayan
      </h4>
    </span>
    <q-img v-if="$q.screen.lt.md" src="images/login-background.png" class="col-12 q-mx-auto" width="45%" />
    <div v-if="$q.screen.lt.md" class="col-md-5 col-12 row justify-center">
      <router-view />
    </div>
    <div v-if="$q.screen.gt.sm" class="col-md-5 col-12 row justify-center bg-primary">
      <router-view />
    </div>
    <div class="col-md-7 relative-position">
      <q-img src="images/login-background.png" style="width: 80%" class="absolute-center" />
      <q-img src="images/magfirah.png" style="width: 20%" class="absolute-top-right q-ma-lg" />
      <span class="text-primary absolute-bottom text-center">
      </span>
      <!-- <q-img src="images/magfirah-login-text.png" style="width: 50%; right: 150px; bottom: 60px"
        class="absolute-bottom q-mx-auto" /> -->
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
