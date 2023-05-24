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
        <div class="col-12 row bg-primary ">
            <div :class="$q.screen.gt.sm ? 'q-pa-xl text-white' : 'q-px-lg q-mt-xl text-white'">
                <cms-paragraph col='12' :title="$Handle.getContent('title-haji-umrah', 'Titles', true).title"
                    :topText="$Handle.getContent('title-haji-umrah', 'Titles', true).subtitle" />
                <q-btn label="Lihat Semua" color="secondary" class="text-bold default-button q-mt-sm poppins" noCaps unelevated  />
                <q-card v-for="(item,index) in $Handle.getContent('', 'Counter')" :key="index" class="text-dark col-12 q-mt-md" >
                    <div>{{item}}</div>
                </q-card>

            </div>


        </div>




    </div>
</template>
<script>
export default {
    name: 'IndexHome'
}
</script>
<style lang="scss"></style>