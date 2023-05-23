<template>
    <div class="q-pa-md  row justify-center">
        <q-carousel style="border-radius: 30px; width: 100%;" animated v-model="slide" navigation infinite
            :autoplay="autoplay" arrows transition-prev="slide-right" transition-next="slide-left"
            @mouseenter="autoplay = false" @mouseleave="autoplay = true" height="100">
            <q-carousel-slide :name="1" img-src="images/carousel.webp" />
        </q-carousel>
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
  