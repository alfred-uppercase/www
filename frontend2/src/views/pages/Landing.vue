<script setup>
import { useLayout } from '@/layout/composables/layout';
import { computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';

import { ref, onMounted, onUnmounted, } from "vue";
import axios from 'axios';
import { useRouter } from 'vue-router';
import { storeToRefs } from 'pinia'
// categorie
import { useCategoryStore } from '../../stores/categorie'


import { useCitieStore } from '../../stores/cities'

const router = useRouter();

const { layoutConfig } = useLayout();

const smoothScroll = (id) => {
    document.querySelector(id).scrollIntoView({
        behavior: 'smooth'
    });
};

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});

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
const romspecs  = ref([]);

function dpsannonce() {
  router.push({ name: 'deposer-une-annonce' })
}
function formattedDate(timestamp) {
    const date = new Date(timestamp * 1000);
  const now = new Date();

  // Comparer la date actuelle avec la date de l'annonce
  const diffInDays = Math.floor((now - date) / (24 * 60 * 60 * 1000));

  if (diffInDays === 0) {
    return 'Aujourd\'hui';
  } else if (diffInDays === 1) {
    return 'Hier';
  } else if (diffInDays === 2) {
    return 'Avant-hier';
  } else {
    const options = {
      day: 'numeric',
      month: 'long',
      year: 'numeric',
    };
    
    return date.toLocaleDateString('fr-FR', options);
  }
}

onMounted(async () => {
  try {
    const responses = await axios.get('https://echri.store/home/listings');
    listings.value = responses.data.listings;

    // for (const list of listings.value) {
    //       const romspec = await axios.get(`http://localhost/api/get_hotel_spec/${list.id}`);
    //     //   console.log('Response from Room spec:', romspec.data);
    //       romspecs.value[list.id] = romspec.data;
    // }

    const response = await axios.get('https://echri.store/api/get_categories_parent');
    categories.value = response.data;
          console.log('Response categorie:', response.data);

    for (const category of categories.value) {
      const getSubCategory = await axios.get(`https://echri.store/api/get_sub_categories/${category.id}`);
      subCategories.value.push(getSubCategory.data);
    }
  } catch (error) {
    console.error('Error fetching categories:', error);
  }

});

    // Fonction pour trouver la chambre avec le prix le moins cher
    const cheapestRoom = (listingId) => {
      const rooms = romspecs.value[listingId];
      if (rooms && rooms.length > 0) {
        return rooms.reduce((min, romspec) => (min.price < romspec.price ? min : romspec));
      }
      return null;
    };

    // Vérifie si des spécifications de chambre existent pour une liste donnée
    function hasRomSpecs(listingId) {
      return romspecs.value.some(spec => spec.listing_id === listingId);
    }

    // Récupère les spécifications de chambre pour une liste donnée
    function getRomSpecs(listingId) {
      return romspecs.value.filter(spec => spec.listing_id === listingId);
    }
const body = document.getElementsByTagName("body")[0];
//hooks
const submitForm = async () => {
  try {
    const responsse = await axios.get('https://echri.store/home/filter_listings', {
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
    const bannerTitleResponse = await axios.get('https://echri.store/api/get_frontend_settings/banner_title');
    console.log('Response from get_frontend_settings:', bannerTitleResponse.data);
    bannerTitle.value = bannerTitleResponse.data;
    const sloganResponse = await axios.get('https://echri.store/api/get_frontend_settings/slogan');
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

<template>
    <div class="surface-0 flex justify-content-center">
        <div id="home" class="overflow-hidden">


            <div
                id="hero"
                class="flex flex-column pt-4 px-4 lg:px-8 overflow-hidden"
                style="background: linear-gradient(0deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), radial-gradient(77.36% 256.97% at 77.36% 57.52%, rgb(238, 239, 175) 0%, rgb(195, 227, 250) 100%); clip-path: ellipse(150% 87% at 93% 13%)"
            >
                <div class="mx-4 md:mx-8 mt-0 md:mt-4">
                    <h1 class="text-6xl font-bold text-gray-900 line-height-2">{{bannerTitle}}</h1>
                    <p class="font-normal text-2xl line-height-3 md:mt-3 text-gray-700">{{slogan}}</p>
                    <form @submit.prevent="submitForm">
                        <div class="flex flex-col md:flex-row gap-3 py-3">
                                <InputGroup>
                                    <InputText :v-model="search_string" placeholder="Votre recherche..." />
                                </InputGroup>
                                <InputGroup>
                                    <Dropdown v-model="selected_city_id" :options="cities" optionLabel="value" placeholder="Tous les villes" class="w-full " />
                                    <!-- <CascadeSelect v-model="selectedCity" :options="countries" optionLabel="cname" optionGroupLabel="name"
                                :optionGroupChildren="['states', 'cities']" style="min-width: 14rem" placeholder="Tous les villes" /> -->
                                </InputGroup>
                                <InputGroup>
                                    <Dropdown v-model="selected_category_id" :options="categories" optionLabel="name" placeholder="Tous les villes" class="w-full " />

                                <!-- <Dropdown v-model="selectedCitys" :options="cities" optionLabel="name" placeholder="Tous les catégories" class="w-full md:w-[14rem]" /> -->
                                </InputGroup>
                                <InputGroup>
                                    <Button type="submit" label="Submit" />
                                </InputGroup>
                        </div>
                    </form>
                </div>
                <div class="flex justify-content-center md:justify-content-end">
                    <img src="/demo/images/landing/screen-1.png" alt="Hero Image" class="w-9 md:w-auto" />
                </div>
            </div>

            <div id="features" class="py-4 px-4 lg:px-8 mt-5 mx-0 lg:mx-8">
                <div class="grid justify-content-center">
                    <div class="col-12 text-center mt-8 mb-4">
                        <h2 class="text-900 font-normal mb-2">Catégories</h2>
                        <span class="text-600 text-2xl">Nos principales catégories</span>
                    </div>

                    <div class="col-12">
                        <div class="places-grid __9 py-11">
                            <ul class="list">
                                <li v-for="(category, index) in categories" :key="category.id" :class="'list-item place-item-' + (index + 1)">
                            <router-link :key="category.id" :to="{ name: 'Annonces', params: { id: category.id } }" class="link">
                                <div class="search-badge">
                                <div class="lazybackground">
                                    <img :src="`https://echri.store/uploads/category_thumbnails/${category.thumbnail}`" loading="lazy">
                                </div>
                                <div class="search-badge-text">{{ category.name }}</div>
                                </div>
                            </router-link>
                            </li>
                        </ul></div>

                    </div>

                    <div
                        class="col-12 mt-8 mb-8 p-2 md:p-8"
                        style="border-radius: 20px; background: linear-gradient(0deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)), radial-gradient(77.36% 256.97% at 77.36% 57.52%, #efe1af 0%, #c3dcfa 100%)"
                    >
                        <div class="flex flex-column justify-content-center align-items-center text-center px-3 py-3 md:py-0">
                            <h3 class="text-gray-900 mb-2">Joséphine Miller</h3>
                            <span class="text-gray-600 text-2xl">Peak Interactive</span>
                            <p class="text-gray-900 sm:line-height-2 md:line-height-4 text-2xl mt-4" style="max-width: 800px">
                                “Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.”
                            </p>
                            <img src="/demo/images/landing/peak-logo.svg" class="mt-4" alt="Company logo" />
                        </div>
                    </div>
                </div>
            </div>

            <div id="highlights" class="py-4 px-4 lg:px-8 mx-0 my-6 lg:mx-8">
                <div class="text-center">
                    <h2 class="text-900 font-normal mb-2">Powerful Everywhere</h2>
                    <span class="text-600 text-2xl">Amet consectetur adipiscing elit...</span>
                </div>

                <div class="grid mt-8 pb-2 md:pb-8">
                    <div class="flex justify-content-center col-12 lg:col-6 bg-purple-100 p-0 flex-order-1 lg:flex-order-0" style="border-radius: 8px">
                        <img src="/demo/images/landing/mockup.svg" class="w-11" alt="mockup mobile" />
                    </div>

                    <div class="col-12 lg:col-6 my-auto flex flex-column lg:align-items-end text-center lg:text-right">
                        <div class="flex align-items-center justify-content-center bg-purple-200 align-self-center lg:align-self-end" style="width: 4.2rem; height: 4.2rem; border-radius: 10px">
                            <i class="pi pi-fw pi-mobile text-5xl text-purple-700"></i>
                        </div>
                        <h2 class="line-height-1 text-900 text-4xl font-normal">Congue Quisque Egestas</h2>
                        <span class="text-700 text-2xl line-height-3 ml-0 md:ml-2" style="max-width: 650px"
                            >Lectus arcu bibendum at varius vel pharetra vel turpis nunc. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Sit amet mattis vulputate enim nulla aliquet.</span
                        >
                    </div>
                </div>

                <div class="grid my-8 pt-2 md:pt-8">
                    <div class="col-12 lg:col-6 my-auto flex flex-column text-center lg:text-left lg:align-items-start">
                        <div class="flex align-items-center justify-content-center bg-yellow-200 align-self-center lg:align-self-start" style="width: 4.2rem; height: 4.2rem; border-radius: 10px">
                            <i class="pi pi-fw pi-desktop text-5xl text-yellow-700"></i>
                        </div>
                        <h2 class="line-height-1 text-900 text-4xl font-normal">Celerisque Eu Ultrices</h2>
                        <span class="text-700 text-2xl line-height-3 mr-0 md:mr-2" style="max-width: 650px"
                            >Adipiscing commodo elit at imperdiet dui. Viverra nibh cras pulvinar mattis nunc sed blandit libero. Suspendisse in est ante in. Mauris pharetra et ultrices neque ornare aenean euismod elementum nisi.</span
                        >
                    </div>

                    <div class="flex justify-content-end flex-order-1 sm:flex-order-2 col-12 lg:col-6 bg-yellow-100 p-0" style="border-radius: 8px">
                        <img src="/demo/images/landing/mockup-desktop.svg" class="w-11" alt="mockup" />
                    </div>
                </div>
            </div>

            <div id="pricing" class="py-4 px-4 lg:px-8 my-2 md:my-4">
                <div class="text-center">
                    <h2 class="text-900 font-normal mb-2">Matchless Pricing</h2>
                    <span class="text-600 text-2xl">Amet consectetur adipiscing elit...</span>
                </div>

                <div class="grid justify-content-between mt-8 md:mt-0">
                    <div class="col-12 lg:col-4 p-0 md:p-3">
                        <div class="p-3 flex flex-column border-200 pricing-card cursor-pointer border-2 hover:border-primary transition-duration-300 transition-all" style="border-radius: 10px">
                            <h3 class="text-900 text-center my-5">Free</h3>
                            <img src="/demo/images/landing/free.svg" class="w-10 h-10 mx-auto" alt="free" />
                            <div class="my-5 text-center">
                                <span class="text-5xl font-bold mr-2 text-900">$0</span>
                                <span class="text-600">per month</span>
                                <Button label="Get Started" class="block mx-auto mt-4 p-button-rounded border-none ml-3 font-light line-height-2 bg-blue-500 text-white"></Button>
                            </div>
                            <Divider class="w-full bg-surface-200"></Divider>
                            <ul class="my-5 list-none p-0 flex text-900 flex-column">
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Responsive Layout</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Unlimited Push Messages</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">50 Support Ticket</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Free Shipping</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 lg:col-4 p-0 md:p-3 mt-4 md:mt-0">
                        <div class="p-3 flex flex-column border-200 pricing-card cursor-pointer border-2 hover:border-primary transition-duration-300 transition-all" style="border-radius: 10px">
                            <h3 class="text-900 text-center my-5">Startup</h3>
                            <img src="/demo/images/landing/startup.svg" class="w-10 h-10 mx-auto" alt="startup" />
                            <div class="my-5 text-center">
                                <span class="text-5xl font-bold mr-2 text-900">$1</span>
                                <span class="text-600">per month</span>
                                <Button label="Try Free" class="block mx-auto mt-4 p-button-rounded border-none ml-3 font-light line-height-2 bg-blue-500 text-white"></Button>
                            </div>
                            <Divider class="w-full bg-surface-200"></Divider>
                            <ul class="my-5 list-none p-0 flex text-900 flex-column">
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Responsive Layout</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Unlimited Push Messages</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">50 Support Ticket</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Free Shipping</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 lg:col-4 p-0 md:p-3 mt-4 md:mt-0">
                        <div class="p-3 flex flex-column border-200 pricing-card cursor-pointer border-2 hover:border-primary transition-duration-300 transition-all" style="border-radius: 10px">
                            <h3 class="text-900 text-center my-5">Enterprise</h3>
                            <img src="/demo/images/landing/enterprise.svg" class="w-10 h-10 mx-auto" alt="enterprise" />
                            <div class="my-5 text-center">
                                <span class="text-5xl font-bold mr-2 text-900">$999</span>
                                <span class="text-600">per month</span>
                                <Button label="Get a Quote" class="block mx-auto mt-4 p-button-rounded border-none ml-3 font-light line-height-2 bg-blue-500 text-white"></Button>
                            </div>
                            <Divider class="w-full bg-surface-200"></Divider>
                            <ul class="my-5 list-none p-0 flex text-900 flex-column">
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Responsive Layout</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Unlimited Push Messages</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">50 Support Ticket</span>
                                </li>
                                <li class="py-2">
                                    <i class="pi pi-fw pi-check text-xl text-cyan-500 mr-2"></i>
                                    <span class="text-xl line-height-3">Free Shipping</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <AppConfig simple />
</template>

<!-- <style scoped>
#hero {
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), radial-gradient(77.36% 256.97% at 77.36% 57.52%, #eeefaf 0%, #c3e3fa 100%);
    height: 700px;
    overflow: hidden;
}

@media screen and (min-width: 768px) {
    #hero {
        -webkit-clip-path: ellipse(150% 87% at 93% 13%);
        clip-path: ellipse(150% 87% at 93% 13%);
        height: 530px;
    }
}

@media screen and (min-width: 1300px) {
    #hero > img {
        position: absolute;
    }

    #hero > div > p {
        max-width: 450px;
    }
}

@media screen and (max-width: 1300px) {
    #hero {
        height: 600px;
    }

    #hero > img {
        position: static;
        transform: scale(1);
        margin-left: auto;
    }

    #hero > div {
        width: 100%;
    }

    #hero > div > p {
        width: 100%;
        max-width: 100%;
    }
}
</style> -->
<style>
@media (max-width: 767.98px) {
  .places-list,.places-list.search-form,.places-list,.places-list.search-form {
      padding-right:0;
      padding-left: 0
  }

  .places-list .section-title {
      --bs-gutter-x: 30px;
      --bs-gutter-y: 0;
      width: 100%
  }

  .places-list .section-title,.places-list .section-title {
      padding-right: calc(var(--bs-gutter-x)*.5);
      padding-left: calc(var(--bs-gutter-x)*.5);
      margin-right: auto;
      margin-left: auto
  }
}

@media (min-width: 768px) {
  .places-list {
      padding-top:3rem;
      padding-bottom: 3rem
  }

  .places-list .heading {
      position: relative
  }
}

@media (min-width: 768px) and (min-width:544px) {
  .places-list .heading {
      margin-bottom:30px
  }
}

@media (min-width: 768px) and (max-width:767.98px) {
  .places-list .heading {
      margin-bottom:15px
  }
}

.places-list .title-left {
  text-align: left!important
}

.places-list .title-right,.places-list .title-left {
  text-align: right
}

.places-list .title-right {
  text-align: left
}

.places-list .title-center {
  text-align: center
}

.places-list .description {
  font-size: 1.125rem;
  line-height: 2rem
}

.places-list .description {
  margin-bottom: 1rem
}

@media (max-width: 767.98px) {
  .places-list .description {
      --bs-gutter-x:30px;
      --bs-gutter-y: 0;
      width: 100%;
      font-size: 1rem;
      line-height: 1.375rem
  }

  .places-list .description,.places-list .description {
      padding-right: calc(var(--bs-gutter-x)*.5);
      padding-left: calc(var(--bs-gutter-x)*.5);
      margin-right: auto;
      margin-left: auto
  }
}

@media (max-width: 767.98px) {
  .places-list .section-title {
      margin-top:40px;
      margin-bottom: 16px
  }
}

.places-grid {
  margin-bottom: 20px
}

@media (max-width: 767.98px) {
  .places-grid .list {
      display:flex;
      flex-direction: row;
      height: 245px;
      -webkit-overflow-scrolling: touch;
      overflow-x: auto;
      width: 100%;
      scroll-snap-type: x mandatory;
      scrollbar-width: none;
      -ms-overflow-style: none
  }

  .places-grid .list .search-badge {
      height: 100%;
      width: 280px;
      max-width: 75vw
  }

  .places-grid .list .search-badge {
      margin-right: 1rem
  }

  .places-grid .list .search-badge {
      margin-left: 1rem
  }

  .places-grid .list .list-item {
      scroll-snap-align: center
  }

  .places-grid .list .list-item:first-child .search-badge {
      margin-left: 1rem
  }

  .places-grid .list .list-item:first-child .search-badge {
      margin-right: 1rem
  }

  .places-grid .list::-webkit-scrollbar {
      width: 0;
      height: 0
  }

  .places-grid .list::-webkit-scrollbar {
      background: transparent
  }
}

@media (min-width: 768px) {
  .places-grid {
      grid-template-areas:"place-item-1" "place-item-2" "place-item-3" "place-item-4" "place-item-5" "place-item-6" "place-item-7" "place-item-8" "place-item-9" "place-item-10"
  }

  .places-grid .place-item-1 {
      grid-area: place-item-1
  }

  .places-grid .place-item-2 {
      grid-area: place-item-2
  }

  .places-grid .place-item-3 {
      grid-area: place-item-3
  }

  .places-grid .place-item-4 {
      grid-area: place-item-4
  }

  .places-grid .place-item-5 {
      grid-area: place-item-5
  }

  .places-grid .place-item-6 {
      grid-area: place-item-6
  }

  .places-grid .place-item-7 {
      grid-area: place-item-7
  }

  .places-grid .place-item-8 {
      grid-area: place-item-8
  }

  .places-grid .place-item-9 {
      grid-area: place-item-9
  }

  .places-grid .place-item-10 {
      grid-area: place-item-10
  }

  .places-grid .search-badge {
      height: 100%
  }

  .places-grid .list {
      display: grid
  }

  .places-grid .list .list-item {
      overflow: hidden
  }
}

@media (min-width: 768px) {
  .places-grid .place-item-1 {
      -ms-grid-row:1;
      -ms-grid-column: 1
  }

  .places-grid .place-item-2 {
      -ms-grid-row: 2;
      -ms-grid-column: 1
  }

  .places-grid .place-item-3 {
      -ms-grid-row: 3;
      -ms-grid-column: 1
  }

  .places-grid .place-item-4 {
      -ms-grid-row: 4;
      -ms-grid-column: 1
  }

  .places-grid .place-item-5 {
      -ms-grid-row: 5;
      -ms-grid-column: 1
  }

  .places-grid .place-item-6 {
      -ms-grid-row: 6;
      -ms-grid-column: 1
  }

  .places-grid .place-item-7 {
      -ms-grid-row: 7;
      -ms-grid-column: 1
  }

  .places-grid .place-item-8 {
      -ms-grid-row: 8;
      -ms-grid-column: 1
  }

  .places-grid .place-item-9 {
      -ms-grid-row: 9;
      -ms-grid-column: 1
  }

  .places-grid .place-item-10 {
      -ms-grid-row: 10;
      -ms-grid-column: 1
  }
}

@media (min-width: 768px) {
  .places-grid.__3 .list {
      grid-template-columns:1.4fr .6fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-2" "place-item-1 place-item-3";
      grid-template-rows: 1fr 1fr
  }

  .places-grid.__3 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1
  }

  .places-grid.__3 .list>.place-item-2 {
      -ms-grid-row: 1;
      -ms-grid-column: 3
  }

  .places-grid.__3 .list>.place-item-3 {
      -ms-grid-row: 3;
      -ms-grid-column: 3
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__3 .list .search-badge {
      min-height:150px
  }
}

@media (min-width: 1024px) {
  .places-grid.__3 .list .search-badge {
      min-height:240px
  }
}

@media (min-width: 768px) {
  .places-grid.__4 .list {
      grid-template-columns:1.5fr .75fr .75fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-2 place-item-2" "place-item-1 place-item-3 place-item-4";
      grid-template-rows: 1.5fr 1fr
  }

  .places-grid.__4 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1
  }

  .places-grid.__4 .list>.place-item-2 {
      -ms-grid-row: 1;
      -ms-grid-column: 3;
      -ms-grid-column-span: 3
  }

  .places-grid.__4 .list>.place-item-3 {
      -ms-grid-row: 3;
      -ms-grid-column: 3
  }

  .places-grid.__4 .list>.place-item-4 {
      -ms-grid-row: 3;
      -ms-grid-column: 5
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__4 .list .search-badge {
      min-height:110px
  }
}

@media (min-width: 1024px) {
  .places-grid.__4 .list .search-badge {
      min-height:180px
  }
}

@media (min-width: 768px) {
  .places-grid.__5 .list {
      grid-template-columns:.75fr .75fr 1.5fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-2" "place-item-1 place-item-1 place-item-2" "place-item-1 place-item-1 place-item-3" "place-item-4 place-item-5 place-item-3";
      grid-template-rows: 1.5fr .5fr .5fr 1.5fr
  }

  .places-grid.__5 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__5 .list>.place-item-2 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__5 .list>.place-item-3 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 3;
      -ms-grid-column: 5
  }

  .places-grid.__5 .list>.place-item-4 {
      -ms-grid-row: 7;
      -ms-grid-column: 1
  }

  .places-grid.__5 .list>.place-item-5 {
      -ms-grid-row: 7;
      -ms-grid-column: 3
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__5 .list .search-badge {
      min-height:120px
  }
}

@media (min-width: 1024px) {
  .places-grid.__5 .list .search-badge {
      min-height:220px
  }
}

@media (min-width: 768px) {
  .places-grid.__6 .list {
      grid-template-columns:1fr 1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-3 place-item-4" "place-item-1 place-item-1 place-item-2 place-item-2" "place-item-5 place-item-6 place-item-2 place-item-2";
      grid-template-rows: 1.3fr .7fr 1.3fr
  }

  .places-grid.__6 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__6 .list>.place-item-2 {
      -ms-grid-row: 3;
      -ms-grid-row-span: 3;
      -ms-grid-column: 5;
      -ms-grid-column-span: 3
  }

  .places-grid.__6 .list>.place-item-3 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5
  }

  .places-grid.__6 .list>.place-item-4 {
      -ms-grid-row: 1;
      -ms-grid-column: 7
  }

  .places-grid.__6 .list>.place-item-5 {
      -ms-grid-row: 5;
      -ms-grid-column: 1
  }

  .places-grid.__6 .list>.place-item-6 {
      -ms-grid-row: 5;
      -ms-grid-column: 3
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__6 .list .search-badge {
      min-height:120px
  }
}

@media (min-width: 1024px) {
  .places-grid.__6 .list .search-badge {
      min-height:220px
  }
}

@media (min-width: 768px) {
  .places-grid.__7 .list {
      grid-template-columns:1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-1 place-item-1 place-item-1 place-item-2 place-item-2 place-item-2" "place-item-1 place-item-1 place-item-1 place-item-1 place-item-1 place-item-3 place-item-3 place-item-3" "place-item-4 place-item-4 place-item-5 place-item-5 place-item-6 place-item-6 place-item-7 place-item-7";
      grid-template-rows: 1.2fr 1.2fr 1fr
  }

  .places-grid.__7 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 9
  }

  .places-grid.__7 .list>.place-item-2 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 1;
      -ms-grid-column: 11;
      -ms-grid-column-span: 5
  }

  .places-grid.__7 .list>.place-item-3 {
      -ms-grid-row: 3;
      -ms-grid-row-span: 1;
      -ms-grid-column: 11;
      -ms-grid-column-span: 5
  }

  .places-grid.__7 .list>.place-item-4 {
      -ms-grid-row: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__7 .list>.place-item-5 {
      -ms-grid-row: 5;
      -ms-grid-column: 5;
      -ms-grid-column-span: 3
  }

  .places-grid.__7 .list>.place-item-6 {
      -ms-grid-row: 5;
      -ms-grid-column: 9;
      -ms-grid-column-span: 3
  }

  .places-grid.__7 .list>.place-item-7 {
      -ms-grid-row: 5;
      -ms-grid-column: 13;
      -ms-grid-column-span: 3
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__7 .list .search-badge {
      min-height:120px
  }
}

@media (min-width: 1024px) {
  .places-grid.__7 .list .search-badge {
      min-height:190px
  }
}

@media (min-width: 768px) {
  .places-grid.__8 .list {
      grid-template-columns:1fr 1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-3 place-item-4" "place-item-1 place-item-1 place-item-5 place-item-6" "place-item-1 place-item-1 place-item-2 place-item-2" "place-item-7 place-item-8 place-item-2 place-item-2" "place-item-7 place-item-8 place-item-2 place-item-2";
      grid-template-rows: 1fr 1fr .2fr 0fr 1fr
  }

  .places-grid.__8 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__8 .list>.place-item-2 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 5;
      -ms-grid-column: 5;
      -ms-grid-column-span: 3
  }

  .places-grid.__8 .list>.place-item-3 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__8 .list>.place-item-4 {
      -ms-grid-row: 1;
      -ms-grid-column: 7;
      -ms-grid-column-span: 1
  }

  .places-grid.__8 .list>.place-item-5 {
      -ms-grid-row: 3;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__8 .list>.place-item-6 {
      -ms-grid-row: 3;
      -ms-grid-column: 7;
      -ms-grid-column-span: 1
  }

  .places-grid.__8 .list>.place-item-7 {
      -ms-grid-row: 7;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 1
  }

  .places-grid.__8 .list>.place-item-8 {
      -ms-grid-row: 7;
      -ms-grid-row-span: 3;
      -ms-grid-column: 3
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__8 .list .search-badge {
      min-height:120px
  }
}

@media (min-width: 1024px) {
  .places-grid.__8 .list .search-badge {
      min-height:170px
  }
}

@media (min-width: 768px) {
  .places-grid.__9 .list {
      grid-template-columns:1fr 1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-4 place-item-5" "place-item-1 place-item-1 place-item-2 place-item-2" "place-item-6 place-item-7 place-item-2 place-item-2" "place-item-3 place-item-3 place-item-2 place-item-2" "place-item-3 place-item-3 place-item-8 place-item-9" "place-item-10 place-item-10 place-item-11 place-item-11";
      grid-template-rows: 1fr .3fr 1fr .3fr 1fr
  }

  .places-grid.__9 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__9 .list>.place-item-2 {
      -ms-grid-row: 3;
      -ms-grid-row-span: 5;
      -ms-grid-column: 5;
      -ms-grid-column-span: 3
  }

  .places-grid.__9 .list>.place-item-3 {
      -ms-grid-row: 7;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__9 .list>.place-item-4 {
      -ms-grid-row: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__9 .list>.place-item-5 {
      -ms-grid-row: 1;
      -ms-grid-column: 7;
      -ms-grid-column-span: 1
  }

  .places-grid.__9 .list>.place-item-6 {
      -ms-grid-row: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 1
  }

  .places-grid.__9 .list>.place-item-7 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 1;
      -ms-grid-column: 3;
      -ms-grid-column-span: 1
  }

  .places-grid.__9 .list>.place-item-8 {
      -ms-grid-row: 9;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5
  }

  .places-grid.__9 .list>.place-item-9 {
      -ms-grid-row: 9;
      -ms-grid-column: 7
  }
}

@media (min-width: 768px) and (max-width:1023.98px) {
  .places-grid.__9 .list .search-badge {
      min-height:120px
  }
}

@media (min-width: 1024px) {
  .places-grid.__9 .list .search-badge {
      min-height:200px
  }
}

@media (min-width: 768px) and (max-width:1199.98px) {
  .places-grid.__10 .list {
      grid-template-columns:1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-3" "place-item-1 place-item-1 place-item-4" "place-item-1 place-item-1 place-item-2" "place-item-5 place-item-6 place-item-7" "place-item-8 place-item-9 place-item-10";
      grid-template-rows: 1fr 1fr 1fr 1fr 1fr
  }

  .places-grid.__10 .list .search-badge {
      min-height: 120px
  }

  .places-grid.__10 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 3
  }

  .places-grid.__10 .list>.place-item-2 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-3 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-4 {
      -ms-grid-row: 3;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-5 {
      -ms-grid-row: 7;
      -ms-grid-column: 1;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-6 {
      -ms-grid-row: 7;
      -ms-grid-column: 3;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-7 {
      -ms-grid-row: 7;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-8 {
      -ms-grid-row: 9;
      -ms-grid-row-span: 1;
      -ms-grid-column: 1
  }

  .places-grid.__10 .list>.place-item-9 {
      -ms-grid-row: 9;
      -ms-grid-column: 3
  }

  .places-grid.__10 .list>.place-item-10 {
      -ms-grid-row: 9;
      -ms-grid-column: 5
  }
}

@media (min-width: 1200px) {
  .places-grid.__10 .list {
      grid-template-columns:1fr 1fr 1fr 1fr 1fr 1fr;
      gap: 1rem;
      grid-template-areas: "place-item-1 place-item-1 place-item-1 place-item-1 place-item-3 place-item-4" "place-item-1 place-item-1 place-item-1 place-item-1 place-item-2 place-item-2" "place-item-5 place-item-6 place-item-7 place-item-8 place-item-9 place-item-10";
      grid-template-rows: 1fr 1.3fr 1fr
  }

  .places-grid.__10 .list .search-badge {
      min-height: 170px
  }

  .places-grid.__10 .list>.place-item-1 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 3;
      -ms-grid-column: 1;
      -ms-grid-column-span: 7
  }

  .places-grid.__10 .list>.place-item-2 {
      -ms-grid-row: 3;
      -ms-grid-row-span: 1;
      -ms-grid-column: 9;
      -ms-grid-column-span: 3
  }

  .places-grid.__10 .list>.place-item-3 {
      -ms-grid-row: 1;
      -ms-grid-row-span: 1;
      -ms-grid-column: 9;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-4 {
      -ms-grid-row: 1;
      -ms-grid-column: 11;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-5 {
      -ms-grid-row: 5;
      -ms-grid-column: 1;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-6 {
      -ms-grid-row: 5;
      -ms-grid-column: 3;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-7 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 1;
      -ms-grid-column: 5;
      -ms-grid-column-span: 1
  }

  .places-grid.__10 .list>.place-item-8 {
      -ms-grid-row: 5;
      -ms-grid-row-span: 1;
      -ms-grid-column: 7
  }

  .places-grid.__10 .list>.place-item-9 {
      -ms-grid-row: 5;
      -ms-grid-column: 9
  }

  .places-grid.__10 .list>.place-item-10 {
      -ms-grid-row: 5;
      -ms-grid-column: 11
  }
}

.places-grid .search-badge {
  text-decoration: none;
  color: #fff;
  display: flex;
  align-items: flex-end;
  position: relative;
  overflow: hidden
}

.places-grid .search-badge {
  border-radius: 12px;
  background-color: #c4c4c4
}

.places-grid .search-badge:after,.places-grid .search-badge:before {
  content: "";
  position: absolute;
  bottom: 0;
  transition: opacity .6s ease;
  z-index: 1
}

.places-grid .search-badge:after,.places-grid .search-badge:before,.places-grid .search-badge:after,.places-grid .search-badge:before {
  left: 0;
  right: 0
}

.places-grid .search-badge:before {
  height: 62px
}

.places-grid .search-badge:before {
  background-image: linear-gradient(0deg,rgba(0,0,0,.5),transparent)
}

.places-grid .search-badge:after {
  top: 0;
  opacity: 0
}

.places-grid .search-badge:after {
  background: #000
}

.places-grid .search-badge:hover:after {
  opacity: .3
}

.places-grid .search-badge-text {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  unicode-bidi: -moz-plaintext;
  unicode-bidi: plaintext;
  z-index: 1;
  width: 100%;
  line-height: 1.875rem;
  font-size: 1.25rem;
  font-weight: 700;
  position: absolute
}

.places-grid .search-badge-text {
  text-shadow: 0 0 8px rgba(0,0,0,.8);
  padding: 1rem
}
.lazybackground{
    height: 100%
}
.lazybackground img{
    height: 100%;
    width: 100%;
    object-fit: cover
}

</style>