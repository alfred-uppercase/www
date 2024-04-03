<template>
    <div class="container xl:mx-auto xl:px-8">
        <div class="card">
        <DataView :value="listings" paginator :rows="4">
            <template #list="listings">
                <div class="grid grid-nogutter">
                    <div v-for="(listing, index) in listings" :key="listing.id" class="col-12">
                        <div class="flex flex-column sm:flex-row sm:align-items-center p-4 gap-3" :class="{ 'border-top-1 surface-border': index !== 0 }">
                            <div class="md:w-10rem relative">
                                <img class="block xl:block mx-auto border-round w-full" :src="`https://primefaces.org/cdn/primevue/images/product/${item.image}`" :alt="item.name" />
                                <Tag :value="item.inventoryStatus" :severity="getSeverity(item)" class="absolute" style="left: 4px; top: 4px"></Tag>
                            </div>
                            <div class="flex flex-column md:flex-row justify-content-between md:align-items-center flex-1 gap-4">
                                <div class="flex flex-row md:flex-column justify-content-between align-items-start gap-2">
                                    <div>
                                        <span class="font-medium text-secondary text-sm">{{ listing.name }}</span>
                                        <div class="text-lg font-medium text-900 mt-2">{{ listing.name }}</div>
                                    </div>
                                    <div class="surface-100 p-1" style="border-radius: 30px">
                                        <div class="surface-0 flex align-items-center gap-2 justify-content-center py-1 px-2" style="border-radius: 30px; box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.04), 0px 1px 2px 0px rgba(0, 0, 0, 0.06)">
                                            <span class="text-900 font-medium text-sm">{{ item.rating }}</span>
                                            <i class="pi pi-star-fill text-yellow-500"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-column md:align-items-end gap-5">
                                    <span class="text-xl font-semibold text-900">${{ item.price }}</span>
                                    <div class="flex flex-row-reverse md:flex-row gap-2">
                                        <Button icon="pi pi-heart" outlined></Button>
                                        <Button icon="pi pi-shopping-cart" label="Buy Now" :disabled="item.inventoryStatus === 'OUTOFSTOCK'" class="flex-auto md:flex-initial white-space-nowrap"></Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </DataView>
    </div>
    </div>
</template>

<script setup>
import { ref, onMounted, defineProps } from "vue";
import { ProductService } from '@/service/ProductService';


import axios from 'axios';
import { useRoute } from 'vue-router';
// import "leaflet/dist/leaflet.css";
// import { LMap, LTileLayer, LMarker, LPopup, LPolyline, LPolygon, LRectangle, } from "@vue-leaflet/vue-leaflet";
// import FIlters from '/views/Presentation/annonces/filter.vue';
const search_string = ref('');
const get_country = ref([]);
const get_phrase_show_on_map = ref('');
const get_phrase_watch_details = ref('');
const get_phrase_featured = ref('');
const geojson = ref(null);
const route = useRoute();
// const results = ref([]);
// const search_string = ref();
// const selected_city_id = ref();
// const selected_category_id = ref();
  const geojsonOptions = ref({
    pointToLayer: (feature, latLng) => {
      // Utilisez vos propres options pour personnaliser l'apparence des points sur la carte
      return L.circleMarker(latLng, { radius: 8 });
    },
  });
  const center = ref([47.413220, -1.219482]);
  const zoom = ref(12); 
  const iconSize = ref(12); 
  const iconUrl = ref(12); 
// const mapIsReady = ref(false);
// const get_phrase_this_listing_is_verified = ref('');


const props = defineProps(['results']);


const body = document.getElementsByTagName("body")[0];
const getListingUrl = (listingId) => {

return `http://localhost/api/get_listing_url/${listingId}`;
};
const capitalizeFirst = (str) => {
return str.charAt(0).toUpperCase() + str.slice(1);
};
const id = ref(null);
const romspecs = ref([]);
const listings = ref([]);
const searchQuery = route.query.q;
id.value = route.params.id;
onMounted(async () => {
try {
  // id.value = route.params.val;
  const currentId = id.value;
  console.log('Current Id:', currentId);

  const response = await axios.get(`http://localhost/search?search_string=&selected_city_id=&selected_category_id=${currentId}`);
  console.log('Response id listing:', response.data);
  search_string.value = response.data.search_string;
  listings.value = response.data.listings;
  for (const list of listings.value) {
          const romspec = await axios.get(`http://localhost/api/get_hotel_spec/${list.id}`);
        //   console.log('Response from Room spec:', romspec.data);
          romspecs.value[list.id] = romspec.data;
    }
  const get_phrases_show_on_map = await axios.get('http://localhost/api/get_phrase/show_on_map');
  get_phrase_show_on_map.value = get_phrases_show_on_map.data;
  const get_phrase_watch_detail = await axios.get('http://localhost/api/get_phrase/watch_details');
  get_phrase_watch_details.value = get_phrase_watch_detail.data;
  const get_phrase_feature = await axios.get('http://localhost/api/get_phrase/featured');
  get_phrase_featured.value = get_phrase_feature.data;
  const this_listing_is_verifi = await axios.get('http://localhost/api/get_phrase/this_listing_is_verified');
  this_listing_is_verified.value = this_listing_is_verifi.data;


      const responsegeo = await fetch("http://localhost/home/filter_listings");
      const datas = await responsegeo.json();

      if (datas && datas.geo_json) {
        geojson.value = JSON.parse(datas.geo_json);
      }

  const get_count = await axios.get('http://localhost/api/get_country', { listing_id: 2 });
  get_country.value = `${response.data.city}, ${response.data.state}, ${response.data.country}`;
} catch (error) {
  console.error('Error fetching listing:', error);
}

body.classList.add("annonces");
// return { geojson, geojsonOptions };

});
const isWishlisted = (listingId) => {

return false;
};
    // Fonction pour trouver la chambre avec le prix le moins cher
    const cheapestRoom = (listingId) => {
      const rooms = romspecs.value[listingId];
      if (rooms && rooms.length > 0) {
        return rooms.reduce((min, romspec) => (min.price < romspec.price ? min : romspec));
      }
      return null;
    };
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
const addToWishList = (listingId) => {

console.log('Add to wishlist:', listingId);
};

const isClaimed = (listingId) => {

return false;
};

const getCityStateCountry = async (cityId, stateId, countryId) => {
try {
  const city = await fetchCity(cityId);
  const state = await fetchState(stateId);
  const country = await fetchCountry(countryId);

  return `${city.name}, ${state.name}, ${country.name}`;
} catch (error) {
  console.error('Error fetching city, state, and country:', error);
  return 'City, State, Country';
}
};
const fetchCity = async (cityId) => {

return { name: 'CityName' };
};

const fetchState = async (stateId) => {

return { name: 'StateName' };
};

const fetchCountry = async (countryId) => {

return { name: 'CountryName' };
};

const isOpenNow = (listingId) => {

return true;
};

const isClosedNow = (listingId) => {

return false;
};

const getOpeningStatus = (listingId) => {

return 'open';
};

const getRatingQuality = (listingId) => {

return '5.0'; // Sample rating
};

const getListingWiseReviewCount = (listingId) => {

return 10; // Sample count
};

const getListingWiseRating = (listingId) => {

return '4.5'; // Sample rating
};




// onMounted(() => {
//     ProductService.getProductsSmall().then((data) => (products.value = data));
// });

// const products = ref();
// const getSeverity = (product) => {
//     switch (product.inventoryStatus) {
//         case 'INSTOCK':
//             return 'success';

//         case 'LOWSTOCK':
//             return 'warning';

//         case 'OUTOFSTOCK':
//             return 'danger';

//         default:
//             return null;
//     }
// };
</script>
