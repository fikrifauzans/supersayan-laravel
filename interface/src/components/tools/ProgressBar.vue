<template>
  <div class="col-12 row relative-position z-top">
    <div
      class="col-12 bg-primary absolute"
      style="height: 10px; border-radius: 20px; opacity: 0.3"
    ></div>
    <div
      class="bg-primary absolute"
      :style="`height: 10px; width: ${percent ? percent : '0'}%; border-radius: 20px`"
    ></div>
  </div>
</template>
<script>
export default {
  props: ["percent"],
};
</script>
<style lang=""></style>
