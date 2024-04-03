<script setup>
  import { ref, onMounted, onUnmounted } from "vue";
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  import { storeToRefs } from 'pinia'
  const router = useRouter()
  
  const img_depose = ref('/assets/frontend/images/logo/open_account.avif')
  function login() {
    router.push({ name: 'signin-basic' })
  }
  
  function sigin() {
    router.push({ name: 'signin-up' })
  }
//   const naturedubien = ref([
//     { name: 'Maison individuelle', value: 'Maison individuelle' },
//     { name: 'Maison de ville', value: 'Maison de ville' },
//     { name: 'Maison collective', value: 'Maison collective' },
//     { name: 'Maison de plein-pied', value: 'Maison de plein-pied' },
//     { name: 'Ferme', value: 'Ferme' },
//     { name: 'Maison mitoyenne', value: 'Maison mitoyenne' },
//     { name: 'Villa', value: 'Villa' },
//     { name: 'Autres', value: 'Autres' },
// ]);
const naturedubien2 = ref([
    { name: 'Appartement mansardé', value: 'Appartement mansardé' },
    { name: 'RDC surélevé', value: 'RDC surélevé' },
    { name: 'Loft', value: 'Loft' },
    { name: 'Duplex', value: 'Duplex' },
    { name: 'Penthous', value: 'Penthous' },
    { name: 'Souplex', value: 'Souplex' },
    { name: 'Autres', value: 'Autres' },
]);
const etatdata = ref([
    { name: 'Neuf avec étiquette', value: 'Neuf avec étiquette' },
    { name: 'Neuf sans étiquette', value: 'Neuf sans étiquette' },
    { name: 'Très bon état', value: 'Très bon état' },
    { name: 'Bon état', value: 'Bon état' },
    { name: 'État satisfaisant', value: 'État satisfaisant' },
]);
const universdata = ref([
    { name: 'Femme', value: 'Femme' },
    { name: 'Homme', value: 'Homme' },
    { name: 'Maternité', value: 'Maternité' },
    { name: 'Enfant', value: 'Enfant' },
]);
const tailledata = ref([
    { name: 'Taille unique', value: 'Taille unique' },
    { name: '30 - XXXS', value: '30 - XXXS' },
    { name: '32 - XXS', value: '32 - XXS' },
    { name: '34 - XS', value: '34 - XS' },
    { name: '36 - S', value: '36 - S' },
    { name: '38 - M', value: '38 - M' },
    { name: '40 - L', value: '40 - L' },
    { name: '42 - XL', value: '42 - XL' },
    { name: '44 - XXL', value: '44 - XXL' },
    { name: '46 - XXXL', value: '46 - XXXL' },
    { name: '48 - 4XL', value: '48 - 4XL' },
    { name: '50 - 5XL', value: '50 - 5XL' },
    { name: '52 - 6XL', value: '52 - 6XL' },
    { name: '54 - 7XL', value: '54 - 7XL' },
    { name: '56 - 8XL et Plus', value: '56 - 8XL et Plus' },
]);
const naturedubien3 = ref([
    { name: 'Terrain constructible', value: 'Terrain constructible' },
    { name: 'Jardin', value: 'Jardin' },
    { name: 'Champs agricole', value: 'Champs agricole' },
    { name: 'Autres', value: 'Autres' },
]);
const typedevetementdata = ref([
    { name: 'Robes / jupes', value: 'Robes / jupes' },
    { name: 'Manteaux & Vestes', value: 'Manteaux & Vestes' },
    { name: 'Manteaux & Vestes', value: 'Manteaux & Vestes' },
    { name: 'Hauts / T-Shirts / Polos', value: 'Hauts / T-Shirts / Polos' },
    { name: 'Pantalons', value: 'Pantalons' },
    { name: 'Pulls / Gilets / Mailles', value: 'Pulls / Gilets / Mailles' },
    { name: 'Jeans', value: 'Jeans' },
    { name: 'Chemises / Chemisiers', value: 'Chemises / Chemisiers' },
    { name: 'Costumes / Tailleurs', value: 'Costumes / Tailleurs' },
    { name: 'Shorts / Pantacourts / Bermudas', value: 'Shorts / Pantacourts / Bermudas' },
    { name: 'Sports / Danse', value: 'Sports / Danse' },
    { name: 'Maillots de bain & vêtements de plage', value: 'Maillots de bain & vêtements de plage' },
    { name: 'Lingerie', value: 'Lingerie' },
    { name: 'Sous-vêtements & vêtements de nuit', value: 'Sous-vêtements & vêtements de nuit' },
    { name: 'Déguisement', value: 'Déguisement' },
    { name: 'Autres', value: 'Autres' },
]);
const naturedubien4 = ref([
    { name: 'Une place de parking', value: 'Une place de parking' },
    { name: 'Garage', value: 'Garage' },
    { name: 'Autres', value: 'Autres' },
]);
const electricitedata = ref([
    { name: 'Gaz', value: 'Gaz' },
    { name: 'Eau', value: 'Eau' },
]);
const papierdata = ref([
    { name: 'Promotion immobilière', value: 'Promotion immobilière' },
    { name: 'Acte notarié', value: 'Acte notarié' },
    { name: 'Livret foncier', value: 'Livret foncier' },
    { name: 'Permis de construire', value: 'Permis de construire' },
]);
const carateristiques = ref([
    { name: 'Chauffage au sol', value: 'Chauffage au sol' },
    { name: 'Accès PMR', value: 'Accès PMR' },
    { name: 'Construction ancienne', value: 'Construction ancienne' },
    { name: 'Construction récente', value: 'Construction récente' },
    { name: 'Sous-sol', value: 'Sous-sol' },
    { name: 'Grenier', value: 'Grenier' },
    { name: 'Deuxième toilètte', value: 'Deuxième toilètte' },
    { name: 'Vendu loué', value: 'Vendu loué' },
    { name: 'Bâtiment classé', value: 'Bâtiment classé' },
    { name: 'Avec dépendances', value: 'Avec dépendances' },
    { name: 'Cuisine équipée', value: 'Cuisine équipée' },
    { name: 'Baignoire', value: 'Baignoire' },
]);
const salledebaindata = ref([
    { name: '1', value: '1' },
    { name: '2', value: '2' },
    { name: '3', value: '3' },
    { name: '4', value: '4' },
    { name: '5', value: '5' },
    { name: '6', value: '6' },
    { name: '7', value: '7' },
    { name: '8', value: '8' },
    { name: '9', value: '9' },
    { name: '10 ou plus', value: '10 ou plus' },
]);
const parkingdata = ref([
    { name: '1', value: '1' },
    { name: '2', value: '2' },
    { name: '3', value: '3' },
    { name: '4', value: '4' },
    { name: '5', value: '5' },
    { name: '6 ou plus', value: '6 ou plus' },
]);
const nombredetagedata = ref([
    { name: '1', value: '1' },
    { name: '2', value: '2' },
    { name: '3', value: '3' },
    { name: '4', value: '4' },
    { name: '5', value: '5' },
    { name: '6', value: '6' },
    { name: '7', value: '7' },
    { name: '8', value: '8' },
    { name: '9', value: '9' },
    { name: '10 ou plus', value: '10 ou plus' },
]);
const nombredeniveauxdata = ref([
    { name: '1', value: '1' },
    { name: '2', value: '2' },
    { name: '3', value: '3' },
    { name: '4', value: '4' },
    { name: '5', value: '5' },
    { name: '6', value: '6' },
    { name: '7', value: '7' },
    { name: '8', value: '8' },
    { name: '9', value: '9' },
    { name: '10 ou plus', value: '10 ou plus' },
]);
const exterieurdata = ref([
    { name: 'Balcon', value: 'Balcon' },
    { name: 'Terasse', value: 'Terasse' },
    { name: 'Jardin', value: 'Jardin' },
]);

const generateYearsList = () => {
    const currentYear = new Date().getFullYear();
    const startYear = 1900;
    const years = [];

    for (let year = currentYear; year >= startYear; year--) {
        years.push({ name: String(year), value: String(year) });
    }

    annee.value = years;
};
  </script>


<template>

<div class="my-8 surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
        <div class="flex flex-column align-items-center justify-content-center">
            <img :src="logoUrl" alt="Sakai logo" class="mb-5 w-6rem flex-shrink-0" />
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">

                <!--start-->
            <form method="post" action="/api/add_listings" @submit.prevent="postAnnonce()">

                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isInfo">
                    <div class="mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Commençons par l’essentiel !</div>
                        <span class="text-600 font-medium">Quel est le titre de l’annonce ?</span>
                    </div>

                    <div>
                        <div class="flex">
                            <div class="flex flex-column gap-3 my-4">
                                <FloatLabel>
                                    <InputText id="username" v-model="titreAnnonce" />
                                    <label for="username">Titre</label>
                                </FloatLabel>
                            </div>
                        </div>
                        <Button v-if="!isTitreAnnonce" @click="valideTitreAnnonce" class="my-2" label="Suivant" />
                        <div v-if="isTitreAnnonce" class="datacolumn flex justify-content-betwen">
                            <label for="building_year">Catégorie</label>
                            <select v-model="categorie" @change="getSubCategorie($event)"
                                class="customselector my-2">
                                <option value="0" selected>Choisissez</option>
                                <option v-for="(category, index) in categories" :key="category.id" :value="category.id"
                                class="mb-4 mt-1"> {{
                                    category.name }}</option>
                            </select>
            
                            <select v-model="subcategorie" v-if="isSubCategorie" @change="valideSubCategorie($event)"
                                class="customselector">
                                <option value="0" selected="selected">Choisissez sous categorie</option>
                                <option v-for="(sub, index) in subCategories" :key="sub.id" :value="sub.id"> {{
                                sub.name }}</option>
                            </select>



                            <!-- <Dropdown v-model="categorie" @change="getSubCategorie" :options="categories" optionLabel="name" placeholder="Selectionner une categorie" class="w-full " />
                            <Dropdown v-model="subcategorie" @change="valideSubCategorie" :options="subCategories" optionLabel="name" placeholder="Sous catégorie" class="w-full " /> -->
                        </div>
                        <div v-if="isTypeAnnonce">
                            <div class="flex flex-column gap-3 my-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio10"
                                        value="Promesse_vente">
                                    <label class="form-check-label" for="inlineRadio10">Vous vendez un bien</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio20"
                                        value="credit_bancaire">
                                    <label class="form-check-label" for="inlineRadio20">Vous recherchez un bien.</label>
                                </div>
                                <!-- <div class="flex align-items-center">
                                    <RadioButton inputId="ingredient1" name="pizza" value="Cheese" />
                                    <label for="ingredient1" class="ml-2">Vous vendez un bien</label>
                                </div>
                                <div class="flex align-items-center">
                                    <RadioButton inputId="ingredient2" name="pizza" value="Mushroom" />
                                    <label for="ingredient2" class="ml-2">Vous recherchez un bien.</label>
                                </div> -->
                            </div>    
                            <Button class="my-4" label="Continuer" @click="valideTypeAnnance" />    
                        </div>
                    </div>
                </div>
                <!--end start-->

                <!--Data for post : Immobilier-->
                <div v-if="typeCategorie == 'Immobilier'">
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isPlusInfo">

                    <div class="mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Dites-nous en plus</div>
                        <span class="text-600 font-medium">Choisissez votre type de bien</span>
                    </div>
                    <div class="flex flex-wrap databtn">
                              <button type="button" 
                                class="flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                                :class="{ 'p-button': SubcategerieCheck === 1 }"
                                tabindex="0" name="real_estate_type" @click="checkBienSub(1)">
                                <div
                                  class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200"
                                  :class="{ 'text-main border-main': SubcategerieCheck === 1 }">
                                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                    fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                    data-spark-component="icon" aria-hidden="true" focusable="false">
                                    <path fill-rule="evenodd"
                                      d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                    </path>
                                  </svg>
                                  <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">Maison
                                  </div>
                                </div><svg v-if="SubcategerieCheck == '1'" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg" data-title="ValidFill" fill="currentColor"
                                  stroke="none"
                                  class="fill-current text-main w-sz-24 h-sz-24 absolute bottom-[-1rem] rounded-full bg-surface"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m22,12c0,5.52-4.48,10-10,10S2,17.52,2,12,6.48,2,12,2s10,4.48,10,10Zm-4.16-2.87c.36-.42.3-1.05-.12-1.41-.42-.36-1.05-.3-1.41.12l-5.64,6.66-2.24-2.55c-.36-.41-1-.46-1.41-.09-.41.36-.46,1-.09,1.41l2.46,2.8c.16.19.36.34.59.44.23.1.47.15.72.15.24,0,.48-.06.7-.16.22-.1.42-.26.58-.44l5.86-6.91Z">
                                  </path>
                                </svg>
                              </button>
                              <button type="button" 
                                class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                                :class="{ 'p-button': SubcategerieCheck === 2 }"
                                tabindex="0"  name="real_estate_type" @click="checkBienSub(2)">
                                <div
                                  class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200"
                                  :class="{ 'text-main border-main': SubcategerieCheck === 2 }">
                                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Apartment" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path d="m5.25,11.32h4.96c.69,0,1.25-.56,1.25-1.25s-.56-1.25-1.25-1.25h-4.96c-.69,0-1.25.56-1.25,1.25s.56,1.25,1.25,1.25Zm0-3.85h4.96c.69,0,1.25-.56,1.25-1.25s-.56-1.25-1.25-1.25h-4.96c-.69,0-1.25.56-1.25,1.25s.56,1.25,1.25,1.25Zm6.21,6.46c0-.69-.56-1.25-1.25-1.25h-4.96c-.69,0-1.25.56-1.25,1.25s.56,1.25,1.25,1.25h4.96c.69,0,1.25-.56,1.25-1.25Z"></path><path d="m22.76,9.92h-7.01V1.25c0-.69-.56-1.25-1.25-1.25H1.25C.56,0,0,.56,0,1.25v21.5c0,.69.56,1.25,1.25,1.25h13.24c.69,0,1.25-.56,1.25-1.25v-10.32h5.76v10.32c0,.69.56,1.25,1.25,1.25s1.25-.56,1.25-1.25v-11.57c0-.69-.56-1.25-1.25-1.25h.01Zm-14.89,8.27c-.69,0-1.25.56-1.25,1.25v2.05H2.51V2.51h10.72v19h-4.11v-2.05c0-.69-.56-1.25-1.25-1.25h0Z"></path></svg>
                                  <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">
                                    Appartement
                                  </div>
                                </div><svg v-if="SubcategerieCheck == '2'" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg" data-title="ValidFill" fill="currentColor"
                                  stroke="none"
                                  class="fill-current text-main w-sz-24 h-sz-24 absolute bottom-[-1rem] rounded-full bg-surface"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m22,12c0,5.52-4.48,10-10,10S2,17.52,2,12,6.48,2,12,2s10,4.48,10,10Zm-4.16-2.87c.36-.42.3-1.05-.12-1.41-.42-.36-1.05-.3-1.41.12l-5.64,6.66-2.24-2.55c-.36-.41-1-.46-1.41-.09-.41.36-.46,1-.09,1.41l2.46,2.8c.16.19.36.34.59.44.23.1.47.15.72.15.24,0,.48-.06.7-.16.22-.1.42-.26.58-.44l5.86-6.91Z">
                                  </path>
                                </svg>
                              </button>
                              <button type="button" 
                                class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                                :class="{ 'p-button': SubcategerieCheck === 3 }"
                                tabindex="0" name="real_estate_type" @click="checkBienSub(3)">
                                <div
                                  class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200"
                                  :class="{ 'text-main border-main': SubcategerieCheck === 3 }">
  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Land" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m21.11,20.46c.42,0,.77-.34.77-.75s-.34-.75-.77-.75h-1.76v-.65c0-.42-.34-.75-.77-.75s-.77.34-.77.75v.65h-1.76v-.65c0-.42-.34-.75-.77-.75s-.77.34-.77.75v.65h-1.55s.02-.07.02-.11v-1.88c.54-.09,1.08-.26,1.57-.5.55-.27,1.05-.63,1.48-1.05.43.1.87.15,1.31.15,1.5,0,2.94-.59,4-1.63,1.06-1.04,1.66-2.46,1.66-3.93s-.6-2.89-1.66-3.93c-.88-.86-2.02-1.41-3.24-1.58-.35-1.15-1.03-2.18-1.97-2.97-1.17-.98-2.65-1.52-4.19-1.52s-3.02.54-4.19,1.52c-.94.79-1.62,1.83-1.97,2.99-1.17.18-2.27.72-3.12,1.56-1.06,1.04-1.66,2.46-1.66,3.93s.6,2.89,1.66,3.93c1.06,1.04,2.5,1.63,4,1.63.44,0,.88-.05,1.31-.15.43.43.93.78,1.48,1.05.42.21.87.36,1.33.46v1.92s.02.07.02.11h-1.35v-.65c0-.42-.34-.75-.77-.75s-.77.34-.77.75v.65h-1.76v-.65c0-.42-.34-.75-.77-.75s-.77.34-.77.75v.65h-1.76c-.42,0-.77.34-.77.75s.34.75.77.75h1.76v1.72h-1.76c-.42,0-.77.34-.77.75s.34.75.77.75h1.91c.14.19.36.32.61.32s.47-.13.61-.32h2.07c.14.19.36.32.61.32s.47-.13.61-.32h2.07c.14.19.36.32.61.32s.47-.13.61-.32h2.07c.14.19.36.32.61.32s.47-.13.61-.32h2.07c.14.19.36.32.61.32s.47-.13.61-.32h1.91c.42,0,.77-.34.77-.75s-.34-.75-.77-.75h-1.76v-1.72h1.82Zm-6.59,0v1.72h-1.76v-1.72h1.76Zm-4.07-5.91c-.48-.24-.9-.59-1.23-1.01-.3-.4-.84-.54-1.3-.35-.39.16-.81.24-1.23.23h-.01c-.92,0-1.8-.36-2.46-1-.65-.64-1.02-1.5-1.02-2.41s.37-1.77,1.02-2.41c.65-.64,1.53-1,2.46-1,.54,0,1-.39,1.09-.91.15-.98.66-1.88,1.43-2.52.77-.65,1.75-1,2.76-1s1.99.36,2.76,1c.77.65,1.27,1.54,1.43,2.52.08.53.54.91,1.09.91h.12c.92,0,1.8.36,2.46,1,.65.64,1.02,1.5,1.02,2.41s-.37,1.77-1.02,2.41c-.65.64-1.53,1-2.46,1h-.01c-.42,0-.84-.07-1.23-.23-.46-.19-1-.04-1.3.35-.32.43-.74.77-1.23,1.01-.19.09-.39.15-.59.21v-2.06l1.96-1.92c.43-.42.43-1.1,0-1.52-.43-.42-1.12-.42-1.55,0l-1.51,1.48-1.51-1.48c-.43-.42-1.12-.42-1.55,0-.43.42-.43,1.1,0,1.52l1.96,1.92v1.98c-.11-.04-.23-.07-.34-.12h-.01Zm.77,5.91v1.72h-1.76v-1.72h1.76Zm-5.05,0h1.76v1.72h-1.76v-1.72Zm11.64,1.72h-1.76v-1.72h1.76v1.72Z"></path></svg>
                                  <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">Terrain
                                  </div>
                                </div><svg v-if="SubcategerieCheck == '3'" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg" data-title="ValidFill" fill="currentColor"
                                  stroke="none"
                                  class="fill-current text-main w-sz-24 h-sz-24 absolute bottom-[-1rem] rounded-full bg-surface"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m22,12c0,5.52-4.48,10-10,10S2,17.52,2,12,6.48,2,12,2s10,4.48,10,10Zm-4.16-2.87c.36-.42.3-1.05-.12-1.41-.42-.36-1.05-.3-1.41.12l-5.64,6.66-2.24-2.55c-.36-.41-1-.46-1.41-.09-.41.36-.46,1-.09,1.41l2.46,2.8c.16.19.36.34.59.44.23.1.47.15.72.15.24,0,.48-.06.7-.16.22-.1.42-.26.58-.44l5.86-6.91Z">
                                  </path>
                                </svg>
                              </button>
                              <button type="button" 
                                class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                                :class="{ 'p-button': SubcategerieCheck === 4 }"
                                tabindex="0" name="real_estate_type" @click="checkBienSub(4)">
                                <div
                                  class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200"
                                  :class="{ 'text-main border-main': SubcategerieCheck === 4 }">
                                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Parking" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m11.3.9c.4-.4,1.1-.4,1.5,0l9.7,9c.3.3.5.6.6.9s.2.7.2,1.1v8.8c0,.7-.3,1.4-.8,1.9s-1.2.8-1.9.8H3.4c-.7,0-1.4-.3-1.9-.8-.5-.5-.8-1.2-.8-1.9v-8.8c0-.4.1-.7.2-1.1.1-.3.4-.7.6-.9L11.3.9ZM3.1,11.6l-.1.1v9c0,.1,0,.2.1.3.1.1.2.1.3.1h2.9v-7.3c0-.6.5-1.1,1.1-1.1h9.2c.3,0,.6.1.8.3.2.2.3.5.3.8v7.3h3c.1,0,.2,0,.3-.1s.1-.2.1-.3v-9c0-.1-.1-.1-.1-.1L12,3.3,3.1,11.6Zm12.4,9.5v-6.1h-6.9v6.1h6.9Zm1.2-8.9H7.5c-.6,0-1.1-.5-1.1-1.1s.5-1.1,1.1-1.1h9.2c.6,0,1.1.5,1.1,1.1s-.5,1.1-1.1,1.1Z"></path></svg>
                                  <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">Parking
                                  </div>
                                </div><svg v-if="SubcategerieCheck == '4'" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg" data-title="ValidFill" fill="currentColor"
                                  stroke="none"
                                  class="fill-current text-main w-sz-24 h-sz-24 absolute bottom-[-1rem] rounded-full bg-surface"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m22,12c0,5.52-4.48,10-10,10S2,17.52,2,12,6.48,2,12,2s10,4.48,10,10Zm-4.16-2.87c.36-.42.3-1.05-.12-1.41-.42-.36-1.05-.3-1.41.12l-5.64,6.66-2.24-2.55c-.36-.41-1-.46-1.41-.09-.41.36-.46,1-.09,1.41l2.46,2.8c.16.19.36.34.59.44.23.1.47.15.72.15.24,0,.48-.06.7-.16.22-.1.42-.26.58-.44l5.86-6.91Z">
                                  </path>
                                </svg>
                              </button>
                              <button type="button" 
                                class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                                :class="{ 'p-button': SubcategerieCheck === 5 }"
                                tabindex="0" name="real_estate_type" @click="checkBienSub(5)">
                                <div
                                  class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200"
                                  :class="{ 'text-main border-main': SubcategerieCheck === 5 }
                                  ">
                                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="BoxOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m14.07,18.52h3.47c.54,0,.97-.43.97-.98s-.43-.98-.97-.98h-3.47c-.54,0-.97.43-.97.98s.43.98.97.98Z"></path><path fill-rule="evenodd" d="m21.98,8.5c0-.07-.02-.12-.04-.18-.02-.07-.02-.13-.05-.19v-.03l-2.01-4.01c-.31-.62-.79-1.15-1.38-1.52-.59-.37-1.27-.57-1.97-.57H7.44c-.68.02-1.35.22-1.92.59-.57.37-1.03.88-1.34,1.48l-2.07,4.01s0,.02,0,.03c-.02.06-.03.12-.05.18-.02.07-.03.12-.04.19v11.14c0,.62.25,1.23.69,1.67.44.45,1.04.69,1.67.69h15.27c.62,0,1.22-.25,1.67-.69.44-.44.69-1.04.69-1.67v-11.14h-.02Zm-4.51-4.28c.28.18.52.43.67.73l1.31,2.6h-6.46v-3.61h3.55c.33,0,.67.09.95.27h0Zm-11.55.74v-.02c.15-.29.37-.54.65-.72.27-.18.59-.28.91-.28h3.53v3.6h-6.43l1.34-2.58Zm14.12,14.67c0,.11-.04.22-.12.29-.08.07-.18.12-.29.12H4.36c-.11,0-.22-.04-.29-.12-.07-.08-.12-.18-.12-.29v-10.13h16.09v10.13Z"></path></svg>
                                  <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">Autre
                                  </div>
                                </div><svg v-if="SubcategerieCheck == '5'" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg" data-title="ValidFill" fill="currentColor"
                                  stroke="none"
                                  class="fill-current text-main w-sz-24 h-sz-24 absolute bottom-[-1rem] rounded-full bg-surface"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m22,12c0,5.52-4.48,10-10,10S2,17.52,2,12,6.48,2,12,2s10,4.48,10,10Zm-4.16-2.87c.36-.42.3-1.05-.12-1.41-.42-.36-1.05-.3-1.41.12l-5.64,6.66-2.24-2.55c-.36-.41-1-.46-1.41-.09-.41.36-.46,1-.09,1.41l2.46,2.8c.16.19.36.34.59.44.23.1.47.15.72.15.24,0,.48-.06.7-.16.22-.1.42-.26.58-.44l5.86-6.91Z">
                                  </path>
                                </svg>
                              </button>
  
                            </div>


                      <!--Nature du bien Maison-->
                      <div v-if="SubcategerieCheck === 1" class="max-w-none lg:max-w-[50%] block" data-rhf-name="Nature">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                            <label for="building_year">Nature du bien</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="naturebien" :options="naturedubien" optionLabel="value" placeholder="Nature du bien" class="w-full " />
                            <!-- <select v-model="naturebien" name="naturebien" id="naturebien"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Maison individuelle">Maison individuelle</option>
                              <option value="Maison de ville">Maison de ville</option>
                              <option value="Maison collective">Maison collective</option>
                              <option value="Maison de plein-pied">Maison de plein-pied</option>
                              <option value="Ferme">Ferme</option>
                              <option value="Maison mitoyenne">Maison mitoyenne</option>
                              <option value="Villa">Villa</option>
                              <option value="Autres">Autres</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Nature du bien appartement-->
                      <div v-if="SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="Nature">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Nature du bien</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="naturebien" :options="naturedubien2" optionLabel="value" placeholder="Nature du bien" class="w-full " />

                            <!-- <select v-model="naturebien" name="naturebien" id="naturebien"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Appartement mansardé">Appartement mansardé</option>
                              <option value="RDC surélevé">RDC surélevé</option>
                              <option value="Loft">Loft</option>
                              <option value="Duplex">Duplex</option>
                              <option value="Penthous">Penthous</option>
                              <option value="Souplex">Souplex</option>
                              <option value="Autres">Autres</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Nature du bien Terrain-->
                      <div v-if="SubcategerieCheck === 3" class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                            <label for="naturebien">Nature du bien</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="naturebien" :options="naturedubien3" optionLabel="value" placeholder="Nature du bien" class="w-full " />

                            <!-- <select v-model="naturebien" name="naturebien" id="naturebien"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Terrain constructible">Terrain constructible</option>
                              <option value="Jardin">Jardin</option>
                              <option value="Champs agricole">Champs agricole</option>
                              <option value="Autres">Autres</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Nature du bien Parking-->
                      <div v-if="SubcategerieCheck === 4" class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="naturebien">Nature du bien</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="naturebien" :options="naturedubien4" optionLabel="value" placeholder="Nature du bien" class="w-full " />

                            <!-- <select v-model="naturebien" name="naturebien" id="naturebien"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Garage">Garage</option>
                              <option value="Une place de parking">Une place de parking</option>
                              <option value="Autres">Autres</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Caractéristique-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="carateristique">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="carateristique">Caractéristique</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="carateristique" :options="carateristiques" optionLabel="value" placeholder="Nature du bien" class="w-full " />
                            
                            <!-- <select v-model="carateristique" name="carateristique" id="carateristique"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Chauffage au sol">Chauffage au sol</option>
                              <option value="Accès PMR">Accès PMR</option>
                              <option value="Construction ancienne">Construction ancienne</option>
                              <option value="Construction récente">Construction récente</option>
                              <option value="Sous-sol">Sous-sol</option>
                              <option value="Grenier">Grenier</option>
                              <option value="Deuxième toilètte">Deuxième toilètte</option>
                              <option value="Vendu loué">Vendu loué</option>
                              <option value="Bâtiment classé">Bâtiment classé</option>
                              <option value="Avec dépendances">Avec dépendances</option>
                              <option value="Cuisine équipée">Cuisine équipée</option>
                              <option value="Baignoire">Baignoire</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Année-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Année de construction</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                              <Dropdown v-model="building_year" :options="annee" optionLabel="value" placeholder="Année de construction" class="w-full " />
                              <!-- <InputNumber v-model="building_year" inputId="withoutgrouping" :useGrouping="false" :min="0" :max="4"/> -->
                            <!-- <select name="building_year" id="building_year" v-model="building_year"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                            </select> -->
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Sperficie-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="surface">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rk:" for="surface">Surface habitable </label>

                            <InputGroup>
                                <InputText v-model="surface" placeholder="Surface habitable" />
                                <InputGroupAddon>m²</InputGroupAddon>
                            </InputGroup>
                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input id="surface" name="surface"
                              v-model="surface"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="6" ></div>
                            <div class="rounded-r-lg border-1">
                              <div
                                class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                                m²</div>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Total surface-->
                      <div v-if="SubcategerieCheck === 3 || SubcategerieCheck === 1" class="max-w-none lg:max-w-[50%] block" data-rhf-name="surfacetotal">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rk:" for="surfacetotal">Surface totale du terrain </label>
                                <InputGroup>
                                    <InputText v-model="surfacetotal" placeholder="Surface totale du terrain" />
                                    <InputGroupAddon>m²</InputGroupAddon>
                                </InputGroup>
                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">

                              <input id="surfacetotal" name="surfacetotal"
                              v-model="surfacetotal"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="6" ></div>
                            <div class="rounded-r-lg border-1">
                              <div
                                class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                                m²</div>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Nombre de piece-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="rooms">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="rooms">Nombre de pièces</label>
                            <InputGroup>
                                    <InputText v-model="rooms" placeholder="Nombre de pièces" />
                                    <InputGroupAddon>pièce(s)</InputGroupAddon>
                            </InputGroup>
                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input id="rooms" name="rooms" v-model="rooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                            <div class="rounded-r-lg border-1">
                              <div
                                class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                                pièce(s)</div>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Nombre de Chambre-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="roomschambres">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="roomschambres">Nombre de chambres</label>
                            <InputGroup>
                                    <InputText v-model="roomschambres" placeholder="Nombre de chambres" />
                                    <InputGroupAddon>chambre(s)</InputGroupAddon>
                            </InputGroup>
                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input id="roomschambres" name="roomschambres" v-model="roomschambres"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                            <div class="rounded-r-lg border-1">
                              <div
                                class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                                chambre(s)</div>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>                 
                      <!--Salle de bain-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="salledebain">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="salledebain">Nombre de salle de bain</label>
                            <Dropdown v-model="salledebain" :options="salledebaindata" optionLabel="value" placeholder="Nombre de salle de bain" class="w-full " />

                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="salledebain" name="salledebain"
                              v-model="salledebain"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>                    
                      <!--Niveaux-->
                      <div v-if="SubcategerieCheck === 1" class="max-w-none lg:max-w-[50%] block" data-rhf-name="nombredeniveaux">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="nombredeniveaux">Nombre de niveaux</label>
                            <Dropdown v-model="nombredeniveaux" :options="nombredeniveauxdata" optionLabel="value" placeholder="Nombre de niveaux" class="w-full " />

                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nombredeniveaux" name="nombredeniveaux"
                              v-model="nombredeniveaux"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" ></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Nombre detage-->
                      <div v-if="SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="nombredetage">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="nombredetage">Nombre d’étages dans l’immeuble</label>
                            <Dropdown v-model="nombredetage" :options="nombredetagedata" optionLabel="value" placeholder="Nombre d’étages dans l’immeuble" class="w-full " />

                          <!-- <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nombredetage" name="nombredetage"
                              v-model="nombredetage"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" ></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Étage de votre bien-->
                      <div v-if="SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="etagedevotrebien">
                        <div data-spark-component="form-field" class="datacolumn flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="etagedevotrebien">Étage de votre bien</label>

                            <InputGroup>
                                    <InputText v-model="etagedevotrebien" placeholder="Étage de votre bien" />
                                    <InputGroupAddon>éme</InputGroupAddon>
                            </InputGroup>   

<!-- 
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                                <input id="etagedevotrebien" name="etagedevotrebien"
                              v-model="etagedevotrebien"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" >
  
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div> -->
                        </div>
                      </div>
                      <!--Places de parking-->
                      <div v-if="SubcategerieCheck === 5 || SubcategerieCheck === 4 || SubcategerieCheck === 1 || SubcategerieCheck === 2" class="max-w-none lg:max-w-[50%] block" data-rhf-name="parking">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="parking">Places de parking</label>
                            <Dropdown v-model="parking" :options="parkingdata" optionLabel="value" placeholder="Places de parking" class="w-full " />

                          <!-- <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                            <select v-model="parking" name="parking" id="parking"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6 ou plus">6 ou plus</option>
                            </select>
                          </div> -->
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Exterieur-->
                      <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="exterieur">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="exterieur">Exterieur</label>
                            <Dropdown v-model="exterieur" :options="exterieurdata" optionLabel="value" placeholder="Exterieur" class="w-full " />

                          <!-- <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                            <select v-model="exterieur" name="exterieur" id="exterieur"
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="Balcon">Balcon</option>
                              <option value="Terasse">Terasse</option>
                              <option value="Jardin">Jardin</option>
                            </select>
                          </div>
                          <div class="flex justify-between gap-md"></div> -->
                        </div>
                      </div>
                      <!--Classe énergie-->
                      <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="classeenergie">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="classeenergie">Classe énergie </label>
                            <div><input type="hidden" id="radix-:ras:" name="energy_rate" aria-required="false" value="">
                              <button @click="selectValueEnergie('A')" type="button" id="radix-:ras:a" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#369932] hover:text-background
                            false"
                            :class="{ 'bg-[#369932]': classeenergie === 'A' }"
                            >A</button><button @click="selectValueEnergie('B')" type="button" id="radix-:ras:b" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#3acc31] hover:text-background
                            false"
                            :class="{ 'bg-[#3acc31]': classeenergie === 'B' }"
                            >B</button><button @click="selectValueEnergie('C')" type="button" id="radix-:ras:c" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#cdfd32] hover:text-overlay
                            false"
                            :class="{ 'bg-[#cdfd32]': classeenergie === 'C' }"
                            >C</button><button @click="selectValueEnergie('D')" type="button" id="radix-:ras:d" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#fbea49] hover:text-overlay
                            false"
                            :class="{ 'bg-[#fbea49]': classeenergie === 'D' }"
                            >D</button><button @click="selectValueEnergie('E')" type="button" id="radix-:ras:e" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#fccb2f] hover:text-overlay
                            false"
                            :class="{ 'bg-[#fccb2f]': classeenergie === 'E' }"
                            >E</button><button @click="selectValueEnergie('F')" type="button" id="radix-:ras:f" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#fb9c34] hover:text-background
                            false"
                            :class="{ 'bg-[#fb9c34]': classeenergie === 'F' }"
                            >F</button><button @click="selectValueEnergie('G')" type="button" id="radix-:ras:g" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#fa1c1f] hover:text-background
                            false"
                            :class="{ 'bg-[#fa1c1f]': classeenergie === 'G' }"
                            >G</button><button @click="selectValueEnergie('Vierge')" type="button" id="radix-:ras:v" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-outline hover:text-overlay
                            false"
                            :class="{ 'bg-outline': classeenergie === 'Vierge' }"
                            >Vierge</button></div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--GES-->
                      <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="ges">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="ges">GES </label>
                            <div><input type="hidden" id="selectedValue" name="ges" aria-required="false" value="" aria-describedby="radix-:rb3:">
                            <button @click="selectValueGes('A')" type="button" id="radix-:rb1:a" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#f6edfe] hover:text-overlay 
                            false"
                            :class="{ 'bg-[#f6edfe]': ges === 'A' }"
                            >A</button><button @click="selectValueGes('B')" type="button" id="radix-:rb1:b" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#e3c7fa] hover:text-overlay
                            false"
                            :class="{ 'bg-[#e3c7fa]': ges === 'B' }"
                            >B</button><button @click="selectValueGes('C')" type="button" id="radix-:rb1:c" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#d2adf1] hover:text-overlay
                            false"
                            :class="{ 'bg-[#d2adf1]': ges === 'C' }"
                            >C</button><button @click="selectValueGes('D')" type="button" id="radix-:rb1:d" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#c99aef] hover:text-background
                            false"
                            :class="{ 'bg-[#c99aef]': ges === 'D' }"
                            >D</button><button @click="selectValueGes('E')" type="button" id="radix-:rb1:e" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#b77be9] hover:text-background
                            false"
                            :class="{ 'bg-[#b77be9]': ges === 'E' }"
                            >E</button><button @click="selectValueGes('F')" type="button" id="radix-:rb1:f" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#a659e9] hover:text-background
                            false"
                            :class="{ 'bg-[#a659e9]': ges === 'F' }"
                            >F</button><button @click="selectValueGes('G')" type="button" id="radix-:rb1:g" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-[#8835d9] hover:text-background
                            false"
                            :class="{ 'bg-[#8835d9]': ges === 'G' }"
                            >G</button><button @click="selectValueGes('Vierge')" type="button" id="radix-:rb1:v" class="rounded-full border-sm border-solid border-outline px-lg py-sm mr-md duration-200 mb-sm sm:mb-none 
                            hover:bg-outline hover:text-overlay
                            false"
                            :class="{ 'bg-outline': ges === 'Vierge' }"
                            >Vierge</button></div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Electricité-->
                      <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Electricité </label>

                            <Dropdown v-model="electricite" :options="electricitedata" optionLabel="value" placeholder="Electricité" class="w-full " />

                          <!-- <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                            <select name=" " id=""
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value="">Gaz</option>
                              <option value="">Eau</option>
                            </select>
                          </div>
                          <div class="flex justify-between gap-md"></div> -->
                        </div>
                      </div>
                      <!--Conditions de paiement-->
                      <div class="max-w-none lg:max-w-[100%] block" data-rhf-name="building_year">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Conditions de paiement</label>
                          <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="Promesse_vente">
                              <label class="form-check-label" for="inlineRadio1">Promesse de vente possible</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="credit_bancaire">
                              <label class="form-check-label" for="inlineRadio2">Crédit bancaire possible</label>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md"></div>
                        </div>
                      </div>
                      <!--Papiers-->
                      <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                        <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Papiers </label>
                            <Dropdown v-model="papiers" :options="papierdata" optionLabel="value" placeholder="Papiers" class="w-full " />

                          <!-- <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                              class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                              aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                            <select name=" " id=""
                              class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                              <option value=""> Promotion immobilière,</option>
                              <option value="">Acte notarié</option>
                              <option value="">Livret foncier</option>
                              <option value="">Permis de construire</option>
                            </select>
                          </div>
                          <div class="flex justify-between gap-md"></div> -->
                        </div>
                      </div>


                    <div>
                        <!-- <div class="flex">
                            <div class="flex flex-column gap-3 my-4">
                                <FloatLabel>
                                    <InputText id="username" v-model="titreAnnonce" />
                                    <label for="username">Titre</label>
                                </FloatLabel>
                            </div>
                        </div>
                        <Button v-if="!isTitreAnnonce" @click="valideTitreAnnonce" class="my-2" label="Suivant" />
                        <div v-if="isTitreAnnonce" class="flex justify-content-betwen">
                            <select v-model="categorie" @change="getSubCategorie($event)"
                                class="customselector">
                                <option value="0" selected>Choisissez</option>
                                <option v-for="(category, index) in categories" :key="category.id" :value="category.id"
                                class="mb-4 mt-1"> {{
                                    category.name }}</option>
                            </select>
            
                            <select v-model="subcategorie" v-if="isSubCategorie" @change="valideSubCategorie($event)"
                                class="customselector">
                                <option value="0" selected="selected">Choisissez sous categorie</option>
                                <option v-for="(sub, index) in subCategories" :key="sub.id" :value="sub.id"> {{
                                sub.name }}</option>
                            </select>



                            <Dropdown v-model="categorie" @change="getSubCategorie($event)" :options="categories" optionLabel="name" placeholder="Selectionner une categorie" class="w-full " />
                            <Dropdown v-model="subcategorie" @change="valideSubCategorie($event)" :options="subCategories" optionLabel="name" placeholder="Sous catégorie" class="w-full " />
                        </div> -->
                        <!-- <div v-if="isTypeAnnonce">
                            <div class="flex flex-column gap-3 my-4">
                                <div class="flex align-items-center">
                                    <RadioButton inputId="ingredient1" name="pizza" value="Cheese" />
                                    <label for="ingredient1" class="ml-2">Vous vendez un bien</label>
                                </div>
                                <div class="flex align-items-center">
                                    <RadioButton inputId="ingredient2" name="pizza" value="Mushroom" />
                                    <label for="ingredient2" class="ml-2">Vous recherchez un bien.</label>
                                </div>
                            </div>    
                            <Button class="my-4" label="Continuer" @click="valideTypeAnnance" />    
                        </div> -->
                    </div>
                    <Button label="Continuer" @click="continueVerImgImobl" />
                </div>
                
                <!--Img upload-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isImageImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Photo à la une !</div>
                      <span class="text-600 font-medium">Ajouter une photo à la une</span>
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Thumbnail</label>
                                  <input type="file" id="listing_thumbnail" ref="listing_thumbnail" v-on:change="handleThumbnailUpload()"/>
                                  <div v-if='listing_thumbnail' class="file-listing">{{ listing_thumbnail.name }}</div>
                                  <Button @click.prevent="addFilesThumb()" label="Ajouter une photo à la une"/>

                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Galerie</label>
                                  <input type="file"  id="listing_images" ref="listing_images" multiple v-on:change="handleFilesUpload()"/>
                                  <div v-for="(file, key) in listing_images" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Supprimer</span></div>
                                  <!-- <button @click.prevent="addFiles()" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Ajouter un image</button> -->
                                  <Button @click.prevent="addFiles()" label="Ajouter une photo"/>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourPlusInfoImobl" label="Retour" />
                      <Button @click="UploadImgImobli" label="Continuer" />
                  </div>

                  </div>
                  <!--Img upload-->

                  <!--Description-->
                  <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDescrImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Décrivez votre bien !</div>
                      <!-- <span class="text-600 font-medium">Ajouter une photo à la une</span> -->
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <InputText id="titreAnnonce" v-model="titreAnnonce" />
                                  <label for="titreAnnonce">Titre de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <!-- <InputText id="Description" v-model="description" /> -->
                                  <!-- <Editor v-model="description" editorStyle="height: 320px" /> -->
                                  <Textarea v-model="value" rows="5" cols="30" />
                                  <label for="Description">Description de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourImageImobl" label="Retour" />
                      <Button type="submit" label="Terminer"  :loading="loading" @click="load" />
                  </div>

                  </div>
                  <!--Description-->
                </div>
                <!--Email-->

                <!--End Data for post : Immobilier-->
                <!--Star Informatique-->
                <div v-if="typeCategorie == 'Informatique'">
                  <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isPlusInfo">

                    <div class="mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Dites-nous en plus</div>
                        <!-- <span class="text-600 font-medium">Choisissez votre type de bien</span> -->
                    </div>

                          <!--Réference-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="username">Référence</label>
                                <InputText id="reference" v-model="reference" aria-describedby="username-help" />
                                <small id="reference-help">Référence de votre bien.</small>
                            </div>
                            </div>
                          </div>

                          <!--Marque-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="marque">Marque</label>
                                <InputText id="marque" v-model="marque" aria-describedby="username-help" />
                                <small id="marque-help">Marque de votre bien.</small>
                            </div>
                            </div>
                          </div>

                          <!--Prix-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="prix">Prix</label>
                                <!-- <InputText id="prix" v-model="prix" aria-describedby="username-help" /> -->
                                <InputNumber v-model="prix" inputId="currency-germany" mode="currency" currency="EUR" locale="de-DE" />
                                <!-- <small id="prix-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--ram-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="prix">Ram</label>
                                <!-- <InputText id="prix" v-model="prix" aria-describedby="username-help" /> -->
                                <!-- <InputNumber v-model="ram" inputId="currency-germany" mode="currency" currency="EUR" locale="de-DE" /> -->
                                <!-- <small id="prix-help">Marque de votre bien.</small> -->
                                <InputGroup>
                                  <InputNumber v-model="ram" placeholder="Ram" />
                                  <InputGroupAddon>Go</InputGroupAddon>
                              </InputGroup>
                            </div>
                            </div>
                          </div>

                          <!--Processeur-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="processeur">Processeur</label>
                                <InputText id="processeur" v-model="processeur" aria-describedby="processeur-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Résolution-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="screensize">Résolution</label>
                                <InputText id="screensize" v-model="screensize" aria-describedby="processeur-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Carte graphique-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="gpu">Carte graphique</label>
                                <InputText id="gpu" v-model="gpu" aria-describedby="processeur-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Carte graphique re-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="gpuref">Marque de carte graphique</label>
                                <InputText id="gpuref" v-model="gpuref" aria-describedby="processeur-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Type de disque-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="gpu">Type de disque</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" v-model="disquetype" name="disquetype" id="disquetype1"
                                      value="Promesse_vente">
                                    <label class="form-check-label" for="inlineRadio2">HDD</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" v-model="disquetype" name="disquetype" id="disquetype2"
                                      value="credit_bancaire">
                                    <label class="form-check-label" for="inlineRadio2">SSD</label>
                                  </div>
                            </div>
                            </div>
                          </div>

                          <!--Stockage-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="prix">Stockage</label>
                                <InputGroup>
                                  <InputNumber v-model="disquesize" placeholder="Ram" />
                                  <InputGroupAddon>Go</InputGroupAddon>
                              </InputGroup>
                            </div>
                            </div>
                          </div>

                        <div class="flex" style="justify-content: space-between;">
                            <Button severity="secondary" icon="pi pi-arrow-left" @click="retourImobl" label="Retour" />
                            <Button @click="continueVerImgImobl" label="Continuer" />
                        </div>
                  </div>

                    <!--Img upload-->
                    <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isImageImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Photo à la une !</div>
                      <span class="text-600 font-medium">Ajouter une photo à la une</span>
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Thumbnail</label>
                                  <input type="file" id="listing_thumbnail" ref="listing_thumbnail" v-on:change="handleThumbnailUpload()"/>
                                  <div v-if='listing_thumbnail' class="file-listing">{{ listing_thumbnail.name }}</div>
                                  <Button @click.prevent="addFilesThumb()" label="Ajouter une photo à la une"/>

                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Galerie</label>
                                  <input type="file"  id="listing_images" ref="listing_images" multiple v-on:change="handleFilesUpload()"/>
                                  <div v-for="(file, key) in listing_images" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Supprimer</span></div>
                                  <!-- <button @click.prevent="addFiles()" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Ajouter un image</button> -->
                                  <Button @click.prevent="addFiles()" label="Ajouter une photo"/>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourPlusInfoImobl" label="Retour" />
                      <Button @click="UploadImgImobli" label="Continuer" />
                  </div>

                  </div>
                  <!--Img upload-->

                  <!--Description-->
                  <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDescrImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Décrivez votre bien !</div>
                      <!-- <span class="text-600 font-medium">Ajouter une photo à la une</span> -->
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <InputText id="titreAnnonce" v-model="titreAnnonce" />
                                  <label for="titreAnnonce">Titre de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <!-- <InputText id="Description" v-model="description" /> -->
                                  <!-- <Editor v-model="description" editorStyle="height: 320px" /> -->
                                  <Textarea v-model="value" rows="5" cols="30" />
                                  <label for="Description">Description de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourImageImobl" label="Retour" />
                      <Button type="submit" label="Terminer"  :loading="loading" @click="load" />
                  </div>

                  </div>
                </div>
                <!--End Informatique-->

                
                <!--Star Vetement-->
                <div v-if="typeCategorie == 'Vêtements'">
                  <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isPlusInfo">

                    <div class="mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Dites-nous en plus</div>
                        <!-- <span class="text-600 font-medium">Choisissez votre type de bien</span> -->
                    </div>

                          <!--Réference-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="username">Univers *</label>
                                <Dropdown v-model="univers" :options="universdata" optionLabel="name" placeholder="Univers" class="w-full " />
                                <!-- <small id="reference-help">Référence de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Taille-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="taille">Taille *</label>
                                <Dropdown v-model="taille" :options="tailledata" optionLabel="name" placeholder="Taille" class="w-full " />
                                <!-- <InputText id="marque" v-model="marque" aria-describedby="username-help" />
                                <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Type-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="prix">Type</label>
                                <Dropdown v-model="typedevetement" :options="typedevetementdata" optionLabel="name" placeholder="Type de vètement" class="w-full" />
                            </div>
                            </div>
                          </div>


                          <!--Marque-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="marque">Marque</label>
                                <InputText id="marque" v-model="marque" aria-describedby="marque-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Couleur-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="couleur">Couleur</label>
                                <InputText id="couleur" v-model="couleur" aria-describedby="couleur-help" />
                                <!-- <small id="marque-help">Marque de votre bien.</small> -->
                            </div>
                            </div>
                          </div>

                          <!--Etat-->
                          <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="naturebien">
                            <div data-spark-component="form-field" class="datacolumn relative flex flex-col gap-sm">
                              <div class="flex flex-column gap-2">
                                <label for="etat">Etat</label>
                                <Dropdown v-model="etat" :options="etatdata" optionLabel="name" placeholder="Etat" class="w-full" />
                            </div>
                            </div>
                          </div>


                        <div class="flex" style="justify-content: space-between;">
                            <Button severity="secondary" icon="pi pi-arrow-left" @click="retourImobl" label="Retour" />
                            <Button @click="continueVerImgImobl" label="Continuer" />
                        </div>
                  </div>

                    <!--Img upload-->
                    <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isImageImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Photo à la une !</div>
                      <span class="text-600 font-medium">Ajouter une photo à la une</span>
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Thumbnail</label>
                                  <input type="file" id="listing_thumbnail" ref="listing_thumbnail" v-on:change="handleThumbnailUpload()"/>
                                  <div v-if='listing_thumbnail' class="file-listing">{{ listing_thumbnail.name }}</div>
                                  <Button @click.prevent="addFilesThumb()" label="Ajouter une photo à la une"/>

                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                                  <label for="username">Galerie</label>
                                  <input type="file"  id="listing_images" ref="listing_images" multiple v-on:change="handleFilesUpload()"/>
                                  <div v-for="(file, key) in listing_images" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Supprimer</span></div>
                                  <!-- <button @click.prevent="addFiles()" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Ajouter un image</button> -->
                                  <Button @click.prevent="addFiles()" label="Ajouter une photo"/>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourPlusInfoImobl" label="Retour" />
                      <Button @click="UploadImgImobli" label="Continuer" />
                  </div>

                  </div>
                  <!--Img upload-->

                  <!--Description-->
                  <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDescrImobl">

                  <div class="mb-5">
                      <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                      <div class="text-900 text-3xl font-medium mb-3">Décrivez votre bien !</div>
                      <!-- <span class="text-600 font-medium">Ajouter une photo à la une</span> -->
                  </div>

                  <div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <InputText id="titreAnnonce" v-model="titreAnnonce" />
                                  <label for="titreAnnonce">Titre de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                      <div class="flex">
                          <div class="flex flex-column gap-3 my-4">
                              <FloatLabel>
                                  <!-- <InputText id="Description" v-model="description" /> -->
                                  <!-- <Editor v-model="description" editorStyle="height: 320px" /> -->
                                  <Textarea v-model="value" rows="5" cols="30" />
                                  <label for="Description">Description de l'annonce</label>
                              </FloatLabel>
                          </div>
                      </div>
                  </div>
                  <div class="flex" style="justify-content: space-between;">
                      <Button severity="secondary" icon="pi pi-arrow-left" @click="retourImageImobl" label="Retour" />
                      <Button type="submit" label="Terminer" :loading="loading" @click="load" />
                  </div>

                  </div>
                </div>
                <!--End Informatique-->



            </form>
            </div>
        </div>
    </div>
    <AppConfig simple />

  </template>
  <script>
  import { mapState } from 'pinia'
  import { useAuthStore } from '../../stores/authStore';
  // import { useUserStore } from '../../stores/user'
  import { useCategoryStore } from '../../stores/categorie'
  import { useToast } from "primevue/usetoast";
  const toast = useToast();
//   import DropZone from 'dropzone-vue';
  // import Dropzone from "dropzone";
  // import { useDropzone } from "vue3-dropzone";
  
//   import 'dropzone-vue/dist/dropzone-vue.common.css';
//   import '../../plugins/scroll'
  export default {
    components: {
    //   DropZone,
    },
    data() {
      return {
        isInfo: true,
        isTitreAnnonce: false,
        isSubCategorie: false,
        isTypeAnnonce: false,
        isPlusInfo: false,
        isImageImobl: false,
        isDescrImobl: false,
        SubcategerieCheck: 0,
        CategoryStore: useCategoryStore(),
        userStore: useAuthStore(),
        isSugsestionCat: true,
        typeCategorie: '',
        user_id:null,
        years:[],
        titreAnnonce:'',
        description:'',
        country_id:'',
        city_id:'',
        state_id:'',
        address:'',
        latitude:'',
        latitude:'',
        longitude:'',
        google_analytics_id:'',
        amenities:'',
        categorie:'',
        subcategorie: '',
        papiers: '',
        electricite: '',
        reference:'',
        marque:'',
        modele:'',
        loading: false,
        prix:'',
        couleur:'',
        etat:'',
        os:'',
        reseau:'',
        memoire:'',
        ram:'',
        processeur:'',
        screensize:'',
        sim:'',
        copie:'',
        gpuref:'',
        disquetype:'',
        disquesize:'',
        kilometrage:'',
        typeboite:'',
        carburant:'',
        video_provider:'',
        video_url:'',
        seo_meta_tags:'',
        meta_description:'',
        website:'',
        email:'',
        phone:'',
        anneemodele: '',
        typevehicule: '',
        boitevitesse: '',
        nombreplace: '',
        nombreporte: '',
        puissancefiscal: '',
        puissancedin: '',
        kilometrage: '',
        listing_type:'',
        social:'',
        date_added:'',
        listing_thumbnail:null,
        listing_cover:'',
        listing_images:[],
        photos:'',
        code:'',
        classeenergie:'',
        ges:'',
        naturebien: null,
        naturedubien: [
            { value: 'Maison individuelle' },
            { value: 'Maison de ville' },
            { value: 'Maison collective' },
            { value: 'Maison de plein-pied' },
            { value: 'Ferme' },
            { value: 'Maison mitoyenne' },
            { value: 'Villa' },
            { value: 'Autres' },
        ],
        carateristique: '',
        surface: '',
        surfacetotal: '',
        rooms: '',
        roomschambres: '',
        nombredeniveaux: '',
        salledebain: '',
        building_year: null,
        annee: [
          { value: '2024' },
          { value: '2023' },
          { value: '2022' },
          { value: '2021' },
          { value: '2020' },
          { value: '2019' },
          { value: '2018' },
          { value: '2017' },
          { value: '2016' },
          { value: '2015' },
          { value: '2014' },
          { value: '2013' },
          { value: '2012' },
          { value: '2011' },
          { value: '2010' },
          { value: '2009' },
          { value: '2008' },
          { value: '2007' },
          { value: '2006' },
          { value: '2005' },
          { value: '2004' },
          { value: '2003' },
          { value: '2002' },
          { value: '2001' },
          { value: '2000' },
          { value: '1999' },
          { value: '1998' },
          { value: '1997' },
          { value: '1996' },
          { value: '1995' },
          { value: '1994' },
          { value: '1993' },
          { value: '1992' },
          { value: '1991' },
          { value: '1990' },
          { value: '1989' },
          { value: '1988' },
          { value: '1987' },
          { value: '1986' },
          { value: '1985' },
          { value: '1984' },
          { value: '1983' },
          { value: '1982' },
          { value: '1981' },
          { value: '1980' },
          { value: '1979' },
          { value: '1978' },
          { value: '1977' },
          { value: '1976' },
          { value: '1975' },
          { value: '1974' },
          { value: '1973' },
          { value: '1972' },
          { value: '1971' },
          { value: '1970' },
          { value: '1969' },
          { value: '1968' },
          { value: '1967' },
          { value: '1966' },
          { value: '1965' },
          { value: '1964' },
          { value: '1963' },
          { value: '1962' },
          { value: '1961' },
          { value: '1960' },
          { value: '1959' },
          { value: '1958' },
          { value: '1957' },
          { value: '1956' },
          { value: '1955' },
          { value: '1954' },
          { value: '1953' },
          { value: '1952' },
          { value: '1951' },
          { value: '1950' },
          { value: '1949' },
          { value: '1948' },
          { value: '1947' },
          { value: '1946' },
          { value: '1945' },
          { value: '1944' },
          { value: '1943' },
          { value: '1942' },
          { value: '1941' },
          { value: '1940' },
          { value: '1939' },
          { value: '1938' },
          { value: '1937' },
          { value: '1936' },
          { value: '1935' },
          { value: '1934' },
          { value: '1933' },
          { value: '1932' },
          { value: '1931' },
          { value: '1930' }
      ]
      ,
        parking: '',
        exterieur: '',
        nombredetage: '',
        etagedevotrebien: '',
        univers:'',
        taille:'',
        typedevetement:'',
      };
    },
    
    computed: {
      ...mapState(useAuthStore, ['isLogin','userData']),
      ...mapState(useCategoryStore, ['categories', 'subCategories'])
    },
    mounted() {
      this.CategoryStore.getCategories();
      this.user_id = this.userData ? this.userData.user_id : null;
    },
    created() {
      const currentYear = new Date().getFullYear();
      for (let year = 2024; year >= 1950; year--) {
        this.years.push(year);
      }
    },
    methods: {
      selectValueGes(value) {
        this.ges = value;
        console.log('Valeur de ges mise à jour :', this.ges);
      },
      selectValueEnergie(value) {
        this.classeenergie = value;
        console.log('Valeur de classeenergie mise à jour :', this.classeenergie);
      },
      handleThumbnailUpload() {
          this.listing_thumbnail = this.$refs.listing_thumbnail.files[0];
        },
      addFiles(){
          this.$refs.listing_images.click();
        },
        addFilesThumb(){
          this.$refs.listing_thumbnail.click();
        },
        load() {
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 2000);
        },
  
      // async handleSuccess(file, response) {
      // // La fonction appelée lorsqu'un téléchargement réussit
      // console.log('Upload success:', response);
  
      // this.listing_thumbnail = response.data.url;
  
      // console.log('Enrol Thumbnail:', this.listing_thumbnail);
  
      // await this.postAnnonce();
    // },
      // handleFileUpload( event ){
      //   console.log('File selected:', event.target.files[0]);
      // this.listing_thumbnail = event.target.files[0];
    // },
      postAnnonce() {
        // Check if user_id is available
        if (!this.user_id) {
          // Handle the case when user_id is not available
          console.error("User ID is not available");
          return;
        }
        const combinedCategoryIds = [this.categorie.toString(), this.subcategorie.toString()];
        console.log('Enrol Data:', this.listing_thumbnail, this.listing_images, this.combinedCategoryIds, this.user_id,this.reference,this.couleur, this.memoire, this.ram, this.description, this.name, this.sim);
  
        const listingData = new FormData();
        listingData.append('user_id', this.user_id);
        listingData.append('name', this.titreAnnonce);
        listingData.append('description', this.description);
        listingData.append('country_id', this.country_id);
        listingData.append('city_id', this.city_id);
        listingData.append('typedebien', this.SubcategerieCheck);
        listingData.append('state_id', this.state_id);
        listingData.append('address', this.address);
        listingData.append('energie', this.carburant);
        listingData.append('univers', this.univers.value);
        listingData.append('taille', this.taille.value);
        listingData.append('typedevetement', this.typedevetement.value);
        if (this.naturebien && this.naturebien.value) {
            listingData.append('naturebien', this.naturebien.value);
            // listingData.append('building_year', this.building_year.value);
        }
        listingData.append('carateristique', this.carateristique.value);
        listingData.append('surface', this.surface);
        listingData.append('surfacetotal', this.surfacetotal);
        listingData.append('rooms', this.rooms);
        listingData.append('roomschambres', this.roomschambres);
        listingData.append('nombredeniveaux', this.nombredeniveaux);
        listingData.append('salledebain', this.salledebain.value);
        if (this.building_year && this.building_year.value) {
            listingData.append('building_year', this.building_year.value);
        }
        // listingData.append('building_year', this.building_year.value);
        listingData.append('parking', this.parking.value);
        listingData.append('exterieur', this.exterieur.value);
        listingData.append('classeenergie', this.classeenergie);
        listingData.append('ges', this.ges);
        listingData.append('nombredetage', this.nombredetage.value);
        listingData.append('etagedevotrebien', this.etagedevotrebien);
        listingData.append('anneemodele', this.anneemodele);
        listingData.append('typevehicule', this.typevehicule);
        listingData.append('boitevitesse', this.boitevitesse);
        listingData.append('nombreplace', this.nombreplace);
        listingData.append('nombreporte', this.nombreporte);
        listingData.append('puissancefiscal', this.puissancefiscal);
        listingData.append('puissancedin', this.puissancedin);
        listingData.append('kilometrage', this.kilometrage);
        listingData.append('latitude', this.latitude);
        listingData.append('longitude', this.longitude);
        listingData.append('google_analytics_id', this.google_analytics_id);
        listingData.append('amenities', this.amenities);
        listingData.append('categories', combinedCategoryIds);
        listingData.append('reference', this.reference);
        listingData.append('marque', this.marque);
        listingData.append('modele', this.modele);
        listingData.append('prix', this.prix);
        listingData.append('couleur', this.couleur);
        listingData.append('etat', this.etat.value);
        listingData.append('os', this.os);
        listingData.append('reseau', this.reseau);
        listingData.append('memoire', this.memoire);
        listingData.append('ram', this.ram);
        listingData.append('sim', this.sim);
        listingData.append('copie', this.copie);
        listingData.append('video_provider', this.video_provider);
        listingData.append('video_url', this.video_url);
        listingData.append('seo_meta_tags', this.seo_meta_tags);
        listingData.append('meta_description', this.meta_description);
        listingData.append('website', this.website);
        listingData.append('email', this.email);
        listingData.append('phone', this.phone);
        listingData.append('listing_type', this.listing_type);
        listingData.append('social', this.social);
        listingData.append('date_added', this.date_added);
        listingData.append('listing_thumbnail', this.listing_thumbnail);
        listingData.append('listing_cover', this.listing_cover);
        for (let i = 0; i < this.listing_images.length; i++) {
          listingData.append('listing_images[]', this.listing_images[i]);
        }
        // listingData.append('photos', this.photos);
        listingData.append('code', this.code);
  
        // Make API request
        axios.post('http://localhost/api/add_listing', listingData, {
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
            toast.add({ severity: 'success', summary: 'Message', detail: 'Annonce ajouté avec succes', life: 3000 });
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
          toast.add({ severity: 'error', summary: 'Message', detail: 'Erreur', life: 3000 });
  
      },
  
      // handleThumbnailUpload(event) {
      //   const files = event.target.files;
      //   if (files.length > 0) {
      //     this.listing_thumbnail = files[0];
      //     console.log('Thumbnail file:', this.listing_thumbnail);
      //   }
      // },
  
  
        handleFilesUpload(){
        let uploadedFiles = this.$refs.listing_images.files;
        for( var i = 0; i < uploadedFiles.length; i++ ){
          this.listing_images.push( uploadedFiles[i] );
        }
      },
  
      removeFile( key ){
        this.listing_images.splice( key, 1 );
      },
  
      valideTitreAnnonce() {
        this.isTitreAnnonce = true
      },
  
      getSubCategorie(event) {
        this.CategoryStore.getsubCategories(event.target.value)
        this.isSubCategorie = true
        this.isSugsestionCat = false
        const catSelectionner = this.categories.find((element) => element.id == event.target.value)
        this.typeCategorie = catSelectionner.name
      },
      valideSubCategorie(event) {
        this.isTypeAnnonce = true
        this.SubcategerieCheck=event.target.value
      },
      // getSubCategorie(event) {
      //     // Vous pouvez accéder directement à la valeur sélectionnée via this.categorie
      //     this.CategoryStore.getsubCategories(event.target.value);
      //     this.isSubCategorie = true;
      //     this.isSugsestionCat = false;
      //     const catSelectionner = this.categories.find(element => element.id == event.target.value);
      //     this.typeCategorie = catSelectionner.name;
      // },

      // valideSubCategorie(event) {
      //     // Même chose ici, accédez directement à la valeur sélectionnée via this.subcategorie
      //     this.isTypeAnnonce = true;
      //     this.SubcategerieCheck = event.target.value;
      // },

      valideTypeAnnance() {
        this.isPlusInfo = true
        this.isInfo = false
      },
      retourImobl() {
        this.isPlusInfo = false
        this.isInfo = true
      },
      continueVerImgImobl() {
        this.isPlusInfo = false
        this.isInfo = false
        this.isImageImobl = true
        this.versTop()
      },
      retourPlusInfoImobl() {
        this.isPlusInfo = true
        this.isInfo = false
        this.isImageImobl = false
        this.isDescrImobl = false
      },
      UploadImgImobli() {
        this.isPlusInfo = false
        this.isInfo = false
        this.isImageImobl = false
        this.isDescrImobl = true
      },
      retourImageImobl() {
        this.isPlusInfo = false
        this.isInfo = false
        this.isImageImobl = true
        this.isDescrImobl = false
      },
      checkBienSub(index) {
        console.log('sub', );
        this.SubcategerieCheck = index
        console.log('check', this.SubcategerieCheck);
  
      },
  
      versTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0
      }
  
    }
  }
  </script>
  
  <style>
    input[type="file"]{
      position: absolute;
      top: -500px;
    }
    div.file-listing{
      width: 200px;
    }
    span.remove-file{
      color: red;
      cursor: pointer;
      float: right;
    }
    .large-12.medium-12.small-12.cell.addimage {
      font-size: 15px;
      text-align: center;
  }
  .read-only\:bg-on-surface\/dim-5:read-only {
      width: 100%;
      background-color: #fff;
  }
  .customselector{
    box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgba(18, 18, 23, 0.05);
    font-family: var(--font-family);
    font-feature-settings: var(--font-feature-settings, normal);
    font-size: 1rem;
    color: #334155;
    background: #ffffff;
    padding: 0.5rem 0.75rem;
    border: 1px solid #cbd5e1;
    transition: background-color 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s, outline-color 0.2s;
    appearance: none;
    border-radius: 6px;
    outline-color: #cbd5e1;
  }
  .datacolumn{
    flex-direction: column;
    margin: 20px 0;
  }
  .datacolumn label {
    margin-bottom: 7px;
}
.databtn{
    position: relative;
}
.databtn .flex.flex-col{
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 7px;
    margin-right: 5px;
    border-radius: 10px;
    border-color: ;
}
.databtn .flex.flex-col svg{
    width: 24px;
    
}
.databtn .flex.flex-col .text-center{
    font-size: 12px;
}
.databtn svg.bg-surface{
    position: absolute;
    top: -2px;
    right: 0;
}
.rounded-full.border-sm.border-solid.border-outline{
    border: 1px solid #52525242;
    padding: 5px 12px;
    background: transparent;
    cursor: pointer;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#369932\]{
    background: #369932;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#3acc31\]{
    background: #3acc31;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#cdfd32\]{
    background: #cdfd32;
    color: #323232;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#fbea49\]{
    background: #fbea49;
    color: #828282;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#fccb2f\]{
    background: #fccb2f;
    color: #828282;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#fb9c34\]{
    background: #fb9c34;
    color: #ffffff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#fa1c1f\]{
    background: #fa1c1f;
    color: #ffffff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-outline{
    background: #585858;
    color: #ffffff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#f6edfe\]{
    background: #f6edfe;
    color: #000;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#e3c7fa\]{
    background: #e3c7fa;
    color: #000;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#d2adf1\]{
    background: #d2adf1;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#c99aef\]{
    background: #c99aef;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#b77be9\]{
    background: #b77be9;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#a659e9\]{
    background: #a659e9;
    color: #fff;
}
.rounded-full.border-sm.border-solid.border-outline.bg-\[\#8835d9\]{
    background: #8835d9;
    color: #fff;
}
.w-full.surface-card {
    min-width: 550px;
}
  </style>