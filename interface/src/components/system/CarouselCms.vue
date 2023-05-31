<template>
    <div class=" col-12 row q-pt-lg row justify-center">
        <div class="col-md-2 q-pt-lg" v-if="$q.screen.gt.sm">
            <q-img src="images/carousel.webp" style="height: 180px; border-radius: 0 20px 20px 0; opacity: 0.5;"
                class="col-12 fit" />
        </div>
        <div class="col-12 col-md-8 q-px-md  row relative-position">
            <div class="col-12 row absolute-center justify-between  " style="z-index: 1;">
                <q-btn class="bg-white" icon="navigate_before" round rounded />
                <q-btn class="bg-white" icon="navigate_next" round rounded />
            </div>
            <q-img src="images/carousel.webp" style="height: 200px;" class="col-12 fit" />
        </div>
        <div class="col-md-2 q-pt-lg" v-if="$q.screen.gt.sm">
            <q-img src="images/carousel.webp" style="height: 200px;opacity: 0.5;" class="col-12 fit" />
        </div>
    </div>
</template>
  
<script>
import { ref } from 'vue'

export default {
    setup() {
        return {
            slide: ref(1),
            autoplay: ref(true)
        }
    }
}
</script>
  