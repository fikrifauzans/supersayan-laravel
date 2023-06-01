<template>
    <div :class="$q.screen.gt.sm ? 'col-12 q-px-xl q-mt-xl' : 'col-12 q-px-md q-mt-xl'">
        <div class="q-mb-xl">
            <cms-paragraph :topText="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).name"
                :title="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).title" />
            <TableContents group="Dokumentasi">
                <template v-slot:default="{ item }">

                    <q-img :src="$System.storageUrl(item.row.photo.name)" />
                </template>
            </TableContents>
        </div>
        <div>
            <cms-paragraph :topText="$Handle.getContent('title-dokumentasi-video', 'Titles', true).name"
                :title="$Handle.getContent('title-dokumentasi-video', 'Titles', true).title" />
            <TableContents group="Dokumentasi Video">
                <template v-slot:default="{ item }">
                    <cms-card type="Dokumentasi Video" :item="item.row" />
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