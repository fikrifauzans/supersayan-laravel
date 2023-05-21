
export default {
  name: 'Lesson Timetable',
  module: 'lesson-timetable',
  schema: 'master',
  module_name: 'Lesson Timetable',


  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {

    code: null,
    teacher_id: null,
    class_id: null,
    study_id: null,
    smester: null,
    start_time: null,
    end_time: null,
    year: null,
    sort: null,
    day: null,

  },

  table: {
    columns: (Help, Handle, Static) => {
      return [
        { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
        { name: 'Teacher-name', label: 'Teacher ', field: val => Help.transformField(val, 'teacher.name'), sortable: true, align: 'left', },
        { name: 'Class-name', label: 'Class ', field: val => Help.transformField(val, 'class.name'), sortable: true, align: 'left', },
        { name: 'Study-name', label: 'Study ', field: val => Help.transformField(val, 'study.name'), sortable: true, align: 'left', },
        { name: 'start_time', label: 'Start Time', field: 'start_time', sortable: true, align: 'left', },
        { name: 'end_time', label: 'End Time', field: 'end_time', sortable: true, align: 'left', },
        // { name: 'sort', label: 'Sort', field: 'sort', sortable: true, align: 'left', },
        { name: 'day', label: 'Day', field: val => Handle.getLabelSelect('day',val.day), sortable: true, align: 'left', },
        { name: 'smester', label: 'Smester', field: 'smester', sortable: true, align: 'left', },
        { name: 'year', label: 'Year', field: 'year', sortable: true, align: 'left', },

      ]
    }
  }
}

