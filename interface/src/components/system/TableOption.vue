<template>
  <q-td>
    
    <q-btn v-if="(Meta == undefined || Meta.ide_edit == undefined) && Meta.hide_edit != true && this.$Handle.checkPermission(Meta.module + '-update')" size="sm" flat
      color="primary" round icon="edit" @click="$emit('edit') " />
    <q-btn v-if="(Meta == undefined || Meta.ide_edit == undefined) && Meta.hide_show != true && this.$Handle.checkPermission(Meta.module + '-show')" size="sm" flat
      color="primary" round icon="visibility" @click="$emit('show')" />
  </q-td>
</template>
<script>
export default {
  props: ['Meta']
};
</script>
<style lang=""></style>
