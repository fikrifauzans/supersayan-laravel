<template>
  <router-view />
</template>
<script>
export default {
  created() {
    this.authCheck();
  },
  data() {
    return {
      leftDrawerOpen: false,
      rightDrawerOpen: false,
    };
  },
  methods: {
    authCheck() {
      this.$api.get(
        "auth",
        (data, status, message, full) => {
          if (status == 200) {
            return true;
          }
        },
        (e) => {
          console.log(e);
          if (e.status == 401) {
            this.$Handle.clearAllLS();
            this.$Handle.errorMessage(e);
            this.$router.push({ name: "jamaah-login" });
          }
        }
      );
    },
  },
};
</script>
