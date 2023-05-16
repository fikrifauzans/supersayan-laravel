
        export default {
            name: 'Classes',
            module: 'classes',
            schema: 'master', 
            module_name: 'Classes',
          

            formType: {
              show: false,
              edit: false,
              add: false
            },
            model: {
                
              code:null,

              name:null,

              grade:null,

              color:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'grade', label: 'Grade', field: 'grade', sortable: true, align: 'left', },

                { name: 'color', label: 'Color', field: 'color', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        