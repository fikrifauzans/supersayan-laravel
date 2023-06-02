<template>
  <q-dialog :model-value="modelValue" persistent @update:model-value="(val) => $emit('update:modelValue', val)">
    <q-card style="width: 700px; max-width: 80vw; border-radius: 15px; min-height: 200px" class="q-px-md q-pa-lg">
      <div class="text-h6">Lanjutkan Transaksi</div>
      <div class="q-my-md">
        Anda yakin akan melanjutkan transaksi? pastikan transaksi yang anda benar. langkah
        seanjutnya adalah pembayaran dp dengan pembayaran jumlah nominal.
        <span class="text-bold">Rp. 5.000.000/pack</span>. masukan name dan no telepon untuk login dan melakukan pembayaran
      </div>
      <div class="col-12 row">
        <slot />
      </div>
      <div class="col-12 row justify-end q-gutter-sm q-mt-lg">
        <q-btn label="Batal" color="grey" v-close-popup />
        <q-btn label="Lanjutkan" color="info" v-close-popup @click="$emit('validated')" />
      </div>
    </q-card>
  </q-dialog>
</template>
<script>
export default {
  name: 'ValidatorBooking',
  props: ["modelValue"],

  data() { },
  methods: {},
}
</script>
<style lang=""></style>
