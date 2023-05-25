<template >
    <div class="col-12 row">

        <!-- FIRST CONTAINER  -->
        <div class="col-12 row">
            <cms-carousel :class="$q.screen.gt.sm ? 'q-mt-xl' : 'q-mt-md'" />
            <cms-paragraph :class="$q.screen.gt.sm ? 'q-pa-xl' : 'q-px-lg q-mt-xl'" col='6'
                :title="$Handle.getContent('title-first', 'Titles', true).title"
                :topText="$Handle.getContent('title-first', 'Titles', true).subtitle" />
            <div
                :class="$q.screen.gt.sm ? 'q-pa-xl col-12 col-md-6 row justify-center' : 'q-px-lg q-mt-md col-12 col-md-6 row justify-start q-pb-lg'">
                <q-img src="images/award1.png" style="width: 150px;" fit />
                <q-img src="images/award2.png" style="width: 150px;" fit />
            </div>
        </div>


        <!-- SECOND CONTAINER  -->
        <div class="col-12 row bg-primary  q-pb-xl">
            <!-- LEFT CONTAINER  -->
            <div :class="$q.screen.gt.sm ? 'q-pa-xl text-white col-4' : 'q-px-lg q-mt-xl text-white'">
                <cms-paragraph col='12' :title="$Handle.getContent('title-haji-umrah', 'Titles', true).title"
                    :topText="$Handle.getContent('title-haji-umrah', 'Titles', true).subtitle" />
                <q-btn label="Lihat Semua" color="secondary" class="text-bold default-button q-mt-sm poppins q-mb-md" noCaps
                    unelevated />
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
                            :item="item" />
                    </div>
                </q-scroll-area>
            </div>
        </div>




        <!-- THIRD CONTAINER / MAIN CONTAINER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl' : 'q-px-md'">
            <cms-card :key="index" type="About Us" :item="$Handle.getContent('', 'About Us Summary', true)" />
        </div>



        <!-- BANNER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl  q-mt-xl' : 'q-mt-md q-px-md'">
            <q-card :class="$q.screen.gt.sm ? 'col-12 row q-px-xl  q-py-md' : ''">
                <div class="col-9 ">
                    <cms-paragraph :title="$Handle.getContent('', 'Card - Contact Us', true).title"
                        :description="$Handle.getContent('', 'Card - Contact Us', true).description" />
                </div>
                <div class="col-3 row justify-end">
                    <q-img src="images/cso-icon.png" style="width: 150px; height: 150px;" />

                </div>
                <div >
                    <q-btn unelevated size="lg" noCaps class="dafault-button q-mt-lg q-mr-md" label="Hubungi Kami (Ikhwan)"
                        color="primary" style="border-radius: 8px;" />
                    <q-btn unelevated size="lg" noCaps class="dafault-button q-mt-lg" label="Hubungi Kami (Akhwat)"
                        color="primary" style="border-radius: 8px;" />
                </div>
            </q-card>
        </div>

        <div class="col-12 row q-mt-xl">
            <div class="col-md-6">
                <q-img src="images/about-us.webp" fit class="fit" />
            </div>
            <div class="col-md-6"></div>
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
        }
    },
    methods: {
        getData() {
            this.$api.get(
                this.$System.apiUms() + 'public/packages?table=&like=Category-name:' + this.buttonCategory,
                (data, status, message, full) => {
                    if (status == 200) {
                        this.packages = data.data
                        console.log(this.packages)
                    }
                }, (e) => { }, true)

        },
    },
}
</script>
<style lang="scss"></style>