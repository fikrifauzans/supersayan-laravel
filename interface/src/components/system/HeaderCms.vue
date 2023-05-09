<template>
  <div v-if="!useModal">

    <q-header class="bg-white shadow text-grey ">
      <q-toolbar>
        <!-- LEFT MENU  -->
        <q-btn dense flat round :icon="iconTitle != null ? iconTitle : 'menu'" size="sm" color="dark"
          @click="toggleLeftDrawer" />
        <!-- APP NAME  -->

        <q-toolbar-title>
          <!-- AVATAR  -->
          <div class="text-dark" style="font-weight: 700; font-size:16px">
            {{ Meta ? Meta.module_name : "" }}

          </div>
        </q-toolbar-title>
        <!-- RIGHT BUTTON  -->

        <!-- REFRESH  -->
        <q-btn dense flat round icon="refresh" size="sm" @click="refresh">
          <q-tooltip>Refresh</q-tooltip>
        </q-btn>

        <!-- FULLSCREEN  -->
        <q-btn size="sm" round flat @click="$q.fullscreen.toggle()"
          :icon="$q.fullscreen.isActive ? 'fullscreen_exit' : 'fullscreen'">
          <q-tooltip>Fullscreen</q-tooltip>
        </q-btn>



        <!-- <q-btn dense flat round icon="notifications" @click="toggleRightDrawer" size="sm" color="grey"
          class="bg-white" /> -->
        <s-account class="q-mx-auto" :user="user" />
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" side="left" bordered persistent show-if-above no-swipe-backdrop width="250">
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
          <div class=" q-mt-sm">
            <div class="q-px-md">
              <slot />
            </div>
          </div>
        </div>
        <div v-else>
          <slot />
          <div
            :class="$q.screen.lt.md ? 'q-gutter-xs row justify-between  q-pb-lg' : 'q-gutter-xs row justify-between q-px-xl q-pb-lg'"
            v-if="hideOpt !== ''">
            <q-btn icon="arrow_left" label="back" flat class="text-primary cursor-pointer text-bold" size="sm"
              type="button" @click="$emit('back')" />
            <q-btn v-if="detail != ''" :label="'Simpan ' + (Meta ? Meta.name : '')" size="sm" type="submit"
              color="secondary" class="save-btn" />
            <q-btn v-if="useEdit == ''" :label="'Edit ' + (Meta ? Meta.name : '')" size="sm" type="submit"
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
  ],
  data() {
    return {
      user: null,
      menus: null,
      app: null,
      link: "",
      permision: [],
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
            this.permisions = data.role.permission_access_index
            this.$Handle.setLS("menus", this.menus)
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
</style>
