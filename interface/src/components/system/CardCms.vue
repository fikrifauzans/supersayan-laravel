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
    <q-card v-else-if="type == 'About Us'" :class="$q.screen.gt.sm ? 'row col-12 q-mt-xl card-about-us' : 'row col-12 q-mt-xl card-about-us'" >
        <div class="col-md-5 col-12">
            <q-img class="fit" fit src="images/card-about-us.webp" />
        </div>
        <div :class="$q.screen.gt.sm ? 'col-md-7 row  q-pa-xl items-center row' : 'col-md-7 row  q-pa-lg items-center row'">
            <cms-paragraph :title="item.title" :description="item.description" col="12">
                <template v-slot:bottom>
                    <q-btn unelevated size="lg" noCaps class="dafault-button q-mt-lg" label="Lihat Selengkapnya"
                        color="primary" style="border-radius: 8px;" />
                </template>
            </cms-paragraph>
        </div>
    </q-card>
</template>
<script>
export default {
    name: 'CardProducst',
    props: ['type', 'item'],
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