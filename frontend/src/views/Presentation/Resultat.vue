<script setup>
import { ref, onMounted, defineProps } from "vue";
import axios from 'axios';
import { useRoute } from 'vue-router';
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LPolyline, LPolygon, LRectangle, } from "@vue-leaflet/vue-leaflet";
import FIlters from '/views/Presentation/annonces/filter.vue';
const title = ref('');
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

return `/api/get_listing_url/${listingId}`;
};
const capitalizeFirst = (str) => {
return str.charAt(0).toUpperCase() + str.slice(1);
};
const id = ref(null);
const romspecs = ref([]);
const listings = ref([]);
const searchQuery = route.currentRoute.value.query.q;
id.value = route.params.val;
onMounted(async () => {
  const currentId = id.value;
try {
  const response = await axios.get(`/recherchevvvv?search_string=${searchQuery}&selected_city_id=&selected_category_id=`);
  console.log('Response from listings seul:', response.data);
  title.value = response.data.title;
  listings.value = response.data.listings;
  for (const list of listings.value) {
          const romspec = await axios.get(`/api/get_hotel_spec/${list.id}`);
        //   console.log('Response from Room spec:', romspec.data);
          romspecs.value[list.id] = romspec.data;
    }
  const get_phrases_show_on_map = await axios.get('/api/get_phrase/show_on_map');
  get_phrase_show_on_map.value = get_phrases_show_on_map.data;
  const get_phrase_watch_detail = await axios.get('/api/get_phrase/watch_details');
  get_phrase_watch_details.value = get_phrase_watch_detail.data;
  const get_phrase_feature = await axios.get('/api/get_phrase/featured');
  get_phrase_featured.value = get_phrase_feature.data;
  const this_listing_is_verifi = await axios.get('/api/get_phrase/this_listing_is_verified');
  this_listing_is_verified.value = this_listing_is_verifi.data;


      const responsegeo = await fetch("/home/filter_listings");
      const datas = await responsegeo.json();

      if (datas && datas.geo_json) {
        geojson.value = JSON.parse(datas.geo_json);
      }

  const get_count = await axios.get('/api/get_country', { listing_id: 2 });
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

</script>
<template>
<div class="relative">
  <!--Ad left-->
  <div class="w-[calc((100%-(theme(width.page-max)+(var(--spacing-xl)*2)))/2)] absolute inset-y-[0]  z-dropdown left-[0]"><div class="absolute top-[0] w-full bottom-1/2"><div class="justify-end ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 pt-xl"><div class="flex justify-end"><div aria-label="" id="search-left-atf-60-xl" class="" data-liberty-position-name="search-left-atf-60" data-liberty-breakpoint-name="xl"></div></div></div></div><div class="absolute bottom-[0] top-1/2 w-full"><div class="justify-end ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 pt-xl pb-xl"><div class="flex justify-end"><div aria-label="" id="search-left-btf-65-xl" class="" data-liberty-position-name="search-left-btf-65" data-liberty-breakpoint-name="xl"></div></div></div></div></div>
  
  <!--Ad right-->
  <div class="w-[calc((100%-(theme(width.page-max)+(var(--spacing-xl)*2)))/2)] absolute inset-y-[0]  z-dropdown right-[0]"><div class="absolute top-[0] w-full bottom-1/2"><div class="justify-start ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 pt-xl"><div class="flex justify-start"><div aria-label="" id="search-right-atf-70-xl" class="" data-liberty-position-name="search-right-atf-70" data-liberty-breakpoint-name="xl"></div></div></div></div><div class="absolute bottom-[0] top-1/2 w-full"><div class="justify-start ease sticky top-[110px] flex max-h-full transform overflow-hidden duration-350 pt-xl pb-xl"><div class="flex justify-start"><div aria-label="" id="search-right-btf-75-xl" class="" data-liberty-position-name="search-right-btf-75" data-liberty-breakpoint-name="xl"></div></div></div></div></div>

  <!--Ad Top-->
  <div class="max-w-page-max mx-auto my-none px-md box-content pt-lg md:pt-xl">
    <div id="lht-space-ad" class="group mb-lg flex min-h-[5rem] flex-wrap content-center justify-center overflow-x-hidden md:min-h-[9rem] lg:min-h-[25rem] liberty-filled">
    <div class="apn-mb bg-background">

    </div>
  </div>

  <!--Filtres-->
  <div data-test-id="sticky-filters-panel" class="pointer-events-none sticky z-raised" style="--offset: 60px;">
    <div class="pointer-events-auto" data-test-id="children">
      <div class="relative mb-md bg-surface px-none py-md opacity-none">
        <div class="max-w-page-max mx-auto my-none px-md box-content flex">
          
        </div>
      </div>
    </div>
  </div>

  <!--Listings-->
  <div class="max-w-page-max mx-auto my-none px-md box-content md:pt-md">
    <!--Titre-->
    <div>
      <div class="inline-block w-full p-none align-top sm:w-[55%]">
        <h1 class="mb-lg text-headline-1 text-on-surface md:mb-xl">Résultat de Recherche</h1>
      </div>
      <div class="apn-lt styles_AdvertisingLinkDesktop__rH5JP" style="display: inline-block;">
          <span aria-label="Encart publicitaire" id="lt-l" class="teal-apn" data-liberty-position-name="lt" data-liberty-breakpoint-name="l"></span>
          <span id="lt-xl" class="teal-apn liberty-unfilled" data-liberty-position-name="lt" data-liberty-breakpoint-name="xl" data-liberty-is-viewable="true">
            <div id="google_ads_iframe_/103997693/LBC-web/mode/vetements/Lien_moteur_0__container__" style="border: 0pt none;">
            </div>
          </span>
        </div>
      </div>
    </div>

    <!--Count-->
    <div class="flex items-center mb-lg md:mb-xl">
      <h2 class="text-subhead-expanded text-neutral">{{ listings.length }} annonces pour {{ listings.search_string }}</h2>
    </div>

    <!--Listing count-->
    <div v-if="listings.length > '0'" class="styles_Listing__isoog styles_listing--generic__AhPAo">
      <div class="styles_classifiedColumn__Vz9uL">
        <div class="mb-lg">
          <div layout="[object Object],[object Object]" nbtotalseparators="21" data-test-id="listing-mosaic" id="mosaic_with_owner" class="sc-968a2c9d-2 givLyB">
            <div 
                                            v-for="listing in listings" 
                                            :key="listing.id"
                                            style="grid-area: classified-1;"
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
                                                                <div style="height: 237px;" class=" relative imgbox box-border flex h-full items-center justify-center overflow-hidden bg-neutral-container min-h-[auto] min-w-[auto] rounded-md">
                                                                    <div class="_2JtY0">
                                                                        <div class="LazyLoad is-visible">
                                                                            <div class="_29Lk0">
                                                                                <img :src="'/uploads/listing_thumbnails/' + listing.listing_thumbnail" class="_1cnjm absolute inset-none m-auto h-full w-full object-cover" alt="">
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
                                                                    <p data-qa-id="aditem_title" data-title="true" :title="listing.name" class="line-clamp-[--maxLines] text-ellipsis break-words text-body-1 font-bold text-on-surface transition-colors group-hover/adcard:text-main-variant line-clamp-2 break-normal" style="--maxLines: 2;">
                                                                        {{ listing.name }}
                                                                    </p>
                                                                </div>
                                                                <span data-spark-component="tag" class="box-border inline-flex items-center justify-center gap-sm whitespace-nowrap text-caption font-bold h-sz-20 px-md rounded-full border-sm border-current text-support ml-auto">Pro</span>
                                                            </div>
                                                            <div class="inline-flex flex-wrap items-baseline">
                                                                <p class="flex flex-wrap items-center text-callout font-bold !leading-[--font-size-body-2-line-height] text-on-surface" data-test-id="price" aria-label="Prix: À partir de 24 € par nuit">
                                                                    <span class="[&amp;_small-support]:text-caption [&amp;_small-support]:font-regular [&amp;_small-support]:text-support [&amp;_small]:text-caption [&amp;_small]:font-regular" data-qa-id="aditem_price">
                                                                        <span v-if="cheapestRoom(listing.id)" :key="cheapestRoom(listing.id).id">
                                                                            <small>à partir de&nbsp;</small>{{ cheapestRoom(listing.id).price }} € <small-support>/ nuit</small-support>
                                                                        </span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-sm flex items-end gap-sm">
                                                            <p class="flex flex-wrap overflow-hidden overflow-hidden text-caption text-neutral">
                                                                <span :title="listing.address" class="mr-[1.2rem] last:mr-none">{{ listing.address }}</span>
                                                                <span class="relative inline-block w-full before:absolute before:right-full before:top-none before:hidden before:w-[1.2rem] before:text-center before:font-bold before:content-['·'] tiny:w-auto tiny:before:inline-block" :aria-label="'Date de dépôt : ' + formattedDate(listing.date_added)" :title="formattedDate(listing.date_added)">{{ formattedDate(listing.date_added) }}</span>
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
                                    </div> 
          </div>
        </div>
      </div>

      <!--Ad droite-->
      <div class="styles_sideColumn__Om95h">
        <div class="apn-sk skyscraper sticky top-[110px] block pt-xl">
          Pub ici
        </div>
      </div>
    </div>

    <div class="styles_Listing__isoog styles_listing--generic__AhPAo">
      <div class="styles_classifiedColumn__Vz9uL">
        <div class="mb-lg">
          <div layout="[object Object],[object Object]" nbtotalseparators="21" data-test-id="listing-mosaic" id="mosaic_with_owner" class="sc-968a2c9d-2 givLyB">
            Aucun résultat trouvé pour la recherche : {{ listings.search_string }}
          </div>
        </div>
      </div>
    </div>

</div>
</div>



    <div style="padding-top: 90px;">
      <h1>{{ title }}</h1>
      <div class="container-fluid margin_60_35" style="transform: none;">
  <div class="row justify-content-md-center" style="transform: none;">
    <FIlters />
    <div class="col-lg-6 col-md-12 order-lg-1 order-2" id="listings">
      <div layout="[object Object],[object Object]" nbtotalseparators="21" data-test-id="listing-mosaic" id="mosaic_with_owner" class="sc-968a2c9d-2 givLyB">

        </div>
    <!-- <div
    v-for="listing in listings" :key="listing.id"
      class="strip map_view featured-tag-border "
      :data-marker-id="listing.code"
      :id="listing.code"
    >
      <div
        class="row no-gutters"
        :class="{ 'featured-tag-border': listing.is_featured === '1' }"
      >
      <div class="col-4">
        <figure>
  
          <a
            v-if="listing.is_featured === '1'"
            href="javascript::"
            class="featured-tag-grid"
          >
            {{ get_phrase_featured }}
          </a>
          <router-link
              :key="listing.id"
              :to="{ name: 'annoncesUnique', params: { id: listing.id } }"
            :id="'listing-banner-image-for-' + listing.code"
            class="d-block h-100 img"
            :style="{
              'background-image': `url('uploads/listing_thumbnails/${listing.listing_thumbnail}')`,
            }"
          >
            <div class="read_more"><span>{{ get_phrase_watch_details }}</span></div>
        </router-link>
          <small>
            {{ listing.listing_type === '' ? 'General' : capitalizeFirst(listing.listing_type) }}
          </small>
        </figure>
        </div>
        <div class="col-8"
        :class="{ 'featured-body': listing.is_featured == 1 }"
        >
        <div
          class="wrapper">
          <a
            href="javascript::"
            class="wishlist-icon"
            @click="addToWishList(listing.id)"
          >
            <i
              :class="{
                'fas fa-heart': isWishlisted(listing.id),
                'far fa-heart': !isWishlisted(listing.id),
              }"
            ></i>
          </a>
  
          <h3 class="ellipsis">
            <router-link
              :key="listing.id"
              :to="{ name: 'annoncesUnique', params: { id: listing.id } }"
            >
              {{ listing.name }}
            </router-link>
            <span
              v-if="isClaimed(listing.id)"
              class="claimed_icon"
              data-toggle="tooltip"
              title="{{ get_phrase_this_listing_is_verified }}"
            >
              <img src="assets/frontend/images/verified.png" width="23" />
            </span>
          </h3>
          <small>
            {{ getCityStateCountry(listing.city_id, listing.state_id, listing.country_id) }}
            {{ get_country.city_id }}
          </small>
          <p class="ellipsis">
            {{ listing.description }}
          </p>
          <a
            v-if="listing.latitude !== '' && listing.longitude !== ''"
            class="address"
            href="javascript:"
            :button-direction-id="listing.code"
            target=""
          >
            {{ get_phrase_show_on_map }}
          </a>
        </div>
        <ul :class="{ 'featured-footer': listing.is_featured == 1 }" class="mb-0">
          <li>
            <span
              :class="{
                'loc_closed': isClosedNow(listing.id),
                'loc_open': isOpenNow(listing.id),
              }"
            >
              {{ get_phrase.getOpeningStatus(listing.id) }}
            </span>
          </li>
        </ul>
        </div>
      </div>
    </div> -->
  </div>
  <div class="col-lg-3 order-lg-2 order-1">
      <!-- <div class="stiky-map mb-5 mb-lg-0"></div> -->
      <!-- <l-map ref="map" v-model:zoom="zoom" :center="[47.41322, -1.219482]">
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        layer-type="base"
        name="OpenStreetMap"
      ></l-tile-layer>
    </l-map> -->
    <l-map ref="map" :zoom="zoom" :center="[47.41322, -1.219482]">
    <l-tile-layer
      url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      layer-type="base"
      name="OpenStreetMap"
    ></l-tile-layer>
    <l-marker :lat-lng="[47.41322, -1.219482]">
        <l-icon :icon-url="iconUrl" :icon-size="iconSize" />
      </l-marker>
    <l-geo-json :geojson="geojson" :options-style="geojsonOptions"></l-geo-json>
  
    <l-polyline
        :lat-lngs="[
          [47.334852, -1.509485],
          [47.342596, -1.328731],
          [47.241487, -1.190568],
          [47.234787, -1.358337],
        ]"
        color="green"
      ></l-polyline>
      <l-polygon
        :lat-lngs="[
          [46.334852, -1.509485],
          [46.342596, -1.328731],
          [46.241487, -1.190568],
          [46.234787, -1.358337],
        ]"
        color="#41b782"
        :fill="true"
        :fillOpacity="0.5"
        fillColor="#41b782"
      />
      <l-rectangle
        :lat-lngs="[
          [46.334852, -1.509485],
          [46.342596, -1.328731],
          [46.241487, -1.190568],
          [46.234787, -1.358337],
        ]"
        :fill="true"
        color="#35495d"
      />
      <l-rectangle
        :bounds="[
          [46.334852, -1.190568],
          [46.241487, -1.090357],
        ]"
      >
        <l-popup>
          lol
        </l-popup>
      </l-rectangle>
  </l-map>
  </div>
        </div>
    </div>
    </div>
  </template>
  

  
  
  
  
  
  
  <!-- <template>
    <div style="padding-top: 90px;">
      <h1>Search Results</h1>
      <ul>
        <li v-for="result in results" :key="result.id">
          {{ result.name }}
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const results = ref([]);
  </script> -->
<style>

.styles_classifiedColumn__Vz9uL {
    max-width: 100%;
    flex: 1 0 0%;
    min-width: 0;
}
.styles_Listing__isoog {
    display: flex;
    justify-content: space-between;
    position: relative;
}
</style>