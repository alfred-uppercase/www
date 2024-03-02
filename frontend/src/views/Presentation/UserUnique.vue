
<template>
<div class="bg-surface">
  <div class="src__CenteredWrapper-sc-1bgl6we-0 iCaNcC">
    <div class="relative">
      <!--Banniere-->
      <div class="sc-5240308e-0 dXVpDX">
        <img src="" class="_1cnjm" alt="Couverture" width="1066" height="240">
      </div>
      <!--Photo-->
      <div class="relative z-raised bg-surface">
        <div class="styles_Logo__ev68x">
          <img :src='get_user_thumbnail' class="_1cnjm" :alt="get_users.name">
        </div>
        <div class="styles_Infos__upt5D">
          <div>
            <h1 class="HlrAk _2QVPN _35DXM _2-a8M _38n__">{{ get_users.name }}</h1>
          </div>
        </div>
      </div>
      <div>
        <!--menu-->
        <div class="styles_navbar__Xnbbl">
          <div class="_2rB4c">
            <ul class="src__CenteredWrapper-sc-1bgl6we-0 iCaNcC hbkW2">
              <div class="styles_spacer__m616G">

              </div>
              <div class="w-full">
                <div class="_13omV _1bDxG _26KFO">
                  <div class="_3mtHQ">
                    <li class="_22goa _2g6cm">
                      <a class="_2Go_L" href="#overview" data-qa-id="sticky_overview">Infos</a>
                    </li>
                    <li class="_22goa _2g6cm">
                      <a class="_2Go_L" href="#online_ads" data-qa-id="sticky_online_ads">Annonces ({{get_listing_by_user_id}})</a>
                    </li>
                    <li class="_22goa _2g6cm">
                      <a class="_2Go_L" href="#trust_rating" data-qa-id="sticky_trust_rating">Avis</a>
                    </li>
                    <div class="y7uUX">
                      <li class="_22goa _2g6cm _3BV5y">
                        <a class="_2Go_L" href="#contact" data-qa-id="sticky_contact">Contacter</a>
                      </li>
                    </div>
                  </div>
                  <div class="SdTtA _2hvFF">

                  </div>
                </div>
              </div>
              <div class="_2KqHw">
                <div class="styles_followButton__7owJ9 lg:mr-[calc(var(--width)+var(--spacing-xl))]" style="--width: 33rem;">
                  <button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-32 h-sz-32 rounded-lg hover:bg-main/dim-5 enabled:active:bg-main/dim-5 focus-visible:bg-main/dim-5 text-main shrink-0" aria-busy="false" aria-live="off">
                    <div>Suivre</div>
                  </button>
                </div>
              </div>
            </ul>
          </div>
        </div>
        <!--End of menu-->
      </div>

      <!--User data-->
      <div class="lg:flex lg:flex-wrap">
        <div class="sc-d1b74272-0 dQNXgY">
        <section class="mx-lg mb-lg mt-2xl sm:mx-xl sm:mb-xl mt-lg sm:mt-3xl">
          <!--Description-->
          <div marginbottom="medium" class="sc-1406b2ac-0 cRfUxr">

          </div>
        </section>
        <section class="mx-lg mb-lg mt-2xl sm:mx-xl sm:mb-xl mt-xl">
          <div class="flex flex-col overflow-hidden border-t-sm border-outline pt-xl md:flex-row md:border-t-none md:p-none">
                      <!--Adresse-->
                    <div class="sc-374a9ca6-0 jfVCmv">

                    </div>
          </div>

        </section>

        <!--Annonces-->
        <section class="mx-lg mb-lg mt-2xl sm:mx-xl sm:mb-xl">
          <div marginbottom="medium" class="sc-1406b2ac-0 cRfUxr"><h2 class="_3c6yv _3Q3XS _3gP8T _35DXM _25LNb _38n__">{{get_listing_by_user_id}} annonces en ligne</h2></div>
          
          <!--Liste-->
          <div class="styles_AdsList__pN4Wm" data-qa-id="ads-container">
            <router-link
              v-for="listing in get_listing_by_user_id_result"
              :key="listing.id"
              :to="{ name: 'annoncesUnique', params: { id: listing.id } }" 
              class="_2-MzW" data-test-id="ad" data-qa-id="aditem_container">
              <div boxshadow="normal" borderradius="small" class="src__Box-sc-10d053g-0 bubzYe">
                <div class="_2heYd">
                  <div class="x0pMY">
                    <div class="_2pXp-">
                      <!--Thumbnail-->
                      <div class="_1PaNE _2z4u1">
                        <div class="_2JtY0">
                          <div class="LazyLoad is-visible">
                            <div class="_29Lk0">
                              <img :src="'/uploads/listing_thumbnails/' + listing.listing_thumbnail" class="_1cnjm" :alt="listing.name">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--Detail-->
                      <div class="_3RVaT">
                        <div class="Yuh5j">
                          <div class="_11w1o">
                            <div class="_3XPg7"></div>
                            <div class="Msj0v">
                              <p data-qa-id="aditem_title" :title="listing.name" class="_1MlU1">
                                {{ listing.name }}
                              </p>
                            </div>
                            <div>
                              <div>
                                <div class="">
                                  <div class="_1SeR6">
                                    <p data-test-id="price" aria-label="Prix: 39 €" class="sc-39605dc-0 OJdbI">
                                      <span data-qa-id="aditem_price" data-test-id="Price" class="sc-39605dc-1 _137P- _3j0OU P4PEa">
                                        <span class="_137P- _35DXM P4PEa">{{ listing.prix }} €</span>
                                      </span>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="_3D9Jw">
                            <div>
                              <div class="styles_saveAd__6K9TD">
                                <div data-test-id="adview_button_favorite" data-qa-id="listitem_save_ad">
                                  <div class="styles_Icon__hQsf8">
                                    <div class="styles_heart__5dMAW"></div>
                                    <div class="styles_heart__5dMAW" style="display: flex;"><svg viewBox="0 0 24 24" minWidth="2.4rem" display="inline" verticalAlign="baseline" role="img" class="src__Box-sc-10d053g-0 src___StyledBox-sc-fochin-0 giZVsD ccvuyv"><title>Sauvegarder</title><use xlink:href="#SvgHeartoutline"></use></svg></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="_2BJ22">
                          <div class="_3Q1Yj">
                            <div class="_1UzWr">
                              <div class="_3u7dT _1cC_m">{{ listing.listing_type }}</div>
                            </div>
                            <div class="_1UzWr">{{ listing.address }}</div>
                            <div class="_1UzWr">{{ listing.date_added }}</div>
                            <div class="_1UzWr">
                              <div class="KS-Pr _1C012">
                                <div class="_2Ra0q"><svg viewBox="0 0 21 12" display="inline" verticalAlign="baseline" role="img" class="src__Box-sc-10d053g-0 src___StyledBox-sc-fochin-0 bnHwOh isepkZ"><use xlink:href="#SvgDeliveryfast"></use></svg></div>
                                <span>Livraison possible</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--End Detail-->
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        
        </section>
      </div>
            <!--Colonne a droite-->
            <div class="sc-eef41f76-0 jVSLHY">
        <div class="bg-surface lg:rounded-sm lg:px-lg lg:py-xl lg:shadow">
          <div class="mx-lg mb-lg mt-2xl sm:mx-xl sm:mb-xl mx-lg mb-lg mt-2xl sm:mx-xl sm:mb-xl sm:mt-xl md:mx-none md:mb-none md:mt-none">
            <div marginbottom="medium" class="sc-1406b2ac-0 cRfUxr"><div class="_3c6yv _3Q3XS _3gP8T _35DXM _25LNb _38n__">Contacter</div>
          </div>
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Email</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Téléphone</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <!--Send mail-->
            <form>
              <div class=""><label class="_3Rgki _3q0nF _1pHkp" for="name">Nom<span class="_2GpA3">champ requis</span></label>
              <div class="ZlsP9 _1mwQl aj3_W FB92D"><input id="name" name="name" required="" class="" data-qa-id="input_name" type="text" value=""></div>
            </div>
            <div class=""><label class="_3Rgki _3q0nF _1pHkp" for="email">E-mail<span class="_2GpA3">champ requis</span></label>
              <div class="ZlsP9 _1mwQl aj3_W FB92D"><input id="email" name="email" required="" class="" data-qa-id="input_email" type="text" inputmode="email" value="email">
              </div>
            </div>
            <div class="">
              <label class="_3Rgki _3q0nF _1pHkp" for="phone">Téléphone</label>
              <div class="ZlsP9 _1mwQl aj3_W FB92D">
                <input id="phone" name="phone" class="" data-qa-id="input_phone" type="text" inputmode="tel" value=""></div>
              </div>
              <div class=""><label class="_3Rgki _3q0nF _1pHkp" for="message">Ajoutez un message (facultatif)</label><textarea class="_2ZiEE" id="message" name="message" data-qa-id="input_message" rows="4"></textarea></div>
              <div class="w-full">
                <button type="submit" variant="contained" paddingtop="x-small" paddingbottom="x-small" width="1" margintop="large" alignitems="center" display="inline-flex" font-size="body" font-weight="semibold" justifycontent="center" minheight="4rem" font-family="Nunito Sans, sans-serif" paddingx="medium" class="ButtonBase-sc-6kh3wf-0 ButtonPrimary-sc-ravtnn-0 eOCnME fOBeMn">Envoyer un message</button></div><button data-test-id="cnil-disclaimer-button" type="button" class="text-left text-caption text-on-background/dim-1 align-center md:align-left mt-md"><span class="text-caption-link"><u><b>Me renseigner</b></u> sur les finalités du traitement de mes données personnelles, les destinataires, le responsable de traitement, les durées de conservation, les coordonnées du <u><b>DPO et mes droits.</b></u></span></button></form>

          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <button display="flex" margintop="x-large" marginbottom="large" marginx="auto" variant="contained" width="[object Object]" data-qa-id="button_display_phone" alignitems="center" font-size="body" font-weight="semibold" justifycontent="center" minheight="4rem" font-family="Nunito Sans, sans-serif" paddingx="medium" type="button" class="ButtonBase-sc-6kh3wf-0 ButtonPrimary-sc-ravtnn-0 ervMaL fOBeMn"><svg viewBox="0 0 24 24" minWidth="1.6rem" display="inline" verticalAlign="baseline" marginRight="small" role="img" class="src__Box-sc-10d053g-0 src___StyledBox-sc-fochin-0 jVKcPg llKFgJ"><use xlink:href="#SvgPhoneoutline"></use></svg>Afficher le numéro</button>
          </div>
        </div>
          </div>
        </div>
      </div>


      </div>


    </div>
  </div>

</div>








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
                <a :href="'/message/?id=' + get_users.id">Envoyer un message</a>


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
  import setNavPills from "@/assets/js/nav-pills.js";
  import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
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
onMounted(() => {
  setNavPills();
});
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
    .iCaNcC {
        width: 100%;
        max-width: 1066px;
        margin: 0px auto;
    }
    .dXVpDX {
        position: relative;
        border-radius: 0px 0px 1.6rem 1.6rem;
        overflow: hidden;
    }
    .dXVpDX::before {
      content: "";
      position: absolute;
      height: 100%;
      width: 100%;
      z-index: 1;
  }
  @media(min-width:768px){
    .dXVpDX::before {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.58) 0%, rgba(0, 0, 0, 0) 50%);
    }
    .styles_Infos__upt5D {
    position: absolute;
    bottom: 1.6rem;
    left: calc(2.4rem + 13rem + 1.6rem);
    padding: 0;
    color: #fff;
}
.styles_Logo__ev68x {
    top: -5.9rem;
    left: 2.4rem;
    height: 13rem;
    width: 13rem;
}
.styles_navbar__Xnbbl {
    padding: 0 2.4rem;
}
.styles_spacer__m616G {
    width: calc(13rem + 1.6rem);
}
.jVSLHY {
    margin-top: calc(-26.3rem);
    margin-bottom: 2.4rem;
    margin-right: 2.4rem;
    width: 33rem;
    min-height: 0px;
    z-index: 1;
}
.dQNXgY {
    width: calc(100% - 35.4rem);
}
  }
  .styles_Infos__upt5D {
    align-items: flex-end;
    display: flex;
    justify-content: space-between;
    padding: 5.6rem 1.6rem 0.8rem;
}
.styles_Logo__ev68x {
    position: absolute;
    top: -4rem;
    left: 1.6rem;
    width: 8rem;
    height: 8rem;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 -1px 4px 0 rgba(26,26,26,.08), 0 4px 8px 0 rgba(26,26,26,.12);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index: 1;
}
.styles_navbar__Xnbbl {
    background-color: #fff;
    padding: 0 1.6rem;
}
.iCaNcC {
    width: 100%;
    max-width: 1066px;
    margin: 0px auto;
}
.styles_navbar__Xnbbl ul {
    align-items: center;
}
.styles_spacer__m616G {
    flex: 0 0 auto;
}
.styles_navbar__Xnbbl a {
    padding-top: 0.8rem;
    margin-top: 0.4rem;
}
.jVSLHY {
    position: static;
    align-self: flex-start;
    max-width: 100%;
    min-height: 86vh;
}
  </style>
  

<!-- ListingSingle.vue -->