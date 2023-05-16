
        export default {
            name: 'Studies',
            module: 'studies',
            schema: 'master', 
            module_name: 'Studies',
          

            formType: {
              show: false,
              edit: false,
              add: false
            },
            model: {
                
              code:null,

              name:null,

              remark:null,

              color:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'remark', label: 'Remark', field: 'remark', sortable: true, align: 'left', },

                { name: 'color', label: 'Color', field: 'color', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        