
<template>
<div class="container mt-90">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="user-bg-img-card mb-5" style="background-image: url(''); background-repeat: no-repeat;">
                    <img :src='get_user_thumbnail' class="rounded-circle user-bg-img" width="80" height="80" alt="...">
                    <div class="user-name-for-profile">
                        <b class="m-0 p-0">{{ get_users.name }}</b>
                        <p class="font-12 m-0 p-0"><b>{{ get_users.address }}</b></p>
                    </div>
                </div>
                <a :href="'/message/?=' + get_users.id">Envoyer un message</a>


                <div class="card-body">
                    <p>{{ get_users.about }}</p>
                </div>
            </div>
            <div class="card my-5">
                <div class="card-body">
                    <h6 class="p-0 m-0">
                        {{get_phrase_listing_by}} : <a href="javascript:;">{{ get_users.name }}</a>
                        <small class="float-right font-12 mt-2">{{get_phrase_total}} {{get_listing_by_user_id}} {{get_phrase_listings}}</small>
                    </h6>
                </div>
            </div>
            <div class="row">
                <div
      v-for="listing in get_listing_by_user_id_result" :key="listing.id"
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
            <!-- {{ listing.listing_type === '' ? 'General' : capitalizeFirst(listing.listing_type) }} -->
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
            <!-- {{ get_country.city_id }} -->
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
              {{ now_open }}
            </span>
          </li>
        </ul>
        </div>
      </div>
    </div>
            </div>

        </div>
    </div>
</div>

  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';
  
  const get_phrase = ref({});
  const slugs = ref('');
  const get_users = ref('');
  const get_phrase_listing_by = ref('');
  const get_phrase_total = ref('');
  const get_phrase_listings = ref('');
  const route = useRoute();
  const get_user_thumbnail = ref('');
  const get_listing_by_user_id = ref('');
  const get_phrase_this_listing_is_verified = ref('');
  const get_listing_by_user_id_result = ref({});
  const now_open = ref({});
  const get_phrase_watch_details = ref('');
const get_phrase_featured = ref('');
  const user_id = ref(null);
  // const claimingStatus = ref(0);
  const parsePhotos = (photosString) => {
  try {
    return JSON.parse(photosString);
  } catch (error) {
    console.error('Error parsing photos:', error);
    return [];
  }
};
  // Fetch the ID from the route params
  user_id.value = route.params.user_id;
  
  onMounted(async () => {
    try {
      // Use the outer id variable, not the one defined in onMounted
      const currentId = user_id.value;
      if (!currentId) {
        console.error('Error: User ID is undefined');
        return;
      }
  
      const slug = await axios.get(`/api/get_slug_name/${currentId}`);
      console.log('Slug name:', slug.data);
      slugs.value = slug.data;
  
      const get_user = await axios.get(`/api/get_all_users/${currentId}`);
      console.log('Get user:', get_user.data);
      get_users.value = get_user.data;


      const currentSlug = slugs.value;
  
      const get_phrases = await axios.get('/api/get_phrase');
      console.log('Response from getphrase:', get_phrases.data);
      get_phrase.value = get_phrases.data;

      const get_user_thumbnails = await axios.get(`/api/get_user_thumbnail/${currentId}`);
      console.log('User thumbail:', get_user_thumbnails.data)
      get_user_thumbnail.value = get_user_thumbnails.data;

      const get_phrase_listing_bys = await axios.get('/api/get_phrase/listing_by');
      get_phrase_listing_by.value = get_phrase_listing_bys.data;
      const get_phrase_listing = await axios.get('/api/get_phrase/listings');
      get_phrase_listings.value = get_phrase_listing.data;
      const get_phrase_totals = await axios.get('/api/get_phrase/total');
      get_phrase_total.value = get_phrase_totals.data;
      const get_listing_by_user_ids = await axios.get(`/api/get_listing_by_user_id/${currentId}`);
      get_listing_by_user_id.value = get_listing_by_user_ids.data;
      const get_listing_by_user_id_results = await axios.get(`/api/get_listing_by_user_id_result/${currentId}`);
      get_listing_by_user_id_result.value = get_listing_by_user_id_results.data;
      const get_phrase_watch_detail = await axios.get('/api/get_phrase/watch_details');
        get_phrase_watch_details.value = get_phrase_watch_detail.data;
        const get_phrase_this_listing_is_verifieds = await axios.get('/api/get_phrase/this_listing_is_verified');
        get_phrase_this_listing_is_verified.value = get_phrase_this_listing_is_verifieds.data;
        const n_open = await axios.get(`/api/now_open/${get_listing_by_user_id_result.value.id}`);
        now_open.value = n_open.data;



    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
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
  


  
  <style>

.h-auto{
        height: auto;
    }
    .user-bg-img-card{
        height: 200px;
    }
    .user-bg-img{
        box-shadow: 0px 0px 20px -8px #000;
        margin-left: 20px;
        margin-top: 145px;
        border: 5px solid #fff;
    }
    .user-name-for-profile{
        color: white;
        margin-left: 120px;
        margin-top: -85px;
        font-size: 22px;
    }
    .user-bg-img-card{
        /*background-color: rgba(255,255,255,0.6);
        background-blend-mode: lighten;*/
    }
    @media screen and (min-width: 581px) {
        .user-bg-img-card{
            background-size: 100% 100%;
        }
    }

    @media screen and (max-width: 580px) {
        .user-bg-img-card{
            background-size: auto 100%;
        }
    }

    .font-12{
        font-size: 12px;
    }
  </style>
  

<!-- ListingSingle.vue -->