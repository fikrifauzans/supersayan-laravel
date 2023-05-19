
        <template>
  <div>
    <s-loading :load='loading' />
    <s-drawer @refresh='refresh' :useModal='useModal' form @submit='submit' @back='back' :Meta='Meta'>
      <div>
        <s-form class='q-px-md q-py-lg' title='Form Lesson Timetable'>
            <t-input col='4' label='code' v-model='model.code' topLabel='code' />
            <t-select-api col="4" api="users" v-model="model.teacher_id" optionValue="id" :optionLabel="(val) => val ? $Handle.existingRelationlabel(val, model.teacher_id, 'name') : ''
                " label="teacher_id" />
            <t-select-api col="4" api="classes" v-model="model.class_id" optionValue="id" :optionLabel="(val) => val ? $Handle.existingRelationlabel(val, model.class_id, 'name') : ''
                " label="class_id" />
            <t-select-api col="4" api="studies" v-model="model.study_id" optionValue="id" :optionLabel="(val) => val ? $Handle.existingRelationlabel(val, model.study_id, 'name') : ''
                " label="study" />
            <t-select col="4" label="semester" optionValue="value" filterField="name" v-model="model.smester"
                  :option="optionSemester" :optionLabel="(val) => (val == '' ? oldVal : val.name)" />
            <t-input col='4' label='start_time' v-model='model.start_time' topLabel='start_time' />
            <t-input col='4' label='end_time' v-model='model.end_time' topLabel='end_time' />
            <t-input col='4' label='year' v-model='model.year' topLabel='year' />
            <t-currency col='4' label='sort' currency v-model='model.sort'  topLabel='sort' />
            <t-select col="4" label="day" optionValue="value" filterField="name" v-model="model.day"
                  :option="optionsDay" :optionLabel="(val) => (val == '' ? oldVal : val.name)" />

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
      optionsDay : [
        { name : 'Senin', value : 1},
        { name : 'Selasa', value : 2},
        { name : 'Rabu', value : 3},
        { name : 'Kamis', value : 4},
        { name : 'Jumat', value : 5},
        { name : 'Sabtu', value : 6},
      ],
      optionSemester : [
        {name : 'ganji', value : 1},
        {name : 'genap', value : 2}
      ]
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
