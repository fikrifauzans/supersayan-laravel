<template>
  <div>

    <s-loading :load="loading" />
    <s-drawer @refresh="refresh" :filter="filter" @update:modelValue="refresh" height="120px">
      <div class="col-12 row">
        <div class="text-h4 col-12 q-pa-md text-primary text-bold">Form Type</div>
        <div class="col-6">
          <s-form title="String" class="q-pa-md">
            <!-- --------------------------------------------------------------STRING  -->
            <t-input col="12" label="string" r-icon="person" required v-model="model.string" />
            <t-input col="12" label="Textarea" r-icon="person" required type="textarea" v-model="model.string" />
            <t-text-editor col="12" label="Textarea" r-icon="person" required type="textarea" v-model="model.string" />
            <!-- ---------------------------------------------------------------------------->

            <div class="col-12 q-pa-lg">string : {{ model.string }}</div>
          </s-form>
        </div>

        <div class="col-6">
          <s-form title="Number" class="q-pa-md">
            <!-- //------------------------------------------------------------NUMBER  -->
            <t-input col="12" label="number" required number v-model="model.number" />
            <!-- ---------------------------------------------------------------------------->

            <div class="col-12 q-pa-lg">number : {{ model.number }}</div>
          </s-form>
        </div>

        <div class="col-6">
          <s-form title="Select" class="q-pa-md">
            <!-- --------------------------------------------------------------SELECT  -->
            <t-select col="12" label="select" required optionValue="kelas" filterField="name" v-model="model.select"
              :option="[
                { name: 'Fikri Fauzan', kelas: 'MIPA 3' },
                { name: 'Milla Maulany', kelas: 'MIPA 5' },
              ]" :optionLabel="(val) => (val == '' ? oldVal : val.name)" />
            <!-- ---------------------------------------------------------------------------->

            <div class="col-12 q-pa-lg">Select : {{ model.select }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="Select API" class="q-pa-md">
            <!-- --------------------------------------------------------------SELECT API  -->
            <t-select-api col="12" api="roles" v-model="model.select_api" optionValue="id" optionLabel="name"
              label="Select API" />
            <!-- ---------------------------------------------------------------------------->

            <div class="col-12 q-pa-lg">Select Api : {{ model.select_api }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="Select Object API" class="q-pa-md">
            <!-- --------------------------------------------------------------SELECT API  -->
            <t-select-api col="12" api="menus" v-model="model.select_api_all" optionValue="id" optionLabel="name" full
              label="Select API" />
            <!-- ---------------------------------------------------------------------------->

            <div class="col-12 q-pa-lg">Select Object Api : {{ model.select_api_all }}</div>
          </s-form>
        </div>

        <div class="col-6">
          <s-form title="Select Object" class="q-pa-md">
            <!---------------------------------------------------------------SELECT OBJECT  -->
            <t-select col="12" label="Select Object" required filterField="name" v-model="model.select_all" :option="[
              { name: 'Fikri Fauzan', kelas: 'MIPA 3' },
              { name: 'Milla Maulany', kelas: 'MIPA 5' },
            ]" :optionLabel="(val) => (val ? val.name : oldVal)" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">Select All: {{ model.select_all }}</div>
          </s-form>
        </div>

        <div class="col-6">
          <s-form title="Date Time" class="q-pa-md">
            <!---------------------------------------------------------------SELECT OBJECT  -->
            <t-datetime v-model="model.dateTime" col="12" dateTime label="DateTime" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">DateTime: {{ model.dateTime }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="Only Time" class="q-pa-md">
            <!---------------------------------------------------------------SELECT OBJECT  -->
            <t-datetime v-model="model.dateTime" col="12" onlyTime label="onlyTime" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">onlyTime: {{ model.dateTime }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="Only Date" class="q-pa-md">
            <!---------------------------------------------------------------ONLYDATE  -->
            <t-datetime v-model="model.onlyDate" col="12" label="Date" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">OnlyDate: {{ model.onlyDate }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="File Upload" class="q-pa-md">
            <!---------------------------------------------------------------ONLYDATE  -->
            <t-file-image col="12" label="File" v-model="model.upload_file" :oldValue="oldVal" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">Files: {{ model.upload_file }}</div>
          </s-form>
        </div>
        <div class="col-6">
          <s-form title="Currency" class="q-pa-md">
            <!---------------------------------------------------------------ONLYDATE  -->
            <t-currency col="12" label="Currency" currency v-model="model.currency" />
            <!-- ---------------------------------------------------------------------------->
            <div class="col-12 q-pa-lg">Currency: {{ model.currency }}</div>
          </s-form>

        </div>
        <div class="col-6">
          <s-form title="Tab" class="q-pa-md">
            <!-- TAB  -->
            <t-tab :options="tabOption" v-model="model.tab" />
            {{ model.tab }}
          </s-form>
        </div>
      </div>
    </s-drawer>

  </div>
</template>
<script>
export default {
  name: "FormDocs",
  components: {},
  data() {
    return {
      model: {
        string: "",
        number: 0,
        select: "",
        select_all: "",
        dateTime: "",
        onlyDate: "",
        tab: 1,
      },

      oldVal: "relation value",
      tabOption: [
        { label: ' Button 1', value: 1 },
        { label: ' Button 2', value: 2 }
      ]
    };
  },
  created() { },
};
</script>
