
<template>
  <q-form class="text-h6 col-12 items-center row justify-center bg-primary q-py-xl q-px-md text-white"
     @submit="login">
    <div class="col-12 justify-start row" v-if="type == 'login'">
      <div class="text-h5 text-bold col-12"></div>
      <div class="col-12  q-mb-xl text-bold text-h6">
        <div class="text-h6 text-bold text-center">
          SELAMAT DATANG DI PREGLEARN
        </div>
        <div class="text text-h6 text-bold text-center">
          PREGNANCY LEARNING
        </div>
      </div>
      <div class="col-12">
        <small class="col-12 ">Username </small>
        <q-input outlined class="col-12" color="primary" bg-color="white" v-model="dataModel.username"
          placeholder="username" style="border-radius: 24px !important" />
      </div>
      <div class="col-12">
        <small class="col-12 ">Password </small>
        <q-input outlined class="col-12" color="primary" bg-color="white" v-model="dataModel.password"
          :type="isPwd ? 'password' : 'text'" placeholder="Password">
          <template v-slot:append>
            <q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer" @click="isPwd = !isPwd" />
          </template>
        </q-input>
      </div>
      <div class="col-12 row q-mt-xl">
        <q-btn label="Login" class="col-12 bg-white" size="lg" noCaps flat color="primary" type="submit" @click="login"
          style="border-radius: 12px;" />
      </div>
      <div class="col-12 justify-between row q-mt-sm q-mb-lg">
        <small class="text-weight-bold"></small>

      </div>
      <div class="col-12 justify-around row text-weight-light q-mt-sm">
      </div>
    </div>
    <Forgot v-if="type == 'forgot'" v-model="username" @forgot="forgot" />
    <VerificationOtp v-if="type == 'verification'" @verification="vericationOtp" :dataOtp="otp" />
  </q-form>
</template>
<script>
import Forgot from './components/forgot.vue'
import VerificationOtp from './components/verification.vue'
export default {
  name: "LoginAll",
  components: {
    Forgot,
    VerificationOtp,
  },
  created() { },
  data() {
    return {
      dataModel: {
        username: "",
        password: "",
      },
      isPwd: true,
      type: 'login',
      otp: null
    }
  },

  methods: {
    login() {
      this.$api.post(
        "login",
        this.dataModel,
        (data, status, message, full) => {
          if (status == 200) {
            this.$Handle.setLS("_user", data.users)
            this.$Handle.setLS("_token", data.token)
            this.$Handle.successMessage(message)
            if (data.users.is_customer == 1) {
              this.$router.push({ name: "cms-jamaah-index" })
            } else {
              if (data.users.role.master_menu.menu_details[0] != undefined) {
                let firstMenu = data.users.role.master_menu.menu_details[0]
                this.$router.push({ name: firstMenu.menu.path })
              }
            }
          }
        },
        (errorMessage) => {
          for (const [key, value] of Object.entries(errorMessage)) {
            this.$Handle.errorMessage(`${value}`)
          }
        }
      )
    },
    forgot() {
      this.$api.post(
        "forgot",
        { username: this.username },
        (data, status, message, full) => {
          if (status == 200) {
            this.otp = data
            if (this.otp != null) {
              this.type = 'verification'
              setInterval(() => {
                this.otp.countExpire = this.$Help.countingDown(this.otp.expired)
              }, 1000);
            }
          }
        },
        (errorMessage) => {
          this.$Handle.errorMessage(errorMessage)
        }
      )
    },
    vericationOtp(otp) {
      let dataModel = { otp: otp, phone: this.otp.phone }
      this.$api.post("otp-verification", dataModel,
        (data, status, message, full) => {
          if (status == 200) {
            this.$Handle.setLS("_user", data.users)
            this.$Handle.setLS("_token", data.token)
            this.$Handle.successMessage(message)
            this.$router.push({
              name: "cms-jamaah-index",
              query: { param: 'newPassword' }
            })
          }
        },
        (errorMessage) => {
          this.$Handle.errorMessage(errorMessage)
        }
      )
    }
  },
}
</script>
<style lang=""></style>
