<template>
    <q-header class="navbar-cms text-white q-ma-md row items-center" height-hint="98" style="height: 100px;">
        <q-toolbar>
            <!-- <q-btn dense flat round icon="menu" @click="toggleLeftDrawer" /> -->
            <q-toolbar-title class="text-dark">
                <q-avatar >
                    <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
                </q-avatar>
                Title
            </q-toolbar-title>
            <q-toolbar-title class="bg-red row items-cener">
                <q-avatar>
                    <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
                </q-avatar>
                Title
            </q-toolbar-title>
            <q-toolbar-title></q-toolbar-title>
            <!-- <q-btn dense flat round icon="menu" color="dark"  /> -->
        </q-toolbar>
    </q-header>
</template>
<script>
export default {
    name: 'NavbarCms'
}
</script>
<style lang="scss">
.navbar-cms {
    background: #FFFFFF;
    box-shadow: 3px 0px 30px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
}
</style>