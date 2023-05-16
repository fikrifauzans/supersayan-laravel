<template>
  <div class="col-12 row q-mb-md">
    <div class="row col-12 justify-between items-start">
      <div class="row">
        <q-item class="q-pa-none text-dark" color="primary" v-ripple>
          <q-item-section>
            <!-- <q-item-label caption>{{ Meta ? Meta.module_name : "" }}</q-item-label> -->
            <q-item-label class="text-h6 text-bold q-mt-sm">Tabel {{
              title ? title : Meta ?
              Meta.name : ""
            }}
            </q-item-label>
            <div>
              <slot name="description" />
              <div class="top-table-description">
              {{  description ? description : Meta ?
              Meta.description : ""}}
              </div>
            </div>
            <div class="row items-center">
              <!-- Add  -->
              <div class="q-mt-md">
                <t-button v-if="!Meta.hide_add &&
                    this.$Handle.checkPermission(Meta.module + '-store')
                    " :label="$q.screen.lt.md ? null : `Tambah ${Meta.name}`" size="md"  icon="add"
                  active="true"  @click="$emit('add')" />
              </div>
            </div>
          </q-item-section>
        </q-item>
        <div class="q-ml-md">
          <q-btn
            v-if="trash && table && table.selected.length > 0 && this.$Handle.checkPermission(Meta.module + '-restore')"
            icon="settings_backup_restore" size="sm" rounded round class="bg-grey q-mt-sm text-white q-mr-xs"
            @click="modalConfirm.restore = !modalConfirm.restore">
            <q-tooltip> Restore </q-tooltip>
          </q-btn>
          <!-- DELETE  -->
          <q-btn
            v-if="!Meta.hide_delete && table && table.selected.length > 0 && this.$Handle.checkPermission(Meta.module + '-destroy')"
            icon="delete" size="sm" rounded round class="bg-negative q-mt-sm text-white"
            @click="modalConfirm.delete = !modalConfirm.delete">
            <q-tooltip v-if="trash == false"> Delete </q-tooltip>
            <q-tooltip v-else> Permanent Delete </q-tooltip>
          </q-btn>
        </div>
      </div>


      <div class=" row items-center justify-between q-mt-sm">

        <div class="row items-center">
          <!-- SEARCH TABLE  -->
          <div class=" ">
            <q-btn-dropdown color="dark" size="md"  flat icon="img:images/icons/settings.svg" menu-anchor="top left">
              <div class="row q-pa-xs q-gutter-sm">
                <!-- TRASH -->
                <div>
                  <q-btn v-if="this.$Handle.checkPermission(Meta.module + '-bin')" icon="recycling" :class="trash == true
                    ? 'bg-grey- text-primary '
                    : 'bg-primary text-white '
                    " @click="getTrash" size="sm" rounded flat round>
                    <q-tooltip> Recycle Bin </q-tooltip>
                  </q-btn>
                </div>

                <!-- EXPORT  -->
                <q-btn v-if="this.$Handle.checkPermission(Meta.module + '-csv')" color="dark" round flat size="sm" rounded
                  icon="archive" no-caps @click="$Handle.exportTable(table.columns, table.rows)">
                  <q-tooltip> Export CSV </q-tooltip>
                </q-btn>
                <div>
                  <q-btn icon="tune" :class="filter && $Help.transformQuery(filter.query)
                    ? 'bg-white text-grey   '
                    : 'bg-white text-dark   '
                    " @click="$emit('onFilter')" flat size="sm" rounded round square style="border-radius: 15px">
                    <q-tooltip> Filter</q-tooltip>
                  </q-btn>
                </div>
              </div>
            </q-btn-dropdown>
          </div>

          <q-input outlined :model-value="modelValue" @keyup.prevent="handleKeypress" @update:modelValue="(val) => {
            $emit('update:modelValue', val);
            $emit('refresh');
          }
            " label="Search Table" dense class="q-absolute_label q-ml-sm">
            <template v-slot:append>
              <div>
                <q-btn icon="cancel" flat v-if="modelValue != null" @click="seachReset" class="q-pa-xs" size="md"
                  rounded />
                <q-icon name="search" v-else />
              </div>
            </template>
          </q-input>
        </div>
      </div>
    </div>

    <div class=" row col-12 justify-between items-center">
      <!-- MODAL CONFIRM DELETE -->
      <q-dialog v-model="modalConfirm.delete">
        <q-card style="width: 300px">
          <q-card-section>
            <div class="text-h6">
              {{ trash == true ? "Delete Permanent" : "Delete Data" }}
            </div>
          </q-card-section>
          <q-card-section class="q-pt-none" v-if="trash == false">
            are you sure you want to delete the data ?
          </q-card-section>
          <q-card-section class="q-pt-none" v-else>
            are you sure you want to delete the data permanently ?
          </q-card-section>
          <q-card-actions align="right" class="bg-white text-teal">
            <q-btn v-if="table && table.selected.length > 0" label="Delete" size="md" rounded square flat
              class="q-ma-xs q-px-lg bg-negative text-white" @click="deleteTirgger" />
            <q-btn v-if="table && table.selected.length > 0" label="Cancel" size="md" rounded square flat
              class="q-ma-xs q-px-lg bg-grey text-white" v-close-popup />
          </q-card-actions>
        </q-card>
      </q-dialog>
      <q-dialog v-model="modalConfirm.restore">
        <q-card style="width: 300px">
          <q-card-section>
            <div class="text-h6">Restore Data</div>
          </q-card-section>
          <q-card-section class="q-pt-none">
            are you sure you want to restore the data ?
          </q-card-section>
          <q-card-actions align="right" class="bg-white text-teal">
            <q-btn v-if="table && table.selected.length > 0" label="Restore" size="md" rounded square flat
              class="q-ma-xs q-px-lg bg-warning text-white" @click="restoreTrigger" />
            <q-btn v-if="table && table.selected.length > 0" label="Cancel" size="md" rounded square flat
              class="q-ma-xs q-px-lg bg-grey text-white" v-close-popup />
          </q-card-actions>
        </q-card>
      </q-dialog>
    </div>

  </div>
</template>
<script>
export default {
  props: ["trash", "modelValue", "table", "filter", "Meta", "title"],
  created() {
  },
  data() {
    return {
      modalConfirm: { delete: false, restore: false },
    };
  },
  methods: {
    deleteTirgger() {
      this.modalConfirm.delete = false;
      this.$emit("delete");
    },
    restoreTrigger() {
      this.modalConfirm.restore = false;
      this.$emit("restore");
    },
    getTrash() {
      this.$emit("trash");
    },
    seachReset() {
      this.$emit("seachReset");
    },
    handleKeypress(event) {
      event.preventDefault();
    },
  },
};
</script>
