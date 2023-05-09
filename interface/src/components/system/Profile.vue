<template >
  <div>
    <s-form class="q-px-md q-py-lg" title="Data User">
      <t-input col="4" label="name" r-icon="person" required v-model="model.name" />
      <t-input col="4" label="username" r-icon="person" required v-model="model.username" />
      <t-input col="4" label="email" r-icon="mail" required v-model="model.email" />
      <t-input col="4" type="password" label="password" r-icon="lock" required v-model="model.password" />
      <t-input col="4" label="address" r-icon="home" v-model="model.address" />
      <t-input col="4" label="phone" v-model="model.phone" />
      <t-select-api col="4" api="roles" v-model="model.role_id" optionValue="id" :optionLabel="
  (val) => (val.name ? val.name : model.role ? model.role.name : '')
      " label="role" />
    </s-form>
  </div>
</template>
<script>
export default {
  name: "ProfileComponent"
}
</script>

