
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

const logout = () => {
  store.logout(); // Call the logout method from the authStore
  router.push('/'); // Redirect to the home page or login page after logout
};

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

// Call the function to check localStorage during the component's mount
onMounted(() => {
  console.log('Component mounted!');
  checkLocalStorage();
});
const get_user_thumbnail = ref('');

onMounted(async () => {
    try {
      // Use the outer id variable, not the one defined in onMounted
      const currentId = userData.value.user_id;
      if (!currentId) {
        console.error('Error: User ID is undefined');
        return;
      }
  
      const get_user_thumbnails = await axios.get(`/api/get_user_thumbnail/${userData.value.user_id}`);
      console.log('User thumbail:', get_user_thumbnails.data)
      get_user_thumbnail.value = get_user_thumbnails.data;

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

  </script>

<template>
<main id="mainContent">
    <div>
        <!--Breadcrumb-->
        <div class="z-10 h-sz-64 bg-background text-on-surface/dim-1 "><div class="mx-auto flex max-w-page-max items-center pt-xl"><a class="ml-lg underline" href="/compte/part/accueil">Mon compte</a><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size mx-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="truncate font-bold">Profil</span></div></div>
    
        <!--Data-->
        <div class="m-auto w-full max-w-screen-lg">
            <div class="p-lg">
                <h1 class="mb-xl text-headline-1">Profil</h1>

                <!--Tab-->
                <div class="border-b-sm border-neutral/dim-4 pb-2xl sm:pb-none md:px-none">
                    <form @submit.prevent="editprofil()">
                        <div class="mb-2xl flex items-center outline-none">
                            <button class="relative shrink-0 h-sz-112 w-sz-112" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r1n:" data-state="closed">
                                <img class="h-full w-full rounded-full" :src="get_user_thumbnail" alt="Photo de profil"><div class="absolute bottom-none  right-none flex  h-2xl w-2xl  items-center justify-center rounded-full bg-surface shadow"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Ajouter une photo de profil" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><title>Ajouter une photo de profil</title><path fill-rule="evenodd" d="m12,2c.55,0,1,.45,1,1v7.94h8c.55,0,1,.45,1,1s-.45,1-1,1h-8v8.06c0,.55-.45,1-1,1s-1-.45-1-1v-8.06H3c-.55,0-1-.45-1-1s.45-1,1-1h8V3c0-.55.45-1,1-1Z"></path></svg>
                                </div>
                              </button>
                              <span class="ml-xl text-left text-body-1 text-on-surface/dim-1">Avec une photo, vous avez de quoi personnaliser votre profil et rassurer les autres membres !</span>
                            </div>
                            <div data-spark-component="form-field" class="w-full md:max-w-sz-320 flex flex-col gap-sm">
                              <label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:r1r:" for="radix-:r1q:">Nom d’utilisateur<span data-spark-component="label-required-indicator" role="presentation" aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                              <input id="radix-:r1q:" name="pseudo" class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg" required="" aria-invalid="false" v-model="userData.lastname">
                            </div>
                            <div class="items-center justify-between text-center md:flex">
                              <button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg cursor-not-allowed opacity-dim-3 bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused my-xl w-full md:w-auto" aria-busy="false" type="submit">Enregistrer la modification</button>
                              <a class="block text-body-1 font-bold underline md:mt-none" href="/profil/57771296-4f8a-4724-a85e-b2257d9013a2">Accéder à mon profil public</a>
                            </div>
                          </form>
                        </div>
            
                <!--Espace candidat-->
                
                    <RouterLink 
                    class="flex items-center justify-between border-b-sm border-neutral/dim-4 py-2xl md:px-none"
                    :to="{ name: 'JobProfil' }"
                    >
                    <span class="flex flex-1 text-headline-2">Espace candidat</span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size inline md:hidden" data-spark-component="icon" aria-hidden="true" focusable="false" color="greyDark"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="hidden text-body-1-link font-bold underline md:inline">Accéder à mon profil candidat</span></RouterLink>

                <!--Espace locataire-->
                <a class="flex items-center justify-between border-b-sm border-neutral/dim-4 py-2xl md:px-none" href="/compte/immo/location/profil"><span class="flex flex-1 text-headline-2">Espace locataire</span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size inline md:hidden" data-spark-component="icon" aria-hidden="true" focusable="false" color="greyDark"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="hidden text-body-1-link font-bold underline md:inline">Accéder à mon dossier locataire</span></a>

                <!--Espace Bailler-->
                <a class="flex items-center justify-between border-b-sm border-neutral/dim-4 py-2xl md:px-none" href="/compte/espace-bailleur"><span class="flex flex-1 text-headline-2">Espace bailleur</span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size inline md:hidden" data-spark-component="icon" aria-hidden="true" focusable="false" color="greyDark"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="hidden text-body-1-link font-bold underline md:inline">Accéder à mon espace bailleur</span></a>
            </div>
        </div>

    </div>
</main>
</template>
<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/authStore';

export default {
  data() {
    return {
      listing_thumbnail:null,
      user_id:null,
    };
  },
  computed: {
    ...mapState(useAuthStore, ['isLogin','userData']),
  },
  mounted() {
    this.user_id = this.userData ? this.userData.user_id : null;
  },
  methods: {
    handleThumbnailUpload() {
        this.listing_thumbnail = this.$refs.listing_thumbnail.files[0];
      },
    addFiles(){
        this.$refs.listing_images.click();
      },
      editprofil() {
      if (!this.user_id) {
        console.error("User ID is not available");
        return;
      }
      const listingData = new FormData();
      listingData.append('user_image', this.listing_thumbnail);

      axios.post('/api/edit_user/' + this.user_id, listingData, {
      headers: {
        // 'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Type': 'multipart/form-data'
      },
    })
        .then(response => {
          // Handle successful response
          this.msg = 'Listing add successfull';
          this.classAlert = 'success';
          response.data.files;
        })
        .catch(error => {
          // Handle error response
          if (error.response.status === 400) {
            this.msg = 'Please fill in all the fieldsd';
          } else if (error.response.status === 500) {
            this.msg = 'Internal Server Error. Please try again later.';
          } else {
            this.msg = 'An unexpected error occurred.';
          }
          this.classAlert = 'error';
        });

    },
  }
}
</script>