<template >
    <div>
        <!-- THIRD CONTAINER / MAIN CONTAINER  -->
        <div :class="$q.screen.gt.sm ? 'col-12 row q-px-xl' : 'q-px-md'">
            <cms-card :key="index" type="About Us" :item="$Handle.getContent('', 'About Us Content', true)" hidaButton
                :topText="$Handle.getContent('', 'About Us Content', true).name" />


            <!-- VISION & MISSION  -->
            <div class="col-12 q-mt-md">
                <q-card style="border-radius: 16px;"
                    v-for="item in [$Handle.getContent('', 'About Us - Vision', true), $Handle.getContent('', 'About Us - Mission', true)]"
                    :key="item" :class="$q.screen.gt.sm ? 'col-12 row q-px-xl q-mt-l q-py-md q-mb-md' : 'q-px-md'">
                    <div class="text-h6 text-bold">
                        {{ item.name }}
                    </div>
                    <div class="col-12">
                        <cms-paragraph :description="item.description" />
                    </div>
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