<template>
  <div class="row col-12" v-for="(value, key, index) in list" :key="index">
    <div class="col-4">{{ key.replace('_' , ' ') }}</div>
    <div class="col-1">:</div>
    <div class="text-bold col-7">{{ value }}</div>
  </div>
</template>
<script>
export default {
  name: "ListComponent",
  props: ["list"],
}
</script>
<style>

</style>
