
        export default {
            name: 'Presences',
            module: 'presences',
            schema: 'master', 
            module_name: 'Presences',
          

            formType: {
              show: false,
              edit: false,
              add: false
            },
            model: {
                
              code:null,

              user_id:null,

              role_id:null,

              school_id:null,

              study_id:null,

              status:null,

              datetime:null,

              remark:null,

              details:null,

              lat:null,

              long:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

                { name: 'user_id', label: 'User Id', field: 'user_id', sortable: true, align: 'left', },

                { name: 'role_id', label: 'Role Id', field: 'role_id', sortable: true, align: 'left', },

                { name: 'school_id', label: 'School Id', field: 'school_id', sortable: true, align: 'left', },

                { name: 'study_id', label: 'Study Id', field: 'study_id', sortable: true, align: 'left', },

                { name: 'status', label: 'Status', field: 'status', sortable: true, align: 'left', },

                { name: 'datetime', label: 'Datetime', field: 'datetime', sortable: true, align: 'left', },

                { name: 'remark', label: 'Remark', field: 'remark', sortable: true, align: 'left', },

                { name: 'details', label: 'Details', field: 'details', sortable: true, align: 'left', },

                { name: 'lat', label: 'Lat', field: 'lat', sortable: true, align: 'left', },

                { name: 'long', label: 'Long', field: 'long', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        