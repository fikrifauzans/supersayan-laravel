<template>
  <div class="col-12 row">
    <s-loading :load="loading" />
    <s-drawer @refresh="refresh" :useModal="useModal" form @submit="submit" @back="back" :Meta="Meta">
      <div class="col-12 row q-mt-md">
        <div class="col-6">
          <s-form title="Roles" class="q-px-md">
            <t-input col="12" label="name" required v-model="model.name" />
            <t-input col="12" label="slug" required v-model="model.slug" />
            <t-select-api col="12" api="master-menus" v-model="model.master_menu_id" optionValue="id" :optionLabel="(val) => (val ? val.name ?? model.master_menu.name : '')
              " label="Master Menu" />
          </s-form>
        </div>

        <div class="col-6" style="height: 100%">
          <s-form class="q-px-md" title="Permissions Access">
            <PermissionsTable  v-if="model.permission_access" class="col-12" :permissions="model.permission_access" v-model="model.permission_access" />
          </s-form>

          <!-- {{ model }} -->
        </div>
      </div>
    </s-drawer>
  </div>
</template>

<script>
import Meta from "./meta";
import PermissionsTable from "./component/PermissionsTable";

export default {
  name: Meta.name + 'Form',
  props: ["modal", "id", "submitOnModal"],
  components: {
    PermissionsTable,
  },
  created() {
    this.$Handle.loadingStart();
    this.Meta.model = {};
    if (this.$route.params.id) {
      this.param = this.$route.params.id ? this.$route.params.id : null;
    }
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
      showPermission: false
    };
  },

  watch: {
    submitOnModal: function (val) {
      if (val.isTrusted) this.submit();
    },
  },
  methods: {
    findId(id) {
      let endpoint = Meta.module + "/" + id;
      this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.model = data;
          this.showPermission = true
          this.$Handle.loadingStop();
        }
      });
    },
    async submit() {
      this.$Handle.loadingStart();
      if (this.param !== null) await this.editData(this.param);
      else await this.postData(this.model);
    },
    editData(id) {
      let endpoint = this.Meta.module + "/" + id;
      this.$api.put(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message);
          this.$Handle.loadingStop();
          this.back();
        }
      });
    },
    postData(model) {
      let endpoint = this.Meta.module;
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
