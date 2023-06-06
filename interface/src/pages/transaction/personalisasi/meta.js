
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
                
              name:null,

              age:null,

              kehamilan_ke:null,

              usia_anak_terakhir:null,

              hpht:null,

              usia_kehamilan:null,

              gph:null,

              keluhan:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'age', label: 'Age', field: 'age', sortable: true, align: 'left', },

                { name: 'kehamilan_ke', label: 'Kehamilan Ke', field: 'kehamilan_ke', sortable: true, align: 'left', },

                { name: 'usia_anak_terakhir', label: 'Usia Anak Terakhir', field: 'usia_anak_terakhir', sortable: true, align: 'left', },

                { name: 'hpht', label: 'Hpht', field: 'hpht', sortable: true, align: 'left', },

                { name: 'usia_kehamilan', label: 'Usia Kehamilan', field: 'usia_kehamilan', sortable: true, align: 'left', },

                { name: 'gph', label: 'Gph', field: 'gph', sortable: true, align: 'left', },

                { name: 'keluhan', label: 'Keluhan', field: 'keluhan', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        