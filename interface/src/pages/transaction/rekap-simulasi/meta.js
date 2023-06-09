
export default {
  name: 'Rekap Simulasi',
  module: 'rekap-simulasi',
  schema: 'transaction',
  module_name: 'Rekap Simulasi',


  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {

    user_id: null,
    total_pertanyaan: null,
    jawaban_benar: null,
    jawaban_salah: null,
    persentasi_skor: null,

  },

  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
        { name: 'user_id', label: 'User', field: val => Help.transformField( val,'user.name'), sortable: true, align: 'left', },
        { name: 'total_pertanyaan', label: 'Total Pertanyaan', field: 'total_pertanyaan', sortable: true, align: 'left', },
        { name: 'jawaban_benar', label: 'Total Jawaban Benar', field: 'jawaban_benar', sortable: true, align: 'left', },
        { name: 'jawaban_salah', label: 'Total Jawaban Salah', field: 'jawaban_salah', sortable: true, align: 'left', },
        { name: 'persentasi_skor', label: 'Persentase Skor', field: 'persentasi_skor', sortable: true, align: 'left', },
      ]
    }
  }
}

