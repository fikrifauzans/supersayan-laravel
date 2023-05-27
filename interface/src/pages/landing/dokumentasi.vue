<template>
    <div class="col-12 q-px-xl q-mt-xl">
        <div class="q-mb-xl">
            <cms-paragraph :topText="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).name"
                :title="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).title" />
            <TableContents>
                <template v-slot:default>
                    <q-img src="images/example-dokumentasi.png" />
                </template>
            </TableContents>
        </div>
        <div>
            <cms-paragraph :topText="$Handle.getContent('title-dokumentasi-video', 'Titles', true).name"
                :title="$Handle.getContent('title-dokumentasi-video', 'Titles', true).title" />
            <TableContents>
                <template v-slot:default>
                   <cms-card type="Dokumentasi Video" />
                </template>
            </TableContents>
        </div>

    </div>
</template>
<script>
import TableContents from './components/table-contents.vue'

export default {
    name: "DokumentasiPage",
    components: { TableContents }

}
</script>
<style lang="">
    
</style>