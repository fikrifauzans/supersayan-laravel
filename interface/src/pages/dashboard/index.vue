<template>

  <s-loading :load="loading" />
  <s-drawer @refresh="refresh" :Meta="Meta" :filter="filter" :table="table" v-model="filter.query"
    @update:modelValue="refresh">
    kosong
  </s-drawer>
</template>
<script>

import Meta from "./meta"

export default {
  name: 'DashBoard',
  components: {

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
      modalType: "",
      submitOnModal: null,
      filter: {
        value: false,
        query: null,
      },
    }
  },
  created() {

  },
  methods: {
    refresh() {
      this.getData()
    },
    getData(props) {
      this.loading = true
      if (props) this.table.pagination = props.pagination
      let { page, rowsPerPage, sortBy, descending } = { ...this.table.pagination }
      let endpoint = this.Meta.module + "?table="
      endpoint += "&like=" + this.$Help.transformQuery(this.filter.query)
      endpoint += this.trash ? "&trash=true" : ""
      endpoint += "&page=" + page
      endpoint += "&limit=" + rowsPerPage
      endpoint += "&order=" + this.$Handle.transformDesc(sortBy, descending)
      if (this.table.search) endpoint += "&search=" + this.table.search
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
          }
        },
        (e) => { }
      )
      this.$router.replace({
        query: { ...this.table.pagination, seach: this.table.search, trash: this.trash },
      })
    },
    async daleteData() {
      this.loading = true
      await this.table.selected.forEach((val) => {
        let endpoint = this.Meta.module
        endpoint += this.trash == true ? "/force/" : "/"
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
        endpoint += "/restore/"
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
      this.modalType = "detail"
      if (this.useModal.show === true) {
        this.modal = true
      } else {
        this.$router.push({
          params: { id },
          name: "view-" + this.Meta.module,
          query: { ...this.$route.query },
        })
      }
    },
    edit(id) {
      this.modalType = "form"
      if (this.useModal.edit === true) {
        this.modal = true
        this.id = id
      } else {
        this.$router.push({
          params: { id },
          name: "edit-" + this.Meta.module,
          query: { ...this.$route.query },
        })
      }
    },
    addData() {
      this.modalType = "form"
      if (this.useModal.add === true) {
        this.modal = true
      } else {
        this.$router.push({
          name: "add-" + this.Meta.module,
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
  },
}
</script>
