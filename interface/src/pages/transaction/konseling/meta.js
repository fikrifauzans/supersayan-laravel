
        export default {
            name: 'Konseling',
            module: 'konseling',
            schema: 'transaction', 
            module_name: 'Konseling',
          

            formType: {
              show: false,
              edit: false,
              add: false
            },
            model: {
                
              name:null,

              description:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'description', label: 'Description', field: 'description', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        