<template>
  <q-dialog :model-value="modelValue" persistent @update:model-value="(val) => $emit('update:modelValue', val)">
    <q-card style="width: 700px; max-width: 80vw; border-radius: 15px" class="q-px-md q-pb-md">
      <q-card-section>
        <div class="text-h6 text-bold q-mb-md">Booking Seat</div>
      </q-card-section>

      <q-card-section class="q-pt-none col-12 row">
        <div class="row col-12">
          <div class="text-bold q-mb-xs col-12">Data Diri</div>
          <t-input col="6" label="nama" v-model="preCart.name" />
          <!-- <div class="text-bold q-mb-xs col-12">Nomor Telepon</div> -->
          <t-input col="6" label="nomor telepon" v-model="preCart.phone" />
        </div>
        <div class="col-12 row">
          <div class="q-gutter-sm" v-for="(item, index) in $Static.genderList()" :key="index">
            <q-radio v-model="preCart.gender" :val="item.val" :label="item.label" color="info" />
          </div>
        </div>
        <div class="col-12 row">
          <div class="text-bold q-mb-xs col-12 q-mt-md">Opsi Paket</div>
          <div class="q-gutter-sm">
            <q-option-group :options="[
              {
                label: 'Dewasa',
                color: 'info',
                value: JSON.stringify({
                  type: 'dewasa',
                  price: opt.parent_price,
                  name: opt.name,
                }),
              },
              {
                label: 'Anak',
                color: 'info',
                value: JSON.stringify({
                  type: 'anak',
                  price: opt.child_price,
                  name: opt.name,
                }),
              },
            ]" type="radio" v-model="preCart.opt" />
          </div>
        </div>
        <!-- {{ preCart }} -->

        <div class="col-12 row justify-start items-start">
          <div class="col-md-6 col-12 row">
            <div class="col-12 q-my-md row items-center">
              <div class="text-bold">Layanan Domestik</div>
              <q-btn icon="error_outline" size="xs" round rounded flat />
            </div>

            <div class="col-12 row q-gutter-sm">
              <q-btn v-for="(item, index) in packageDetail.layanan_domestik" :label="item.name" color="info" outline
                :key="index" />
            </div>
          </div>
          <div class="col-md-6 col-12 row q-mb-sm">
            <div class="col-12 q-my-md row items-center">
              <div class="text-bold">Layanan Tambahan</div>
              <q-btn icon="error_outline" size="xs" round rounded flat />
            </div>
            <div v-for="(item, index) in packageDetail.layanan_tambahan" :key="index">
              <q-checkbox v-model="preCart.layanan_tambahan" :val="item" :label="item.name" color="info" />
            </div>
          </div>
        </div>
        <div class="col-12 row q-mt-md">
          <q-btn-group push>
            <q-btn v-for="item, index in btnOpt" :key="index" size="sm" :color="tabBtn === item.name ? 'info' : 'grey'"
              glossy text-color="white" push :label="item.name" @click="() => { tabBtn = item.name }" />
          </q-btn-group>
        </div>
        <div v-if="tabBtn == 'Perlengkapan'" class="col-md-6 col-12 row">
          <div class="col-12 q-my-md row items-center">
            <div class="text-bold">Perlengkapan</div>
            <q-btn icon="error_outline" size="xs" round rounded flat />
          </div>
          <div v-for="(item, index) in packageDetail.perlengkapan" :key="index"
            v-show="item && item.type_2 == preCart.gender">
            <q-checkbox v-model="preCart.perlengkapan" :val="item" :label="item.name" color="info" />
          </div>
        </div>
        <div v-else class="col-md-6 col-12 row">
          <div class="col-12 q-my-md row items-center">
            <div class="text-bold">Paket Perlengkapan</div>
            <q-btn icon="error_outline" size="xs" round rounded flat />
          </div>
          <div class="q-gutter-sm" v-for="(item, index) in packageDetail.paket_perlengkapan" :key="index">
            <q-radio v-model="preCart.paket_perlengkapan_id" :val="item.layanan_id" :label="item.name" color="info" />
          </div>

        </div>
      </q-card-section>

      <q-card-actions align="center" class="bg-white text-teal">
        <div class="q-gutter-sm row justify-center">
          <q-btn size="md" label="Batal" v-close-popup color="info" outline style="width: 200px" />
          <q-btn size="md" label="Tambah Paket" v-close-popup color="info" style="width: 200px" @click="addToCart" />
        </div>
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>
<script>
export default {
  props: ["modelValue", "packageDetail", "opt"],

  watch: {
    "preCart.gender": function (val) {
      this.preCart.perlengkapan = []
    },
  },
  data() {
    return {
      selection: [],
      tabBtn: 'Perlengkapan',
      btnOpt: [{ name: 'Perlengkapan' }, { name: 'Paket Perlengkapan' }],
      preCart: {
        name: null,
        phone: null,
        gender: 1,
        layanan_tambahan: [],
        layanan_domestik: [],
        perlengkapan: [],
        paket_perlengkapan_id: null,
        opt: {},
      },
    }
  },

  methods: {
    addToCart() {
      this.preCart.opt = JSON.parse(this.preCart.opt)
      this.preCart.layanan_domestik = this.packageDetail.layanan_domestik
      const data = Object.assign({}, this.preCart)
      this.$emit("addToCart", data)
      this.preCart = {
        name: null,
        phone: null,
        gender: 1,
        layanan_tambahan: [],
        layanan_domestik: [],
        perlengkapan: [],
        paket_perlengkapan_id: null,
        opt: {},
      }
    },
  },
}
</script>
<style lang=""></style>
