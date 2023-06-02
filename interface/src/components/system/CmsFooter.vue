<template>
    <q-footer class=" text-dark q-pt-xl ">
        <div class="col-12 row bg-primary q-mb-xl">
            <div :class="$q.screen.gt.sm ? 'q-px-xl text-white'  : 'q-px-md text-white' ">
                <div class="row items-center">
                    <div :class="$q.screen.gt.sm ? 'q-mr-xl' : ' q-mb-md'">
                        <q-img src="images/airplane.svg" style="width:60px" />
                    </div>
                    <div>
                        <cms-paragraph :title="$Handle.getContent(null, 'Banner - Register', true).title"
                            :description="$Handle.getContent(null, 'Banner - Register', true).subtitle" />
                    </div>
                </div>
            </div>

        </div>
        <div :class="$q.screen.gt.sm ? 'col-12 row  q-px-xl bg-white q-pt-xl q-pb-xl' : 'col-12 row  q-px-md bg-white q-pt-xl q-pb-xl'">
            <div class="col-md-4 col-12">
                <cms-logo width="200" class="q-pb-md" />

                <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                <div class="menu-footer  poppins">Perkantoran Mitra Matraman Blok A1 No. 25-26, Jl. Matraman Raya No. 148
                    Jakarta 13150
                </div>
            </div>
            <div class="col-md-8 col-12 row">
                <div class="col-md-4 col-12">
                    <div class="title-footer q-mt-md q-my-md poppins">Company</div>
                    <div class="menu-footer  poppins">Ruang Edukasi</div>
                    <div class="menu-footer  poppins">Duta Baitullah</div>
                    <div class="menu-footer  poppins">Cabang</div>
                    <div class="menu-footer  poppins">Karir</div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="title-footer q-mt-md q-my-md poppins">Resource</div>
                    <div class="menu-footer  poppins">Syarat Dan Ketentuan</div>
                    <div class="menu-footer  poppins">Bantuan</div>
                    <div class="menu-footer  poppins">FAQ</div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="title-footer q-mt-md q-my-md poppins">Contact</div>
                    <div class="menu-footer  poppins">travel@maghfirah.com</div>
                    <div class="menu-footer  poppins">08111144633 (Whatsapp)</div>
                </div>
                <!-- <div class="col-md-3 col-12">
                    <div class="title-footer q-mt-md q-my-md poppins">Follow Us</div>
                    <div class="menu-footer  poppins">
                    </div>
                </div> -->

            </div>
        </div>

    </q-footer>
</template>
<script>
export default {

}
</script>
<style lang="scss">
.title-footer {
    font-style: normal;
    font-weight: 700;
    font-size: 17px;
    line-height: 160%;
}

.menu-footer {
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 160%;
}
</style>