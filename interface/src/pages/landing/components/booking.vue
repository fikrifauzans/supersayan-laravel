<template>
  <div>

    <s-drawer-c>
      <div class="row container q-mx-auto">
        <q-btn flat icon="arrow_back_ios" bg="transparent" color="dark" label="kembali" class="q-mt-md"
          @click="$router.back()" />
        <div class="col-12 row justify-center">
          <q-img :src="package && package.photo ? package.photo.path : ''" style="max-width: 400px" class="q-px-auto" />
        </div>
        <div class="col-12 column q-mt-xl">
          <div>Sisa Kuota : 24 Seat</div>
          <div class="text-bold text-h4 q-my-sm">{{ package.name }}</div>
          <div class="row items-center">
            <q-btn icon="flight" round rounded flat size="sm" />
            <div>{{ $Help.toLocalDate(package.date) }}</div>
          </div>
        </div>

        <div class="col-12 column text-bold q-mt-xl q-mb-md">Pilih Paket :</div>
        <div class="col-12 row">
          <div class="col-md-4 col-12 row q-pa-sm" v-for="(op, i) in package.opsi_paket" :key="i">
            <q-card class="col-12 q-pa-sm row" style="border-radius: 10px">
              <!-- <div class="col-12 q-pa-md">
              <q-img src="images/package-example.png" class="col-12" />
            </div> -->

              <div class="col-12 row">
                <div class="column q-pd-md q-pa-md">
                  <div class="text-bold q-mb-sm">{{ op.name }}</div>
                  <div>Dewasa</div>
                  <div class="text-bold q-mb-sm">
                    Rp {{ $Help.transformMoney(op.parent_price) }}/pax
                  </div>
                  <div>Anak</div>
                  <div class="text-bold q-mb-sm">
                    Rp {{ $Help.transformMoney(op.child_price) }} /pax
                  </div>
                </div>
              </div>
              <div class="col-12 row justify-center q-mb-md">
                <q-btn color="info" label="Tambah Paket" @click="setPackage(op)" />
              </div>
            </q-card>
            <!-- {{ opt }} -->
          </div>
        </div>
        <div class="col-12 row">
          <div class="col-12 row q-pa-sm">
            <q-card class="col-12 q-pa-sm row q-pa-xl" style="border-radius: 10px">
              <div class="text-bold q-mb-xl">Detail Paket Umrah :</div>
              <div class="row col-12 q-mb-md" v-for="(lu, i_lu) in package.layanan_utama" :key="i_lu">
                <div class="row col-12 q-mb-md q-px-lg">{{ lu.name }}</div>
                <div class="col-12">
                  <q-separator color="grey" inset />
                </div>
              </div>
            </q-card>
          </div>
        </div>
        <div class="col-12 row">
          <div class="col-12 row q-pa-sm">
            <q-card class="col-12 q-pa-sm row q-pa-xl" style="border-radius: 10px">
              <div class="col-12 column">
                <div class="text-bold q-mb-md">Deskripsi Paket :</div>
                <div v-html="package.description"></div>
              </div>
            </q-card>
          </div>
        </div>
      </div>
      <TransacionModal v-model="modal" :package="package" @addToCart="addToCart" :opt="opt" />
      <ValidatorModal v-model="utils.validator" @validated="purchase" />
      <template v-slot:layout>
        <q-drawer side="right" v-model="drawerRight" show-if-above bordered :width="350" :breakpoint="500"
          class="bg-white window-height">
          <DataCart :data="cart" @validate="validateTransaction" />
        </q-drawer>
      </template>
      <template v-slot:footer>
        <footer-customer />
      </template>
    </s-drawer-c>
    <q-btn v-if="cart.length > 0 && drawerRight != true" @click="drawerRight = !drawerRight"
      class="fixed-bottom-right q-ma-lg" icon="shopping_cart" round rounded color="info" />
  </div>
</template>
<script>
import TransacionModal from "./components/transaction-modal.vue";
import ValidatorModal from "./components/validator.vue";
import DataCart from "./components/data-cart.vue";

export default {
  components: {
    TransacionModal,
    DataCart,
    ValidatorModal,
  },
  async created() {
    if (this.$q.screen.lt.md) this.drawerRight = false;
    await this.findId(this.$route.params.id);
    this.refresh();
  },
  data() {
    return {
      user: this.$Handle.getLS("_user"),
      modal: false,
      drawerRight: true,
      package: {},
      cart: [],
      utils: {
        opt: null,
        validator: false,
      },
    };
  },
  methods: {
    refresh() { this.findId(); },
    async findId(id) {
      this.$Handle.loadingStart();
      let endpoint = "packages" + "/" + id;
      await this.$api.get(endpoint, (data, status, message, full) => {
        if (status == 200) {
          this.package = data;
          this.$Handle.loadingStop();
        }
      });
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
      // this.$Handle.loadingStart();
      const user = this.$Handle.getLS("_user");
      let dataModel = {
        user_id: user.id,
        package_id: this.package.id,
        booking_no: null,
        status: null,
        transactions: this.cart,
      };
      let endpoint = "booking-packages";
      this.$api.post(
        endpoint,
        dataModel,
        (data, status) => {
          this.$Handle.loadingStop();
          if (status < 400) {
            this.$router.push({
              name: "cms-jamaah-transaction-tahapan",
              params: { id: data.id },
              query: { status: "new" },
            });
          }
        },
        (error) => {
          this.$Handle.errorMessage(error.message);
        }
      );
    },
  },
};
</script>
