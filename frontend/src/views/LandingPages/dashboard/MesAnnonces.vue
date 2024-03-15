
<script setup>
import { computed, onMounted, watch, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';
import achatsVentes from '@/assets/img/examples/achats-ventes.avif';
import annonces from '@/assets/img/examples/annonces.avif';
import help from '@/assets/img/examples/help.avif';
import parametres from '@/assets/img/examples/parametres.avif';
import privateProfile from '@/assets/img/examples/private-profile.avif';
import securite from '@/assets/img/examples/securite.avif';
import vacances from '@/assets/img/examples/vacances.avif';
import axios from 'axios';



const store = useAuthStore();
const router = useRouter();

// Getter for checking if the user is logged in
const userLoggedIn = computed(() => store.isLogin);

// Getter to get the information of the connected user
const userData = computed(() => store.userData);

// Function to handle the login logic
const login = () => {
  // Logic to redirect to the login page
};
const romspecs  = ref([]);

const get_listing_by_user_id_result = ref({});
// Function to check if user data is available in localStorage
const checkLocalStorage = () => {
  const userData = localStorage.getItem('userData');
  console.log('User Data from localStorage:', userData);
  if (userData) {
    store.login(JSON.parse(userData));
  } else {
    router.push('/login');
  }
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
// Call the function to check localStorage during the component's mount
onMounted(() => {
  console.log('Component mounted!');
  checkLocalStorage();
});
onMounted(async () => {
    try {

      const currentId = userData.value.user_id;
      if (!currentId) {
        console.error('Error: User ID is undefined');
        return;
      }

      const get_listing_by_user_id_results = await axios.get(`/api/get_listing_by_user_id_result/${currentId}`);
      get_listing_by_user_id_result.value = get_listing_by_user_id_results.data;
      for (const list of get_listing_by_user_id_result.value) {
          const romspec = await axios.get(`/api/get_hotel_spec/${list.id}`);
        //   console.log('Response from Room spec:', romspec.data);
          romspecs.value[list.id] = romspec.data;
    }
    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
  });
console.log('userLoggedIn before watch:', userLoggedIn);

// Use watch to react to changes in userLoggedIn and userData
watch([userLoggedIn, userData], ([newUserLoggedIn, newUserData]) => {
  console.log('userLoggedIn ok:', newUserLoggedIn);
  console.log('userData:', newUserData);
});
const cheapestRoom = (listingId) => {
      const rooms = romspecs.value[listingId];
      if (rooms && rooms.length > 0) {
        return rooms.reduce((min, romspec) => (min.price < romspec.price ? min : romspec));
      }
      return null;
    };
  </script>

<template>
<main id="mainContent">
    <div>
        <!--Breadcrumb-->
        <div class="z-10 h-sz-64 bg-background text-on-surface/dim-1 "><div class="mx-auto flex max-w-page-max items-center pt-xl"><a class="ml-lg underline" href="/compte/part/accueil">Mon compte</a><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size mx-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="truncate font-bold">Annonces</span></div></div>
    
        <!--Search bar-->
        <div class="flex flex-col items-center bg-background">
            <section class="flex w-full justify-center bg-background-variant">
                <form class="flex w-full max-w-page-max flex-col justify-center p-xl md:flex-row md:px-sm">
                    <input class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg mb-md mr-lg md:mb-none" placeholder="Recherchez dans vos annonces" value="">
                    <div class="mb-md box-border md:mb-none md:shrink md:grow md:basis-[25rem]">
                        <button type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r15:" data-state="closed" data-spark-component="popover-trigger" class="h-full min-h-sz-44 w-full rounded-lg border-sm border-outline bg-background px-lg py-md">
                            <div role="button" aria-label="categories-cta">
                                <div class="flex h-full items-center justify-between"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Directory" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="M9.8 6.5h11.12c.6 0 1.08-.48 1.08-1.08s-.48-1.08-1.08-1.08h-11.12c-.6 0-1.08.48-1.08 1.08s.48 1.08 1.08 1.08ZM3.92 16.65c-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92 1.92-.86 1.92-1.92-.86-1.92-1.92-1.92ZM20.92 10.91h-11.12c-.6 0-1.08.48-1.08 1.08s.48 1.08 1.08 1.08h11.12c.6 0 1.08-.48 1.08-1.08s-.48-1.08-1.08-1.08ZM20.92 17.5h-11.12c-.6 0-1.08.48-1.08 1.08s.48 1.08 1.08 1.08h11.12c.6 0 1.08-.48 1.08-1.08s-.48-1.08-1.08-1.08ZM3.92 3.5c-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92 1.92-.86 1.92-1.92-.86-1.92-1.92-1.92ZM3.92 10.07c-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92 1.92-.86 1.92-1.92-.86-1.92-1.92-1.92Z"></path></svg><span class="ml-sm mr-md overflow-hidden text-ellipsis whitespace-nowrap text-body-1">Catégories</span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowHorizontalDown" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 ml-auto" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m2.33,7.3c.43-.4,1.14-.4,1.57,0l8.1,7.48,8.1-7.48c.43-.4,1.14-.4,1.57,0,.43.4.43,1.06,0,1.47l-8.34,7.7c-.17.17-.37.3-.6.39-.23.09-.48.14-.73.14s-.5-.05-.73-.14c-.23-.09-.43-.22-.6-.39L2.33,8.77c-.43-.4-.43-1.06,0-1.47Z"></path></svg></div></div></button></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused w-full px-lg py-md md:ml-lg md:w-auto md:min-w-min" aria-busy="false" aria-live="off" data-qa-id="cta-search_submit">Rechercher

                        </button>
                </form>
            </section>

            <!--Data bar-->
            <section class="w-full max-w-page-max bg-surface px-lg md:px-sm" data-test-id="ad-list-container">
            
            <!-- Liste -->
            <div v-if="get_listing_by_user_id_result">
              <div v-for="listing in get_listing_by_user_id_result" nbtotalseparators="" data-test-id="listing-mosaic" id="mosaic_with_owner"  :key="listing.id" class="listing-item sc-968a2c9d-2 givLyB">
                <!-- Contenu de chaque annonce -->

                <div class="grid-listing">
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
                                                            <div v-if="listing.status === 'pending'">
                                                              <i class="entypo-record" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" :data-original-title="listing.status"></i>
                                                            Status : {{ listing.status }}
                                                            </div>
                                                              <div v-else>
                                                              <i class="entypo-record" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" :data-original-title="listing.status"></i>
                                                              Status :
                                                              {{ listing.status }}
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

            <div v-else>
            <div class="no-listings-message">
                <p class="text-subhead mb-lg">Vous n’avez aucune annonce en ligne</p>
                <a href="/deposer-une-annonce" class="deposit-listing-button">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" class="fill-current text-current icon" aria-hidden="true" focusable="false">
                    <!-- Icône de dépôt d'annonce -->
                </svg>
                Déposer une annonce
                </a>
            </div>
            </div>

            </section>
        </div>

    </div>
</main>
</template>
<style>
.grid-listing{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-gap: 30px;
  margin-top: 50px;
}
</style>