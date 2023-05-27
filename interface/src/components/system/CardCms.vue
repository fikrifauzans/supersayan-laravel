<template>
    <!-- CARD PRODUCT  -->
    <q-card class="col-12" v-if="type == 'Product'" style="border-radius: 16px;">
        <div style="width: 100%; height: 320px; border-radius: 16px 16px 0 0;">
            <q-img :src="item.photo.path" fit class="fit" style="border-radius: 16px 16px 0 0" />
        </div>
        <div class="q-pa-md">
            <div class="text-bold q-mb-xs" style="font-size: 12px;"><q-icon name="star" size="xs" style="color: #EFC113;" />
                {{ item.setaraf_hotel.value_1 }}</div>
            <div style="font-size: 17px; height: 45px; text-align:start ;" class="text-bold">{{ item.name }}</div>
            <div style="font-size:12px" class="text-grey-default"><q-icon name="flight " /> {{ item.bandara.name }}</div>
            <q-separator class="q-mx-sm q-my-sm" />
            <div class="row col-12 justify-between items-end  ">
                <div>
                    <div style="font-size:12px" class="text-grey-default">Kuota</div>
                    <div class="text-h6 text-bold">{{ item.quota }} Pax</div>
                </div>
                <div>
                    <q-btn unelevated icon-right="chevron_right" size="md" noCaps class="dafault-button"
                        label="Pelajari Selengkapnya" color="primary" style="border-radius: 8px;" />
                </div>
            </div>
        </div>
    </q-card>
    <!-- CARD ABOUT US SUMMARY  -->
    <q-card v-else-if="type == 'About Us'"
        :class="$q.screen.gt.sm ? 'row col-12 q-mt-xl card-about-us' : 'row col-12 q-mt-xl card-about-us'">
        <div class="col-md-5 col-12">
            <q-img class="fit" fit src="images/card-about-us.webp" />
        </div>
        <div :class="$q.screen.gt.sm ? 'col-md-7 row  q-pa-xl items-center row' : 'col-md-7 row  q-pa-lg items-center row'">
            <cms-paragraph :title="item.title" :description="item.description" col="12" :topText="topText">
                <template v-slot:bottom>
                    <q-btn v-if="hidaButton !== ''" unelevated :size="$q.screen.gt.sm ? 'lg' : 'md'" noCaps
                        class="dafault-button q-mt-lg" label="Lihat Selengkapnya" color="primary"
                        style="border-radius: 8px;" />
                </template>
            </cms-paragraph>
        </div>
    </q-card>
    <!-- LIST USTADZ  -->
    <q-card v-else-if="type == 'List Ustadz'" class="col-12 row" style="border-radius: 16px;">
        <div class="col-12 bg-grey" style="height: 196px;"></div>
        <div class="col-12 q-py-md">
            <div class="text-bold text-center col-12  q-mb-md"> Name </div>
            <div class=" text-center col-12"> Jamatannya Apa </div>
        </div>
    </q-card>
    <!-- RUANG EDUKASI  -->
    <q-card v-else-if="type == 'Ruang Edukasi'" class="col-12 row q-mb-md" style="border-radius: 12px; height: 395px;">
        <div class="col-12 bg-grey" style="height: 200px;"></div>
        <div class="col-12 q-py-md q-px-md">
            <div class="text-bold  col-12  q-mb-md" style="font-size: 17px;"> Ingat 5 PASTI UMRAH dalam memilih travel
            </div>
            <div class=" text-start col-12" style="color: #616161;">Lörem ipsum hyda decilidade exoktiga. Telede beril disk
                innan autorar i hösk
                plagekav. </div>
            <div class=" text-start col-12 q-mt-md">12 April 2023</div>
        </div>
    </q-card>
    <!-- RUANG EDUKASI  -->
    <q-card flat v-else-if="type == 'Dokumentasi Video'" class="col-12 row q-mb-md"
        style="border-radius: 12px; height: 305px;">
        <div class="col-12 bg-grey" style="height: 200px; border-radius: 16px;"></div>
        <div class="col-12  q-px-xs ">
            <div class=" text-start col-12" style="color: #616161;">Lörem </div>
            <div class="text-bold  col-12  q-mb-md" style="font-size: 17px;"> Ingat 5 PASTI UMRAH dalam memilih travel
            </div>
            <div class=" text-start col-12 q-mt-md">12 April 2023</div>
        </div>
    </q-card>
    <q-card v-else-if="type == 'Awards'" flat
        :class="$q.screen.gt.sm ? 'row col-12 q-mt-xl card-about-us' : 'row col-12 q-mt-xl card-about-us'">
        <div class="col-md-5 col-12">
            <cms-paragraph :title="item.title"  />
            <q-img class="fit" fit src="images/awards-csrtificate.png" />
        </div>
        <div :class="$q.screen.gt.sm ? 'col-md-7 row  q-pa-xl items-center row' : 'col-md-7 row  q-pa-lg items-center row'">
            <cms-paragraph :description="item.description" col="12" />
        </div>
    </q-card>
</template>
<script>
export default {
    name: 'CardProducst',
    props: ['type', 'item', 'hidaButton', 'topText'],
}
</script>
<style>
.text-grey-default {
    color: #616161;


}

.card-about-us {
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.08), 0px 5px 5px rgba(0, 0, 0, 0.12);
    border-radius: 24px;
}
</style>