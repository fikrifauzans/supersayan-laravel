<template>
  <div>
    <s-loading :load="loading" />
    <s-drawer @refresh="refresh" :useModal="useModal" form @submit="submit" @back="back" :Meta="Meta">
      <div class="q-px-md">
        <s-form class="q-px-md q-py-lg" title="Files">
          <!-- <t-input col="6" label="path" required v-model="model.path" />
          <t-input col="6" label="directory" required v-model="model.directory" /> -->
          <t-input col="6" label="desciption" v-model="model.description" />
          <t-file-image col="6" label="File" v-model="model.file" :oldValue="model.name" @deleteFile="() => {
            model.status_file = 'delete'
          }"  />
      
        </s-form>
      </div>
    </s-drawer>
  </div>
</template>

<script>
import Meta from "./meta";

export default {
  name: Meta.name + 'Form',
  props: ["modal", "id", "submitOnModal"],
  created() {
    this.$Handle.loadingStart();
    this.Meta.model = {};
    if (this.$route.params.id) this.param = this.$route.params.id ? this.$route.params.id : null;
    if (this.id) this.param = this.id ? this.id : null;
    if (this.modal && this.modal.add === true) this.useModal = true;
    if (this.modal && this.modal.edit === true) this.useModal = true;
    if (this.param !== null) this.findId(this.param);
    this.$Handle.loadingStop();
  },
  data() {
    return {
      Meta,
      useModal: false,
      model: Meta.model,
      loading: false,
      edit: false,
      param: null,
    };
  },

  watch: {
    submitOnModal: function (val) {
      if (val.isTrusted) this.submit();
    },
    model: {
      handler: function (val) { },
      deep: true,
    },
  },
  methods: {
    findId(id) {
      let endpoint = Meta.module + "/" + id;
      this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.model = data;
          this.$Handle.loadingStop();
        }
      });
    },
    async submit() {
      this.$Handle.loadingStart();
      this.model = this.$Handle.loopingForm(this.model);
      if (this.param !== null) await this.editData(this.param);
      else await this.postData(this.model);
    },
    editData(id) {
      let endpoint = this.Meta.module + "/" + id;
      this.$api.setMultipartForm();
      this.$api.post(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message);
          this.$Handle.loadingStop();
          this.back();
        }
      });
    },
    postData(model) {
      let endpoint = this.Meta.module;
      this.$api.setMultipartForm();
      this.$api.post(endpoint, model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message);
          this.$Handle.loadingStop();
          this.back();
        }
      });
    },
    back() {
      if (this.useModal == true) this.$emit("closeModal");
      else
        return this.$router.push({
          name: Meta.module,
          query: { ...this.$route.query },
        });
    },
  },
};
</script>
