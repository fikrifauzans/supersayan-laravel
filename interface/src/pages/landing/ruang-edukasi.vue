
<template>
    <div class="col-12 q-px-xl q-mt-xl">
        <div v-if="$route.params.id">
            <div class="col-12 row"
                v-for="item in $Handle.getContent('', 'Ruang Edukasi').filter((val) => val.id == $route.params.id)"
                :key="item">
                <div class="col-12 row">
                    <q-img :src="$System.storageUrl(item.photo.name)" style="height: auto;" cover />
                    <cms-paragraph class="q-mt-md" :title="item.name" />
                    <div v-html="item.details" class="col-12">
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="q-mb-xl">
            <cms-paragraph :topText="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).name"
                :title="$Handle.getContent('title-dokumentasi-foto', 'Titles', true).title" />
            <TableContents group="Ruang Edukasi">
                <template v-slot:default="{ item }">
                    <cms-card type="Ruang Edukasi" :item="item.row"  />
                </template>
            </TableContents>
        </div>

    </div>
</template>
<script>
import TableContents from './components/table-contents.vue'

export default {
    name: "DokumentasiPage",
    components: { TableContents },
    data() {
        return {
            type: 'detail'
        }
    },

}
</script>
