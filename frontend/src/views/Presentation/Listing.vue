
<template>
  <div style="padding-top: 90px;">
    <h1>{{ title }}</h1>
    <div class="container-fluid margin_60_35" style="transform: none;">
<div class="row justify-content-md-center" style="transform: none;">
  <FIlters />
  <div class="col-lg-6 col-md-12 order-lg-1 order-2" id="listings">
  <div
  v-for="listing in results.listings" :key="listing.id"
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
            <!-- <img src="assets/frontend/images/verified.png" width="23" /> -->
          </span>
        </h3>
        <small>
          <!-- {{ getCityStateCountry(listing.city_id, listing.state_id, listing.country_id) }} -->
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
            <!-- {{ get_phrase.getOpeningStatus(listing.id) }} -->
          </span>
        </li>
      </ul>
      </div>
    </div>
  </div>
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

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import axios from 'axios';
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LPolyline, LPolygon, LRectangle, } from "@vue-leaflet/vue-leaflet";
import FIlters from '/views/Presentation/annonces/filter.vue';
const title = ref('');
const listings = ref([]);
const get_country = ref([]);
const get_phrase_show_on_map = ref('');
const get_phrase_watch_details = ref('');
const get_phrase_featured = ref('');
const geojson = ref(null);
const results = ref([]);
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

// Déclarez vos props ici
const props = defineProps(['results']);


const body = document.getElementsByTagName("body")[0];
const getListingUrl = (listingId) => {
// Assuming you have a method to generate the listing URL
return `/api/get_listing_url/${listingId}`;
};
const capitalizeFirst = (str) => {
return str.charAt(0).toUpperCase() + str.slice(1);
};
onMounted(async () => {
  console.log('Response from resultdata:', props.results)
try {

  const response = await axios.get('/home/listings');
  console.log('Response from listings:', response.data);
  title.value = response.data.title;
  listings.value = response.data.listings;
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
  console.log('Response from country:', response.data);
  get_country.value = `${response.data.city}, ${response.data.state}, ${response.data.country}`;
} catch (error) {
  console.error('Error fetching listing:', error);
}

body.classList.add("annonces");
// return { geojson, geojsonOptions };

});
const isWishlisted = (listingId) => {
// Assuming you have a method to check if the listing is wishlisted
// Replace this with your actual logic
return false;
};

const addToWishList = (listingId) => {
// Assuming you have a method to add to the wishlist
// Replace this with your actual logic
console.log('Add to wishlist:', listingId);
};

const isClaimed = (listingId) => {
// Assuming you have a method to check if the listing is claimed
// Replace this with your actual logic
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
// Implement logic to fetch city details based on cityId
// Replace this with your actual API call or data retrieval logic
return { name: 'CityName' };
};

const fetchState = async (stateId) => {
// Implement logic to fetch state details based on stateId
// Replace this with your actual API call or data retrieval logic
return { name: 'StateName' };
};

const fetchCountry = async (countryId) => {
// Implement logic to fetch country details based on countryId
// Replace this with your actual API call or data retrieval logic
return { name: 'CountryName' };
};

const isOpenNow = (listingId) => {
// Assuming you have a method to check if the listing is open now
// Replace this with your actual logic
return true;
};

const isClosedNow = (listingId) => {
// Assuming you have a method to check if the listing is closed now
// Replace this with your actual logic
return false;
};

const getOpeningStatus = (listingId) => {
// Assuming you have a method to get the opening status
// Replace this with your actual logic
return 'open';
};

const getRatingQuality = (listingId) => {
// Assuming you have a method to get the quality rating
// Replace this with your actual logic
return '5.0'; // Sample rating
};

const getListingWiseReviewCount = (listingId) => {
// Assuming you have a method to get the review count for the listing
// Replace this with your actual logic
return 10; // Sample count
};

const getListingWiseRating = (listingId) => {
// Assuming you have a method to get the rating for the listing
// Replace this with your actual logic
return '4.5'; // Sample rating
};

</script>






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
