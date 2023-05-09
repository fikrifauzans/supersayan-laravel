<template>
  <div class="col-12 row shadow-4 q-mt-md q-pt-md relative-position full-height">
    <div class="col-12 row absolute-start q-mt-xl">
      <q-img src="images/magfirah.png" style="width: 100px" class="q-ml-md" />
    </div>
    <div :class="
      $q.screen.gt.sm
        ? 'row col-12 justify-center q-mt-md absolute q-gutter-x-xl'
        : 'row col-12 justify-center q-px-md q-mt-xl'
    ">
      <div class="col-md-1 col-12 q-mb-xl">
        <div class="text-bold q-mb-md" style="font-size: 14px">Company</div>
        <div class="q-my-sm">Tentang Kami</div>
        <div class="q-my-sm">Syarat Dan Ketentuan</div>
        <div class="q-my-sm">Bantuan</div>
      </div>
      <div class="col-md-1 col-12 q-mb-xl">
        <div class="text-bold q-mb-md" style="font-size: 14px">Business</div>
        <div class="q-my-sm">Duta Baitullah</div>
        <div class="q-my-sm">Mitra</div>
        <div class="q-my-sm">Karir</div>
      </div>
      <div class="col-md-1 col-12 q-mb-xl">
        <div class="text-bold q-mb-md" style="font-size: 14px">Resource</div>
        <div class="q-my-sm">Keamanan Data</div>
        <div class="q-my-sm">Ruang Edukasi</div>
        <div class="q-my-sm">FAQ</div>
      </div>
      <div class="col-md-1 col-12 q-mb-xl">
        <div class="text-bold q-mb-md" style="font-size: 14px">Contact</div>
        <div class="q-my-sm">0812893129</div>
        <div class="q-my-sm">cs@travel.com</div>
      </div>
      <div class="col-md-1 col-12 q-mb-xl">
        <div class="text-bold q-mb-md" style="font-size: 14px">Follow Us</div>
        <div class="q-my-sm">Tentang Kami</div>
      </div>
    </div>

    <q-img src="images/masjid-line.png"
      :class="$q.screen.lt.md ? 'absolute-bottom q-mb-xl' : 'absolute-bottom q-mb-sm'" />

    <div class="col-12 text-dark text-regular text-center q-py-md" style="margin-top: 200px">
      2023 @ PT. Kafilah Maghfirah Wisata
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
