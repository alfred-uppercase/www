
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
<div class="mx-lg my-2xl">
  <!-- <div > -->
    <div class="mx-auto max-w-page-max" v-if="userLoggedIn">

      <!-- section 1 -->
      <div class="flex flex-col gap-lg md:flex-row">
        <div class="flex w-full grow items-center justify-center rounded-lg border-sm border-outline p-lg [&amp;>div]:w-full"><button class="relative shrink-0 mr-xl size-sz-96" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r3:" data-state="closed"><img class="h-full w-full rounded-full" :src="get_user_thumbnail" alt="Photo de profil"><div class="absolute bottom-none  right-none flex  h-2xl w-2xl  items-center justify-center rounded-full bg-surface shadow"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Ajouter une photo de profil" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><title>Ajouter une photo de profil</title><path fill-rule="evenodd" d="m12,2c.55,0,1,.45,1,1v7.94h8c.55,0,1,.45,1,1s-.45,1-1,1h-8v8.06c0,.55-.45,1-1,1s-1-.45-1-1v-8.06H3c-.55,0-1-.45-1-1s.45-1,1-1h8V3c0-.55.45-1,1-1Z"></path></svg></div></button><div class="_2KqHw"><div class="flex items-center justify-between text-body-1"><div><h2 class="mr-lg max-w-sz-384 truncate text-headline-2-expanded">{{ userData.name }}</h2></div><RouterLink :to="{ name: 'ProfilPublic' }" class="hidden font-bold underline md:block" >Accéder à mon profil public</RouterLink></div></div></div>
        <a class="md:w-sz-384" href="/compte/porte-monnaie?entryPoint=myaccount"><div class="relative h-full overflow-hidden rounded-lg py-sm pl-3xl shadow"><div class="absolute -left-[28.3rem] -top-[15.5rem]"><svg width="385" height="418" viewBox="0 0 385 418" fill="none" xmlns="http://www.w3.org/2000/svg"><circle class="fill-main" cx="192.629" cy="225.167" r="136" transform="rotate(-135 192.629 225.167)" fill-opacity="0.56"></circle><circle cx="209.626" cy="142.508" r="125" transform="rotate(-8.37699 209.626 142.508)" fill="#627C93" fill-opacity="0.4"></circle></svg></div><div class="flex flex-col pl-3xl"><h2 class="text-body-1 font-bold">Porte-monnaie</h2><span class="mt-lg text-display-3">0&nbsp;€</span><span class="mt-md text-body-1">Solde disponible</span></div></div></a>
      </div>

        <div class="mt-xl"><div class="my-xl"></div></div>
        <!-- Add profile pic -->
        <div class="relative mb-xl w-full items-center justify-between rounded-lg border-sm border-solid border-neutral/dim-4 bg-support-container p-xl pt-3xl sm:flex" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:r6:" data-state="closed"><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-32 h-sz-32 rounded-lg text-neutral hover:bg-neutral/dim-5 enabled:active:bg-neutral/dim-5 focus-visible:bg-neutral/dim-5 px-none text-body-1 absolute right-md top-md" aria-busy="false" aria-live="off" aria-label="Fermer l'avertissement sur la photo"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Close" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m21.6,19.67l-7.68-7.68,7.57-7.59c.53-.53.53-1.4,0-1.93-.53-.53-1.4-.53-1.93,0l-7.57,7.58L4.33,2.4c-.53-.53-1.4-.53-1.93,0-.53.53-.53,1.4,0,1.93l7.66,7.66-7.66,7.65c-.53.53-.53,1.4,0,1.93.53.53,1.4.53,1.93,0l7.66-7.66,7.68,7.68c.53.53,1.4.53,1.93,0,.53-.53.53-1.4,0-1.93h0Z"></path></svg></button><div class="basis-3/4"><div class="flex items-center"><h2 class="mr-md text-headline-2">Photo de profil</h2><span data-spark-component="tag" class="box-border inline-flex items-center justify-center gap-sm whitespace-nowrap text-caption font-bold h-sz-20 px-md rounded-full border-sm border-current text-basic"> nouveau</span></div><p class="mb-xl mt-sm text-body-1 md:mb-none">Pour une expérience plus agréable entre membres avec qui vous allez faire de bonnes affaires !</p></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" aria-busy="false" aria-live="off">Ajouter ma photo de profil</button></div>
          <!-- Les sections -->
        <div class="grid gap-xl md:grid-cols-2 lg:grid-cols-3">
          <!--Annonces-->

            <RouterLink :to="{ name: 'MesAnnonces' }"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;">
            <img alt="" :src="annonces" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" :srcset="annonces"></span></div><div class="md:mt-xl"><h2 class="text-headline-2">Annonces</h2><span class="text-body-1">Gérer mes annonces déposées</span></div></div>
          </RouterLink>

          <!--Mes transactions -->
          <RouterLink :to="{ name: 'MesTransactions' }"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fachats-ventes.759b3481.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fachats-ventes.759b3481.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fachats-ventes.759b3481.png&amp;w=96&amp;q=75 2x"></span></div><div class="md:mt-xl"><h2 class="text-headline-2">Transactions</h2><span class="text-body-1">Suivre mes achats et mes ventes</span></div></div>
          </RouterLink>

          <!--Reservatioon de vacances-->
          <RouterLink :to="{ name: 'MesReservations' }"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fvacances.60813a86.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fvacances.60813a86.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fvacances.60813a86.png&amp;w=96&amp;q=75 2x"></span></div><div class="md:mt-xl"><h2 class="text-headline-2">Réservation de vacances</h2><span class="text-body-1">Retrouver vos réservations en tant que voyageur</span></div></div>
          </RouterLink>

          <!--Profil & Espace-->
          <RouterLink :to="{ name: 'Profil' }"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprivate-profile.ccf8698a.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprivate-profile.ccf8698a.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fprivate-profile.ccf8698a.png&amp;w=96&amp;q=75 2x"></span></div><div class="md:mt-xl"><h2 class="text-headline-2">Profil &amp; Espaces</h2><span class="text-body-1">Modifier mon profil public, accéder à mes avis, aux espaces candidat, locataire et bailleur</span></div></div>
          </RouterLink>

          <!--Parametres-->
          <RouterLink :to="{ name: 'ParametresCompte' }"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fparametres.74750762.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fparametres.74750762.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fparametres.74750762.png&amp;w=96&amp;q=75 2x"></span></div><div class="md:mt-xl"><h2 class="text-headline-2">Paramètres</h2><span class="text-body-1">Compléter et modifier mes informations privées et préférences</span></div></div></RouterLink>

          <!--Connexion et securité-->
          <a href="/compte/connexion-securite"><div class="flex size-full items-center rounded-lg p-xl shadow md:flex-col md:items-start"><div class="mr-xl flex size-3xl min-w-sz-40 items-center"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 34px; height: 38px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fsecurite.288e30ea.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fsecurite.288e30ea.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fsecurite.288e30ea.png&amp;w=96&amp;q=75 2x"></span></div><div class="md:mt-xl"><h2 class="text-headline-2"><div class="flex justify-between md:block">Connexion et sécurité<span data-spark-component="badge" role="status" class="inline-flex h-fit empty:p-none text-center font-bold rounded-full box-content bg-main text-on-main border-on-main text-caption px-md py-sm empty:h-sz-16 empty:w-sz-16 ml-md" aria-label="1 notification">1</span></div></h2><span class="text-body-1">Protéger mon compte et consulter son indice de sécurité</span></div></div></a>

          <!--Mes credits-->
          <a target="_self" href="/compte/acheter-des-credits?entryPoint=compte_part_home"><button class="flex h-sz-80 w-full items-center justify-between rounded-lg p-xl shadow"><div class="flex items-center"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="MoneyOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-md" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m9.21,2.01c2.09-.1,4.17.43,5.95,1.53.47.29.62.91.33,1.38-.29.47-.91.62-1.38.33-1.45-.89-3.13-1.32-4.82-1.24-.02,0-.03,0-.05,0-1.62,0-3.03.29-4,.73-.49.22-.82.45-1.02.66-.19.2-.21.33-.21.39s.02.2.26.43c.24.23.63.49,1.2.72.51.21.75.8.54,1.31-.21.51-.8.75-1.31.54-.24-.1-.47-.21-.69-.33v1.48c0,.06.02.2.26.43.24.23.63.49,1.2.72.51.21.75.8.54,1.31-.21.51-.8.75-1.31.54-.24-.1-.47-.21-.69-.33v1.48c0,.06.02.2.26.43.24.23.63.49,1.2.72.51.21.75.8.54,1.31-.21.51-.8.75-1.31.54-.71-.29-1.35-.67-1.83-1.14-.48-.47-.86-1.1-.86-1.86V5.78c0-.71.33-1.3.76-1.76.43-.45,1.01-.82,1.65-1.1,1.28-.57,2.97-.9,4.79-.9Zm.55,7.53c-.19.2-.21.33-.21.39s.02.19.21.39c.2.21.53.44,1.02.66.97.43,2.39.72,4,.72s3.03-.29,4-.72c.49-.22.82-.45,1.02-.66.19-.2.21-.33.21-.39s-.02-.19-.21-.39c-.2-.21-.53-.44-1.02-.66-.97-.43-2.39-.72-4-.72s-3.03.29-4,.72c-.49.22-.82.45-1.02.66Zm12.25.39c0-.71-.33-1.31-.77-1.77-.43-.46-1.01-.82-1.65-1.1-1.28-.57-2.98-.9-4.81-.9s-3.53.33-4.81.9c-.64.28-1.22.65-1.65,1.1-.44.46-.77,1.06-.77,1.77v8.3c0,.7.32,1.3.76,1.76.43.46,1.01.82,1.65,1.11,1.28.57,2.98.9,4.82.9s3.54-.33,4.82-.9c.64-.28,1.22-.65,1.65-1.11.44-.46.76-1.06.76-1.76v-4.14h0v-4.16Zm-2,2.67c-.14.07-.28.14-.42.2-1.28.57-2.98.9-4.81.9s-3.53-.33-4.81-.9c-.14-.06-.28-.13-.42-.2v1.47s0,0,0,0c0,.06.02.19.21.39.2.21.53.44,1.01.65.97.43,2.38.73,4.01.73s3.04-.29,4.01-.73c.49-.22.82-.45,1.01-.65.19-.2.21-.32.21-.38v-1.49Zm0,4.15c-.13.07-.27.14-.41.2-1.28.57-2.98.9-4.82.9s-3.54-.33-4.82-.9c-.14-.06-.28-.13-.41-.2v1.48c0,.06.02.19.21.39.2.21.53.44,1.01.65.97.43,2.38.73,4.01.73s3.04-.29,4.01-.73c.49-.22.82-.45,1.01-.65.19-.2.21-.33.21-.39v-1.48Z"></path></svg><h2 class="text-subhead">Mes crédits</h2></div></button></a>

          <!--Aide-->
          <a target="_blank" title="Aide (nouvel onglet)" href="https://assistance.leboncoin.info/hc/fr/signin?return_to=https%3A%2F%2Fassistance.leboncoin.info%2Fhc%2Ffr&amp;locale=fr"><div class="flex h-sz-80 w-full items-center justify-between rounded-lg p-xl shadow"><div class="flex items-center"><div class="mr-lg h-3xl"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: 40px; height: 40px; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative;"><img alt="" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhelp.b925b2b3.png&amp;w=48&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhelp.b925b2b3.png&amp;w=96&amp;q=75 2x" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhelp.b925b2b3.png&amp;w=96&amp;q=75" decoding="async" data-nimg="fixed" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"></span></div><h2 class="text-subhead">Aide</h2></div><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ShareExpand" fill="currentColor" stroke="none" class="fill-current text-neutral w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m21,12.39c-.55,0-1,.45-1,1v6.23c0,.1-.04.2-.12.27s-.17.12-.28.12H4.38c-.1,0-.2-.04-.28-.12-.07-.07-.12-.17-.12-.27V4.39c0-.1.04-.2.12-.28s.17-.12.28-.12h6.23c.55,0,1-.45,1-1s-.45-1-1-1h-6.23c-.63,0-1.24.25-1.68.7-.45.45-.7,1.05-.7,1.68v15.23c0,.63.25,1.24.7,1.68.45.45,1.05.7,1.68.7h15.23c.63,0,1.24-.25,1.68-.7.45-.45.7-1.05.7-1.68v-6.23c0-.55-.45-1-1-1h0Z"></path><path fill-rule="evenodd" d="m21.92,2.62c-.1-.24-.3-.44-.54-.54-.12-.05-.25-.07-.38-.07h-4.85c-.55,0-1,.45-1,1s.45,1,1,1h2.43l-7.29,7.29c-.39.39-.39,1.02,0,1.42.39.39,1.02.39,1.42,0l7.29-7.29v2.43c0,.55.45,1,1,1s1-.45,1-1V3.01c0-.13-.02-.26-.08-.38Z"></path></svg></div></a>

      </div>
      <button @click="logout" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-neutral/dim-5 enabled:active:bg-neutral/dim-5 focus-visible:bg-neutral/dim-5 text-neutral ml-lg mt-xl md:ml-none" aria-busy="false" aria-live="off">Me déconnecter</button>
      </div>
      <div v-else>
        <p>Veuillez vous connecter pour accéder à cette page.</p>
      </div>




</div>
</main>


</template>
  
<!-- <script setup> -->

<!-- </script> -->