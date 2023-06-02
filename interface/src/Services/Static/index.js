import date from '../Helper/date'

class Static {

  // TABLE
  table = {
    height(custom = null) {
      let height = '100px'
      if (custom !== null) height = custom
      return `height: calc(100vh - ${height})`
    },
    dense(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    flat(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    color(custom = null) {
      let val = custom !== null ? custom : 'primary'
      return val
    },
    rowPerPageLabel(custom = null) {
      let val = custom !== null ? custom : 'Records per page'
      return val
    },
    rowPerPageOption(custom = null) {
      let val = custom !== null ? custom : [25, 50, 75, 100, 0]
      return val
    },
    square(custom = null) {
      let val = custom !== null ? custom : true
      return val
    },
    bordered(custom = null) {
      let val = custom !== null ? custom : false
      return val
    },
    separator(custom = null) {
      let val = custom !== null ? custom : 'horizontal'
      return val
    },
    class(custom = null) {
      let val = custom !== null ? custom : 'my-sticky-header-column-table'
      return val
    },

    // FORM

  }
  formHeight(custom = null) {
    let height = '0px'
    if (custom !== null) height = custom
    // return `height: calc(100vh - ${height});`
    return 'auto'
  }


  smester() {
    return [
      { name: 'I' },
      { name: 'II' },
    ]
  }

  day = [
    { label: 'senin', value: 1 },
    { label: 'selasa', value: 2 },
    { label: 'rabu', value: 3 },
    { label: 'kamis', value: 4 },
    { label: 'jumat', value: 5 },
    { label: 'sabtu', value: 6 },
    { label: 'minggu', value: 7 },
  ]
   genderList() {
    return [
      { val: 1, label: 'Laki Laki' },
      { val: 2, label: 'Perempuan' },
    ]
  }



}

export default Static
