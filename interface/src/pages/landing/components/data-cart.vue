<template>
  <div>

    <q-scroll-area style="height: calc(100vh - 130px)">
      <div class="col-12 row q-pa-md row">
        <div class="row">
          <div class="text-bold">Detail Pesanan</div>
          <div v-if="data.length > 0">Berikut ini merupakan detail pesanan anda :</div>
          <div v-else>
            Anda belum memiliki pesanan, silahkan pilih paket terlebih dahulu
          </div>
          <q-list class="col-12 q-mb-sm" v-for="(item, index) in data" :key="index" v-show="data">
            <!-- {{ item }} -->
            <q-card flat bordered class="q-px-sm col-12 row"> 
              <div class="row justify-between text-center col-12">
                <div class="text-bold text-start q-pl-md">
                  Rp {{ $Help.transformMoney(sumTotalPersonTransaction(item)) }}
                </div>
              </div>
              <q-expansion-item :label="item.name" :caption="item.opt.name + ' ' + item.opt.type" dense
                class="q-mb-md col-12">

                <div class="q-mt-md col-12 row q-px-md">
                  <div class="row justify-between text-center col-12">
                    <div class="text-start">Nomor Tlp</div>
                    <div class="text-bold text-start">{{ item.phone }}</div>
                  </div>
                  <div class="col-12">
                    <div class="q-my-sm">Biaya Paket :</div>
                    <div class="q-pl-sm row justify-between text-weight-thin q-my-xs">
                      <div>Paket {{ item.opt.name }} ({{ item.opt.type }})</div>
                      <div>Rp {{ $Help.transformMoney(item.opt.price) }}</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="q-my-sm">Biaya Domestik :</div>
                    <div class="q-pl-sm row justify-between text-weight-thin q-my-xs"
                      v-for="(domestik, i_dom) in item.layanan_domestik" :key="i_dom">
                      <div>{{ domestik.name }}</div>
                      <div>Rp {{ $Help.transformMoney(domestik.price) }}</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="q-my-sm">Layanan Tambahan :</div>
                    <div class="q-pl-sm row justify-between text-weight-thin q-my-xs"
                      v-for="(tambahan, i_tambahan) in item.layanan_tambahan" :key="i_tambahan">
                      <div>{{ tambahan.name }}</div>
                      <div>Rp {{ $Help.transformMoney(tambahan.price) }}</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="q-my-sm">Biaya Domestik Perlengkapan :</div>
                    <div class="q-pl-sm row justify-between text-weight-thin q-my-xs">
                      <div>Total Perlengkapan</div>
                      <div>Rp. {{ $Help.transformMoney(sumPerlengkapan(item)) }}</div>
                    </div>
                  </div>
                  <div class="col-12 row justify-end q-mt-md">
                    <q-btn color="negative" icon="delete" size="sm" outline @click="$emit('deleteBtn' , index)" />
                    <!-- <q-btn color="info" icon="edit" label="edit" size="sm" class="q-ml-sm" /> -->
                  </div>
                </div>
              </q-expansion-item>
            </q-card>
          </q-list>
        </div>
      </div>
    </q-scroll-area>
    <div class="col-12 row  ">
      <div class=" absolute-bottom q-mb-xl">
        <div class="col-12 q-mt-md q-px-md">Total Pembayaran</div>
        <div class="col-12 text-h6 q-px-md">
          Rp. {{ $Help.transformMoney(sumTotalTransactions(data)) }}
        </div>
      </div>

      <!-- {{ cart }} -->
      <div class="col-12 row absolute-bottom q-mb-md">
        <div class="col-6 row q-px-sm">
          <q-btn size="sm" class="q-mx-sm col-12" color="info" label="Hubungi Admin" outline />
        </div>
        <div class="col-6 row q-px-sm">
          <q-btn size="sm" class="q-mx-sm col-12" :color="data.length > 0 ? 'info' : 'grey'" label="Pesan Sekarang"
            @click="validateTransaction()" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DataCart",
  props: ["data"],
  async created() { },
  methods: {
    sumPerlengkapan(item) {
      let sum = 0
      item.perlengkapan.forEach((element) => {
        sum += parseInt(element.default_item.selling_price)
      })
      return sum
    },

    sumLayanan(item, key) {
      let total = 0
      item[key].forEach((element) => {
        total += parseInt(element.price)
      })
      return total
    },

    sumTotalPersonTransaction(item) {

      let bPaket = parseInt(item.opt.price)
      let domestik = parseInt(this.sumLayanan(item, "layanan_domestik"))
      let tambahan = parseInt(this.sumLayanan(item, "layanan_tambahan"))
      let perlengkapan = parseInt(this.sumPerlengkapan(item))

      let total = 0
      total += domestik
      total += tambahan
      total += perlengkapan
      total += bPaket




      return total
    },
    sumTotalTransactions(items) {
      // console.log(items);
      if (items) {

        let total = 0
        items.forEach((item) => {
          total += this.sumTotalPersonTransaction(item)
        })
        return total
      }
    },

    validateTransaction() {
      if (this.data.length <= 0) {
        this.$Handle.errorMessage("Tambah Keranjang Terlebih Dahulu", "positive")
      } else this.$emit("validate")
    },
  },
}
</script>
