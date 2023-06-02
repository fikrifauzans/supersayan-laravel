<template>
    <q-header class="navbar-cms text-dark q-ma-md row  " height-hint="98" style="height: 100px;">
        <q-toolbar class="row">
            <q-toolbar-title class="text-dark">
               <cms-logo width="143" />
            </q-toolbar-title>
            <cms-menu v-if="$q.screen.gt.sm" :data="$Handle.getContent('','Menu')" />
            <q-btn v-if="$q.screen.lt.md" dense flat round icon="menu" color="dark" @click="$emit('clickLeftMenu')" />   
            <slot /> 
        </q-toolbar>
    </q-header>
</template>
<script>
export default {
    name: 'NavbarCms',
    created() {

    },
}
</script>
<style lang="scss">
.navbar-cms {
    background: #FFFFFF;
    box-shadow: 3px 0px 30px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
}
</style>