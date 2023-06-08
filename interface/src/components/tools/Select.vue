<template>
  <q-select outlined dense @clear="copyObject" :stack-label="modelValue != null ? true : false"
    @update:model-value="(val) => updateValue(val)" :model-value="modelValue" :option-label="optionLabel ?? oldValue"
    :optionValue="optionValue ? optionValue : 'id'" :multiple="multiple == ''" use-input
    :use-chips="multiple == '' ? true : false" map-options :emit-value="full == '' ? false : true" input-debounce="0"
    :label="label" :options="stringOptions" @filter="filterFn"
    :rules="required == '' ? [(val) => !!val || 'Field is required'] : false" :class="`q-absolute_label  col-12 col-sm-6 col-md-${col} q-px-xs ${required != '' ? 'q-mb-md' : ''
      }`" :required="required == ''">
    <template v-slot:no-option>
      <q-item>
        <q-item-section class="text-grey"> No results </q-item-section>
      </q-item>
    </template>
  </q-select>
</template>

<script>
import { ref } from "vue";

export default {
  name: "SelectComponent",

  created() { },
  data() {
    return {
      model: ref(null),
      firstValue: null,
      stringOptions: null,
    };
  },
  props: [
    "api",
    "optionValue",
    "filterField",
    "modelValue",
    "optionLabel",
    "full",
    "col",
    "label",
    "option",
    "raw",
    "multiple",
    "required",
    "oldValue",
  ],
  methods: {
    filterFn(val, update, abort) {
      this.copyObject();
      update(() => {
        console.log(this.stringOptions);
        const needle = val.toLowerCase();
        this.stringOptions = this.stringOptions.filter((v, i) => {
          v = this.$Help.transformField(v, this.filterField);
          return v.toString().toLowerCase().indexOf(needle) > -1;
        });
      });
      // }
    },

    updateValue(val) {
      this.$emit("update:modelValue", val);
      this.$emit('updateEvent', val)
    },

    abortFilterFn() {
      console.log("delayed filter aborted");
    },
    copyObject() {
      this.stringOptions = this.option;
    },
    // getOption() {
    //   console.log(this.options)
    //   console.log(this.stringOptions)
    //   this.options = this.stringOptions
    // },
  },
};
</script>
