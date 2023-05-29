<template>
    <div :class="`col-12 col-md-${col}`">
        <div class="top-text ">{{ topText }}</div>
        <div class="title">{{ title }}</div>
        <div v-if="dense === ''" class="description poppins" style="margin-top: 10px !important;"> {{ description }}</div>
        <div v-else class="description poppins"> {{ description }}</div>
        <slot name="bottom" />
     </div>
</template>
<script>
export default {
    props: ['title', 'topText', 'description', 'col' ,'dense'],
    name: 'CmsParagraph',
}
</script>
<style lang="scss">
.top-text {

    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-size: 17px;

}

.title {
    font-family: 'Blenda Script';
    font-style: normal;
    font-weight: 400;
    font-size: 34px;
    line-height: 160%;
    /* or 54px */
}

.description {
    margin-top:25px;
    font-weight: 400;
    font-size: 17px;
    line-height: 160%;
    text-align: justify;
}
</style>