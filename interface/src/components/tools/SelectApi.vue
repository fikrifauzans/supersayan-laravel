<template>
  <div
    :class="`col-12 col-sm-6 col-md-${col} q-px-xs ${
      required != '' ? 'q-mb-sm' : 'q-mb-sm'
    }`"
  >
    <!-- <div class="q-mb-sm q-mx-sm">{{ topLabel }}</div> -->

    <q-select
      v-if="multiple == undefined"
      outlined
      dense
      @update:model-value="(val) => updateValue(val)"
      :model-value="model"
      :option-label="optionLabel ? optionLabel : 'name'"
      :option-value="optionValue ? optionValue : val"
      use-input
      :use-chips="multiple === '' ? true : false"
      input-debounce="0"
      map-options
      :emit-value="true"
      :label="label"
      :options="options"
      @filter="filterFn"
      :required="required === ''"
      :rules="
        required === '' ? [(model) => !!model || 'Field is required'] : false
      "
      @filter-abort="abortFilterFn"
      :class="`q-absolute_label`"
    >
      <template v-slot:append>
        <q-btn
          v-if="modelValue != null"
          icon="close"
          size="xs"
          flat
          round
          rounded
          @click="
            (val) => {
              model = null;
              $emit('update:modelValue', null);
              $emit('updateEvent', null);
            }
          "
        />
      </template>
      <template v-slot:no-option>
        <q-item>
          <q-item-section class="text-grey"> No results </q-item-section>
        </q-item>
      </template>
    </q-select>
    <q-select
      v-else
      outlined
      dense
      @update:model-value="(val) => $emit('update:modelValue', val)"
      :model-value="modelValue"
      :option-label="optionLabel ? optionLabel : 'name'"
      :option-value="optionValue ? optionValue : val"
      use-input
      :use-chips="useChip === '' ? true : false"
      input-debounce="0"
      map-options
      :emit-value="true"
      :label="label"
      :options="options"
      @filter="filterFn"
      :required="required == ''"
      :rules="required == '' ? [(val) => !!val || 'Field is required'] : false"
      @filter-abort="abortFilterFn"
      multiple
      :class="`q-absolute_label`"
    >
      <template v-slot:append>
        <q-btn
          v-if="modelValue != null"
          icon="close"
          size="xs"
          flat
          round
          rounded
          @click="
            (val) => {
              this.$emit('update:modelValue', []);
            }
          "
        />
      </template>
      <template v-slot:no-option>
        <q-item>
          <q-item-section class="text-grey"> No results </q-item-section>
        </q-item>
      </template>
    </q-select>
  </div>
</template>

<script>
export default {
  watch: {
    modelValue: async function (val) {

      if (val != null && this.multiple == undefined)
        await this.returnDefaultData(val);
      if (this.multiple === "") this.model = val;
    },
  },
  data() {
    return {
      model: null,
      options: null,
      multipleValue: [],
    };
  },
  props: [
    "api",
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
    "select",
    "topLabel",
  ],
  methods: {
    filterFn(val, update, abort) {
      let endpoint = this.api;
      endpoint += "?table=";
      endpoint += "&limit=0";
      if (!this.select && this.select != undefined)
        endpoint += `&select=id,name`;
      else if (this.full == undefined && this.select != undefined)
        endpoint += `?&select=${this.select.join(",")}`;
      if (val != "")
        endpoint += `&like=${this.field ? this.field : "name"}:${val}`;
      if (this.search == "" && val != "") endpoint += "&search=" + val;
      this.$api.get(
        endpoint,
        (data, status, message, full) => {
          if (status == 200)
            update(() => {
              this.options = data.data;
            });
        },
        (e) => {}
      );
    },

    updateValue(val) {
      if (this.multiple == undefined) {
        this.$emit("update:modelValue", val);
        this.$emit("updateEvent", val);
      } else {
        this.multipleValue.push(val[val.length - 1]);
        this.model = this.multipleValue;
        this.$emit("update:modelValue", this.model);
      }
    },

    async returnDefaultData(val) {
      console.log(val);
      if (typeof val == "object") return false;
      let endpoint = this.api;
       endpoint += "?table=";
      let requestEndpoint = this.checkHasFirstRequest(endpoint);
      if (this.optionValue != null)
        endpoint += `${requestEndpoint}where=${this.optionValue}:${val}`;
      else endpoint += `${requestEndpoint}where=id:${val}`;
      if (!this.select && this.full == undefined) endpoint += `&select=id,name`;
      else if (this.full == undefined)
        endpoint += `&select=${this.select.join(",")}`;
      if (this.search == "") endpoint += "&search=" + val;
      await this.$api.get(endpoint, async (data, status, message, full) => {
        if (status < 400) {
          const index = await data.data;
          if (index[0]) {
            if (this.multiple == undefined) this.model = index[0];
            this.$emit("updateEvent", this.model ?? null);
            if (this.full === "") this.$emit("update:modelValue", index[0]);
            else this.$emit("update:modelValue", index[0][this.optionValue]);
          }
        }
      });
    },

    checkHasFirstRequest(endpoint) {
      if (endpoint.split("?").length > 1) return "&";
      else return "?";
    },
  },
};
</script>
