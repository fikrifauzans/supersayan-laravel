<template>
  <q-file :name="name ? name : false" :class="`q-absolute_label col-12 col-sm-6 col-md-${col} q-px-xs q-mb-lg`" outlined
    :rules="required == '' ? [(val) => !!val || 'Field is required'] : false" :model-value="model"
    :optionLabel="optionLabel" :required="required == ''" @update:model-value="(val) => updateValue(val)" dense
    :label="label" :stack-label="oldValue ? true : false">
    <template v-slot:append>
      <q-btn v-if="existingFile == true || model != null" icon="highlight_off" flat round rounded size="xs"
        color="negative" @click="() => {
          status_file = 'delete'
          methodStatus = 'delete'
          existingFile = false
          model = null
          if (fullFile === '') {
            updateValue(model)

          } else {
            $emit('update:modelValue', null)
          }
        }" />

      <q-icon name="attach_file" />
    </template>
    <template v-slot:default v-if="status_file !== 'delete' && (modelValue && modelValue.name)">
      <div class="text-inline col-12 q-pa-xs">{{ fullFile === '' ? modelValue.name ?? oldValue : '' }}
      </div>
    </template>

  </q-file>
  <!-- {{ modelValue.name }} -->
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
    "description",
    "reference_id",
    "module",
    "raw",
    "fullFile",

  ],
  watch: {
    "modelValue": function (val) {
      if (val.name) this.existingFile = true
    }
  },

  data() {
    return {
      utils: { hideOldValue: false },
      status_file: 'update',
      methodStatus: null,
      model: null,
      existingFile: false
    };
  },
  methods: {
    updateValue(val) {
      this.model = val
      let methodStatus = ''
      console.log(this.modelValue);
      if (this.fullFile === '') {
        if (this.modelValue == undefined || this.modelValue == null && this.modelValue.id == undefined) {
          methodStatus = 'post'
        } else {
          methodStatus = 'update'
        }
        this.$emit('update:modelValue', {
          description: this.description,
          module: this.module ?? null,
          reference_id: this.reference_id ?? null,
          status_file: this.status_file ?? null,
          id: this.modelValue ? this.modelValue.id : null,
          method: methodStatus,
          description: this.description ?? null,
          file: val,
        })
      } else {
        this.$emit('update:modelValue', val)
      }
    }
  },

};
</script>
