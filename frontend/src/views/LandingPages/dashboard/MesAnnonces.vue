
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
            
                <!--Liste-->
                <div class="my-xl flex flex-col items-center rounded-lg border-sm border-on-background/dim-4 p-xl"><p class="mb-lg text-subhead">Vous n’avez aucune annonce en ligne</p><a data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused" aria-busy="false" aria-live="off" title="Déposer une annonce" href="/deposer-une-annonce"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Plus" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12,2c.55,0,1,.45,1,1v7.94h8c.55,0,1,.45,1,1s-.45,1-1,1h-8v8.06c0,.55-.45,1-1,1s-1-.45-1-1v-8.06H3c-.55,0-1-.45-1-1s.45-1,1-1h8V3c0-.55.45-1,1-1Z"></path></svg>Déposer une annonce</a></div>
            </section>
        </div>

    </div>
</main>
</template>