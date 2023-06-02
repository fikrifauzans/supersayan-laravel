<template>
  <q-dialog :model-value="modelValue" persistent @update:model-value="(val) => $emit('update:modelValue', val)">
    <q-card style="width: 700px; max-width: 80vw; border-radius: 15px; min-height: 200px" class="q-px-md q-pa-lg">
      <div class="text-h6 text-primary">Pemesanan Berhasil</div>
      <div class="q-my-md">
        selamat Anda telah memesan paket layanan Maghfirah Travel, silahkan login untuk melakukan pembayaran online selanjutny
      </div>
      <div class="col-12 row">
        <slot />
      </div>
      <div class="col-12 row justify-end q-gutter-sm q-mt-lg">
        <q-btn label="Terima" color="info" v-close-popup @click="$emit('validated')" />
      </div>
    </q-card>
  </q-dialog>
</template>
<script>
export default {
  name: 'SuccessBooking',
  props: ["modelValue"],

  data() { },
  methods: {},
}
</script>
<style lang=""></style>
