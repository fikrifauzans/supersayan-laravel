<template>
  <!-- eslint-disable  -->
  <div class="col-12">
    <q-list class="text-primary" v-for="(item, index) in menus" :key="index" v-show="menus">
      <div class="row col-12">

        <div class="column col-2 q-mt-xs q-pt-sm">
          <div class="q-gutter-xs text-center">
            <q-btn size="xs" round rounded flat icon="edit" :color="utils.ParentBtnSwap[index] ? 'orange-3' : 'orange'"
              @click="utils.ParentBtnSwap[index] = !utils.ParentBtnSwap[index]" />
            <q-btn flat size="xs" round rounded icon="delete" v-if="!utils.ParentBtnSwap[index]"
              :color="utils.ParentBtnSwap[index] ? 'negative' : 'negative'" @click="menus.splice(index, 1)" />

            <q-btn size="xs" round rounded icon="expand_less" color="primary"
              v-if="utils.ParentBtnSwap[index] && index > 0"
              @click="swapArray(menus, utils.ParentBtnSwap, index, index - 1)" />

            <q-btn size="xs" round rounded icon="keyboard_arrow_down" color="primary"
              v-if="utils.ParentBtnSwap[index] && menus.length != index + 1"
              @click="swapArray(menus, utils.ParentBtnSwap, index, index + 1)" />
          </div>
        </div>

        <div class="col-10">
          <q-expansion-item v-if="item.menu" :icon="item.menu.icon" :label="item.menu.name" color="primary"
            class="text-primary" v-model="utils.colapse" v-bind:item.sort="index" hide-expand-icon>
            <div class="row col-12 items-center" v-for="(child, i) in item.childs" :key="i">
              <div class="q-gutter-xs text-center col-3">
                <q-btn flat size="xs" round rounded icon="edit" :color="utils.ChildBtnSwap[i] ? 'orange-3' : 'orange'"
                  @click="utils.ChildBtnSwap[i] = !utils.ChildBtnSwap[i]" />
                <q-btn flat size="xs" round rounded icon="delete" v-if="!utils.ChildBtnSwap[i]"
                  :color="utils.ChildBtnSwap[i] ? 'negative' : 'negative'" @click="item.childs.splice(i, 1)" />
                <q-btn size="xs" round rounded icon="expand_less" color="primary" v-if="utils.ChildBtnSwap[i] && i > 0"
                  @click="swapArray(item.childs, utils.ChildBtnSwap, i, i - 1)" />
                <q-btn size="xs" round rounded icon="keyboard_arrow_down" color="primary"
                  v-if="utils.ChildBtnSwap[i] && item.childs.length != i + 1"
                  @click="swapArray(item.childs, utils.ChildBtnSwap, i, i + 1)" />
              </div>
              <div class="col-9">
                <q-item v-if="child && child.menu" v-bind:child.sort="i" clickable v-ripple
                  :active="child.menu && link === child.menu.path" active-class="my-menu-link">
                  <q-item-section avatar class="q-ml-md" v-if="child && child.menu">
                    <q-icon :name="child ? child.menu.icon : ''" />
                  </q-item-section>
                  <q-item-section>{{
                    child && child.menu ? child.menu.name : ""
                  }}</q-item-section>
                </q-item>
              </div>
            </div>
          </q-expansion-item>
        </div>
      </div>
    </q-list>
  </div>
</template>

<script>
import { ref } from "vue"

export default {
  name: "MenuComponent",
  setup() {
    return {
      link: ref("inbox"),
    }
  },
  props: ["menus"],
  created() { },

  data() {
    return {
      expansion: [],
      utils: {
        ParentBtnSwap: [],
        ChildBtnSwap: [],
        colapse: true,
      },
    }
  },

  methods: {
    swapArray(item, utils, first_index, seccond_index) {
      ;[item[first_index], item[seccond_index]] = [item[seccond_index], item[first_index]]
        ;[utils[first_index], utils[seccond_index]] = [
          utils[seccond_index],
          utils[first_index],
        ]
    },
  },
}
</script>

<style lang="sass">
.my-menu-link
  color: white
  background: $primary
</style>
