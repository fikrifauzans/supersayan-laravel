<template>
  <q-select outlined dense @update:model-value="(val) => updateValue(val)" :model-value="modelValue"
    :option-label="optionLabel ? optionLabel : 'name'" :option-value="optionValue ? optionValue : 'id'"
    :multiple="multiple == ''" use-input :use-chips="useChip == '' ? useChip : false" input-debounce="0" map-options
    :emit-value="full == '' ? false : true" :label="label" :options="options" @filter="filterFn"
    :required="required == ''" :rules="required == '' ? [(val) => !!val || 'Field is required'] : false"
    @filter-abort="abortFilterFn" :class="`q-absolute_label  col-12 col-sm-6 col-md-${col} q-px-xs ${
      required != '' ? 'q-mb-lg' : 'q-mb-sm'
    }`">
    <template v-slot:append>
      <q-btn v-if="modelValue != null" icon="close"  size="xs" flat round rounded  @click="val => $emit('update:modelValue' , null)"  />
    </template>
    <template v-slot:no-option>
      <q-item>
        <q-item-section class="text-grey"> No results </q-item-section>
      </q-item>
    </template>
  </q-select>
</template>

<script>
import { ref } from "vue"

export default {
  data() {
    return {
      model: ref(null),
      options: null,
    }
  },
  props: [
    "api",
    "field",
    "optionValue",
    "optionLabel",
    "modelValue",
    "required",
    "col",
    "label",
    "full",
    "useChip",
    "multiple",
    "search",
  ],
  methods: {
    filterFn(val, update, abort) {
      let endpoint = this.api
      if (val != "") endpoint += `&like=${this.field ? this.field : "name"}:${val}`
      if (this.search == "" && val != "") endpoint += "&search=" + val
      this.$api.get(
        endpoint,
        (data, status, message, full) => {
          if (status == 200) {
            update(() => {
              this.options = data.data
            })
          }
        },
        (e) => { }
      )
    },

    updateValue(val) {
      this.$emit("update:modelValue", val)
      this.$emit('updateEvent', val)
    },

    abortFilterFn() {
      // console.log("delayed filter aborted")
    },
  },
}
</script>
