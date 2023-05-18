export default {
  name: "Users",
  module: 'users',
  schema: 'auth',  // IF USE PGSQL
  module_name: 'Management Account',

  // USE MODAL
  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {
    name: null,
    username: null,
    email: null,
    address: null,
    password: null,
    school_id : null,
    class_id : null,
  },
  //TABLE
  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: "id", label: "Option", field: "id", sortable: true, align: "left", },
        { name: "name", label: "Name", field: "name", sortable: true, align: "left", },
        { name: "email", label: "Email", field: "email", sortable: true, align: "left", },
        { name: "username", label: "Username", field: "username", sortable: true, align: "left", },
        { name: "address", label: "Address", field: "address", sortable: true, align: "left", },
        { name: "phone", label: "phone", field: "phone", sortable: true, align: "left", },
        { name: "role-name", label: "Role", field: (val) => Help.transformField(val, 'role.name'), sortable: true, align: "left", },
        { name: "role-master_menu_id", label: "Master Menu", field: (val) => Help.transformField(val, 'role.master_menu.name'), sortable: true, align: "left", },
        { name: "school_id", label: "Option", field: "school_id", sortable: true, align: "left", },
        { name: "class_id", label: "Option", field: "class_id", sortable: true, align: "left", },
      ]
    }
  }
}
