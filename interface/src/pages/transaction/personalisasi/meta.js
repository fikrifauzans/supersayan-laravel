
export default {
  name: 'Personalisasi',
  module: 'personalisasi',
  schema: 'transaction',
  module_name: 'Personalisasi',


  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {

    name: null,

    age: null,

    kehamilan_ke: null,

    usia_anak_terakhir: null,

    hpht: null,

    usia_kehamilan: null,

    gph: null,

    keluhan: null,

    verifikasi: false,

    review: null

  },

  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

        { name: 'name', label: 'Nama', field: 'name', sortable: true, align: 'left', },

        { name: 'age', label: 'Umur', field: (v) => v ? v.age + ' Tahun' : '', sortable: true, align: 'left', },

        { name: 'kehamilan_ke', label: 'Kehamilan Ke', field: 'kehamilan_ke', sortable: true, align: 'left', },

        { name: 'usia_anak_terakhir', label: 'Usia Anak Terakhir (Tahun)', field: (v) => v ? v.usia_anak_terakhir + ' Tahun' : '', sortable: true, align: 'left', },

        { name: 'hpht', label: 'Hpht', field: 'hpht', sortable: true, align: 'left', },

        { name: 'usia_kehamilan', label: 'Usia Kehamilan (Bulan)', field: (v) => v ? v.usia_kehamilan + ' Bulan' : '', sortable: true, align: 'left', },

        { name: 'gph', label: 'Gph', field: 'gph', sortable: true, align: 'left', },

        { name: 'keluhan', label: 'Keluhan', field: 'keluhan', sortable: true, align: 'left', },

  
        { name: 'review', label: 'Review', field: 'review', sortable: true, align: 'left', },
        { name: 'verifikasi', label: 'verifikasi', field: 'verifikasi', sortable: true, align: 'left', },

      ]
    }
  }
}

