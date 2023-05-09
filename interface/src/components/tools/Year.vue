<template >
  <div class="q-pa-md" style="max-width: 300px">
    <q-input :label="label" :dense="dense === false ? false : true" outlined :model-value="modelValue" :class="`q-absolute_label  col-12 col-sm-6 col-md-${col} q-px-xs ${required != '' ? 'q-mb-lg' : 'q-mb-sm'
    }`">
      <template v-slot:append>
        <q-icon name=" event" class="cursor-pointer">
          <q-popup-proxy cover transition-show="scale" ref="monthPicker" transition-hide="scale">
            <q-date default-view="Years" mask="YYYY"
              @update:model-value="(value, reason, details) => emitters(value, reason, details)"
              :model-value="modelValue" emit-immediately>
              <div class="row items-center justify-end">
                <q-btn v-close-popup label="Close" color="primary" flat />
              </div>
            </q-date>
          </q-popup-proxy>
        </q-icon>
      </template>
    </q-input>
  </div>
</template>
<script>
export default {
  name: "YearInputCompoenent",
  props: ['modelValue', 'label'],
  methods: {
    emitters(value, reason, details) {
      this.$emit('update:modelValue', value)
      this.$emit('onUpdate')
      if (reason === 'year') {
        this.$refs.monthPicker.hide()
      }
    },

  },
}
</script>
<style lang="">

</style>
