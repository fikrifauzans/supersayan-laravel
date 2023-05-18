<template >
    <div>
        <q-btn v-for="item, index in options" :key="index"
            :class="modelValue == item.value ? 'text-bold btn-tab' : 'text-grey text-bold btn-tab'"
            :color="modelValue == item.value ? 'primary' : 'white'" :label="item.label" :model-value="modelValue"
            @click="emitters(item)" noCaps />

    </div>
</template>
<script>
export default {
    name: "TabTools",
    props: ['classButton', 'options', 'modelValue'],
    data() {
        return {
        }
    },
    methods: {
        emitters(item) {
            this.$emit('update:modelValue', item.value)
        }
    },
}
</script>
<style lang="scss" >
.btn-tab {
    border-radius: 10px
}
</style>