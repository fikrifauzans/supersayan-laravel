<template>
    <div :class="`col-12 col-md-${col}`">
        <div class="top-text ">{{ topText }}</div>
        <div class="title">{{ title }}</div>
        <div class="description"></div>
    </div>
</template>
<script>
export default {
    props: ['title', 'topText', 'description', 'col'],
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
</style>