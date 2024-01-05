<template>
    <div style="padding-top: 90px;">
      <h1>{{ title }}</h1>
        <div v-for="listing in listings" :key="listing.id">
          <!-- Display other listing details as needed -->
          <div class="col-lg-6 col-md-6 listing-div " data-marker-id="{{listings.code}}" id = "{{listings.code}}">

            <div 
            class="strip grid "
            :class="{ 'featured-tag-border': listing.is_featured === '1' }">
              <figure>
                
                <a href="javascript::" class="wishlist-icon" onclick="addToWishList(this, '<?php echo $listing['id']; ?>')">
                  <i class=" <?php echo is_wishlisted($listing['id']) ? 'fas fa-heart' : 'far fa-heart'; ?> "></i>
                </a>
                
                  <a 
                  v-if="listing.is_featured === '1'" 
                  href="javascript::" class="featured-tag-grid"><?php echo get_phrase('featured'); ?>
                </a>
                
                <a href="<?php echo get_listing_url($listing['id']); ?>"  id = "listing-banner-image-for-<?php echo $listing['code']; ?>"  class="d-block h-100 img" style="background-image:url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']);')">
                  <!-- <img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt=""> -->
                  <div class="read_more"><span><?php echo get_phrase('watch_details'); ?></span></div>
                </a>
                <small><?php echo $listing['listing_type'] == "" ? ucfirst(get_phrase('general')) : ucfirst(get_phrase($listing['listing_type'])) ; ?></small>
              </figure>
              <div class="wrapper <?php if($listing['is_featured'] == 1) echo 'featured-body'; ?>">
                <h3 class="ellipsis">
                  <a href="<?php echo get_listing_url($listing['id']); ?>"><?php echo $listing['name']; ?></a>
                  <?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
                          <?php if($claiming_status == 1): ?>
                    <span class="claimed_icon" data-toggle="tooltip" title="<?php echo get_phrase('this_listing_is_verified'); ?>">
                              <img src="<?php echo base_url('assets/frontend/images/verified.png'); ?>" width="23" />
                            </span>
                  <?php endif; ?>
                </h3>
                <small>
                  <?php
                    $city 	 = $this->db->get_where('city', array('id' =>  $listing['city_id']))->row_array();
                    $state 	 = $this->db->get_where('state', array('id' =>  $listing['state_id']))->row_array();
                    $country = $this->db->get_where('country', array('id' =>  $listing['country_id']))->row_array();
                    echo $city['name'].','.$state['name'].','.$country['name'];
                  ?>
                </small>
                <p class="ellipsis">
                  <?php echo $listing['description']; ?>
                </p>
                <?php if ($listing['latitude'] != "" && $listing['longitude'] != ""): ?>
                    <a class="address" href="javascript:" button-direction-id = "<?php echo $listing['code']; ?>" target=""><?php echo get_phrase('show_on_map'); ?></a>
                <?php endif; ?>

              </div>
              <ul class="<?php if($listing['is_featured'] == 1) echo 'featured-footer'; ?> mb-0">

                <?php $opening_status = get_now_open($listing['id']); ?>
                <li><span class="<?php echo $opening_status == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo get_phrase($opening_status); ?></span></li>
                <li>
                  <div class="score">
                    <span>
                      <?php
                      if ($this->frontend_model->get_listing_wise_rating($listing['id']) > 0) {
                        $quality = $this->frontend_model->get_rating_wise_quality($listing['id']);
                        echo $quality['quality'];
                      }else {
                        echo get_phrase('unreviewed');
                      }
                      ?>
                      <em>
                        <?php echo count($this->frontend_model->get_listing_wise_review($listing['id'])).' '.get_phrase('reviews'); ?>
                      </em>
                    </span>
                    <strong><?php echo $this->frontend_model->get_listing_wise_rating($listing['id']); ?></strong></div>
                </li>
              </ul>
            </div>
            </div>
        </div>
    </div>
  </template>
  
  <script setup>
import { ref, onMounted, onUnmounted } from "vue";
import axios from 'axios';
const title = ref('');
const listings = ref([]);
const body = document.getElementsByTagName("body")[0];

onMounted(async () => {
  try {

    const response = await axios.get('http://localhost/home/filter_listings');
    console.log('Response from listings:', response.data);
    title.value = response.data.title;
    listings.value = response.data.listings;
   
  } catch (error) {
    console.error('Error fetching listing:', error);
  }

  body.classList.add("annonces");
  body.classList.add("bg-gray-200");
});


  </script>
  