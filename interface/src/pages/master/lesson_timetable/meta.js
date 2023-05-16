
        export default {
            name: 'Lesson_timetable',
            module: 'lesson_timetable',
            schema: 'master', 
            module_name: 'Lesson_timetable',
          

            formType: {
              show: false,
              edit: false,
              add: false
            },
            model: {
                
              code:null,

              name:null,

              grade:null,

              remark:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

                { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

                { name: 'grade', label: 'Grade', field: 'grade', sortable: true, align: 'left', },

                { name: 'remark', label: 'Remark', field: 'remark', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        