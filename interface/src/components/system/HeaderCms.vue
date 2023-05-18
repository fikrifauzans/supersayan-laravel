<template>
  <div v-if="!useModal">
    <q-header :class="$q.screen.gt.md ? 'bg-white q-py-md text-grey q-px-sm' : 'bg-white'">
      <q-toolbar>
        <!-- LEFT MENU  -->
        <q-btn dense flat round size="md " color="dark" @click="toggleLeftDrawer">
          <q-icon name="img:images/icons/left-drawer.svg" size="30px" />
        </q-btn>
        <!-- APP NAME  -->

        <q-toolbar-title>
          <!-- AVATAR  -->
          <div>
            <div class="q-gutter-sm">
              <q-icon :name="Meta ?  $Handle.checkMenusLabelOrIcon(Meta.menu_slug).icon.toString()  : ''" color="primary" size="30px" />
              <q-btn noCaps size="sm" flat style="border: 1px solid rgba(0, 0, 0, 0.12);">
                <span class="header-module-title" v-if="Meta">
                  {{ Meta && Meta.menu_slug ? $Handle.checkMenusLabelOrIcon(Meta.menu_slug).name : Meta.module_name ?
                    Meta.module_name : '' }}
                </span>
              </q-btn>
            </div>

          </div>
        </q-toolbar-title>
        <!-- RIGHT BUTTON  -->

        <!-- FULLSCREEN  -->
        <q-btn color="dark" label="Fullscreen" size="sm" flat @click="$q.fullscreen.toggle()"
          :icon="$q.fullscreen.isActive ? 'fullscreen_exit' : 'fullscreen'">
          <q-tooltip>Fullscreen</q-tooltip>
        </q-btn>
        <!-- REFRESH  -->
        <q-btn color="dark" label="Refresh" flat icon="cached" size="sm" @click="refresh">
          <q-tooltip>Refresh</q-tooltip>
        </q-btn>




        <!-- <q-btn dense flat round icon="notifications" @click="toggleRightDrawer" size="sm" color="grey"
          class="bg-white" /> -->
        <div class="column text-dark q-ml-lg">
          <div class="header-user-name ">{{ user && user.name ? user.name : '' }}</div>
          <div class="header-user-role">{{ user && user.role ? user.role.name : '' }}</div>
        </div>
        <s-account class="q-mx-auto" :user="user" />
      </q-toolbar>
    </q-header>

    <q-drawer class="bg-accent" v-model="leftDrawerOpen" side="left" bordered persistent show-if-above no-swipe-backdrop width="250">
      <!-- FILTER  -->
      <s-filter :table="table" v-if="filter && filter.value" @update:modelValue="(val) => updateFilter(val)"
        :model-value="modelValue" @closeFilter="closeFilter" :filter="filter" @refresh="$emit('refreshQuery')" />
      <!-- MENU  -->
      <s-menu v-else :menus="menus" />
    </q-drawer>

    <q-drawer v-model="rightDrawerOpen" side="right" bordered>
      <!-- drawer content -->
    </q-drawer>
    <q-page-container :style="$Static.formHeight()">
      <q-form @submit="$emit('submit')" autofocus no-reset-focus greedy>
        <div class="row" v-if="form == ''"></div>

        <div v-if="table">
          <div v-if="wrapCard === ''">
            <q-card class="q-px-md q-mt-sm q-ma-md" style="border-radius: 10px;">
              <slot />
            </q-card>
          </div>
          <div v-else>
            <div class="q-px-md q-mt-sm q-px-lg">
              <slot />
          
            </div>
          </div>
        </div>
        <div v-else>
          <slot />
          <div
            :class="$q.screen.lt.md ? 'q-gutter-xs row justify-between  q-pb-lg' : 'q-gutter-xs row justify-between q-px-lg  q-mt-sm q-pb-lg'"
            v-if="hideOpt !== ''">
            <t-button icon="arrow_left" label="back"  class="text-primary cursor-pointer text-bold" 
              type="button" @click="$emit('back')" />
            <t-button v-if="detail != ''" :label="'Simpan ' + (Meta && Meta.name ? Meta.name : '')"  type="submit"
              active="true" class="save-btn" />
            <q-btn v-if="useEdit == ''" :label="'Edit ' + (Meta && Meta.name ? Meta.name : '')" size="sm" type="submit"
              color="secondary" class="save-btn" @click="$emit('edit')" />
          </div>
        </div>
      </q-form>
    </q-page-container>
  </div>
  <div v-else>
    <slot />
  </div>
</template>
<script>
import { ref } from "vue"

export default {
  setup() {
    return {}
  },
  watch: {
    "filter.value": function (val) {
      if (this.$q.screen.lt.md || val == true) this.leftDrawerOpen = true
    },
    modelValue: function (val) {
      this.leftDrawerOpen = true
    },
  },
  created() {
    // this.appVersion()
    this.profile()
    this.link = this.$Lang.getLang()
  },
  props: [
    "useModal",
    "Meta",
    "form",
    "filter",
    "table",
    "modelValue",
    "detail",
    "height",
    "iconTitle",
    "useEdit",
    "hideOpt",
    "wrapCard",
  ],
  data() {
    return {
      user: null,
      menus: null,
      permissions: [],
      app: null,
      link: "",
      leftDrawerOpen: false,
      rightDrawerOpen: false,
    }
  },
  methods: {
    appVersion() {
      this.$api.get(
        "/",
        (data, status, message, full) => {
          if (status == 200) return (this.app = message)
        }, true
      )
    },
    profile() {
      this.$api.get(
        "me",
        (data, status, message, full) => {
          if (status == 200) {
            this.user = data

            this.menus = data.role.master_menu.menu_details
            this.role = data.role
            this.permisions = data.role.permission_access_index
            this.$Handle.setLS("menus", this.menus)
            this.$Handle.setLS("role", this.role)
            this.$Handle.setLS("permissions", this.permisions)
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
    refresh() {
      this.$emit("refresh")
      this.profile()
    },
    closeFilter(val) {
      // eslint-disable-next-line
      this.filter.value = false
      this.$emit("update:modelValue", val)
      this.$emit("closeFilter")
      this.refresh()
    },
    updateFilter(val) {
      this.$emit("update:modelValue", val)
    },
    toggleLeftDrawer() {
      this.leftDrawerOpen = !this.leftDrawerOpen
    },
    toggleRightDrawer() {
      this.rightDrawerOpen = !this.rightDrawerOpen
    },
  },
}
</script>
<style lang="scss">
.save-btn {
  padding: 10px;
  padding-left: 20px;
  padding-right: 20px;
  border-radius: 10px;
  font-weight: bold;
}

.header-module-title {
  font-weight: 700;
  font-size: 12px;
  color:$primary;
  ;
}

.header-user-name {
  font-family: 'Helvetica';
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
}

.header-user-role {

  font-style: normal;
  font-weight: 400;
  font-size: 12px;
  line-height: 160%;
}
</style>
