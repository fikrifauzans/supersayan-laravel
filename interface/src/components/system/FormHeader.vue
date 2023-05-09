<template>
  <q-card flat :class="`fit bg-transparent`">
    <div class="row col-12">
      <div class="col-12 row">
        <div class="row justify-between col-12">
          <div class="text-bold text-h6 text-dark q-mb-md" v-if="title">
            <q-icon :name="icon != null ? icon : ''" /> {{ title ? title : "" }}
          </div>
          <div>
            <slot name="right" />
          </div>
        </div>
      </div>
      <div
        :class="
          disableShadow == ''
            ? 'col-12 content-form bg-white'
            : 'col-12 shadow-6 content-form bg-white'
        "
      >
        <div class="row q-mx-sm q-pa-md q-py-lg col-12">
          <slot />
        </div>
      </div>
    </div>
  </q-card>
</template>
<script>
export default {
  props: ["title", "col", "icon", "disableShadow"],
};
</script>
<style lang="scss">
.content-form {
  border-radius: 20px;
  padding: 10px;
}
</style>
