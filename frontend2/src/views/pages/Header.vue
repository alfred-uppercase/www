<template>
<div class="py-4 px-4 mx-0  lg:px-8 flex align-items-center justify-content-between relative lg:static header-bg">
                <RouterLink class="flex align-items-center" to="/"> <img :src="logoUrl" alt="Sakai Logo" height="50" class="mr-0 lg:mr-2" /><span class="text-900 font-medium text-2xl line-height-3 mr-8">Echri.store</span> </RouterLink>
                <a class="cursor-pointer block lg:hidden text-700 p-ripple" v-ripple v-styleclass="{ selector: '@next', enterClass: 'hidden', leaveToClass: 'hidden', hideOnOutsideClick: true }">
                    <i class="pi pi-bars text-4xl"></i>
                </a>
                <div class="align-items-center surface-0 flex-grow-1 justify-content-between hidden lg:flex absolute lg:static w-full left-0 px-6 lg:px-0 z-2" style="top: 120px">
                    <ul class="list-none p-0 m-0 flex lg:align-items-center select-none flex-column lg:flex-row cursor-pointer">
                        <li>
                            <a @click="smoothScroll('#hero')" class="flex m-0 md:ml-5 px-0 py-3 text-900 font-medium line-height-3 p-ripple" v-ripple>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a @click="smoothScroll('#features')" class="flex m-0 md:ml-5 px-0 py-3 text-900 font-medium line-height-3 p-ripple" v-ripple>
                                <span>Features</span>
                            </a>
                        </li>
                        <li>
                            <a @click="smoothScroll('#highlights')" class="flex m-0 md:ml-5 px-0 py-3 text-900 font-medium line-height-3 p-ripple" v-ripple>
                                <span>Highlights</span>
                            </a>
                        </li>
                        <li>
                            <a @click="smoothScroll('#pricing')" class="flex m-0 md:ml-5 px-0 py-3 text-900 font-medium line-height-3 p-ripple" v-ripple>
                                <span>Pricing</span>
                            </a>
                        </li>
                        <li>
                            <Button @click="deposer()" class="mx-3" type="button" label="Ajouter une annonce" icon="pi pi-plus" :loading="loading"  />
                        </li>
                    </ul>

                    <div class="flex justify-content-between lg:block border-top-1 lg:border-top-none surface-border py-3 lg:py-0 mt-3 lg:mt-0">

                        <ul
                        class="list-none p-0 m-0 flex lg:align-items-center select-none flex-column lg:flex-row border-top-1 surface-border lg:border-top-none">
                        <li>
                            <IconField iconPosition="left">
                                <InputIcon class="pi pi-search"> </InputIcon>
                                <InputText v-model="value1" placeholder="Search" />
                            </IconField>
                        </li>
                        <li><a class="flex px-6 p-3 lg:px-3 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                data-pd-ripple="true"><i
                                    class="pi pi-inbox text-base lg:text-2xl mr-2 lg:mr-0"></i><span
                                    class="block lg:hidden font-medium">Inbox</span><span role="presentation"
                                    aria-hidden="true" data-p-ink="true" data-p-ink-active="false" class="p-ink"
                                    data-pc-name="ripple" data-pc-section="root"></span></a></li>
                        <li><a class="flex px-6 p-3 lg:px-3 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-colors transition-duration-150 p-ripple"
                                data-pd-ripple="true"><i
                                    class="pi pi-bell text-base lg:text-2xl mr-2 lg:mr-0 p-overlay-badge"
                                    data-pd-badge="true" data-p-overlay-badge="true"><span id="pv_id_16_badge"
                                        class="p-badge p-component p-badge-danger p-badge-dot" data-pc-name="badge"
                                        data-pc-section="root"></span></i><span
                                    class="block lg:hidden font-medium">Notifications</span><span role="presentation"
                                    aria-hidden="true" data-p-ink="true" data-p-ink-active="false" class="p-ink"
                                    data-pc-name="ripple" data-pc-section="root"></span></a></li>
                        <li class="border-top-1 surface-border lg:border-top-none">
                            <RouterLink data-pd-ripple="true" class="flex px-6 p-3 lg:px-3 align-items-center hover:surface-100 font-medium border-round cursor-pointer transition-colors transition-duration-150 p-ripple" to="/auth/login">
                                    <i class="pi pi-user lg:text-2xl mr-2 lg:mr-0 p-overlay-badge"></i>
                                    <!-- <img src="" class="mr-3 lg:mr-0"
                                        style="width: 28px; height: 28px;"> -->
                                    <div class="block lg:hidden">
                                        <div class="text-900 font-medium">Josephine Lillard</div><span
                                            class="text-600 font-medium text-sm">Marketing Specialist</span>
                                    </div><span role="presentation" aria-hidden="true" data-p-ink="true"
                                        data-p-ink-active="false" class="p-ink" data-pc-name="ripple"
                                        data-pc-section="root"></span>
                            </RouterLink>
                        </li>
                    </ul>
                        
                    </div>
                </div>
            </div>
</template>
<script setup>
import { useLayout } from '@/layout/composables/layout';
import { computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import { useRouter } from 'vue-router';


const { layoutConfig } = useLayout();
const router = useRouter();

const smoothScroll = (id) => {
    document.querySelector(id).scrollIntoView({
        behavior: 'smooth'
    });
};

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>
<script>
    import { useRouter } from 'vue-router';
    export default {
      methods: {
        deposer(){
            this.$router.push({ name: 'deposer' })
        },
      },
    };
</script>
<style>
.header-bg{
    background: #fff
}
</style>