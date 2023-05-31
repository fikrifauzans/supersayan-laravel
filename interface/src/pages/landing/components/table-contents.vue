<template>
    <div>

        <q-table virtual-scroll class='q-my-sm col-12' :rows='table.rows' :columns='table.columns' row-key='id'
            v-model:pagination='table.pagination' :dense='$Static.table.dense()' :flat='$Static.table.flat()'
            :color='$Static.table.color()' :rows-per-page-label='$Static.table.rowPerPageLabel()'
            :rows-per-page-options='$Static.table.rowPerPageOption([6])' :square='$Static.table.square()'
            :bordered='$Static.table.bordered()' binary-state-sort @request='getData' :loading='loading'
            :separator='$Static.table.separator()' grid>
            <template v-slot:item="props">
                <div class="q-pa-sm col-xs-12 col-sm-6 col-md-4">
                    <slot :item="props" />
                </div>
            </template>
        </q-table>
    </div>
</template>
<script>
export default {
    name: 'TableContents',
    props:['group'],
    created() {
        this.getData()
    },
    data() {
        return {
            table: {
                columns: [
                    { name: 'name', label: 'name', field: 'name' },
                ],
                rows: [],
                pagination: []
            }
        }
    },
    methods: {
        getData() {
            let endpoint = 'contents'
            if(this.group) endpoint += '?where=group:' + this.group
            this.$api.get(
                endpoint,
                (data, status, message, full) => {
                    if (status == 200) {

                        this.table.rows = data.data

                    }
                }, (e) => { })

        },
    },
}
</script>
<style lang="">
    
</style>