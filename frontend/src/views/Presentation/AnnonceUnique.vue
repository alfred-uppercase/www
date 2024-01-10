<!-- ListingSingle.vue -->
<template>
<div class="container margin_60_35">
	<div class="row">
    <section id="description">
				<div class="detail_title_1">
					<div class="row">
						<div class="col-6">

						</div>
						<div class="col-6">

						</div>
					</div>
          <h1>
            {{ listingDetails.name }}

            <!-- Assuming you have a property 'claimingStatus' in your data -->
            <!-- <span v-if="claimingStatus === 1" class="claimed_icon" data-toggle="tooltip" title="This listing is verified">
              <img src="/assets/frontend/images/verified.png" width="30" />
            </span> -->
          </h1>

          <!-- Check if latitude and longitude are not empty -->
          <a v-if="listingDetails.latitude && listingDetails.longitude" class="address" :href="'http://maps.google.com/maps?q=' + listingDetails.latitude + ',' + listingDetails.longitude" target="_blank">
            {{ listingDetails.address }}
          </a>
        </div>
        <div class="add_bottom_15">
        <!-- <span v-for="(categoryId, index) in listingDetails.categories" :key="index" class="loc_open mr-2">
          <a v-if="categoryNames[categoryId]" :href="'/home/filter_listings?category=' + categoryNames[categoryId].slug" style="color: #32a067;">
            {{ categoryNames[categoryId].name }}
          </a>
        </span> -->
      </div>
      <h5>{{ get_phrase.about }}</h5>
      <p v-html="listingDetails.description"></p>

      <div v-if="listingDetails.photos">
          <h2>Photos {{ get_phrase.photo_gallery }}</h2>
          <div class="gallery">
            <div class="imgcontent"
              v-for="(photo, index) in parsePhotos(listingDetails.photos)"
              :key="index"
              >
                <img
                  :src="'/uploads/listing_images/' + photo"
                  :alt="'Photo ' + (index + 1)"
                />
            </div>
          </div>

        </div>
        <Social />

    </section>

  </div>
</div>



    <!-- <div>

        <h1 style="padding-top: 100px;">{{ listingDetails.name }}</h1>
        <p>{{ listingDetails.description }}</p>
        <p>Categories: {{ listingDetails.categories }}</p>
        <p>Amenities: {{ listingDetails.amenities }}</p>

        <div v-if="listingDetails.photos">
          <h2>Photos</h2>
          <img
            v-for="(photo, index) in parsePhotos(listingDetails.photos)"
            :key="index"
            :src="'/uploads/listing_images/' + photo"
            :alt="'Photo ' + (index + 1)"
          />
        </div>
      </div> -->



  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';
  import Social from '/views/Presentation/annonces/social.vue';
  
  const listingDetails = ref({});
  const get_phrase = ref({});
  const slugs = ref('');
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
      console.log('Response from single listing:', response.data);
      listingDetails.value = response.data;
      const get_phrases = await axios.get('/api/get_phrase');
      console.log('Response from getphrase:', get_phrases.data);
      get_phrase.value = get_phrases.data;
      // claimingStatus.value = response.data.status;
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
  