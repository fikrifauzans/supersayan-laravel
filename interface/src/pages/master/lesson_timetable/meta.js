
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

              teacher_id:null,

              class_id:null,

              study_id:null,

              smester:null,

              start_time:null,

              end_time:null,

              year:null,

              sort:null,

              day:null,

            },
   
            table: {
              columns: (Help, Lang, Static) => {
                return [
                  { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

                { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

                { name: 'teacher_id', label: 'Teacher Id', field: 'teacher_id', sortable: true, align: 'left', },

                { name: 'class_id', label: 'Class Id', field: 'class_id', sortable: true, align: 'left', },

                { name: 'study_id', label: 'Study Id', field: 'study_id', sortable: true, align: 'left', },

                { name: 'smester', label: 'Smester', field: 'smester', sortable: true, align: 'left', },

                { name: 'start_time', label: 'Start Time', field: 'start_time', sortable: true, align: 'left', },

                { name: 'end_time', label: 'End Time', field: 'end_time', sortable: true, align: 'left', },

                { name: 'year', label: 'Year', field: 'year', sortable: true, align: 'left', },

                { name: 'sort', label: 'Sort', field: 'sort', sortable: true, align: 'left', },

                { name: 'day', label: 'Day', field: 'day', sortable: true, align: 'left', },

                ]
              }
            }
          }
          
        