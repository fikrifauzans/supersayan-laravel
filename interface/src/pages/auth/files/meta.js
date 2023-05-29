export default {
  name: "Files",
  module: 'files',
  schema: 'auth', // IF USE PGSQL
  module_name: 'Management Account',

  // USE MODAL
  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {
    name: null,
    directory: null,
    path: null,
    description: null,
    reference_id: null,
    reference_module: null,
    status_file: null
  },
  //TABLE
  table: {
    columns: (Help, Lang, Static) => {
      return [{
        name: "id",
        label: "Option",
        field: "id",
        sortable: true,
        align: "left",
      },
      {
        name: "name",
        label: "Name",
        field: "name",
        sortable: true,
        align: "left"
      },
      { name: "path", label: "Path", field: "path", sortable: true, align: "left", },
      { name: "description", label: "Description", field: "description", sortable: true, align: "left", },
      { name: "directory", label: "directory", field: "directory", sortable: true, align: "left", },
      {
        name: "reference_id",
        label: "Reference id",
        field: "reference_id",
        sortable: true,
        align: "left",
      },
      {
        name: "reference_table",
        label: "Reference Table",
        field: "reference_table",
        sortable: true,
        align: "left",
      },
      {
        name: "description",
        label: "Description",
        field: "description",
        sortable: true,
        align: "left",
      },

      ]
    }
  }
}
