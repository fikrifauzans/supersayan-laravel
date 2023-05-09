<template>
  <div class="col-10 items-center row justify-center text-white" v-if="dataOtp">
    <div class="col-12 justify-start row">
      <div class="text-h6 text-bold col-12">Verifikasi</div>

      <div class="col-12 text-weight-regular q-mb-lg" style="font-size:16px">
        Kami sudah mengirimkan kode verifikasi via Whatsapp dengan nomor ({{ dataOtp.phone }}).
        Silahkan periksa pesan masuk anda.
      </div>
      <q-form class="col-12">
        <div class="col-12 row justify-around q-my-md">
          <div class='col-12 q-mb-sm text-weight-regular'>Kirim Sebelum {{ dataOtp.countExpire }}</div>
          <q-input v-for="(item, index) in otp" :key="index" maxlength="1" outlined style="width: 50px" color="info"
            bg-color="white" @keyup="() =>{
            checkFileds()
            focusNext(index + 1, otp[index])
            }" v-model="otp[index]" :class="`otp-${index}`" input-style="font-weight:bold; text-align:center" />
        </div>
      </q-form>
      <div class="col-12 row q-mt-xl"></div>
      <div class="col-12 text-weight-regular absolute-top-left">
        <!-- <q-btn icon="arrow_back_ios" label="Kembali" flat no-caps /> -->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "VerificationUsers",
  props: ['dataOtp'],
  data() {
    return {
      otp: ["", "", "", ""],
    };
  },
  methods: {
    focusNext(number, val) {
      const collection = document.getElementsByClassName(`otp-${number}`);
      if (val.length > 0 && collection && collection[0]) return collection[0].focus();
    },
    checkFileds() {
      let status = true
      this.otp.forEach(o => {
        if (o == "" || o == null) status = false
      })
      if (status == true) this.$emit('verification', this.otp.join(''))
    }
  },
};
</script>
<style lang=""></style>
