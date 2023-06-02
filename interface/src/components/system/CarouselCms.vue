<template>
  <div class="q-pa-md col-12">

    <q-carousel animated v-model="slide" arrows navigation infinite v-if="data" :style="$q.screen.lt.md ? 'height:220px' : 'height:500px'">
      <q-carousel-slide v-for="(item, index) in data" v-show="item && item.photo" :key="item" style="border-radius:16px"
        :name="index" >
        <q-img class="fit" fit :src="$System.storageUrl(item.photo.name)" :style="$q.screen.lt.md ? 'height:100px' : ''" />
      </q-carousel-slide>
    </q-carousel>
    <!-- {{ data[0] }} -->
  </div>
</template>
  
<script>
import { ref } from 'vue'

export default {
  name: 'CarouselCms',
  props: ['data'],

  setup() {
    return {
      slide: ref(1)
    }
  }
}
</script>
  