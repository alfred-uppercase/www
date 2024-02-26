
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
function candidatures() {
  router.push({ name: 'JobCad' })
}
  </script>

<template>
<main id="mainContent">
    <div>
    <div class="p-lg pt-3xl"><div class="relative mx-auto mb-lg max-w-page-max border-b-sm border-neutral-container p-xl md:rounded-md md:border-sm md:border-outline"><div class="items-center overflow-hidden sm:flex"><div class="mb-lg mr-xl size-sz-64 shrink-0 overflow-hidden rounded-full md:mb-xl md:size-sz-96"><img :src="get_user_thumbnail" class="_1cnjm" alt="Your profile avatar"></div><div class="w-full"><div class="grid items-center gap-sm md:grid-cols-[min-content_1fr]"><h3 class="mr-xl truncate text-headline-2-expanded">{{ userData.name }}</h3><div class="md:order-3 md:col-span-2"></div></div></div></div><div class="mb-lg md:mb-xl"><span class="mr-2xl mt-md flex items-center text-body-1 text-overlay"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="MobileCheck" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="m9.98,19.86h-3.23c-.31,0-.56-.26-.56-.57v-.57h3.79c.58,0,1.05-.47,1.05-1.06s-.47-1.06-1.05-1.06h-3.79V7.36h9.2v7.06c0,.58.47,1.06,1.05,1.06s1.05-.47,1.05-1.06V4.68c0-1.48-1.19-2.68-2.67-2.68H6.75c-1.47,0-2.67,1.2-2.67,2.68v14.61c0,1.48,1.19,2.68,2.67,2.68h3.23c.58,0,1.05-.47,1.05-1.06s-.47-1.06-1.05-1.06Zm5.41-14.61H6.19v-.57c0-.32.26-.57.56-.57h8.08c.31,0,.56.26.56.57v.57Z"></path><path d="m19.61,15.74l-.17-.17-.02.02c-.41-.25-.94-.2-1.29.16l-3.69,3.71-1.18-1.18c-.41-.42-1.08-.42-1.48,0-.41.42-.41,1.08,0,1.49l1.92,1.93s.11.1.17.13c.41.27.96.22,1.32-.13h0s4.41-4.45,4.41-4.45c.41-.42.41-1.08,0-1.49v-.02Z"></path></svg>Numéro de téléphone vérifié</span></div><div class="absolute right-lg top-xl md:right-xl"><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support px-none text-body-1 border-overlay" aria-busy="false" aria-live="off" aria-label="partage profil"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ShareOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 fill-overlay" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m14.46,5.77v.03s-6.92,2.87-6.92,2.87c-.53-.28-1.13-.44-1.78-.44-2.08,0-3.77,1.69-3.77,3.77s1.69,3.77,3.77,3.77c.64,0,1.25-.16,1.78-.44l6.92,2.87s0,.02,0,.03c0,2.08,1.69,3.77,3.77,3.77s3.77-1.69,3.77-3.77-1.69-3.77-3.77-3.77c-1.36,0-2.55.72-3.22,1.8l-5.93-2.46c.29-.53.46-1.15.46-1.8s-.17-1.26-.46-1.8l5.93-2.46c.66,1.08,1.86,1.8,3.22,1.8,2.08,0,3.77-1.69,3.77-3.77s-1.69-3.77-3.77-3.77-3.77,1.69-3.77,3.77Zm3.77-1.77c-.98,0-1.77.79-1.77,1.77,0,.13.01.25.04.37.01.04.02.08.03.12.21.74.89,1.28,1.7,1.28.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77ZM6.89,13.37c.4-.32.65-.82.65-1.37s-.25-1.05-.65-1.37c-.03-.02-.07-.05-.1-.07-.29-.2-.64-.32-1.02-.32-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77c.38,0,.73-.12,1.02-.32.03-.03.06-.05.1-.07Zm9.61,4.49s.02-.08.03-.12c.21-.74.89-1.28,1.7-1.28.98,0,1.77.79,1.77,1.77s-.79,1.77-1.77,1.77-1.77-.79-1.77-1.77c0-.13.01-.25.04-.37Z"></path></svg></button><div class="flex gap-lg"></div></div><div class="flex items-baseline justify-between md:mt-xl"><div class="lg:flex"><span class="mr-2xl mt-md flex items-center text-body-1 text-on-surface/dim-1"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="BookmarkOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m4.5,5.44c0-1.9,1.53-3.44,3.42-3.44h8.15c1.89,0,3.42,1.54,3.42,3.44v15.57c0,.38-.22.73-.57.89-.35.16-.75.11-1.04-.14l-5.89-5.01-5.89,5.01c-.29.25-.7.3-1.04.14-.35-.16-.57-.51-.57-.89V5.44Zm3.42-1.48c-.81,0-1.47.66-1.47,1.48v13.45l4.91-4.18c.36-.31.9-.31,1.26,0l4.91,4.18V5.44c0-.81-.66-1.48-1.47-1.48H7.92Z"></path></svg>Membre depuis février 2024</span></div></div></div><div class="mx-auto mt-xl max-w-page-max"><div class="flex-auto items-center justify-between rounded-lg bg-support-container p-xl md:flex"><div class="mr-lg text-body-1"><p class="mb-sm font-bold">Vous n’avez pas d’annonces en ligne</p><p class="mb-lg">Vendre, gagner de l’argent, faire un geste pour la planète, tout ça simplement en déposant une annonce sur leboncoin !</p></div><a data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused shrink-0" aria-busy="false" aria-live="off" href="/deposer-une-annonce">Déposer une annonce</a></div></div></div>

    </div>
</main>
</template>