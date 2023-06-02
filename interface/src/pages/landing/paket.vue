<template >
    <div v-if="id == null" :class="$q.screen.gt.sm ? 'col-12 row q-mt-xl q-px-xl' : 'col-12 row q-mt-xl q-px-md'">
        <div class="row col-12 justify-between">
            <div>
                <cms-paragraph :title="$Handle.getContent('title-haji-umrah', 'Titles', true).title"
                    :topText="$Handle.getContent('title-haji-umrah', 'Titles', true).subtitle" />
            </div>
            <div>
                <t-input label="Cari" rIcon="search" />
            </div>
        </div>
        <div :class="$q.screen.gt.sm ? 'col-12  q-gutter-md' : ''">
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
                    <cms-card type="Product" :item="props.row" @btnClick="(idp) => {
                        id = idp
                        getData()
                    }" />
                </div>
            </template>
        </q-table>
    </div>
    <div v-else :class="$q.screen.gt.sm ? 'q-px-xl' : 'q-px-md'" v-show="packageDetail">
        <q-btn color="primary" label="Kembali" class="q-mt-lg" unelevated style="border-radius: 6px;" noCaps size="md"
            @click="() => {
                id = null
                $router.push({ name: 'paket' })
                getData()
            }" />
        <div v-if="packageDetail">
            <q-drawer v-model="rightDrawerOpen" bordered side="right">
                <DataCart :data="cart" @validate="validateTransaction" @deleteBtn="(index) => cart.splice(index ,1)" />
            </q-drawer>

            <div
                :class="$q.screen.gt.sm ? 'col-12 row justify-center relative-position     q-mt-xl' : 'col-12 row justify-center relative-position     q-mt-sm'">
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
                                        <div class="text-bold q-mt-xs">Rp. {{ $Help.transformMoney(item.parent_price) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-bold text-grey q-mt-md">Anak</div>
                                        <div class="text-bold q-mt-xs">Rp. {{ $Help.transformMoney(item.child_price) }}
                                        </div>
                                    </div>
                                    <div class="col-12 q-mt-md">
                                        <q-btn color="primary" label="Booking" class="col-12 fit" unelevated
                                            style="border-radius: 6px;" noCaps size="md" @click="setPackage(item)" />
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
                                    <div class="q-mb-sm">{{ item.name }}</div>
                                    <q-separator />
                                </div>
                            </q-card>
                        </div>
                    </div>
                </div>

            </div>
            <TransacionModal v-model="modal" :packageDetail="packageDetail" @addToCart="addToCart" :opt="opt"  />
            <ValidatorModal v-model="utils.validator" @validated="purchase">
                <div class="col-12 row ">
                    <t-input v-model="model.name" label="Name" col="6" />
                    <t-input v-model="model.username" label="Phone" col="6" />
                </div>

            </ValidatorModal>
            <SuccessModal v-model="utils.success" />
        </div>

    </div>
</template>
<script>
import TransacionModal from "./components/transaction-modal.vue";
import ValidatorModal from "./components/validator.vue";
import SuccessModal from "./components/success-modal.vue";
import DataCart from "./components/data-cart.vue";
import axios from "axios";
export default {
    name: 'IndexHome',
    components: {
        TransacionModal,
        DataCart,
        ValidatorModal,
        SuccessModal,
    },
    created() {
        if (this.$route.query.id) this.id = this.$route.query.id
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
            id: null,
            packageDetail: null,
            rightDrawerOpen: true,
            modal: false,
            opt: null,
            utils: {
                opt: null,
                validator: false,
                success: false
            },
            cart: [],
            model: {
                name: null,
                username: null
            },
            axios
        }
    },
    methods: {
        getData() {
            let endpoint = 'public/packages?table=&'
            if (this.id != null) endpoint += '&where=id:' + this.id
            else endpoint += 'like=Category-name:' + this.buttonCategory
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
        setPackage(opt) {
            this.opt = opt;
            this.modal = true;
        },
        addToCart(data) {
            this.cart.push(data);
        },
        validateTransaction() {
            this.utils.validator = true;
        },
        purchase() {
            this.$Handle.loadingStart()

            let newUser = this.model
            let endpoint = this.$System.apiUms()
            endpoint += 'common/register'

            this.$api.post(endpoint, newUser, (data, status) => {
                let dataModel = { user_id: data.users.id, package_id: this.id, transactions: this.cart };
                const instance = axios.create({ baseURL: this.$System.apiUms() });
                instance.defaults.headers.common['Authorization'] = 'Bearer ' + data.access_token;
                instance.defaults.headers.post['Content-Type'] = 'application/json'
                instance.defaults.timeout = 10000;
                instance.post('/booking-packages', dataModel)
                    .then((response) => {
                        this.utils.success = true
                        this.$Handle.loadingStop()
                    })
            }, (e) => false, true)




            // let endpoint = "booking-packages";
            // this.$api.post(
            //     endpoint,
            //     dataModel,
            //     (data, status) => {
            //         this.$Handle.loadingStop();
            //         if (status < 400) {
            //             this.$router.push({
            //                 name: "cms-jamaah-transaction-tahapan",
            //                 params: { id: data.id },
            //                 query: { status: "new" },
            //             });
            //         }
            //     },
            //     (error) => {
            //         this.$Handle.errorMessage(error.message);
            //     }
            // );
        },
    },
}
</script>
<style lang="scss"></style>