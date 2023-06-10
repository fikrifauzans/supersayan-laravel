<template>
  <q-form class="text-h6 col-10 items-center row justify-center text-white" @submit="submit">
    <div class="col-12 justify-start row">
      <div class="text-h4 text-bold col-12">Buat Akun</div>
      <div class="col-12 text-weight-regular q-mb-lg">
        Silakan buat akun anda dibawah ini.
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Nomor Telepon </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white" v-model="model.phone" />
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Username </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white" v-model="model.username" />
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Email </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white" v-model="model.email" />
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Nama </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white" v-model="model.name" />
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Password </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white"
          :type="utils.showPassword ? 'text' : 'password'" v-model="model.password">
          <template v-slot:append>
            <q-btn :icon="!utils.showPassword ? 'visibility' : 'visibility_off'" flat color="grey-6" rounded round
              @click="utils.showPassword = !utils.showPassword" />
          </template>
        </q-input>
      </div>
      <div class="col-12">
        <small class="col-12 text-weight-light">Verifikasi Password </small>
        <q-input dense outlined class="col-12" color="info" bg-color="white"
          :type="utils.showConfirmPassword ? 'text' : 'password'" v-model="model.confirmPassword">
          <template v-slot:append>
            <q-btn :icon="!utils.showConfirmPassword ? 'visibility' : 'visibility_off'" flat color="grey-6" rounded
              round @click="utils.showConfirmPassword = !utils.showConfirmPassword" />
          </template>
        </q-input>
      </div>
      <div class="col-12 row q-mt-xl">
        <q-btn label="Buat Akun" class="col-12 bg-white" size="lg" noCaps flat color="info" type="submit" />
      </div>
      <div class="col-12 text-weight-regular absolute-top-left">
        <q-btn icon="arrow_back_ios" label="Kembali" flat no-caps @click="$router.back()" />
      </div>
    </div>
  </q-form>
</template>
<script>
import axios from "axios"
export default {
  name: "CreateUsers",
  created() {
    let baseURL = this.$System.apiRoot()
    baseURL += this.$System.apiVersion()
    baseURL += this.$Lang.getLang().toLowerCase()
    let endpoint = "/login"
    let usnPass = this.$System.developerCred()
    let timeout = this.$System.apiTimeout()
    this.instance = axios.create({ baseURL, timeout })
    this.instance.defaults.headers = { Accept: "application/json" }
    this.instance
      .post(endpoint, usnPass)
      .then((response) => {
        this.token = response.data.data.token
        this.instance.defaults.headers.common = { Authorization: `Bearer ${this.token}` }
      })
      .catch((e) => { })
  },
  data() {
    return {
      model: {
        username: null,
        email: null,
        name: null,
        password: null,
        confirmPassword: null,
        is_customer: 1,
      },
      utils: {
        showPassword: false,
        showConfirmPassword: false,
      },
      instance: null,
      token: null,
    }
  },

  methods: {
    submit() {
      this.createUser()
    },
    vetification() {
      let endpoint = "jamaah/otp"
      this.$api.post(
        endpoint,
        { phone: this.model.username },
        (data, status, message, full) => {
          if (status == 200) {
          }
        }
      )
    },
    createUser() {
      let endpoint = "common/register"
      this.$api.post(endpoint, this.model, (data , status) => {
       this.$Handle.successMessage('user created')
       this.$router.push({path:'/login'})
      })
    },
  },
}
</script>
<style lang=""></style>
