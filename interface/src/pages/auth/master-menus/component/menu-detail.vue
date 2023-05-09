<template>
  <div>
    <q-list class="text-primary" v-for="(item, index) in menus" :key="index">
      <q-item v-if="item.menu && item.parent_id == null && item.menu.link" clickable v-ripple
        :active="item.menu && link === item.menu.path" active-class="my-menu-link">
        <q-item-section avatar>
          <q-icon :name="item && item.menu ? item.menu.icon : ''" />
        </q-item-section>
        <q-item-section>{{ item && item.menu ? item.menu.name : "" }}</q-item-section>
      </q-item>

      <q-expansion-item v-if="item && item.childs.length > 0" icon="person" label="Management Account" color="primary"
        class="text-primary" v-model="open" >
        <q-item v-for="(item, index) in item.childs" v-show="item && item.menu" clickable v-ripple
          :active="item.menu && link === item.menu.path" active-class="my-menu-link" :key="index">
          <q-item-section avatar class="q-ml-md" v-if="item && item.menu">
            <q-icon :name="item ? item.menu.icon : ''" />
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
  props: ["menus"],
  data() {
    return {
      open: true,
    }
  },
}
</script>

<style lang="sass">
.my-menu-link
  color: white
  background: $primary
</style>
