
<template>
  <div class="container containerbanner"
    style="height:100%;display: flex;justify-content: center;z-index:2;position:relative;">
    <div class="row justify-content-center">
      <div class="col-lg-12 text-center mx-auto my-auto">
        <h1 class="text-dark">
          {{ bannerTitle }}
          <!-- <span class="text-white" id="typed"></span> -->
        </h1>
        <!-- <div id="typed-strings">
          <h1> annonces</h1>
          <h1> hotels</h1>
          <h1> offres d'emploi</h1>
        </div> -->
        <p class="lead mb-4 text-dark opacity-8">
          {{ slogan }}
        </p>
        <form @submit.prevent="submitForm">
          <div class="row no-gutters custom-search-input-2">
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" type="text" :v-model="search_string" placeholder="Votre recherche...">
              </div>
            </div>
            <div class="col-lg-3">
              <select class="wide" :v-model="selected_city_id" style="display: ;">
                <option value="">Tous les villes</option>
                <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}
                </option>
              </select>
            </div>
            <div class="col-lg-3">
              <select class="wide" :v-model="selected_category_id" style="display: block;">
                <option value="">Tous les catégories</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
                </option>
              </select>
            </div>
            <div class="col-lg-2" style="padding: 0;">
              <input class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" type="submit" value="Rechercher">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- <listings v-if="showResults" :results="searchResults" /> -->
  <div class="hero" style="position: absolute;top: 0;">
    <div class="diagonal-hero-bg">


      <div class="stars">
        <div class="small"></div>
        <div class="medium"></div>
        <div class="big"></div>
      </div>


    </div>
  </div>
        <!--Ajouter annonce-->
        <div class="src__CenteredWrapper-sc-1bgl6we-0 iCaNcC">
            <div class="px-lg text-center">
                <h1 class="mb-lg mt-xl block text-center text-body-2 custom:hidden">Des millions de petites annonces et autant d’occasions de se faire plaisir</h1>
                <a @click="dpsannonce" class="relative mb-2xl min-h-[8rem] overflow-hidden p-lg flex items-center justify-center rounded-lg bg-main-container before:absolute before:bottom-none before:left-none before:right-none before:top-none before:z-base before:bg-left-bottom before:bg-no-repeat before:bg-[image:var(--leftOrnamentMobile)] before:bg-[length:auto_50%] tiny:before:bg-[length:auto_60%] sm:before:bg-[length:auto_80%] custom:before:bg-[length:auto_60%] lg:before:bg-[image:var(--leftOrnamentDesktop)] lg:before:bg-[length:auto_100%] after:absolute after:bottom-none after:left-none after:right-none after:top-none after:z-base after:bg-right-bottom after:bg-no-repeat after:bg-[image:var(--rightOrnamentMobile)] after:bg-[length:auto_60%] tiny:after:bg-[length:auto_70%] sm:after:bg-[length:auto_80%] lg:after:bg-[image:var(--rightOrnamentDesktop)] lg:after:bg-[length:auto_100%]" style="--leftOrnamentDesktop: url(''); --leftOrnamentMobile: url(''); --rightOrnamentDesktop: url(''); --rightOrnamentMobile: url('');">
                    <div class="relative z-raised flex flex-col items-center md:flex-row">
                        <p class="mb-md text-headline-1 md:mb-none md:mr-xl lg:mr-lg">C’est le moment de vendre</p>
                        <button @click="dpsannonce" data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" aria-busy="false" aria-live="off"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="AddSquareOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="m12,6.84c.56,0,1.01.45,1.01,1.01v3.14h3.14c.56.02.99.5.96,1.05-.02.52-.44.94-.96.96h-3.14v3.14c0,.56-.45,1.01-1.01,1.01-.56,0-1.01-.45-1.01-1.01h0v-3.14h-3.14c-.56,0-1.01-.45-1.01-1.01,0-.56.45-1.01,1.01-1.01h3.14v-3.14c0-.56.45-1.01,1.01-1.01h0Z"></path><path fill-rule="evenodd" d="m7.16,2c-2.85,0-5.16,2.31-5.16,5.16h0v9.68c0,2.85,2.31,5.16,5.16,5.16h9.68c2.85,0,5.16-2.31,5.16-5.16V7.16c0-2.85-2.31-5.16-5.16-5.16H7.16Zm-3.14,5.16c0-1.73,1.4-3.14,3.14-3.14h9.68c1.73,0,3.14,1.4,3.14,3.14h0v9.68c0,1.73-1.4,3.14-3.14,3.14H7.16c-1.73,0-3.14-1.4-3.14-3.14h0V7.16h0Z"></path></svg>
                            Déposer une annonce
                        </button>
                    </div>
                </a>
            </div>
        </div>

  <div tag="section" class="places-list container-md">
    <h2 class="heading section-title title-left" dir="auto">Nos principales catégories</h2>
    <div class="places-grid __9">
      <ul class="list">
        <li v-for="(category, index) in categories" :key="category.id" :class="'list-item place-item-' + (index + 1)">
          <router-link :key="category.id" :to="{ name: 'Annonces', params: { id: category.id } }" class="link">
            <div class="search-badge">
              <div class="lazybackground">
                <img :src="`/uploads/category_thumbnails/${category.thumbnail}`" loading="lazy">
              </div>
              <div class="search-badge-text">{{ category.name }}</div>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
  </div>



  <!-- <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6" style="padding-bottom: 0px!important;">

    <AboutTeam />
    <Newsletter />

  </div> -->
  <div class='container mt-4 mb-40 dernier-recherche'>
    <p class="items-list">
      <span class="titre-1 text-black bold float-start">D'apres vos dernier recherche <i
          class="fas fa-question-circle text-yellow"></i></span>
      <span class="float-end"> voir plus annonces <i class="fas fa-plus-circle "></i></span>
    </p>



    <div class="row mt-4">
      <div class="col-3"><img :src="imgDefault" alt=""></div>
      <div class="col-3"><img :src="imgDefault" alt=""></div>
      <div class="col-3"><img :src="imgDefault" alt=""></div>
      <div class="col-3"><img :src="imgDefault" alt=""></div>
    </div>

  </div>
</template>
<script setup>
import { ref, onMounted, onUnmounted, } from "vue";
import axios from 'axios';
import { useRouter } from 'vue-router';
import { storeToRefs } from 'pinia'
// categorie
import { useCategoryStore } from '../../stores/categorie'


import { useCitieStore } from '../../stores/cities'

const router = useRouter();





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
    const responses = await axios.get('/home/listings');
    listings.value = responses.data.listings;

    for (const list of listings.value) {
          const romspec = await axios.get(`/api/get_hotel_spec/${list.id}`);
        //   console.log('Response from Room spec:', romspec.data);
          romspecs.value[list.id] = romspec.data;
    }

    const response = await axios.get('/api/get_categories_parent');
    categories.value = response.data;
    for (const category of categories.value) {
      const getSubCategory = await axios.get(`/api/get_sub_categories/${category.id}`);
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
    const responsse = await axios.get('/home/filter_listings', {
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
p.text-headline-1 {
    font-size: 2.7rem !important;
}
.lead {
    font-size: 2.25rem !important;
}
.iCaNcC{
  max-width: 1140px!important;
}
.bg-main-container{
  background-color: #00878e1a!important;
}
h2.heading{
  font-size: 3.25rem!important;

}
h1.text-dark{
  font-size: 5rem!important;
}
.containerbanner{
  min-height: 472px!important;
}
.my-auto {
    margin-top: 13% !important;
    margin-bottom: auto !important;
}
.form-control, .custom-search-input-2 select, .search-badge-text{
  font-size: 1.5rem!important;
}
.custom-search-input-2 input[type=submit]{
  font-size: 1.675rem!important;
  color: #fff!important;
  text-transform: initial!important;
}
a:hover{
  color: #344767!important;
}
</style>