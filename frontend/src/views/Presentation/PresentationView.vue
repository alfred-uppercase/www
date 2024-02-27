
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
              <input type="submit" value="Rechercher">
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
  <div class="container card mmt-vendre ms-auto">
    <div class="row">
      <div class="col-3">
        <img :src="luxoponcture" alt="">
      </div>
      <div class="col-5 my-auto"><span class="">C’est le moment de vendre</span></div>
      <div class="col-4 my-auto">
        <ul class="navbar-nav d-lg-block ">
          <li class="nav-item"><a href="javascript:;" class="btn btn-sm mb-0 btn-yellow"
              onclick="smoothToPricing('pricing-soft-ui')"><i class="fa fa-plus-circle "></i>Deposer une annonce</a>
          </li>
        </ul>
      </div>
    </div>



  </div>
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6" style="padding-bottom: 0px!important;">

    <AboutTeam />
    <!-- <Featuring /> -->
    <Newsletter />

  </div>
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
const router = useRouter();


//image
import bg0 from "@/assets/img/bg9.jpg";


//dep
import Typed from "typed.js";

//sections
import Information from "../..//views/LandingPages/AboutUs/Sections/AboutInformation.vue";
import AboutTeam from "../..//views/LandingPages/AboutUs/Sections/AboutTeam.vue";
import Featuring from "../..//views/LandingPages/AboutUs/Sections/AboutFeaturing.vue";
import Newsletter from "../..//views/LandingPages/AboutUs/Sections/AboutNewsletter.vue";
import { storeToRefs } from 'pinia'
// categorie
import { useCategoryStore } from '../../stores/categorie'

const { categories } = storeToRefs(useCategoryStore())
const { getCategories } = useCategoryStore()
getCategories()

//cities
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