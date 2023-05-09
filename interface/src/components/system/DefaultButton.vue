<template>
  <q-btn
    v-if="type == '1' && reverse != ''"
    :label="label"
    color="primary"
    style="border-radius: 10px"
    no-caps
    :icon="icon"
    :class="`col-${col}`"
    @click="$emit('click')"
  />
  <q-btn
    v-if="type == '1' && reverse == ''"
    :label="label"
    color="primary"
    style="border-radius: 10px"
    no-caps
    outline
    :icon="icon"
    @click="$emit('click')"
    :class="`col-${col} bg-white`"
  />
</template>
<script>
export default {
  props: ["type", "label", "icon", "reverse", "col"],
};
</script>
<style lang=""></style>
