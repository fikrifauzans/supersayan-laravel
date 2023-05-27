<template>
    <q-footer class=" text-dark q-pt-xl ">
        <div class="col-12 row bg-primary q-mb-xl">
            <div class="q-px-xl text-white  ">
                <div class="row items-center">
                    <div class="q-mr-xl">
                        <q-img src="images/airplane.svg" style="width:60px" />
                    </div>
                    <div>
                        <cms-paragraph :title="$Handle.getContent(null, 'Banner - Register', true).title"
                            :description="$Handle.getContent(null, 'Banner - Register', true).subtitle" />
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 row  q-px-xl bg-white q-pt-xl">
            <div class="col-md-4 col-12">
                <cms-logo width="200" class="q-pb-md" />

                <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                <div class="menu-footer  poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quidem
                </div>
            </div>
            <div class="col-md-8 col-12 row">
                <div class="col-3">
                    <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                    <div class="menu-footer  poppins">Lorem ipsum dolor sit amet
                    </div>
                </div>
                <div class="col-3">
                    <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                    <div class="menu-footer  poppins">Lorem ipsum dolor sit amet
                    </div>
                </div>
                <div class="col-3">
                    <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                    <div class="menu-footer  poppins">Lorem ipsum dolor sit amet
                    </div>
                </div>
                <div class="col-3">
                    <div class="title-footer q-mt-md q-my-md poppins">Maghfirah Travel</div>
                    <div class="menu-footer  poppins">Lorem ipsum dolor sit amet
                    </div>
                </div>

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