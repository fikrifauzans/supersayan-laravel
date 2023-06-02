
<template>
    <div :class="$q.screen.gt.sm ? 'col-12 q-px-xl q-mt-xl' : 'col-12 q-px-md q-mt-xl'">
        <div v-if="id">
            <q-btn color="primary" label="Kembali" class="q-mb-lg" unelevated style="border-radius: 6px;" noCaps size="md"
                @click="() => {
                    id = null
                }" />
            <div class="col-12 row" v-for="item in $Handle.getContent('', 'Ruang Edukasi').filter((val) => val.id == id)"
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
                    <cms-card type="Ruang Edukasi" :item="item.row" @btnClick="(idC) => id = idC" />
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
    created() {
        if (this.$route.query.id) this.id = this.$route.query.id
    },
    data() {
        return {
            type: 'detail',
            id: null
        }
    },

}
</script>
