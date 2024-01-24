
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
                <div class="card-body">
                    <p>{{ get_users.about }}</p>
                </div>
            </div>
            <div class="card my-5">
                <div class="card-body">
                    <h6 class="p-0 m-0">
                        {{get_phrase_listing_by}} : <a href="javascript:;">{{ get_users.name }}</a>
                        <small class="float-right font-12 mt-2">{{get_phrase_total}} {{user_listings_num_rows}} {{get_phrase_listings}}</small>
                    </h6>
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
  
  const listingDetails = ref({});
  const get_phrase = ref({});
  const slugs = ref('');
  const get_users = ref('');
  const route = useRoute();
  const get_user_thumbnail = ref('');
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
  
      const response = await axios.get(`/home/listing/${currentSlug}/${currentId}`);
      console.log('Response from single listing:', response.data);
      listingDetails.value = response.data;
      const get_phrases = await axios.get('/api/get_phrase');
      console.log('Response from getphrase:', get_phrases.data);
      get_phrase.value = get_phrases.data;
      // claimingStatus.value = response.data.status;
      const get_user_thumbnails = await axios.get(`/api/get_user_thumbnail/${currentId}`);
      console.log('User thumbail:', get_user_thumbnails.data)
      get_user_thumbnail.value = get_user_thumbnails.data;
    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
  });
  </script>
  


  
  <style>
    .gallery{
      display: flex;
      flex-wrap: wrap;
    }
    .gallery .imgcontent{
      max-width: 200px;
      width: 100%;
      margin-right: 20px;
    }
    .gallery .imgcontent img{
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
  

<!-- ListingSingle.vue -->