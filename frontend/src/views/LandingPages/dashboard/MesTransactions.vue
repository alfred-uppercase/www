
<script setup>
import { computed, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';
import achatsVentes from '@/assets/img/examples/achats-ventes.avif';
import annonces from '@/assets/img/examples/annonces.avif';
import help from '@/assets/img/examples/help.avif';
import parametres from '@/assets/img/examples/parametres.avif';
import privateProfile from '@/assets/img/examples/private-profile.avif';
import securite from '@/assets/img/examples/securite.avif';
import vacances from '@/assets/img/examples/vacances.avif';


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
        <div class="z-10 h-sz-64 bg-background text-on-surface/dim-1 "><div class="mx-auto flex max-w-page-max items-center pt-xl"><a class="ml-lg underline" href="/compte/part/accueil">Mon compte</a><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size mx-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="truncate font-bold">Mes transactions</span></div></div>
    
        <!--Data-->
        <div class="m-auto w-full max-w-screen-lg">
            <div class="p-lg">
                <h1 class="mb-xl text-headline-1">Mes transactions</h1>

                <!--Tab-->
                <div dir="ltr" data-orientation="horizontal" class="flex spark-orientation-horizontal:flex-col spark-orientation-vertical:flex-row max-w-full w-full md:w-1/2" data-spark-component="tabs"><div class="relative flex w-min"><div role="tablist" aria-orientation="horizontal" class="flex w-full spark-orientation-horizontal:flex-row spark-orientation-vertical:flex-col overflow-y-hidden u-no-scrollbar spark-orientation-vertical:overflow-x-hidden after:flex after:shrink after:grow after:border-outline spark-orientation-horizontal:after:border-b-sm spark-orientation-vertical:after:border-r-sm" tabindex="0" data-orientation="horizontal" style="outline: none;"><button type="button" role="tab" aria-selected="true" aria-controls="radix-:r11:-content-BUY" data-state="active" id="radix-:r11:-trigger-BUY" class="px-md relative flex flex-none items-center border-outline outline-none hover:bg-surface-hovered after:absolute spark-orientation-horizontal:border-b-sm spark-orientation-horizontal:after:inset-x-none spark-orientation-horizontal:after:bottom-[-1px] spark-orientation-horizontal:after:h-sz-2 spark-orientation-vertical:border-r-sm spark-orientation-vertical:after:inset-y-none spark-orientation-vertical:after:right-[-1px] spark-orientation-vertical:after:w-sz-2 focus-visible:border-none focus-visible:bg-surface-hovered focus-visible:u-ring-inset spark-disabled:cursor-not-allowed spark-disabled:opacity-dim-3 duration-300 ease-linear gap-md [&amp;>*:first-child]:ml-md [&amp;>*:last-child]:mr-md [&amp;>svg:last-child:first-child]:mx-auto spark-state-active:text-basic spark-state-active:after:bg-basic h-sz-40 min-w-sz-40 text-body-1 mb-3xl px-lg" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Achats</button><button type="button" role="tab" aria-selected="false" aria-controls="radix-:r11:-content-SELL" data-state="inactive" id="radix-:r11:-trigger-SELL" class="px-md relative flex flex-none items-center border-outline outline-none hover:bg-surface-hovered after:absolute spark-orientation-horizontal:border-b-sm spark-orientation-horizontal:after:inset-x-none spark-orientation-horizontal:after:bottom-[-1px] spark-orientation-horizontal:after:h-sz-2 spark-orientation-vertical:border-r-sm spark-orientation-vertical:after:inset-y-none spark-orientation-vertical:after:right-[-1px] spark-orientation-vertical:after:w-sz-2 focus-visible:border-none focus-visible:bg-surface-hovered focus-visible:u-ring-inset spark-disabled:cursor-not-allowed spark-disabled:opacity-dim-3 duration-300 ease-linear gap-md [&amp;>*:first-child]:ml-md [&amp;>*:last-child]:mr-md [&amp;>svg:last-child:first-child]:mx-auto spark-state-active:text-basic spark-state-active:after:bg-basic h-sz-40 min-w-sz-40 text-body-1 mb-3xl px-lg" tabindex="-1" data-orientation="horizontal" data-radix-collection-item="">Ventes</button></div></div><div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r11:-trigger-BUY" id="radix-:r11:-content-BUY" tabindex="0" class="w-full p-lg focus-visible:outline-none focus-visible:u-ring-inset p-none" style=""><div><div class="align-center flex flex-col justify-center text-center"><div class="my-xl"><span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%27276%27%20height=%27200%27/%3e" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img alt="Pas de transactions" src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FnoTransaction.7b299203.png&amp;w=640&amp;q=75" decoding="async" data-nimg="intrinsic" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;" srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FnoTransaction.7b299203.png&amp;w=384&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2FnoTransaction.7b299203.png&amp;w=640&amp;q=75 2x"></span></div><span class="mb-xl text-headline-1">Vous n’avez pas encore de transactions en cours !</span><span class="text-body-1 opacity-dim-1">Si vous souhaitez plus d’informations sur le paiement, consultez</span><a class="text-body-1 font-bold underline opacity-dim-1" href="/service/paiement-securise">notre page d’explication.</a>.<div class="mb-2xl"><a data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" aria-busy="false" aria-live="off" href="/deposer-une-annonce">Déposer une annonce</a></div></div></div></div><div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r11:-trigger-SELL" hidden="" id="radix-:r11:-content-SELL" tabindex="0" class="w-full p-lg focus-visible:outline-none focus-visible:u-ring-inset p-none"></div></div>
            </div>
        </div>

    </div>
</main>
</template>