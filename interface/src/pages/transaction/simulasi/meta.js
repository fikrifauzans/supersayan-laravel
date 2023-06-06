
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
                
              parent_id:null,

              name:null,

              answer_value:null,

              value:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'parent_id', label: 'Parent Id', field: 'parent_id', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'answer_value', label: 'Answer Value', field: 'answer_value', sortable: true, align: 'left', },

                { name: 'value', label: 'Value', field: 'value', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        