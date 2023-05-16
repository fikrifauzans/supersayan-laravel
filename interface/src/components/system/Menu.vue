<template>
  <div>

    <q-list class="text-grey menu-system" v-for="(item, i) in $Handle.getLS('menus')" :key="i"
      v-show="$Handle.getLS('menus')">
      <q-item v-if="item.menu && item.parent_id == null && item.menu.link" clickable v-ripple
        :active="item.menu && link === item.menu.path" active-class="left-menu-superadmin" @click="pushRoute(item)">
        <q-item-section avatar>
          <q-icon :name="item && item.menu ? item.menu.icon : ''" />
        </q-item-section>
        <q-item-section>{{ item && item.menu ? item.menu.name : "" }}</q-item-section>
      </q-item>

      <q-expansion-item v-if="item && item.childs.length > 0" :icon="item && item.menu ? item.menu.icon : ''"
        :label="item && item.menu ? item.menu.name : ''" color="grey" class="text-grey" v-model="expansion[i]">
        <q-item v-for="(item, index) in item.childs" :key="index" v-show="item && item.menu" clickable v-ripple
          :active="item.menu && link === item.menu.path" @click="pushRoute(item)" active-class="left-menu-superadmin">
          <q-item-section avatar class="q-ml-md" v-if="item && item.menu">
            <q-icon :name="item ? item.menu.icon : ''" :class="item.menu && link === item.menu.path ? 'text-white' : ''" />
          </q-item-section>
          <q-item-section>{{ item && item.menu ? item.menu.name : "" }}</q-item-section>
        </q-item>
      </q-expansion-item>
    </q-list>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  name: "MenySystem",
  setup() {
    return {
      link: ref("inbox"),
    }
  },
  created() {
    this.expansion = []
    this.link = this.$Handle.getSS("menus-name")
      ? JSON.parse(this.$Handle.getSS("menus-name"))
      : ""
    this.expansion = JSON.parse(this.$Handle.getSS("expansion"))
      ? JSON.parse(this.$Handle.getSS("expansion"))
      : []
  },
  data() {
    return {
      expansion: [],
      menus: null,
    }
  },
  watch: {
    expansion: {
      handler: function (val, oldVal) {
        this.setExpansion()
      },
      deep: true,
    },
  },
  methods: {
    pushRoute(item) {
      this.link = item.menu.path
      this.$router.push({ name: item.menu.path })
      sessionStorage.setItem("menus-name", JSON.stringify(item.menu.path))
    },
    setExpansion() {
      sessionStorage.setItem("expansion", JSON.stringify(this.expansion))
    },
  },
}
</script>
<style lang="sass"></style>
