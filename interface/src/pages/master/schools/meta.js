
export default {
  name: 'Schools',
  module: 'schools',
  schema: 'master',
  module_name: 'Schools',


  formType: {
    show: false,
    edit: false,
    add: false
  },
  model: {

    code: null,

    name: null,

    address: null,

    city: null,

    province: null,

    long: null,

    lat: null,

    logo_id: null,

  },

  table: {
    columns: (Help, Lang, Static) => {
      return [
        { name: 'id', label: 'Option', field: 'id', sortable: true, align: 'left', },

        { name: 'code', label: 'Code', field: 'code', sortable: true, align: 'left', },

        { name: 'name', label: 'Name', field: 'name', sortable: true, align: 'left', },

        { name: 'address', label: 'Address', field: 'address', sortable: true, align: 'left', },

        { name: 'city', label: 'City', field: 'city', sortable: true, align: 'left', },

        { name: 'province', label: 'Province', field: 'province', sortable: true, align: 'left', },

        { name: 'long', label: 'Long', field: 'long', sortable: true, align: 'left', },

        { name: 'lat', label: 'Lat', field: 'lat', sortable: true, align: 'left', },

        { name: 'logo_id', label: 'Logo Id', field: 'logo_id', sortable: true, align: 'left', },

      ]
    }
  }
}

