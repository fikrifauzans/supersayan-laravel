<template>
  <div :class="col ? 'q-px-sm col-12 col-md-6 col-lg-' + col : ''">
    <q-select outlined dense use-input fill-input input-debounce="0" map-options
      :label="required === '' ? label + ' *' : label" :options="select.options"
      @filter="(val, update) => filterSelect(val, update)" :option-value="optionValue ? optionValue : 'id'"
      :option-label="optionLabel ? optionLabel : searchField" :emit-value="raw === '' ? false : true"
      :clearable="multiple === undefined ? true : false" :multiple="multiple === '' ? true : false"
      :use-chips="multiple === '' ? true : false" :hide-selected="multiple === '' ? false : true"
      :class="className ? className : ''" :style="styles ? styles : ''" :modelValue="modelValue"
      @update:modelValue="emiters($event)" lazy-rules :rules="
        required === ''
          ? [
            (val) =>
              (val !== null && val !== '') || label + ' must be filled!',
          ]
          : rules
            ? rules
            : [(val) => val !== ' ' || 'clear space!']
      " :readonly="readonly === '' ? true : false" :placeholder="placeholder ? placeholder : ''">
      <template v-slot:no-option>
        <q-item>
          <q-item-section class="text-grey">
            No results
          </q-item-section>
        </q-item>
      </template>

      <template v-if="bottomhints" v-slot:hint>
        {{ bottomhints }}
      </template>
    </q-select>
  </div>
</template>

<script>
export default {
  name: 'FormSelectServerside',
  emits: ['update:modelValue', 'updateEvent'],
  props: [
    'col',
    'className',
    'styles',
    'label',
    'modelValue',
    'placeholder',
    'readonly',
    'rules',
    'required',
    'bottomhints',
    'hintcolor',
    'inline',
    'options',
    'optionValue',
    'optionLabel',
    'multiple',
    'raw',
    'defaultData',
    'getPartially',
    'api',
    'apiField',
    'apiFields',

    'limit',
  ],
  data() {
    return {
      noOption: [{ id: '', name: 'Select List' }],
      select: {
        options: [],
        optionsTmp: [], // need for base when use filter search
      },
    };
  },
  created() {
    if (this.options !== undefined) {
      this.select.options = this.options;
      this.select.optionsTmp = this.options;
    } else {
      this.select.options = this.noOption;
      this.select.optionsTmp = this.noOption;
    }
  },
  mounted() {
    this.getFirstValue();
  },
  computed: {
    searchField() {
      var col = 'name';
      if (
        this.optionLabel !== undefined &&
        typeof this.optionLabel !== 'function'
      )
        col = this.optionLabel;
      return col;
    },

    defaultApiField() {
      var col = 'name';
      if (this.apiField) col = this.apiField;
      return col;
    },

    selectList: {
      // untuk tampung options agar reactive
      // getter
      get: function () {
        var res = [];
        if (this.options !== undefined) res = this.options;
        return res;
      },
      // setter
      set: function (newValue) {
        console.log('newValue', newValue);
        this.select.options = newValue;
      },
    },

    selectListTmp() {
      var res = [];
      if (this.options !== undefined) res = this.options;
      return res;
    },
  },

  watch: {
    defaultData() {
      this.setOptions(this.select.options, this.value);
    },
  },

  methods: {
    setOptions(data) {
      let select = data;
      if (
        this.defaultData &&
        this.value === this.defaultData.id &&
        !data.find((r) => r.id === this.defaultData.id)
      ) {
        select = [this.defaultData, ...select];
      }
      this.select.options = select;
    },

    emiters(e) {
      this.$emit('update:modelValue', e);
      this.$emit('updateEvent', e);
    },

    getFirstValue() {
      let fields = this.defaultApiField;
      if (this.apiFields) fields = this.apiFields.toString();
      fields += this.optionValue ? `,${this.optionValue}` : '';

      const defWhere = this.optionValue ? this.optionValue : 'id';

      let endpoint = `${this.api}`;
      if (endpoint.indexOf('?') > -1) endpoint += '&';
      else endpoint += '?';
      endpoint += 'select=id,' + fields;
      if (
        this.modelValue !== undefined &&
        this.modelValue !== '' &&
        this.modelValue !== null &&
        Array.isArray(this.modelValue) === false
      )
        endpoint += '&where=' + defWhere + ':' + this.modelValue;
      else endpoint += `&limit=${this.limit ? this.limit : '0'}`;

      this.$api.get(endpoint, (status, data) => {
        if (status === 200) {
          var targetSource = 'options';
          var tmpName = targetSource + 'Tmp';

          this.select[targetSource] = data;
          this.select[tmpName] = data;
        }
      });
    },

    filterSelect(val, update) {
      let fields = this.defaultApiField;
      if (this.apiFields) fields = this.apiFields.toString();

      let endpoint = `${this.api}`;
      if (endpoint.indexOf('?') > -1) endpoint += '&';
      else endpoint += '?';
      endpoint += 'select=id,' + fields;

      if (val != '') {
        endpoint += `&limit=${this.limit ? this.limit : '0'}`;
        endpoint += `&s=${val}`;
      } else {
        if (this.getPartially !== '')
          endpoint += `&limit=${this.limit ? this.limit : '0'}`;
      }

      this.$api.get(endpoint, async (status, data) => {
        if (status === 200) {
          if (update) {
            await update(() => this.setOptions(data, val));
          } else {
            this.setOptions(data, val);
          }
        }
      });
    },
  },
};
</script>
