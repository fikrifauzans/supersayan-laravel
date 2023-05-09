<template>
  <div>

    <s-loading :load="loading" />
    <s-drawer @refresh="refresh" :useModal="useModal" detail form :Meta="Meta">
      <div class="row col-12">
        <div class="row col-md-6 col-12">
          <s-form class="q-px-md py-sm q-mt-lg" col="12" title="Master Menu">
            <t-list :list="mainList" />
          </s-form>
        </div>
        <div class="row col-md-6 col-12">
          <s-form class="q-px-md py-sm q-mt-lg" col="6" title="Menus List">
            <MenuDetail :menus="menu" class="col-12" />
          </s-form>
        </div>
      </div>
    </s-drawer>
  </div>
</template>

<script>
import Meta from "./meta"
import MenuDetail from "./component/menu-detail.vue"
export default {
  name: Meta.name + 'Detail',
  props: ["modal", "id", "submitOnModal"],
  created() {
    this.$Handle.loadingStart()
    if (this.modal && this.modal.show === true) this.useModal = true
    if (this.$route.params.id) {
      this.param = this.$route.params.id ? this.$route.params.id : null
    }
    if (this.id) this.param = this.id ? this.id : null
    if (this.param) this.findId(this.param)
    else this.$Handle.loadingStop()
  },
  data() {
    return {
      Meta,
      useModal: false,
      model: Object.assign({}, Meta.model),
      mainList: null,
      loading: false,
      param: null,
      setup: {
        destroy: ["id", "deleted_at", "created_at", "updated_at", "menu_details"],
        money: [],
        date: [],
      },
      menu: null,
    }
  },
  components: {
    MenuDetail,
  },
  watch: {},
  methods: {
    findId(id) {
      let endpoint = Meta.module + "/" + id
      this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.mainList = this.$Help.transformList(data, this.setup)
          this.$Handle.loadingStop()
          this.menu = data.menu_details
          console.log(data.menu_details)
        }
      })
    },
    back() {
      if (this.useModal == true) this.$emit("closeModal")
      else
        return this.$router.push({ name: Meta.module, query: { ...this.$route.query } })
    },
  },
}
</script>
