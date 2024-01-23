<template>
    <div class="row mb-3 ch">
  <div class="col-12">
    <h5 class="mb-3">{{ getPhrase.agent_details }}Agents details</h5>

    <div class="row mb-1">
      <div class="col-md-12">
        <a :href="`${siteUrl}/user_profile`">
          <img :src='get_user_thumbnail' alt="" class="float-left mr-3" width="80">
        </a>

        <p class="m-0 pt-3"><a :href="`${siteUrl}/user_profile/${get_user_detail.id}`" class="">{{ get_users.name }}</a></p>
        <p>
          <!-- <small>{{ $t('total') }} {{ getUserListingsCount(get_user_detail.id) }} {{ $t('listings') }}</small> -->
        </p>
      </div>
    </div>

    <!-- <a v-if="listingDetails.website" :href="listingDetails.website" target="blank" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
      <i class="icon-globe-6 mr-2"></i>{{ $t('website') }}
    </a>

    <a v-if="listingDetails.email" :href="`mailto:${listingDetails.email}`" target="" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
      <i class="icon-email mr-2"></i>{{ $t('email_us') }}
    </a>

    <a v-if="listingDetails.phone" :href="`tel:${listingDetails.phone}`" target="" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
      <i class="icon-phone mr-2"></i>{{ $t('call_now') }}
    </a>

    <template v-if="listingDetails.social">
      <a v-if="listingDetails.social.facebook" :href="listingDetails.social.facebook" target="blank" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
        <i class="icon-facebook-6 mr-2"></i>{{ $t('facebook') }}
      </a>

      <a v-if="listingDetails.social.twitter" :href="listingDetails.social.twitter" target="blank" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
        <i class="icon-twitter mr-2"></i>{{ $t('twitter') }}
      </a>

      <a v-if="listingDetails.social.linkedin" :href="listingDetails.social.linkedin" target="blank" class="btn_1 full-width outline wishlist social-button" id="btn-wishlist-social">
        <i class="fab fa-linkedin mr-2"></i>{{ $t('linkedin') }}
      </a>
    </template> -->
  </div>
</div>

</template>
<script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';


  
  const listingDetails = ref({});
  const getPhrase = ref("");
  const slugs = ref('');
  const get_user_thumbnail = ref('');
  const get_user_detail = ref('');
  const get_users = ref('');
  const route = useRoute();
  const id = ref(null);
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
  id.value = route.params.id;
  
  onMounted(async () => {
    try {
      // Use the outer id variable, not the one defined in onMounted
      const currentId = id.value;
      if (!currentId) {
        console.error('Error: Listing ID is undefined');
        return;
      }
  
      const slug = await axios.get(`/api/get_slug_name/${currentId}`);
      console.log('Slug name:', slug.data);
      slugs.value = slug.data;
  

      const currentSlug = slugs.value;
  
      const response = await axios.get(`/home/listing/${currentSlug}/${currentId}`);

      listingDetails.value = response.data;

      const get_user = await axios.get(`/api/get_all_users/${listingDetails.value.user_id}`);
      console.log('Get user:', get_user.data);
      get_users.value = get_user.data;

      const getPhrases = await axios.get('/api/get_phrase');

      getPhrase.value = getPhrases.data;

      const get_user_details = await axios.get('/api/get_user_thumbnail');
      get_user_detail.value = get_user_details.data;


      const get_user_thumbnails = await axios.get(`/api/get_user_thumbnail/${listingDetails.value.user_id}`);
      console.log('User thumbail:', get_user_thumbnails.data)
      get_user_thumbnail.value = get_user_thumbnails.data;
      // claimingStatus.value = response.data.status;
    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
  });
  </script>