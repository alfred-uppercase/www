<template>
      <aside class="col-lg-3 order-0" id="sidebar">
        <div id="filters_col">
          <a
            data-toggle="collapse"
            href="#collapseFilters"
            aria-expanded="false"
            aria-controls="collapseFilters"
            id="filters_col_bt"
          >
            {{ get_phrase.filters }}
            Filters
          </a>
          <!-- Filter form starts-->
          <form
            class="filter-form"
            action=""
            method="get"
            enctype="multipart/form-data"
          >
            <div class="collapse show" id="collapseFilters">
              <!-- Category filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.category }}Categories</h6>
                <ul>
                  <li
                    v-for="(category, index) in categories"
                    :key="index"
                    :class="{ 'hidden-categories hidden': index >= number_of_visible_categories }"
                  >
                    <label class="container_check">
                      <i :class="category.icon_class"></i> {{ category.name }}
                      <small></small>
                      <input
                        type="checkbox"
                        class="categories"
                        :value="category.slug"
                        @click="filter(this, 'parent_id' + category.id)"
                        v-model="category_ids"
                      />
                      <span class="checkmark"></span>
                    </label>
                    <ul v-if="category.sub_categories ">
                        <li
                        v-for="subCategory in category.sub_categories || []"
                        :key="subCategory.id"
                        class="ml-3"
                        :class="{ 'hidden-categories hidden': index >= number_of_visible_categories }"
                        >
                        <label class="container_check">
                            {{ subCategory.name }}
                            <small></small>
                            <input
                            type="checkbox"
                            class="categories parent_id{{ category.id }}"
                            :value="subCategory.slug"
                            @click="filter(this)"
                            v-model="category_ids"
                            />
                            <span class="checkmark"></span>
                        </label>
                        </li>

                    </ul>
                  </li>
                </ul>
                <a
                  href="javascript::"
                  id="category-toggle-btn"
                  @click="showToggle(this, 'hidden-categories')"
                >
                  {{ categories.length > number_of_visible_categories
                    ? get_phrase.show_more
                    : '' }}Show More
                </a>
              </div>
  
              <!-- Price range filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.price_limit }}</h6>
                <div class="distance">
                  {{ get_phrase.price_within }}
                  <span></span>
                  <!-- {{ get_settings.system_currency }} -->
                </div>
                <input
                  type="range"
                  class="price-range"
                  :min="0"
                  :max="maximum_price_limit"
                  :step="10"
                  :value="price_range"
                  data-orientation="horizontal"
                  @change="filter(this)"
                />
              </div>
  
              <input
                type="hidden"
                id="search_string_1"
                name="search_string_1"
                :value="search_string"
              />
  
              <!-- Amenities filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.amenities }}</h6>
                <ul>
                  <li
                    v-for="(amenity, index) in amenities"
                    :key="index"
                    :class="{ 'hidden-amenities hidden': index >= number_of_visible_amenities }"
                  >
                    <label class="container_check">
                      <i :class="amenity.icon"></i> {{ amenity.name }}
                      <input
                        type="checkbox"
                        class="amenities"
                        :value="amenity.slug"
                        @click="filter(this)"
                        v-model="amenity_ids"
                      />
                      <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
                <a
                  href="javascript::"
                  id="amenity-toggle-btn"
                  @click="showToggle(this, 'hidden-amenities')"
                >
                  {{ amenities.length > number_of_visible_amenities
                    ? get_phrase.show_more
                    : '' }}
                </a>
              </div>
  
              <!-- States filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.States }}</h6>
                <ul>
                  <li>
                    <div>
                      <input
                        type="radio"
                        id="state_all"
                        name="state"
                        class="state"
                        value="all"
                        @click="filter(this)"
                        :checked="state_id === 'all'"
                      />
                      <label for="state_all">{{ get_phrase.all }}</label>
                    </div>
                  </li>
                  <li
                    v-for="(state, index) in states"
                    :key="index"
                    :class="{ 'hidden-states hidden': index >= number_of_visible_states }"
                  >
                    <div>
                      <input
                        type="radio"
                        :id="'state_' + state.id"
                        :name="'state stateonchange'"
                        class="state"
                        :value="state.slug"
                        @click="onchange(this)"
                        :checked="state.id === state_id"
                      />
                      <label :for="'state_' + state.id">{{ state.name }}</label>
                    </div>
                  </li>
                </ul>
                <a
                  href="javascript::"
                  id="state-toggle-btn"
                  @click="showToggle(this, 'hidden-states')"
                >
                  {{ states.length > number_of_visible_states
                    ? get_phrase.show_more
                    : '' }}
                </a>
              </div>
  
              <!-- Cities filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.cities }}</h6>
                <ul>
                  <li v-if="state_id === 'all'">
                    <div>
                      <input
                        type="radio"
                        id="city_all"
                        name="city"
                        class="city"
                        value="all"
                        @click="filter(this)"
                        :checked="city_id === 'all'"
                      />
                      <label for="city_all">{{ get_phrase.all }}</label>
                    </div>
                  </li>
                  <li
                    v-for="(city, index) in cities"
                    :key="index"
                    :class="{ 'hidden-cities hidden': index >= number_of_visible_cities }"
                  >
                    <div>
                      <input
                        type="radio"
                        :id="'city_' + city.id"
                        name="city"
                        class="city cityval"
                        :value="city.slug"
                        @click="filter(this)"
                        :checked="city.id === city_id"
                      />
                      <label :for="'city_' + city.id">{{ city.name }}</label>
                    </div>
                  </li>
                </ul>
                <a
                  href="javascript::"
                  id="city-toggle-btn"
                  @click="showToggle(this, 'hidden-cities')"
                >
                  {{ cities.length > number_of_visible_cities
                    ? get_phrase.show_more
                    : '' }}
                </a>
              </div>
  
              <!-- Opening status filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.opening_status }}</h6>
                <ul>
                  <li>
                    <label class="container_check">
                      <i></i> {{ get_phrase.open_now }}
                      <input
                        type="checkbox"
                        class="openingStatus"
                        name="with_open"
                        value="open"
                        @click="filter(this)"
                        :checked="with_open === 'open'"
                      />
                      <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
  
              <!-- Video filter -->
              <div class="filter_type">
                <h6>{{ get_phrase.video }}</h6>
                <ul>
                  <li>
                    <label class="container_check">
                      <i></i> {{ get_phrase.with_video }}
                      <input
                        type="checkbox"
                        class="video_availability"
                        name="with_video"
                        value="1"
                        @click="filter(this)"
                        :checked="with_video === 1"
                      />
                      <span class="checkmark"></span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <!--/collapse -->
          </form>
          <!-- filter form ends -->
        </div>
        <!--/filters col-->
      </aside>

  </template>
  
  <script setup>
import { ref, onMounted } from "vue";
import axios from 'axios';

const get_phrase = ref([]);
const categories = ref([]);
const number_of_visible_categories = ref(0);
const price_range = ref(0);
const search_string = ref("");
const get_settings = ref("");
const amenities = ref([]);
const number_of_visible_amenities = ref(0);
const category_ids = ref([]);
const amenity_ids = ref([]);
const state_id = ref("");
const with_open = ref("all");
const cities = ref([]);
const number_of_visible_cities = ref(0);
const city_id = ref("");
const with_video = ref(0);
const states = ref([]);
const number_of_visible_states = ref(0);

onMounted(async () => {
  try {
    const responsePhrases = await axios.get('/api/get_phrase');
    console.log('Response from get_phrase:', responsePhrases.data);
    get_phrase.value = responsePhrases.data;
    
    const responseCategories = await axios.get('/api/get_categories');
    console.log('Response from get_categories:', responseCategories.data);
    categories.value = responseCategories.data;

    const responseCities = await axios.get('/api/get_cities');
    console.log('Response from get_cities:', responseCities.data);
    cities.value = responseCities.data;



    const get_setting = await axios.get('/api/get_settings');
    console.log('Response from get_phrase:', get_setting.data);
    get_settings.value = get_setting.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
});
</script>
