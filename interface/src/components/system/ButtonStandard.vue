<template>
    <q-btn :color="active ? 'primary' : 'white'" noCaps :class="`default-button q-py-sm col-${col}`"
        >
        <div class="row items-center justify-center">
            <div class="text-bold">
                <div :class="active ? 'text-white row items-center' : 'text-grey row items-center'">
                    <span v-if="icon && icon != ''"><q-icon :name="icon ? icon.toString() : ''" size="xs"
                            :class="label ?  'q-mr-sm' : ''" /></span>
                    <span v-if="label && label != ''" :class="labelClass">{{ label }}</span>
                </div>
            </div>
        </div>
    </q-btn>
</template>
<script>
export default {
    props: ['active', 'label', 'icon', 'col' ,'labelClass'],
  
}
</script>
<style lang="scss">
.default-button {
    border-radius: 10px;
}
</style>