<template >
    <div :class="$q.screen.gt.sm ? 'q-px-lg' : ''">
        <!-- THIRD CONTAINER / MAIN CONTAINER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl' : 'q-px-md'">
            <cms-card :key="index" type="About Us" :item="$Handle.getContent('', 'About Us Content', true)" hidaButton
                :topText="$Handle.getContent('', 'About Us Content', true).name" />


            <!-- VISION & MISSION  -->
            <div class="col-12 row q-gutter-y-xl q-mt-sm" >
                <q-card style="border-radius: 16px;"
                    v-for="item in [$Handle.getContent('', 'About Us - Vision', true), $Handle.getContent('', 'About Us - Mission', true)]"
                    :key="item" :class="$q.screen.gt.sm ? 'col-12 row q-px-xl q-mt-l q-py-md q-my-lg' : 'q-px-md'">
                    <div class="text-h6 text-bold">
                        {{ item.name }}
                    </div>
                    <div class="col-12">
                        <cms-paragraph :description="item.description" />
                    </div>
                </q-card>
            </div>

            <!-- AWARDS  -->
            <div class="col-12 row q-mb-xl">
                <div v-for="item in $Handle.getContent('', 'Awards - List')" :key="item" class="q-mb-md">
                    <cms-card :key="index" type="Awards" :item="item" />
                </div>
            </div>

            <!-- TOP SERVICES  -->
            <div class="q-mt-xl q-pt-lg">
                <cms-paragraph :title="$Handle.getContent('top-services', 'Titles', true).title"
                    :topText="$Handle.getContent('top-services', 'Titles', true).subtitle" />
                <q-card v-for="item in $Handle.getContent('', 'Top Service')" :key="item"
                    class="col-12 row  q-pa-lg q-mb-md" flat style="border: 1px solid #99C3AF;border-radius: 16px;">
                    <div style="font-size: 17px;">{{ item.subtitle }}</div>
                </q-card>
            </div>




        </div>




    </div>
</template>
<script>
export default {

}
</script>
<style lang="">
    
</style>