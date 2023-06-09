import Storage from './storage'
import Notify from './notify'
import Midtrans from './midtrans'
import permission from './permission'
import Static from '../Static'
import Contents from './contents'

import {
  Loading,
  exportFile,
  useQuasar,
  QSpinnerPie
} from 'quasar'

class Handler {
  constructor() {
    this.Loading = Loading
    this.Static = new Static()
  }

  // TABLE HANDLE
  structureTable(columns, rowsPerPage = 15) {
    let table = {
      search: null,
      columns,
      rows: [],
      pagination: {
        sortBy: 'id',
        descending: true,
        page: 1,
        rowsPerPage,
        rowsNumber: null,


      },
      selected: [],
      visibleColumns: []
    }

    table.columns.forEach((val) => {
      table.visibleColumns.push(val.name)
    })
    return table
  }
  transformDesc(column, desc) {
    if (column == null) return 'id:ASC'
    if (desc === true) return `${column}:DESC`
    else return `${column}:ASC`
  }

  // LOADING
  loadingStart(spinner = QSpinnerPie, spinnerColor = 'primary', message = 'please wait...', messageColor = 'dark', backgroundColor = '', spinnerSize = '100', delay = '400') {
    return this.Loading.show({
      spinner: spinner,
      spinnerColor: spinnerColor,
      message: message,
      messageColor: messageColor,
      backgroundColor: backgroundColor,
      spinnerSize: spinnerSize,
      delay: delay
    })
  }
  loadingStop() {
    setTimeout(() => {
      this.Loading.hide()
    }, 2000);
  }

  wrapCsvValue(val, formatFn, row) {
    let formatted = formatFn !== void 0 ?
      formatFn(val, row) :
      val
    formatted = formatted === void 0 || formatted === null ?
      '' :
      String(formatted)
    formatted = formatted.split('"').join('""')
    return `"${formatted}"`
  }

  exportTable(columns, rows) {
    // naive encoding to csv format
    const content = [columns.map(col => this.wrapCsvValue(col.label))].concat(
      rows.map(row => columns.map(col => this.wrapCsvValue(
        typeof col.field === 'function' ?
          col.field(row) :
          row[col.field === void 0 ? col.name : col.field],
        col.format,
        row
      )).join(','))
    ).join('\r\n')

    const status = exportFile(
      'table-export.csv',
      content,
      'text/csv'
    )
    if (status !== true) {
      this.errorMessage({
        message: 'Browser denied file download...',
        color: 'negative',
        icon: 'warning'
      })
    }
  }

  loopingForm(model) {
    const formData = new FormData();
    let entries = Object.entries(model);
    for (let [index, [key, value]] of entries.entries()) {
      if (value instanceof File) {
        formData.append(key, value);
      } else if (value instanceof Array || value instanceof Object) formData.append(key, JSON.stringify(value))
      else formData.append(key, value)

    }
    return formData

  }

  checkMenusLabelOrIcon(slug) {
    let menus = this.getLS('menus')
    if (menus) {
      let module = menus.filter((m) => m.menu.path == slug)
      if (module.length > 0) return { name: module[0].menu.name, icon: [module[0].menu.icon.toString()] }
      else return { name: '', icon: '' }
    } else return { name: '', icon: '' }

  }

  existingRelationlabel(val, relationField, defaultField = '') {
    return val[defaultField] ? val[defaultField] : relationField ? relationField[defaultField] : ''
  }

  getLabelSelect(options = 'day', value, filedLabel = 'label') {
    let data = this.Static[options].filter((val) => val.value == value)
    if (data[0] != undefined) return data[0][filedLabel]
    else if (value) return (value[filedLabel]);
  }

  resetObjectValue(model) {
    let newModel = {}
    for (const key in model) {
      if (Array.isArray(model[key]))  model[key] = []
      else model[key] = null
    }
    return  model
  }

}

Object.assign(Handler.prototype, Storage)
Object.assign(Handler.prototype, Notify)
Object.assign(Handler.prototype, Midtrans)
Object.assign(Handler.prototype, permission)
Object.assign(Handler.prototype, Contents)

export default Handler
