<template>
  <div v-if="user">
    <q-btn-dropdown rounded round flat label>
      <template v-slot:label>
        <q-avatar size="40px">
          <img
            :src="user.avatar && user.avatar.path ? user.avatar.path : 'https://cdn.quasar.dev/img/boy-avatar.png'" />
        </q-avatar>
      </template>
      <div class="row no-wrap q-pa-md">
        <!-- <div class="column">
          <div class=" q-mb-md">Settings</div>
        </div>
        <q-separator vertical inset class="q-mx-lg" /> -->
        <div class="column items-center">
          <q-avatar size="72px">
            <img
              :src="user.avatar && user.avatar.path ? user.avatar.path : 'https://cdn.quasar.dev/img/boy-avatar.png'" />
          </q-avatar>
          <div class="text-subtitle1 q-mt-md q-mb-xs">{{ user? user.name : "" }}</div>
          <q-btn class="q-mb-sm" flat round rounded icon="settings" :color="color ? color : 'primary'" push size="sm"
            v-close-popup @click="$router.push({ name: 'admin-profile' })" />
          <q-btn :color="color ? color : 'primary'" label="Logout" push size="sm" v-close-popup @click="logout" />
        </div>
      </div>
    </q-btn-dropdown>
  </div>
</template>

<script>
export default {
  props: ['user', 'color'],
  data() {
    return {
      // user: null,
    }
  },
  methods: {
    logout() {
      this.$api.post("logout", {}, (data, status, message, full) => {
        if (status == 200) {
          this.$Handle.successMessage(message)
          this.$Handle.clearAllLS()
          this.$router.push({ name: "login" })
          // window.location.reload()
        }
      })
    },
  },
}
</script>
<style lang=""></style>
