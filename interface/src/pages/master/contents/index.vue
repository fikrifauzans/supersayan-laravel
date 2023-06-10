
<template>
  <div>
    <s-loading :load='loading' />
    <s-drawer wrapCard @refresh='refresh' :Meta='Meta' :filter='filter' :table='table' v-model='filter.query'
      @update:modelValue='refresh'>
      <div class="q-pb-sm"></div>
      <q-tabs  v-model="tab" inline-label outside-arrows mobile-arrows class="bg-primary text-white shadow-2"
        style="border-radius:10px 10px 0 0">
        <q-tab v-if="$Handle.getLS('_user').role.slug == 'master'" label="All" :name="null" noCaps @click="getData()"  />
        <q-tab v-for="item in group" :key="item" :name="item.group" :label="item.group" noCaps @click="getData()" />
      </q-tabs>

      <q-table  virtual-scroll class='q-my-sm' :rows='table.rows' :columns='table.columns' row-key='id'
        selection='multiple' v-model:selected='table.selected' v-model:pagination='table.pagination'
        :style='$Static.table.height()' :dense='$Static.table.dense()' :flat='$Static.table.flat()'
        :color='$Static.table.color()' :rows-per-page-label='$Static.table.rowPerPageLabel()'
        :rows-per-page-options='$Static.table.rowPerPageOption()' :square='$Static.table.square()'
        :bordered='$Static.table.bordered()' binary-state-sort :visible-columns='table.visibleColumns' @request='getData'
        :loading='loading' :filter='table.search' :separator='$Static.table.separator()'>
        <template v-slot:top>
          <s-top-table :Meta='Meta' :table='table' v-model='table.search' @delete='daleteData' :trash='trash'
            @trash='setTrash' @restore='restoreData' @add='addData' @seachReset='table.search = null'
            @onFilter='setFilter' :filter='filter'></s-top-table>
        </template>
        <template v-slot:body-cell-id='props'>
          <q-td v-if='trash == true'> </q-td>
          <s-table-option v-else @show='detail(props.key)' @edit='edit(props.key)' :Meta='Meta' />
        </template>
        <template v-slot:body-cell-photo_id="props">
          <q-td>
            <q-img v-if="props && props.row && props.row.photo && props.row.photo.path" :src="$System.storageUrl(props.row.photo.name)"
              style="width:100px;height: 100px;" />
          </q-td>
        </template>
        <template v-slot:body-cell-details="props">
          <q-td>
            <div v-html="props.row.details">
            </div>
          </q-td>
        </template>
      </q-table>

      <t-modal v-model='modal' @submit='submit'>
        <FormModal v-if="modalType == 'form'" :modal='useModal' :id='id' :submitOnModal='submitOnModal'
          @closeModal='modal = !modal' @refresh='refresh' />
        <Detail v-else :modal='useModal' :id='id' />
      </t-modal>
    </s-drawer>
  </div>
</template>
<script>
import { ref } from 'vue'
import Meta from './meta'
import FormModal from './form'
import Detail from './detail'
export default {
  name: Meta.name,
  components: {
    FormModal,
    Detail,
  },
  data() {
    return {
      Meta,
      id: null,
      table: Meta.table,
      useModal: Meta.formType,
      loading: false,
      modal: false,
      trash: false,
      modalType: '',
      submitOnModal: null,
      filter: {
        value: false,
        query: null,
      },
      tab: null,
      group: []
    }
  },
  created() {
    console.log(this.$route.query.tab);
    this.table = this.$Handle.structureTable(
      this.table.columns(this.$route.query.tab)
    )

    this.getContentsGroup()
    if (this.$route.query.tab) this.tab = this.$route.query.tab
    if (this.$route.query.trash) this.trash = JSON.parse(this.$route.query.trash)
    if (this.$route.query.search) this.trash = JSON.parse(this.$route.query.search)
    if (this.$route.query.page) this.table.pagination = { ...this.$route.query }
    this.refresh()
  },
  methods: {
    refresh() {
      this.getData()
    },
    getData(props) {
      this.loading = true
      if (props) this.table.pagination = props.pagination
      let { page, rowsPerPage, sortBy, descending } = { ...this.table.pagination }
      let endpoint = this.Meta.module + '?table='
      if (this.tab) endpoint += '&where=group:' + this.tab
      endpoint += '&like=' + this.$Help.transformQuery(this.filter.query)
      endpoint += this.trash ? '&trash=true' : ''
      endpoint += '&page=' + page
      endpoint += '&limit=' + rowsPerPage
      endpoint += '&order=' + this.$Handle.transformDesc(sortBy, descending)
      if (this.table.search) endpoint += '&search=' + this.table.search
      this.$api.get(
        endpoint,
        (data, status, message, full) => {
          if (status == 200) {
            this.table.rows = data.data.filter((val) =>
              this.trash && this.table.search ? val.deleted_at !== null : val
            )
            this.table.pagination.rowsNumber = this.table.search
              ? this.table.rows.length
              : data.total
            this.table.pagination.page = data.current_page
            this.table.pagination.rowsPerPage = data.per_page
            this.loading = false
            this.table.columns = this.Meta.table.columns(this.tab)
          }
        },
        (e) => { }
      )
      this.$router.replace({
        query: { ...this.table.pagination, seach: this.table.search, trash: this.trash, tab: this.tab },
      })
      // this.table = this.$Handle.structureTable(
      //   this.table.columns(this.$route.query.tab)
      // )
    },
    async daleteData() {
      this.loading = true
      await this.table.selected.forEach((val) => {
        let endpoint = this.Meta.module
        endpoint += this.trash == true ? '/force/' : '/'
        endpoint += val.id
        this.$api.delete(endpoint, (data, status, message, full) => {
          this.$Handle.successMessage(message)
          this.table.selected = []
          this.refresh()
        })
      })
    },
    async restoreData() {
      this.loading = true
      await this.table.selected.forEach((val) => {
        let endpoint = this.Meta.module
        endpoint += '/restore/'
        endpoint += val.id
        this.$api.put(endpoint, val, (data, status, message, full) => {
          this.$Handle.successMessage(message)
          this.table.selected = []
          this.refresh()
        })
      })
    },
    setTrash() {
      this.trash = JSON.parse(this.trash)
      this.trash = !this.trash
      this.table.selected = []
      this.table.search = null
      this.table.pagination.page = 1
      this.table.pagination.rowsNumber = 1

      this.refresh()
    },
    detail(id) {
      this.id = id
      this.modalType = 'detail'
      if (this.useModal.show === true) {
        this.modal = true
      } else {
        this.$router.push({
          params: { id },
          name: 'view-' + this.Meta.module,
          query: { ...this.$route.query },
        })
      }
    },
    edit(id) {
      this.modalType = 'form'
      if (this.useModal.edit === true) {
        this.modal = true
        this.id = id
      } else {
        this.$router.push({
          params: { id },
          name: 'edit-' + this.Meta.module,
          query: { ...this.$route.query },
        })
      }
    },
    addData() {
      this.modalType = 'form'
      if (this.useModal.add === true) {
        this.modal = true
      } else {
        this.$router.push({
          name: 'add-' + this.Meta.module,
          query: { ...this.$route.query },
        })
      }
    },
    submit(evt) {
      this.$Handle.loadingStart()
      this.submitOnModal = evt
      this.refresh()
    },
    setFilter() {
      this.filter.value = true
      // this.left = !this.left
    },
    async getContentsGroup() {
      await this.$api.get(this.Meta.module + '/filter/group', (data, status) => {
        if (status == 200) {
          this.group = data
        }
      }, (e) => { })
    }
  },
}
</script>

