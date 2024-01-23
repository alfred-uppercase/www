<script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';
  import Social from '/views/Presentation/annonces/social.vue';
  
  const listingDetails = ref({});
  const get_phrase = ref({});
  const get_amenity = ref({});
  const slugs = ref('');
  // const get_user = ref('');
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
  
      const amnety = await axios.get(`/api/get_amenities/`);
      console.log('Slug name:', amnety.data);
      get_amenity.value = amnety.data;


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
  

<!-- ListingSingle.vue -->
<template>
<div class="container mt-90">
	<div class="row">
    <div class="col-lg-8">
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


        <!-- <h5 class="add_bottom_15">{{ getPhrase.amenities }}</h5> -->
        <!-- <div class="row add_bottom_30">
          <div v-for="(amenity, key) in get_amenity" :key="key" class="col-md-4">
            <ul>
              <li>
                <i :class="amenity"></i>
                {{ amenity }}
              </li>
            </ul>
          </div>
        </div> -->

        <div class="row add_bottom_30">
											<div class="col-md-4">
							<ul class="">
								<li>
									<i class="fas fa-tree "></i>
									Outdoor seating								</li>
							</ul>
						</div>
											<div class="col-md-4">
							<ul class="">
								<li>
									<i class="fas fa-wifi "></i>
									Free WiFi								</li>
							</ul>
						</div>
											<div class="col-md-4">
							<ul class="">
								<li>
									<i class="fas fa-utensils "></i>
									BBQ facilities								</li>
							</ul>
						</div>
											<div class="col-md-4">
							<ul class="">
								<li>
									<i class="fas fa-music "></i>
									Music								</li>
							</ul>
						</div>
									</div>

<!-- Opening and Closing Time -->

              <div class="opening">
                <div class="ribbon">
                  <span class="closed">Closed</span>
                </div>
                <i class="icon_clock_alt"></i>
                <h4>Opening hours</h4>
                  <div class="row">
                  <div class="col-md-6">
                    <ul>
                      <li>
                        Saturday          <span>
                          05 am - 10 pm          </span>
                      </li>
                      <li>
                        Sunday          <span>
                          02 am - 05 pm          </span>
                      </li>
                      <li>
                        Monday          <span>
                          11 am - 03 pm          </span>
                      </li>
                      <li>
                        Tuesday          <span>
                          Closed          </span>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                      <li>
                        Wednesday          <span>
                          Closed          </span>
                      </li>
                      <li>
                        Thursday          <span>
                          Closed          </span>
                      </li>
                      <li>
                        Friday          <span>
                          Closed          </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>


    </section>
    </div>
    <aside class="col-lg-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
				

				
        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1156.5px;">
          <div class="box_detail booking">
          
          </div>
          <ul class="share-buttons">
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=https://demo.creativeitem.com/atlas/restaurant/ristorante-del-arte/1" class="fb-share" target="_blank"><i class="social_facebook"></i> Share</a></li>
					<li><a href="https://twitter.com/share?url=https://demo.creativeitem.com/atlas/restaurant/ristorante-del-arte/1" target="_blank" class="twitter-share"><i class="social_twitter"></i> Tweet</a></li>
					<li><a href="http://pinterest.com/pin/create/link/?url=https://demo.creativeitem.com/atlas/restaurant/ristorante-del-arte/1" target="_blank" class="gplus-share"><i class="social_pinterest"></i> Pin</a></li>
				</ul>
        </div>
    </aside>


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
  
  