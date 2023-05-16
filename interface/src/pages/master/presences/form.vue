
        <template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg' title='Form Presences'>
<t-input col='4' label='code' v-model='model.code' topLabel='code' />
<t-currency col='4' label='user_id' currency v-model='model.user_id'  topLabel='user_id' />
<t-currency col='4' label='role_id' currency v-model='model.role_id'  topLabel='role_id' />
<t-currency col='4' label='school_id' currency v-model='model.school_id'  topLabel='school_id' />
<t-currency col='4' label='study_id' currency v-model='model.study_id'  topLabel='study_id' />
<t-input col='4' label='status' v-model='model.status' topLabel='status' />
<t-datetime v-model='model.datetime' col='4' dateTime label='datetime'  topLabel='datetime' />
<t-text-editor col='4' label='remark'  type='textarea' v-model='model.remark' />
<t-text-editor col='4' label='details'  type='textarea' v-model='model.details' />
<t-input col='4' label='lat' v-model='model.lat' topLabel='lat' />
<t-input col='4' label='long' v-model='model.long' topLabel='long' />

        </s-form>
      </div>
    </s-drawer>
  </div>
</template>

<script>
import Meta from './meta'

export default {
  name: Meta.name + 'Form',
  props: ['modal', 'id', 'submitOnModal'],
  created() {
    this.$Handle.loadingStart()
    this.Meta.model = {}
    if (this.$route.params.id) {
      this.param = this.$route.params.id ? this.$route.params.id : null
    }
    if (this.id) this.param = this.id ? this.id : null
    if (this.modal && this.modal.add === true) this.useModal = true
    if (this.modal && this.modal.edit === true) this.useModal = true
    if (this.param !== null) this.findId(this.param)
    this.$Handle.loadingStop()
  },
  data() {
    return {
      Meta,
      useModal: false,
      model: Meta.model,
      loading: false,
      edit: false,
      param: null,
    }
  },

  watch: {
    submitOnModal: function (val) {
      if (val.isTrusted) this.submit()
    },
  },
  methods: {
    findId(id) {
      let endpoint = Meta.module + '/' + id
      this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.model = data
          this.$Handle.loadingStop()
        }
      })
    },
    async submit() {
      this.$Handle.loadingStart()
      if (this.param !== null) await this.editData(this.param)
      else await this.postData(this.model)
    },
    editData(id) {
      let endpoint = this.Meta.module + '/' + id
      this.$api.put(endpoint, this.model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          this.back()
        }
      })
    },
    postData(model) {
      let endpoint = this.Meta.module
      this.$api.post(endpoint, model, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.loadingStop()
          this.back()
        }
      })
    },
    back() {
      if (this.useModal == true) this.$emit('closeModal')
      else
        return this.$router.push({ name: Meta.module, query: { ...this.$route.query } })
    },
  },
}
</script>
