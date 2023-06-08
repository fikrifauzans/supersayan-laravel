
export default {
  name: 'Simulasi',
  module: 'simulasi',
  schema: 'transaction',
  module_name: 'Simulasi',


  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {
    answer_value: null,
    question: null,
    childs: [],
  },

  hide_show:true,

  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
        { name: 'question', label: 'Pertanyaan', field: 'question', sortable: true, align: 'left', },
        { name: 'answer_value', label: 'Jawaban', field: 'answer_value', sortable: true, align: 'left', },
        { name: 'childs', label: 'Opsi Jawaban', field: 'childs', sortable: true, align: 'left', },

      ]
    }
  }
}

