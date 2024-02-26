
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
const get_users = ref('');

onMounted(async () => {
    try {
      // Use the outer id variable, not the one defined in onMounted
      const currentId = userData.value.user_id;
      if (!currentId) {
        console.error('Error: User ID is undefined');
        return;
      }
      const get_user = await axios.get(`/api/get_all_users/${currentId}`);
      console.log('Get user:', get_user.data);
      get_users.value = get_user.data;
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
  console.log('userData watch:', newUserData);
});

  </script>

<template>
<main id="mainContent">
    <div>
        <!--Breadcrumb-->
        <div class="z-10 h-sz-64 bg-background text-on-surface/dim-1 "><div class="mx-auto flex max-w-page-max items-center pt-xl"><a class="ml-lg underline" href="/compte/part/accueil">Mon compte</a><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current u-current-font-size mx-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg><span class="truncate font-bold">Paramètres</span></div></div>
    
        <!--Data-->
        <div class="m-auto w-full max-w-screen-lg">
            <div class="p-lg">
                <h1 class="mb-xl text-headline-1">Paramètres</h1>

            <!-- Informations comptes -->
            <div class="mb-2xl border-b-sm border-neutral/dim-4 pb-2xl"><h2 class="mb-xl text-headline-2 text-on-surface">Informations de compte</h2><form><div role="radiogroup" aria-orientation="horizontal" dir="ltr" data-spark-component="radio-group" class="flex flex-row gap-xl" tabindex="0" data-orientation="horizontal" style="outline: none;"><div class="flex items-start gap-md text-body-1"><button type="button" role="radio" aria-checked="false" data-state="unchecked" value="Mr" class="flex shrink-0 items-center justify-center rounded-full border-md outline-none hover:ring-4 focus-visible:u-ring disabled:cursor-not-allowed disabled:border-outline/dim-2 disabled:hover:ring-transparent u-shadow-border-transition h-sz-24 w-sz-24 border-outline spark-state-checked:border-basic hover:ring-basic-container" id="radix-:r3:" aria-labelledby="radix-:r4:" tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><span data-state="unchecked" class="relative block h-3/5 w-3/5 after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:h-none after:w-none after:block after:rounded-[50%] after:content-[''] after:transition-all after:spark-state-checked:h-full after:spark-state-checked:w-full after:bg-basic"></span></button><input type="radio" aria-hidden="true" tabindex="-1" value="Mr" style="transform: translateX(-100%); position: absolute; pointer-events: none; opacity: 0; margin: 0px; width: 24px; height: 24px;"><label class="grow cursor-pointer" for="radix-:r3:" id="radix-:r4:">Monsieur</label></div><div class="flex items-start gap-md text-body-1"><button type="button" role="radio" aria-checked="false" data-state="unchecked" value="Mrs" class="flex shrink-0 items-center justify-center rounded-full border-md outline-none hover:ring-4 focus-visible:u-ring disabled:cursor-not-allowed disabled:border-outline/dim-2 disabled:hover:ring-transparent u-shadow-border-transition h-sz-24 w-sz-24 border-outline spark-state-checked:border-basic hover:ring-basic-container" id="radix-:r6:" aria-labelledby="radix-:r7:" tabindex="-1" data-orientation="horizontal" data-radix-collection-item=""><span data-state="unchecked" class="relative block h-3/5 w-3/5 after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:h-none after:w-none after:block after:rounded-[50%] after:content-[''] after:transition-all after:spark-state-checked:h-full after:spark-state-checked:w-full after:bg-basic"></span></button><input type="radio" aria-hidden="true" tabindex="-1" value="Mrs" style="transform: translateX(-100%); position: absolute; pointer-events: none; opacity: 0; margin: 0px; width: 24px; height: 24px;"><label class="grow cursor-pointer" for="radix-:r6:" id="radix-:r7:">Madame</label></div></div><div class="mt-xl grid gap-xl md:grid-cols-2"><div data-spark-component="form-field" class="w-full flex flex-col gap-sm"><label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:ra:" for="radix-:r9:">Nom</label><input id="radix-:r9:" name="last_name" class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg" aria-invalid="false" autocomplete="family-name" :value="get_users.name"></div><div data-spark-component="form-field" class="w-full flex flex-col gap-sm"><label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:rc:" for="radix-:rb:">Prénom</label><input id="radix-:rb:" name="first_name" class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg" aria-invalid="false" autocomplete="given-name" :value="get_users.lastname"></div><div data-spark-component="form-field" class="flex flex-col gap-sm"><label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:re:" for="radix-:rd:">Date de naissance</label><input id="radix-:rd:" name="date_of_birth" class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg" aria-invalid="false" placeholder="jj/mm/aaaa" value=""></div></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg cursor-not-allowed opacity-dim-3 bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused mt-2xl min-w-full md:min-w-fit" disabled="" aria-busy="false" aria-live="off" type="submit">Enregistrer les modifications</button></form></div></div>
        
            <!-- Adresse -->
            <div class="mb-2xl border-b-sm border-neutral/dim-4 pb-2xl"><h2 class="mb-xl text-headline-2 text-on-surface">Adresse</h2><form><div class="gap-lg sm:flex [&amp;>div]:flex-1"><div data-spark-component="form-field" class="mt-lg flex flex-col gap-sm"><label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:rg:" for="radix-:rf:">Adresse<span data-spark-component="label-required-indicator" role="presentation" aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label><input id="radix-:rf:" name="billing_address" class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg" required="" aria-invalid="false" autocomplete="address-line1" :value="get_users.address"></div><div class="relative" data-test-id="locationInputWrapper"><div class="_3Hrjq"><label class="_3Rgki _3q0nF _1pHkp" for="location">Ville ou code postal<span class="_2GpA3">champs requis</span></label><div class="ZlsP9 _1mwQl aj3_W FB92D"><span class="_1p6Mu"><svg viewBox="0 0 18 24" minWidth="1.6rem" display="inline" verticalAlign="baseline" role="img" class="src__Box-sc-10d053g-0 src___StyledBox-sc-fochin-0 eaMrXq dplsdV"><use xlink:href="#SvgMarkeroutline"></use></svg></span><input id="location" name="location" placeholder="Saisissez une ville, un code postal ou une adresse" required="" class="" type="text" value="" style="padding-left: 48px;"></div></div></div></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg cursor-not-allowed opacity-dim-3 bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused mt-2xl min-w-full md:min-w-fit" disabled="" aria-busy="false" aria-live="off" type="submit">Enregistrer les modifications</button></form></div>
        
            <!--Email-->
            <div class="mb-2xl border-b-sm border-neutral/dim-4 pb-2xl"><h2 class="mb-xl text-headline-2 text-on-surface">E-mail</h2><div class="styles_box__7VRgs mb-lg rounded-lg border-sm border-outline p-lg"><div class="flex"><div class="mb-lg mr-md flex items-center break-all md:mb-none"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="VerifiedOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-md" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12.48,4.1c-.31-.11-.65-.11-.96,0l-5.73,2.02c-.59.21-.97.76-.96,1.36.06,2.96.4,5.41,1.95,7.93,1.28,2.07,3.08,3.66,5.15,4.56.04.02.08.02.12,0,2.08-.9,3.88-2.49,5.16-4.57,1.55-2.53,1.89-4.97,1.95-7.93.01-.6-.37-1.15-.96-1.36l-5.73-2.02Zm-1.62-1.9c.74-.26,1.54-.26,2.28,0l5.73,2.02c1.38.49,2.33,1.8,2.3,3.31-.07,3.1-.42,5.97-2.25,8.95-1.48,2.41-3.59,4.28-6.07,5.36h0c-.54.23-1.15.23-1.69,0h0c-2.48-1.08-4.58-2.95-6.06-5.35-1.83-2.98-2.18-5.85-2.25-8.95-.03-1.5.92-2.82,2.3-3.31l5.73-2.02Zm5.46,6.07c.43.35.49.99.14,1.42l-4.18,5.12c-.15.18-.34.33-.56.43-.22.1-.45.15-.69.15h0c-.24,0-.48-.06-.69-.17-.21-.11-.4-.26-.55-.45l-1.63-2.11c-.34-.44-.26-1.07.18-1.41.44-.34,1.06-.26,1.4.18l1.32,1.71,3.86-4.72c.35-.43.98-.49,1.41-.14Zm-4.96,5.26h0s0,0,0,0Z"></path></svg><span class="text-body-1">{{ get_users.email }}</span></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support ml-auto" aria-busy="false" aria-live="off"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="PenOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m17.16,3.95c-.06,0-.11.01-.16.03-.05.02-.1.05-.14.09h0S5.6,15.29,5.6,15.29l-1.21,4.33,4.33-1.21,11.21-11.26s.07-.08.09-.13c.02-.05.03-.1.03-.16s-.01-.11-.03-.16c-.02-.05-.05-.1-.09-.13h0s-2.46-2.48-2.46-2.48c-.04-.04-.08-.07-.14-.09-.05-.02-.11-.03-.16-.03Zm-.92-1.77c.29-.12.6-.19.92-.19s.63.06.92.19c.29.12.55.3.77.52l2.45,2.46h0c.22.22.4.48.51.77.12.29.18.6.18.91s-.06.62-.18.91c-.12.29-.29.55-.51.77h0s-11.38,11.44-11.38,11.44c-.12.12-.27.21-.43.25l-6.25,1.75c-.34.09-.7,0-.95-.25-.25-.25-.34-.61-.25-.95l1.75-6.25c.05-.16.13-.31.25-.43L15.48,2.71c.22-.22.48-.4.77-.52Z"></path></svg><span class="hidden md:block">Modifier</span></button></div></div></div>
        </div>

    </div>
</main>
</template>