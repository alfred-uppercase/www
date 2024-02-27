<template>
    <section class="relative [&:has(#sl-xl.liberty-filled)]:min-h-[648px] [&:has(#sr-xl.liberty-filled)]:min-h-[648px]">

        <!--Ad gauche-->
        <div class="w-[calc((100%-(theme(width.page-max)+(var(--spacing-xl)*2)))/2)] absolute inset-y-[0]  z-dropdown left-[0]"><div class="absolute top-[0] w-full bottom-[0]"><div class="justify-end ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 py-xl"><div class="flex justify-end"><div aria-label="" id="home-left-atf-60-xl" class="" data-liberty-position-name="home-left-atf-60" data-liberty-breakpoint-name="xl"></div></div></div></div></div>

        <!--Ad droite-->
        <div class="w-[calc((100%-(theme(width.page-max)+(var(--spacing-xl)*2)))/2)] absolute inset-y-[0]  z-dropdown right-[0]"><div class="absolute top-[0] w-full bottom-[0]"><div class="justify-start ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 py-xl"><div class="flex justify-start"><div aria-label="" id="home-right-atf-70-xl" class="" data-liberty-position-name="home-right-atf-70" data-liberty-breakpoint-name="xl"></div></div></div></div></div>

        <!--Titre-->
        <h1 class="m-none hidden py-xl text-center text-display-3 font-semi-bold custom:block">{{ bannerTitle }}</h1>

        <!--Ajouter annonce-->
        <div class="src__CenteredWrapper-sc-1bgl6we-0 iCaNcC">
            <div class="px-lg text-center">
                <h1 class="mb-lg mt-xl block text-center text-body-2 custom:hidden">Des millions de petites annonces et autant d’occasions de se faire plaisir</h1>
                <a @click="dpsannonce" class="relative mb-2xl min-h-[8rem] overflow-hidden p-lg flex items-center justify-center rounded-lg bg-main-container before:absolute before:bottom-none before:left-none before:right-none before:top-none before:z-base before:bg-left-bottom before:bg-no-repeat before:bg-[image:var(--leftOrnamentMobile)] before:bg-[length:auto_50%] tiny:before:bg-[length:auto_60%] sm:before:bg-[length:auto_80%] custom:before:bg-[length:auto_60%] lg:before:bg-[image:var(--leftOrnamentDesktop)] lg:before:bg-[length:auto_100%] after:absolute after:bottom-none after:left-none after:right-none after:top-none after:z-base after:bg-right-bottom after:bg-no-repeat after:bg-[image:var(--rightOrnamentMobile)] after:bg-[length:auto_60%] tiny:after:bg-[length:auto_70%] sm:after:bg-[length:auto_80%] lg:after:bg-[image:var(--rightOrnamentDesktop)] lg:after:bg-[length:auto_100%]" style="--leftOrnamentDesktop: url('/_next/static/media/left-ornament-desktop.4281d0cc.svg'); --leftOrnamentMobile: url('/_next/static/media/left-ornament-mobile.0c4bbe50.svg'); --rightOrnamentDesktop: url('/_next/static/media/right-ornament-desktop.cc3ef612.svg'); --rightOrnamentMobile: url('/_next/static/media/right-ornament-mobile.b8d75e7c.svg');">
                    <div class="relative z-raised flex flex-col items-center md:flex-row">
                        <p class="mb-md text-headline-1 md:mb-none md:mr-xl lg:mr-lg">C’est le moment de vendre</p>
                        <button @click="dpsannonce" data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" aria-busy="false" aria-live="off"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="AddSquareOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="m12,6.84c.56,0,1.01.45,1.01,1.01v3.14h3.14c.56.02.99.5.96,1.05-.02.52-.44.94-.96.96h-3.14v3.14c0,.56-.45,1.01-1.01,1.01-.56,0-1.01-.45-1.01-1.01h0v-3.14h-3.14c-.56,0-1.01-.45-1.01-1.01,0-.56.45-1.01,1.01-1.01h3.14v-3.14c0-.56.45-1.01,1.01-1.01h0Z"></path><path fill-rule="evenodd" d="m7.16,2c-2.85,0-5.16,2.31-5.16,5.16h0v9.68c0,2.85,2.31,5.16,5.16,5.16h9.68c2.85,0,5.16-2.31,5.16-5.16V7.16c0-2.85-2.31-5.16-5.16-5.16H7.16Zm-3.14,5.16c0-1.73,1.4-3.14,3.14-3.14h9.68c1.73,0,3.14,1.4,3.14,3.14h0v9.68c0,1.73-1.4,3.14-3.14,3.14H7.16c-1.73,0-3.14-1.4-3.14-3.14h0V7.16h0Z"></path></svg>
                            Déposer une annonce
                        </button>
                    </div>
                </a>
            </div>
        </div>

        <!--Top categorie-->
        <section class="styles_widgets__7jhBb" aria-label="Widgets">
            <div class="min-h-[13rem] pl-lg custom:min-h-[15rem]">
                <h2 class="mb-lg text-headline-1 text-on-basic-container">Top catégories</h2>

                <div data-test-id="top-cat-carousel" data-qa-id="top-cat-carousel">
                    <div edges="end" edgescolor="#fafafa" class="indexstyles__View-sc-10uesfx-0 fACpgy">


                        <swiper
                            :slides-per-view="5"
                            :space-between="5"
                            navigation
                            @swiper="onSwiper"
                            @slideChange="onSlideChange"
                            aria-label="Carrousel du top des catégories"
                            class="indexstyles__Root-sc-10uesfx-1 bQPJuk"
                        >
                            <swiper-slide 
                            v-for="(category, index) in categories" 
                            :key="category.id"
                            class="indexstyles__Slide-sc-10uesfx-2 inqJnI">
                            <router-link 
                            :key="category.id"
                            :to="{ name: 'annonces', params: { id_cat: category.id } }"
                            class="group relative mr-lg block h-[12rem] w-[12rem] rounded-lg bg-neutral-container tiny:w-[18rem]" title="Ventes immobilières de maison et appartement">
                                    <!-- <a :href="`/recherche?search_string=&selected_city_id=&selected_category_id=${category.id}`"> -->
                                            <img alt="Ventes immobilières de maison et appartement" loading="lazy" width="361" height="241" decoding="async" data-nimg="1" class="!h-[12rem] w-[12rem] relative block z-base object-cover rounded-lg opacity-none transition-opacity duration-300 group-hover:opacity-[0.9] tiny:w-[18rem]" :src="`/uploads/category_thumbnails/${category.thumbnail}`" style="color: transparent;">
                                            <div class="absolute bottom-none left-none right-none pb-md pt-sm z-raised rounded-b-lg bg-[linear-gradient(0deg,rgba(0,0,0,.6)_10%,rgba(250,250,250,0)_100%)] text-center text-body-2-link text-[#FFF] tiny:w-[18rem] custom:text-subhead">
                                                {{ category.name }}
                                            </div>
                                    <!-- </a> -->
                            </router-link>
                            </swiper-slide>
                        </swiper>

                    </div>
                </div>
            </div>
        </section>


        <!-- Get specific categorie-->
        <section data-test-id="discoverySection" class="mx-auto my-none max-w-page-max overflow-hidden pb-none pr-none">
            <div>
                <section class="mx-auto my-none max-w-page-max overflow-hidden pb-none pl-lg pr-none pt-xl" data-qa-id="discovery">
                    <div class="py-xl mr-lg custom:mr-md">
                        <div class="whitespace-pre-line">
                            <div class="mb-lg flex items-center justify-between text-on-background md:mb-xl">
                                <h2 class="text-headline-2">Hôtels</h2>
                                
                                <a class="text-body-2" href="/discovery/69">
                                    <div><span class="hidden items-center justify-between gap-md font-bold md:flex">Voir plus d’annonces
                                    
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m15.46,6.28c-.4.38-.41,1.01-.03,1.4l3.22,3.33H3c-.55,0-1,.44-1,.99s.45.99,1,.99h15.65l-3.22,3.33c-.38.4-.37,1.02.03,1.4.4.38,1.03.37,1.41-.03l4.85-5.01c.37-.38.37-.99,0-1.37l-4.85-5.01c-.38-.4-1.02-.41-1.41-.03Z"></path></svg></span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size md:hidden" data-spark-component="icon" aria-hidden="true" focusable="false" aria-label="Voir plus d’annonces"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg>
                                    </div>
                                </a>
                            </div>

                            <!--Slider-->
                            <div>
                                <div class="relative" data-test-id="sliderWrapper">
                                    <div class="relative z-base overflow-auto u-no-scrollbar w-full">
                                        <swiper
                                            :slides-per-view="5"
                                            :space-between="5"
                                            navigation
                                            @swiper="onSwiper"
                                            @slideChange="onSlideChange"
                                            aria-label="Carrousel du top des catégories"
                                            class="relative grid grid-flow-col justify-start gap-lg"
                                        >
                                            <swiper-slide 
                                            v-for="listing in listings" 
                                            :key="listing.id"
                                            :data-marker-id="listing.code"
                                            :id="listing.code"
                                            class="list-none">
                                            <div class="h-full !w-[17rem] custom:!w-[19rem]">
                                                <router-link
                                                    :key="listing.id"
                                                    :to="{ name: 'annoncesUnique', params: { id: listing.id } }"
                                                    :id="'listing-banner-image-for-' + listing.code"
                                                    class="group/adcard flex h-[inherit] flex-col"
                                                    data-test-id="ad" 
                                                    data-qa-id="aditem_container"
                                                >
                                                    <div class="adCard_c3c39 relative flex h-[inherit]" data-test-id="adcard-consumer-goods-list">
                                                        <div class="adCard_9vq5pg relative before:block" data-test-id="image">
                                                            <div class="adCard_10ldc relative h-full">
                                                                <div class=" relative box-border flex h-full items-center justify-center overflow-hidden bg-neutral-container min-h-[auto] min-w-[auto] rounded-md">
                                                                    <div class="_2JtY0">
                                                                        <div class="LazyLoad is-visible">
                                                                            <div class="_29Lk0">
                                                                                <img :src="'uploads/listing_thumbnails/' + listing.listing_thumbnail" class="_1cnjm absolute inset-none m-auto h-full w-full object-cover" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="absolute left-md right-md top-md">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="adCard_cdvao relative min-w-none flex-1 
                                                        flex
                                                        flex-col
                                                        justify-between
                                                        ">
                                                        
                                                        <div class="flex min-w-none flex-col gap-y-sm">
                                                            <div class="flex flex-row items-start gap-x-md">
                                                                <div class="flex min-w-none items-center gap-x-sm">
                                                                    <p data-qa-id="aditem_title" data-title="true" title="{{ listing.name }}" class="line-clamp-[--maxLines] text-ellipsis break-words text-body-1 font-bold text-on-surface transition-colors group-hover/adcard:text-main-variant line-clamp-2 break-normal" style="--maxLines: 2;">
                                                                        {{ listing.name }}
                                                                    </p>
                                                                </div>
                                                                <span data-spark-component="tag" class="box-border inline-flex items-center justify-center gap-sm whitespace-nowrap text-caption font-bold h-sz-20 px-md rounded-full border-sm border-current text-support ml-auto">Pro</span>
                                                            </div>
                                                            <div class="inline-flex flex-wrap items-baseline">
                                                                <p class="flex flex-wrap items-center text-callout font-bold !leading-[--font-size-body-2-line-height] text-on-surface" data-test-id="price" aria-label="Prix: À partir de 24 € par nuit">
                                                                    <span class="[&amp;_small-support]:text-caption [&amp;_small-support]:font-regular [&amp;_small-support]:text-support [&amp;_small]:text-caption [&amp;_small]:font-regular" data-qa-id="aditem_price">
                                                                        <span>
                                                                            <small>à partir de&nbsp;</small>24&nbsp;€ <small-support>/ nuit</small-support>
                                                                        </span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-sm flex items-end gap-sm">
                                                            <p class="flex flex-wrap overflow-hidden overflow-hidden text-caption text-neutral">
                                                                <span title="Cannes 06400 Centre-Ville" class="mr-[1.2rem] last:mr-none">Cannes 06400 Centre-Ville</span>
                                                                <span class="relative inline-block w-full before:absolute before:right-full before:top-none before:hidden before:w-[1.2rem] before:text-center before:font-bold before:content-['·'] tiny:w-auto tiny:before:inline-block" aria-label="Date de dépôt : 01/02/2024." title="01/02/2024">01/02/2024</span>
                                                            </p>
                                                            <div class="relative inline-block ml-auto">
                                                                <div data-spark-component="popover-anchor">
                                                                    <button class="flex rounded-sm text-neutral hover:text-neutral-hovered" data-test-id="adcard_favorite_button" data-qa-id="listitem_save_ad" title="Ajouter l’annonce aux favoris">
                                                                        
                                                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="LikeOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="m16.28,3c-1.72,0-3.24.83-4.28,2.11-1.04-1.28-2.57-2.11-4.28-2.11-3.21,0-5.72,2.85-5.72,6.24,0,2.77,1.41,4.75,1.97,5.51,1.87,2.47,4.38,4.11,6.67,5.6h.02c.25.17.49.33.73.49.32.21.73.22,1.06.02.21-.13.43-.26.63-.39h.02c2.39-1.48,5.02-3.1,6.95-5.68.64-.86,1.95-2.83,1.95-5.54,0-3.4-2.51-6.23-5.72-6.23h0Zm-8.57,2.12c1.46,0,2.76.96,3.35,2.39.16.38.52.64.93.64s.77-.25.93-.64c.6-1.44,1.9-2.39,3.36-2.39,1.99,0,3.7,1.79,3.69,4.13,0,2-.98,3.5-1.52,4.24-1.67,2.25-3.98,3.67-6.43,5.19l-.07.04-.21-.13c-2.33-1.52-4.54-2.97-6.18-5.14-.51-.67-1.54-2.18-1.54-4.2,0-2.33,1.7-4.13,3.7-4.13h0Z"></path></svg>
                                                                    
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </router-link>
                                        </div>
                                            </swiper-slide>
                                        </swiper>      
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </section>

    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted, } from "vue";
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();




import { storeToRefs } from 'pinia'
// categorie
import { useCategoryStore } from '../../stores/categorie'


import { useCitieStore } from '../../stores/cities'
const { cities } = storeToRefs(useCitieStore())
const { getCities } = useCitieStore()
getCities()
const luxoponcture = ref('/assets/frontend/images/logo/luxoponcture-nantes-vendée-f.png')
const imgDefault = ref('/assets/frontend/images/imobilier/moderne-bleu-canard.jpg')

// const cities = ref([]);
const bannerTitle = ref('');
const slogan = ref('');
const search_string = ref('');
const selected_city_id = ref('');
const selected_category_id = ref('');
const results = ref([]);
const listings = ref([]);

const categories  = ref([]);
const subCategories  = ref([]);

function dpsannonce() {
  router.push({ name: 'deposer-une-annonce' })
}


onMounted(async () => {
  try {
    const responses = await axios.get('/home/listings');
    listings.value = responses.data.listings;
    const response = await axios.get('/api/get_categories');
    categories.value = response.data;
    for (const category of categories.value) {
      const getSubCategory = await axios.get(`/api/get_sub_categories/${category.id}`);
      console.log('Response from get_sub_categories:', getSubCategory.data);

      subCategories.value.push(getSubCategory.data);
    }
  } catch (error) {
    console.error('Error fetching categories:', error);
  }

});

const body = document.getElementsByTagName("body")[0];
//hooks
const submitForm = async () => {
  try {
    const responsse = await axios.get('http://localhost/home/filter_listings', {
      params: {
        search_string: search_string.value,
        selected_city_id: selected_city_id.value,
        selected_category_id: selected_category_id.value,
      },
    });

    // Handle the response and update results
    results.value = responsse.data;
  } catch (error) {
    console.error('Error fetching results:', error);
  }
  router.push({
    name: 'listings',
    query: {
      search_string: search_string.value,
      selected_city_id: selected_city_id.value,
      selected_category_id: selected_category_id.value,
    },
  });
};

onMounted(async () => {
  try {


    const bannerTitleResponse = await axios.get('/api/get_frontend_settings/banner_title');
    console.log('Response from get_frontend_settings:', bannerTitleResponse.data);
    bannerTitle.value = bannerTitleResponse.data;
    const sloganResponse = await axios.get('/api/get_frontend_settings/slogan');
    slogan.value = sloganResponse.data;
  } catch (error) {

  }

  body.classList.add("about-us");
  body.classList.add("bg-gray-200");
});

onUnmounted(() => {
  body.classList.remove("about-us");
  body.classList.remove("bg-gray-200");
});

</script>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
  import 'swiper/css/scrollbar';

export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      const onSwiper = (swiper) => {
        console.log(swiper);
      };
      const onSlideChange = () => {
        console.log('slide change');
      };
      return {
        onSwiper,
        onSlideChange,
        modules: [Navigation, Pagination, Scrollbar, A11y],
      };
    },
  };
</script>
<style>
.styles_widgets__7jhBb {
    margin: 0.8rem auto 0;
    padding-bottom: 1.6rem;
    max-width: 1066px;
    overflow: hidden;
}
.iCaNcC {
    width: 100%;
    max-width: 1066px;
    margin: 0px auto;
}
.adCard_10ldc  {
    position: absolute;
    inset: 0;
    height: auto;
}
.adCard_10ldc::before {
    padding-bottom: 125%;
}
.adCard_c3c39 {
          flex-direction: column;
          border-radius: 0;
          border: 0;
          padding: 0;
}
.adCard_cdvao {
    margin-left: 0;
    margin-top: var(--spacing-md);
    width: 100%;
}
</style>