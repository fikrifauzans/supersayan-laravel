
export default {
  name: 'Contents',
  module: 'contents',
  schema: 'master',
  module_name: 'Contents',



  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {
    code: null,
    parent_id: null,
    group: null,
    name: null,
    page: null,
    device: null,
    title: null,
    subtitle: null,
    description: null,
    path: null,
    link: null,
    sort: null,
    remark: null,
    details: null,
    photo_id: null,
    photo: null,

  },
  table: {
    columns: (type) => {
      if (type == null || type == undefined) {
        return [
          { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
          { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },
          { name: 'parent_id', label: 'Parent Id', field: 'parent_id', sortable: true, align: 'left', },
          { name: 'group', label: 'Group', field: 'group', sortable: true, align: 'left', },
          { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },
          { name: 'page', label: 'Page', field: 'page', sortable: true, align: 'left', },
          { name: 'device', label: 'Device', field: 'device', sortable: true, align: 'left', },
          { name: 'title', label: 'Title', field: 'title', sortable: true, align: 'left', },
          { name: 'subtitle', label: 'Subtitle', field: 'subtitle', sortable: true, align: 'left', },
          { name: 'description', label: 'Description', field: 'description', sortable: true, align: 'left', },
          { name: 'path', label: 'Path', field: 'path', sortable: true, align: 'left', },
          { name: 'link', label: 'Link', field: 'link', sortable: true, align: 'left', },
          { name: 'sort', label: 'Sort', field: 'sort', sortable: true, align: 'left', },
          { name: 'remark', label: 'Remark', field: 'remark', sortable: true, align: 'left', },
          { name: 'details', label: 'Details', field: 'details', sortable: true, align: 'left', },
          { name: 'photo_id', label: 'Photo', field: 'photo_id', sortable: true, align: 'left', },
        ]
      }
      else {
        return [
          { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
          { name: 'photo_id', label: 'Photo', field: 'photo_id', sortable: true, align: 'left', },
          { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },
          { name: 'details', label: 'Detail', field: 'details', sortable: true, align: 'left', },
        ]

      }









    }
  }
}


// { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },
// { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },
// { name: 'parent_id', label: 'Parent Id', field: 'parent_id', sortable: true, align: 'left', },
// { name: 'group', label: 'Group', field: 'group', sortable: true, align: 'left', },
// { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },
// { name: 'page', label: 'Page', field: 'page', sortable: true, align: 'left', },
// { name: 'device', label: 'Device', field: 'device', sortable: true, align: 'left', },
// { name: 'title', label: 'Title', field: 'title', sortable: true, align: 'left', },
// { name: 'subtitle', label: 'Subtitle', field: 'subtitle', sortable: true, align: 'left', },
// { name: 'description', label: 'Description', field: 'description', sortable: true, align: 'left', },
// { name: 'path', label: 'Path', field: 'path', sortable: true, align: 'left', },
// { name: 'link', label: 'Link', field: 'link', sortable: true, align: 'left', },
// { name: 'sort', label: 'Sort', field: 'sort', sortable: true, align: 'left', },
// { name: 'remark', label: 'Remark', field: 'remark', sortable: true, align: 'left', },
// { name: 'details', label: 'Details', field: 'details', sortable: true, align: 'left', },
// { name: 'photo_id', label: 'Photo', field: 'photo_id', sortable: true, align: 'left', },

