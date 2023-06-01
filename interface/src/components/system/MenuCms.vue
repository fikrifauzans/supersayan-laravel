<template>
    <div :class="column === '' ? 'column q-mt-md q-gutter-y-md' : 'absolute row justify-center col-12 q-gutter-x-xl'">
        <div v-for="item, index in data" :key="index"
            :class="checkRoute(item.path) ? ' cms-menu text-bold' : 'cms-menu cursor-pointer'"
            @click="$router.push({ name: item.path })">{{ item.name }}</div>
    </div>
</template>
<script>
export default {
    props: ['data' ,'column'],
    name: 'CmsMenu',
    methods: {
        checkRoute(menuName) {
            // console.log(this.$route.name == menuName);
            if (this.$route.name == menuName) return true
        }
    },
}
</script>
<style>
.cms-menu {
    font-style: normal;

    font-size: 14px;
}
</style>