<template >
  <div class="col-12 justify-start row">
    <div class="text-h5 text-bold col-12">Lupa Password</div>
    <div class="col-12 text-weight-regular q-mb-xl">
      <small>Silakan masukan nomor telepon anda untuk mengirim password yang baru</small>
    </div>
    <div class="col-12">
      <small class="col-12 text-weight-light">Nomor Telepon </small>
      <q-input outlined class="col-12" color="info" bg-color="white" placeholder=" 08123456789"
        style="border-radius: 24px !important" :model-value="modelValue"
        @update:model-value="val => $emit('update:modelValue', val)" />
    </div>
    <div class="col-12 row q-mt-xl">
      <q-btn label="Kirim Password" class="col-12 bg-white" size="lg" noCaps flat color="info" type="button"
        @click="$emit('forgot')" />
    </div>
    <div class="col-12 justify-between row q-mt-sm q-mb-lg">
      <small class="text-weight-bold"></small>

    </div>
    <div class="col-12 justify-around row text-weight-light q-mt-sm">
      <small class="col-12 row text-weight-light justify-center q-mt-md">2023 @ PT. Kafilah Maghfirah Wisata</small>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ForgotPassword',
  props: ['modelValue'],
  data() {
    return {

    }
  },
}
</script>
<style>

</style>
