<template>
  <q-file
    :name="name ? name : false"
    :class="`q-absolute_label col-12 col-sm-6 col-md-${col} q-px-xs q-mb-lg`"
    outlined
    :rules="required == '' ? [(val) => !!val || 'Field is required'] : false"
    :model-value="modelValue"
    :optionLabel="optionLabel"
    :required="required == ''"
    @update:model-value="(val) => $emit('update:modelValue', val)"
    dense
    :label="label"
    :stack-label="oldValue ? true : false"
  >
    <template v-slot:append>
      <q-btn
        v-if="!utils.hideOldValue && !modelValue && oldValue"
        icon="highlight_off"
        flat
        round
        rounded
        size="xs"
        color="negative"
        @click="this.utils.hideOldValue = !this.utils.hideOldValue"
      />
      <q-icon name="attach_file" />
    </template>
    <template v-slot:default v-if="!utils.hideOldValue && !modelValue && oldValue">
      <div class="text-inline col-12 q-pa-xs">{{ oldValue }}</div>
    </template>

    <!-- <div v-if="oldValue">{{ oldValue }}</div> -->
  </q-file>
</template>
<script>
export default {
  props: [
    "col",
    "label",
    "modelValue",
    "iconSize",
    "required",
    "type",
    "optionLabel",
    "oldValue",
    "name",
  ],
  async created() {},
  data() {
    return {
      utils: {
        hideOldValue: false,
      },
    };
  },
};
</script>
<style lang=""></style>
