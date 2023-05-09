<template>
  <q-layout view="hHh LpR lff" class="bg-white helvetica">
    <q-header class="bg-white text-dark q-pa-xs q-pl-md q-py-md shadow-1 z-max">
      <q-toolbar>
        <q-toolbar-title>
          <q-img src="images/magfirah.png" style="width: 120px" />
        </q-toolbar-title>
        <!-- RIGHT BUTTON  -->

        <!-- REFRESH  -->
        <!-- <q-btn dense flat round icon="refresh" size="sm" @click="refresh">
          <q-tooltip>Refresh</q-tooltip>
        </q-btn> -->

        <!-- FULLSCREEN  -->
        <!-- <q-btn size="sm" round flat @click="$q.fullscreen.toggle()"
          :icon="$q.fullscreen.isActive ? 'fullscreen_exit' : 'fullscreen'">
          <q-tooltip>Fullscreen</q-tooltip>
        </q-btn> -->
        <!-- FULLSCREEN  -->
        <!-- <q-btn size="sm" round flat @click="$router.push({ name: 'profile-customer' })" :icon="'settings'">
          <q-tooltip>setting</q-tooltip>
        </q-btn> -->

        <!-- <q-btn dense flat round icon="notifications" @click="toggleRightDrawer" size="sm" color="dark"
          class="bg-white" /> -->
        <div>
          <q-btn flat>
            <q-icon :name="mobileMenu ? 'img:images/menu-close.svg' : 'img:images/menu-open.svg'"
              @click="mobileMenu = !mobileMenu" />
          </q-btn>
        </div>

        <!-- <s-account class="q-mx-auto" :user="user" color="info" /> -->
      </q-toolbar>
    </q-header>
    <q-page-container :style="$Static.formHeight()">
      <q-form @submit="$emit('submit')" autofocus no-reset-focus greedy
        :class="$q.screen.lt.md ? ' col-12 row  q-px-sm q-mx-auto' : 'col-12 row container q-mx-auto'">
        <q-dialog v-model="mobileMenu" position="top" transition-duration="0">
          <q-card flat v-if="mobileMenu" class="col-12 bg-white  z-top fixed-top" style="margin-top:80px">
            <q-list>
              <div v-for="item, index in $Static.menuCustomer()" :key="index">
                <q-item clickable @click="routePush(item.path)">
                  <q-item-section>
                    <q-item-label :class="`text-center text-${item.color ?? 'info'} text-regular`">{{
                      item.label
                    }}</q-item-label>
                  </q-item-section>
                </q-item>
                <q-separator inset />
              </div>
            </q-list>
          </q-card>
        </q-dialog>

        <slot />
      </q-form>
      <slot name="footer" />
    </q-page-container>
    <slot name="layout" />
  </q-layout>
</template>
<script>
export default {
  created() {
    this.profile()
  },
  // props: ['user'],
  data() {
    return {
      user: null,
      menus: null,
      mobileMenu: false
    }
  },
  methods: {
    profile() {
      this.$api.get(
        "me",
        (data, status, message, full) => {
          if (status == 200) {
            this.user = data
            this.menus = data.role.master_menu.menu_details
            this.$Handle.setLS("menus", this.menus)
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
    routePush(link) {
      if (link == 'logout') this.logout()
      else window.open(link, '_blank');
    },
    refresh() {
      this.$emit("refresh")
      this.profile()
    },
    logout() {
      this.$api.post("logout", {}, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.clearAllLS()
          this.$router.push({ name: "login" })
          // window.location.reload()
        }
      })
    },
  },
}
</script>
<style lang=""></style>
