export default {
  name: "Categories",
  module: 'categories',
  schema: 'master',  // IF USE PGSQL
  module_name: 'Master Data',

  // USE MODAL
  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {
    name: null,
    slug: null,
  },
  //TABLE
  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: "id", label: "Option", field: "id", sortable: true, align: "left", },
        { name: "name", label: "Name", field: "name", sortable: true, align: "left", },
        { name: "slug", label: "Slug", field: "slug", sortable: true, align: "left", },
      ]
    }
  }
}
