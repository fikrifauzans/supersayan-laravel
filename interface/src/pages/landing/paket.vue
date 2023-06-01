<template >
    <div v-if="id == null" class="col-12 row q-mt-xl q-px-xl">
        <div class="row col-12 justify-between">
            <div>
                <cms-paragraph :title="$Handle.getContent('title-haji-umrah', 'Titles', true).title"
                    :topText="$Handle.getContent('title-haji-umrah', 'Titles', true).subtitle" />
            </div>
            <div>
                <t-input label="Cari" rIcon="search" />
            </div>
        </div>
        <div class=" col-12  q-gutter-md">
            <q-btn v-for="(item) in optionCategory" :key="item" :label="item.name" unelevated
                style="box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.12);"
                :class="buttonCategory == item.name ? 'default-button text-bold q-px-lg' : 'default-button bg-white text-grey text-bold q-px-lg'"
                :color="buttonCategory == item.name ? 'secondary' : ''" @click="() => {
                    buttonCategory = item.name
                    getData()
                }" />
        </div>
        <q-table virtual-scroll class='q-my-sm col-12' :rows='table.rows' :columns='table.columns' row-key='id'
            v-model:pagination='table.pagination' :dense='$Static.table.dense()' :flat='$Static.table.flat()'
            :color='$Static.table.color()' :rows-per-page-label='$Static.table.rowPerPageLabel()'
            :rows-per-page-options='$Static.table.rowPerPageOption()' :square='$Static.table.square()'
            :bordered='$Static.table.bordered()' binary-state-sort @request='getData' :loading='loading'
            :separator='$Static.table.separator()' grid>
            <template v-slot:item="props">
                <div class="q-pa-lg col-xs-12 col-sm-6 col-md-4">
                    <cms-card type="Product" :item="props.row" @btnClick="(idp) => id = idp" />
                </div>
            </template>
        </q-table>
    </div>
    <div v-else class="q-px-xl">
        <div class="col-12 row justify-center relative-position     q-mt-xl">
            <div v-if="$q.screen.lt.sm" class="col-12 justify-center absolute row" :style="`background-image: url('${packageDetail.photo.path}');  background-repeat: no-repeat;  background-size: cover;
          filter: blur(8px);
        `">
                <q-img class="col-4 " :src="packageDetail.photo.path" />
            </div>
            <q-img class="col-md-4 col-12 " :src="packageDetail.photo.path" />
            <div class="col-12  q-mt-lg">
                <cms-paragraph :title="packageDetail.name" :topText="'Jumlah Quota ' + packageDetail.quota" />
                <q-card class="q-pa-md">
                    <div class="text-bold text-h6">Deskripsi Paket</div>
                    <div v-if="packageDetail.description !== 'null'" v-html="packageDetail.description">
                    </div>
                </q-card>
                <div class="col-12 row text-bold q-mt-md q-px-md text-h6">
                    Pilih Paket
                </div>
                <div class="col-12 row q-mt-md">
                    <div v-for="item in packageDetail.opsi_paket" :key="item" class="col-md-4 col-12">
                        <q-card class="q-pa-lg">
                            <div class="text-bold text-h6">{{ item.name }}</div>
                            <div class="col-12 ">
                                <div>
                                    <div class="text-bold text-grey q-mt-md">Dewasa</div>
                                    <div class="text-bold q-mt-xs">Rp. {{ $Help.transformMoney(item.parent_price) }}</div>
                                </div>
                                <div>
                                    <div class="text-bold text-grey q-mt-md">Anak</div>
                                    <div class="text-bold q-mt-xs">Rp. {{ $Help.transformMoney(item.child_price) }}</div>
                                </div>
                                <div class="col-12 q-mt-md">
                                    <q-btn color="primary" label="Booking" class="col-12 fit" unelevated
                                        style="border-radius: 6px;" noCaps size="md" />
                                </div>
                            </div>
                        </q-card>
                    </div>
                </div>
                <div class="col-12 row q-mt-md">
                    <div class=" col-12">
                        <q-card class="q-pa-lg">
                            <div class="text-bold text-h6 q-mb-md">Detail Paket Umrah</div>
                            <div class="q-mb-md" v-for="item in packageDetail.layanan_utama" :key="item"> 
                                <div class="q-mb-sm">{{item.name}}</div>
                                <q-separator />
                            </div>
                        </q-card>
                    </div>
                </div>
                <!-- {{ packageDetail }} -->
            </div>

        </div>
    </div>
</template>
<script>
export default {
    name: 'IndexHome',
    created() {
        this.getData()
    },
    data() {
        return {
            buttonCategory: 'Haji',
            optionCategory: [{ name: 'Haji' }, { name: 'Umrah' }],
            packages: [],
            slide: 1,
            autoplay: true,
            table: {
                columns: [
                    { name: 'name', label: 'name', field: 'name' },
                    { name: 'quota', label: 'quota', field: 'quota' },
                ],
                rows: [],
                pagination: []
            },
            id: 2,
            packageDetail: null
        }
    },
    methods: {
        getData() {
            let endpoint = 'public/packages?table=&'
            endpoint += 'like=Category-name:' + this.buttonCategory
            if (this.id != null) endpoint += '&where=id:' + this.id
            this.$api.get(
                this.$System.apiUms() + endpoint,
                (data, status, message, full) => {
                    if (status == 200) {
                        this.packages = data.data
                        this.table.rows = data.data
                        if (this.id) this.packageDetail = data.data[0] ?? null

                    }
                }, (e) => { }, true)

        },
    },
}
</script>
<style lang="scss"></style>