<template >
    <div class="col-12 row">

        <!-- FIRST CONTAINER  -->

        <div class="col-12 row">
            <cms-carousel v-if="$Handle.getContent('', 'Carousel')" :class="$q.screen.gt.sm ? 'q-mt-xl' : 'q-mt-md'" :data="$Handle.getContent('', 'Carousel')" />
            <cms-paragraph :class="$q.screen.gt.sm ? 'q-pa-xl' : 'q-px-lg q-mt-xl'" col='6'
                :title="$Handle.getContent('title-first', 'Titles', true).title"
                :topText="$Handle.getContent('title-first', 'Titles', true).subtitle" />
            <div
                :class="$q.screen.gt.sm ? 'q-pa-xl col-12 col-md-6 row justify-end items-center' : 'q-px-lg q-mt-md col-12 col-md-6 row justify-start q-pb-lg'">
                <q-img src="images/award1.png" style="width: 150px;" fit />
                <q-img src="images/award2.png" style="width: 200px;height: 50px;"  />
            </div>
        </div>
        <!-- {{$Handle.getContent('', 'Carousel')}} -->




        <!-- SECOND CONTAINER  -->
        <div class="col-12 row bg-primary  q-pb-xl">
            <!-- LEFT CONTAINER  -->
            <div :class="$q.screen.gt.sm ? 'q-pa-xl text-white col-4' : 'q-px-lg q-mt-xl text-white'">
                <cms-paragraph col='12' :title="$Handle.getContent('title-haji-umrah', 'Titles', true).title"
                    :topText="$Handle.getContent('title-haji-umrah', 'Titles', true).subtitle" />
                <q-btn label="Lihat Semua" color="secondary" class="text-bold default-button q-mt-sm poppins q-mb-md" noCaps
                    unelevated @click="$router.push({ name: 'paket' })" />
                <q-card v-for="(item, index) in $Handle.getContent('', 'Counter')" :key="index" style="border-radius: 12px;"
                    class="text-dark col-12 q-mt-md q-pa-md">
                    <div class="text-h5 text-bold q-mb-xs">{{ item.title }}</div>
                    <cms-paragraph :description="item.name" />
                </q-card>
                <cms-paragraph class="q-mt-md"
                    :topText="$Handle.getContent('text-container-2', 'Text', true).description" />
            </div>
            <!-- RIGHT CONTAINER  -->
            <div :class="$q.screen.gt.sm ? 'col-md-8 col-12' : 'col-md-8 col-12 q-pl-lg'">
                <div class=" q-mt-xl q-gutter-x-sm ">
                    <q-btn v-for="(item) in optionCategory" :key="item" :label="item.name"
                        :class="buttonCategory != item.name ? 'default-button text-bold' : 'default-button bg-white text-black text-bold'"
                        :color="buttonCategory != item.name ? 'secondary' : ''" @click="() => {
                            buttonCategory = item.name
                            getData()
                        }" />
                </div>
                <q-scroll-area style="height: 540px; border-radius: 16 0px 0px 16;"
                    class="bg-secondary default-button q-mt-md col-12 ">
                    <div class="row no-wrap q-pa-md q-gutter-md col-12">
                        <cms-card v-for="(item, index) in packages" :key="index" type="Product" style="width:350px"
                            :item="item" @btnClick="(id) => $router.push({ name: 'paket', query: { id: id } })" />
                    </div>
                </q-scroll-area>
            </div>
        </div>




        <!-- THIRD CONTAINER / MAIN CONTAINER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl' : 'q-px-md'">
            <cms-card :key="index" type="About Us" :item="$Handle.getContent('', 'About Us Summary', true)"
                @btnClick="() => $router.push({ name: 'tentang-kami' })" />
        </div>



        <!-- BANNER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl  q-mt-xl' : 'q-mt-md q-px-md '">
            <q-card :class="$q.screen.gt.sm ? 'col-12 row q-px-xl  q-py-md' : ' q-pa-md'" style="border-radius: 24px;">
                <div class="col-9 ">
                    <cms-paragraph :title="$Handle.getContent('', 'Card - Contact Us', true).title"
                        :description="$Handle.getContent('', 'Card - Contact Us', true).description" />
                </div>
                <div :class="$q.screen.gt.sm ? 'col-3 row justify-end' : 'col-3 row justify-start'">
                    <q-img src="images/cso-icon.png" style="width: 150px; height: 150px;" />
                </div>
                <div>
                    <q-btn unelevated :size="$q.screen.gt.sm ? 'lg' : 'md'" noCaps class="dafault-button q-mt-lg q-mr-md"
                        label="Hubungi Kami (Ikhwan)" color="primary" style="border-radius: 8px;" />
                </div>
            </q-card>
        </div>


        <!-- ABOUNT US CONTENT  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-mt-sm q-px-xl' : 'col-12 row q-mt-sm q-px-lg'">
            <div class="col-md-6 col-12">
                <q-img src="images/about-us.webp" fit class="fit" />
            </div>
            <div class=" col-md-6 col-12 row items-center">
                <div :class="$q.screen.gt.sm ? 'q-mx-xl q-px-xl' : 'q-mt-xl '">
                    <cms-logo width="267" class="q-mb-lg" />
                    <cms-paragraph :title="$Handle.getContent('', 'About Us - Service description', true).title"
                        :description="$Handle.getContent('', 'About Us - Service description', true).description" />
                </div>
            </div>
        </div>


        <!-- LIST USTADZ  -->
        <div class="col-12 row justify-center  q-mt-xl q-pt-md ">
            <div
                :class="$q.screen.gt.sm ? 'col-md-10  col-12 text-center q-px-xl' : 'col-md-10  col-12 text-center q-px-lg'">
                <cms-paragraph :title="$Handle.getContent('title-ustadz-list', 'Titles', true).title"
                    :description="$Handle.getContent('title-ustadz-list', 'Titles', true).subtitle" />
            </div>
            <div :class="$q.screen.gt.sm ? 'col-12 row q-px-lg q-mt-lg' : 'col-12 row q-px-sm q-mt-lg'">
                <div v-for="item in $Handle.getContent('', 'Ustadz')" :key="item" class="col-md-3 col-12 q-px-md">
                    <cms-card type="List Ustadz" :item="item" />
                </div>
            </div>
        </div>

        <!-- TESTIMONI CONTAINER  -->
        <div
            :class="$q.screen.gt.sm ? 'col-12 row justify-between q-px-xl q-mt-xl q-pt-xl' : 'col-12 row justify-between q-px-sm q-mt-xl q-pt-xl'">
            <div class="col-md-3  col-12 row q-px-lg">
                <div class="col-12  q-mb-md">
                    <q-img src="images/comma.svg" style="width:72px" fit />
                </div>
                <div>
                    <cms-paragraph :title="$Handle.getContent('testimoni-title', 'Titles', true).title"
                        :description="$Handle.getContent('testimoni-title', 'Titles', true).subtitle" />
                </div>
            </div>
            <div class="col-md-8  col-12 row">
                <q-carousel animated v-model="slide" navigation infinite :autoplay="autoplay" transition-prev="slide-right"
                    transition-next="slide-left" @mouseenter="autoplay = false" @mouseleave="autoplay = true"
                    class="col-12 q-pb-xl" control-color="primary"
                    :style="$q.screen.gt.sm ? 'height: 300px;' : 'height:auto'">
                    <q-carousel-slide v-for="(item, index) in $Handle.getContent('', 'Testimonies')" :key="index"
                        :name="index" :class="$q.screen.gt.sm ? 'q-px-xl' : ''">
                        <q-card :class="$q.screen.gt.sm ? 'col-12 row fit' : 'col-12 column reverse fit'" flat
                            style="border: 1px solid #99C3AF;border-radius: 16px;">
                            <div :class="$q.screen.gt.sm ? 'col-8  q-pa-xl' : 'col-8  q-pa-xl '">
                                <div
                                    :class="$q.screen.gt.sm ? 'text-h6 text-bold q-mb-md  ' : 'text-h6 text-bold q-mb-md  q-mt-xl'">
                                    {{ item.name }}</div>
                                <div style="font-size: 17px;">{{ item.description }}</div>
                            </div>
                            <div class="col-4">
                                <div style="height:218px ; ">
                                    <q-img :src="$System.storageUrl(item.photo.name)" class="fit"
                                        :style="$q.screen.gt.sm ? 'border-radius:0px 16px 16px 0' : 'border-radius:16px 16px 0px 0'" />
                                </div>
                            </div>
                        </q-card>
                    </q-carousel-slide>
                </q-carousel>
            </div>
        </div>

        <!-- PARTNERSS  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl q-mt-xl q-pt-xl' : 'col-12 row q-px-lg q-mt-xl q-pt-xl'">
            <cms-paragraph :title="$Handle.getContent('title-partner', 'Titles', true).title"
                :description="$Handle.getContent('title-partner', 'Titles', true).description" />
            <div class="col-12 row q-mt-xl justify-center q-gutter-y-xl">
                <q-img v-for="item in $Handle.getContent('', 'Partners',)" v-show="item.photo" :key="item"
                    :src="$System.storageUrl(item.photo.name)" style="width: 150px;" />

            </div>
        </div>
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl q-mt-xl q-pt-xl' : 'col-12 row q-px-md q-mt-xl q-pt-xl'">
            <div class="row col-12 justify-between items-center">
                <div>
                    <cms-paragraph :title="$Handle.getContent('title-ruang-edukasi', 'Titles', true).title"
                        :topText="$Handle.getContent('title-ruang-edukasi', 'Titles', true).name" />
                </div>
                <div>
                    <q-btn unelevated :size="$q.screen.gt.sm ? 'md' : 'md'" noCaps class="dafault-button q-mt-lg q-mr-md"
                        label="Lihat Semua" color="primary" style="border-radius: 8px;"
                        @click="$router.push({ name: 'ruang-edukasi' })" />
                </div>
            </div>
            <div class="col-12 row  q-mt-lg">
                <div v-for="(item) in $Handle.getContent('', 'Ruang Edukasi')" :key="item" class="col-md-4 col-12 q-px-sm">
                    <cms-card type="Ruang Edukasi" :item="item"
                        @btnClick="(ids) => $router.push({ name: 'ruang-edukasi', query: { id: ids } })" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'IndexHome',
    created() {
        this.getData()
    },
    data() {
        return {
            buttonCategory: 'Haji',
            optionCategory: [{ name: 'Haji' }, { name: 'Umrah' }],
            packages: [],
            slide: 0,
            autoplay: true
        }
    },
    methods: {
        getData() {
            this.$api.get(
                this.$System.apiUms() + 'public/packages?table=&like=Category-name:' + this.buttonCategory,
                (data, status, message, full) => {
                    if (status == 200) {
                        this.packages = data.data

                    }
                }, (e) => { }, true)

        },
    },
}
</script>
<style lang="scss"></style>