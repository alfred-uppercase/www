<template>
  <div style="padding-top: 55px;">
    <!-- <h1>{{ title }}</h1> -->
    <div class="container">
      <div class="  row " style="transform: none;">

        <!-- <FIlters /> -->
        <div class="col-lg-9 col-md-12 order-lg-1 order-2 " id="listings">
          <div class="card card-body iline-block" v-if="!isLogin">
            <div class="float-start">
              <p class="font-weight-bold">Bonjour!</p>
              <p>Connectez-vous ou créez un compte pour déposer votre annonce.</p>

              <div class="mt-7">
                <button type="button" class="btn btn-theme mx-2" @click="login">Me connecter</button>
                <button type="button" class="btn btn-theme-outline" @click="sigin">Créer un compte</button>
              </div>
            </div>
            <div class="float-end">
              <img :src="img_depose" alt="" width="254">
            </div>
          </div>
          <form method="post" action="/api/add_listings" @submit.prevent="postAnnonce()">
          <div class="card card-body iline-block w-full" v-if="isLogin">
            <div class="src__Box-sc-10d053g-0 hUqdBx" v-if="isInfo">
              <div class="w-full">
                <p class="font-weight-bold">Commençons par l’essentiel !</p>

                <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                    data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:r1:"
                    for="subject">Quel est le titre de l’annonce ?<span data-spark-component="label-required-indicator"
                      role="presentation" aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                  <div class="flex flex-col md-flex-row">
                    <div class="flex flex-col gap-sm md:mr-md md:min-w-[50%] md:max-w-[50%]">
                      <input id="subject" name="subject"
                        class="border-gray relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                        required="" aria-invalid="false" type="text" maxlength="200" data-qa-id="input_subject_research"
                        v-model="name">
                    </div>
                    <button data-spark-component="button" v-if="!isTitreAnnonce"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  mt-lg btn btn-theme mx-3"
                      data-test-id="part-submit-title" data-qa-id="button_subject_research"
                      @click="valideTitreAnnonce">Continuer</button>

                  </div>
                </div>
              </div>
              <div class="w-full pt-xl md:mt-xl md:border-t-sm md:border-neutral-container"
                v-if="isLogin && isTitreAnnonce">
                <div data-spark-component="form-field" class="flex flex-col gap-sm" v-if="isSugsestionCat">
                  <label data-spark-component="form-field-label" class="text-body-1 mb-lg flex items-center gap-sm"
                    id="radix-:r5:" for="radix-:r4:">Choisissez une catégorie suggérée</label>
                  <div role="radiogroup" aria-required="false" aria-orientation="vertical" dir="ltr"
                    data-spark-component="radio-group" class="flex flex-col gap-lg" aria-labelledby="radix-:r5:"
                    aria-invalid="false" tabindex="0" data-orientation="vertical" style="outline: none;">


                    <div class="flex items-start gap-md text-body-1">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                          value="option1">
                        <label class="grow cursor-pointer form-check-label" for="exampleRadios1" id="radix-:rd:">
                          <p data-test-id="item-category"
                            class="flex items-center text-body-1 hover:md:text-main mt-n-12p">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Holidays"
                              fill="currentColor" stroke="none"
                              class="fill-current text-current u-current-font-size mx-lg" data-spark-component="icon"
                              aria-hidden="true" focusable="false">
                              <path
                                d="m16.57,1.71c-.23.62.09,1.31.71,1.54.62.23,1.31-.09,1.54-.71l.21-.57c.23-.62-.09-1.31-.71-1.54-.62-.23-1.31.09-1.54.71l-.21.57Z">
                              </path>
                              <path fill-rule="evenodd"
                                d="m18.37,12.2c.47-.39.88-.87,1.18-1.45,1.2-2.29.31-5.11-1.98-6.3-2.06-1.08-4.55-.47-5.9,1.34-1.18-.54-2.62-.32-3.59.65L.79,13.73c-.47.47-.47,1.23,0,1.7.47.47,1.23.47,1.7,0l.13-.13v4.15c0,2.32,1.88,4.2,4.2,4.2h6.8c2.32,0,4.2-1.88,4.2-4.2v-4.4l.15.15c.47.47,1.23.47,1.7,0,.47-.47.47-1.23,0-1.7l-1.3-1.3Zm-5.15-5.15l3.72,3.72c.34-.24.63-.56.83-.95.68-1.31.18-2.92-1.13-3.6-1.2-.63-2.67-.25-3.42.83Zm-2.31,1.08l4.51,4.51v6.8c0,.99-.81,1.8-1.8,1.8h-6.8c-.99,0-1.8-.81-1.8-1.8v-6.55l4.76-4.76c.31-.31.82-.31,1.13,0Z">
                              </path>
                              <path
                                d="M23.48 11.52c-.23.62-.92.94-1.54.71l-.57-.21c-.62-.23-.94-.92-.71-1.54.23-.62.92-.94 1.54-.71l.57.21c.62.23.94.92.71 1.54ZM12.99 3.42c-.6.28-1.31.01-1.59-.59l-.25-.55c-.28-.6-.01-1.31.59-1.59.6-.28 1.31-.01 1.59.59l.25.55c.28.6.01 1.31-.59 1.59ZM21.02 4.57c-.6.28-.86.99-.59 1.59.28.6.99.86 1.59.59l.55-.25c.6-.28.86-.99.59-1.59-.28-.6-.99-.86-1.59-.59l-.55.25Z">
                              </path>
                            </svg>
                            <span>Locations de vacances</span>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight"
                              fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mx-md"
                              data-spark-component="icon" aria-hidden="true" focusable="false">
                              <path fill-rule="evenodd"
                                d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z">
                              </path>
                            </svg>
                            <span>Locations saisonnières</span>
                          </p>
                        </label>
                      </div>

                    </div>
                  </div>
                </div>
                <p class="mb-sm mt-xl text-body-1">Ou choisissez une autre catégorie<span
                    data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                    class="ml-sm text-caption text-on-surface/dim-3">*</span></p>

                <select v-model="categorie" name="" id="" @change="getSubCategorie($event)"
                  class="mr-10-p border-gray relative ring-1 ring-inset peer box-border w-50 appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                  <option value="0">Choisissez</option>
                  <option v-for="(category, index) in categories" :key="category.id" :value="category.id"
                    class="mb-4 mt-1"> {{
                      category.name }}</option>
                </select>

                <select v-model="subcategorie" name="" id="" v-if="isSubCategorie" @change="valideSubCategorie($event)"
                  class="border-gray relative ring-1 ring-inset peer box-border w-45 appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                  <option value="0">Choisissez sous categorie</option>
                  <option v-for="(sub, index) in subCategories" :key="sub.id" :value="sub.id"> {{
                    sub.name }}</option>
                </select>
              </div>

              <div class="my-xl w-full false mt-2" v-if="isTypeAnnonce">
                <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                    data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-:ro:"
                    for="adType">Type d’annonce<span data-spark-component="label-required-indicator" role="presentation"
                      aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                  <div role="radiogroup" aria-required="true" aria-orientation="vertical" dir="ltr"
                    data-spark-component="radio-group" class="flex flex-col gap-lg mt-lg sm:flex"
                    aria-labelledby="radix-:ro:" aria-invalid="false" tabindex="0" data-orientation="vertical"
                    style="outline: none;">
                    <div class="mb-md flex grow flex-col">
                      <div class="flex items-start gap-md text-body-1">
                        <input type="radio" aria-hidden="true" name="adType" required="" tabindex="-1" value="offre"
                          checked="" id="offre"
                          style="transform: translateX(-100%); position: absolute; pointer-events: none; opacity: 0; margin: 0px; width: 24px; height: 24px;"><label
                          class="grow cursor-pointer" for="offre" id="radix-:rq:">Offre</label>
                      </div>
                      <p class="ml-2xl text-caption text-neutral">Vous vendez un bien immobilier.</p>
                    </div>
                    <div class="mb-md flex grow flex-col">
                      <div class="flex items-start gap-md text-body-1">

                        <input type="radio" aria-hidden="true" name="adType" required="" tabindex="-1" value="demande"
                          id="demande"
                          style="transform: translateX(-100%); position: absolute; opacity: 0; margin: 0px; width: 24px; height: 24px;">
                        <label class="grow cursor-pointer" for="demande">Demande</label>
                      </div>
                      <p class="ml-2xl text-caption text-neutral">Vous recherchez un bien immobilier.</p>
                    </div>
                  </div>
                </div>
                <div class="sc-76d5a3a8-0 cCyBQa"><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" data-test-id="submit-category"
                    data-qa-id="depositad-button-next-categories" @click="valideTypeAnnance"> Continuer</button></div>
              </div>


              <div class="src__Box-sc-10d053g-0 bEJlll mt-4">
                <button type="button" class="border-0 text-left text-caption text-on-background/dim-1">
                  <span class="text-caption-link"><u><b>Me
                        renseigner</b></u> sur les finalités du traitement de mes données personnelles, les
                    destinataires, le responsable de traitement, les durées de conservation, les coordonnées du
                    <u><b>DPO et mes droits.</b></u>
                  </span>
                </button>
              </div>
            </div>

            <!-- Imobilier -->

            <div v-if="typeCategorie == 'Immobilier'">

              <div class="src__Box-sc-10d053g-0 hUqdBx" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">

                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                      <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:ri:" for="building_year">Année de construction</label>
                        <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                            class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                            aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                          <select name=" " id=""
                            class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                            <option value="">2000</option>
                            <option value="">2001</option>
                            <option value="">2002</option>
                            <option value="">2003</option>
                            <option value="">2004</option>
                            <option value="">2005</option>
                            <option value="">2006</option>
                            <option value="">2007</option>
                            <option value="">2002</option>
                            <option value="">2009</option>
                          </select>
                        </div>
                        <div class="flex justify-between gap-md"></div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="square">
                      <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:rk:" for="square">Superficie </label>
                        <div class="relative inline-flex w-full after:hidden after:hidden">
                          <div class="relative inline-flex w-full"><input id="square" name="square"
                              class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                              aria-invalid="false" type="text" inputmode="numeric" maxlength="6" value=""></div>
                          <div class="rounded-r-lg border-1">
                            <div
                              class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                              m²</div>
                          </div>
                        </div>
                        <div class="flex justify-between gap-md">
                          <div class="flex flex-col"></div>
                        </div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="rooms">
                      <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:ro:" for="rooms">Nombre de pièces</label>
                        <div class="relative inline-flex w-full after:hidden after:hidden">
                          <div class="relative inline-flex w-full"><input id="rooms" name="rooms"
                              class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-none pl-lg pr-lg"
                              aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          <div class="rounded-r-lg border-1">
                            <div
                              class="overflow-hidden border-sm shrink-0 h-full focus-visible:relative focus-visible:z-raised flex items-center px-lg border-outline bg-surface text-on-surface ml-[-1px] !rounded-l-none rounded-r-lg">
                              pièce(s)</div>
                          </div>
                        </div>
                        <div class="flex justify-between gap-md">
                          <div class="flex flex-col"></div>
                        </div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="bedrooms">
                      <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:rq:" for="bedrooms">Specification</label>
                        <div class="relative inline-flex w-full after:hidden after:hidden">
                          <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                              class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                              aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                        </div>
                        <div class="flex justify-between gap-md">
                          <div class="flex flex-col"></div>
                        </div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                      <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:ri:" for="building_year">Electricité </label>
                        <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
                            class="css-7pg0cj-a11yText"></span><span aria-live="polite" aria-atomic="false"
                            aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                          <select name=" " id=""
                            class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg">
                            <option value="">Gaz</option>
                            <option value="">Eau</option>
                          </select>
                        </div>
                        <div class="flex justify-between gap-md"></div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[100%] block" data-rhf-name="building_year">
                      <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
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
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="building_year">
                      <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:ri:" for="building_year">Papiers </label>
                        <div class=" css-b62m3t-container"><span id="react-select-2-live-region"
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
                        <div class="flex justify-between gap-md"></div>
                      </div>
                    </div>


                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="nb_bathrooms">
                      <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:rs:" for="nb_bathrooms">Nombre Etage(s)</label>
                        <div class="relative inline-flex w-full after:hidden after:hidden">
                          <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                              class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                              aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                        </div>
                        <div class="flex justify-between gap-md">
                          <div class="flex flex-col"></div>
                        </div>
                      </div>
                    </div>
                    <div class="max-w-none lg:max-w-[50%] block" data-rhf-name="nb_bathrooms">
                      <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                          id="radix-:rs:" for="nb_bathrooms">Prix</label>
                        <div class="relative inline-flex w-full after:hidden after:hidden">
                          <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                              class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                              aria-invalid="false" type="text" inputmode="numeric" maxlength="30" value=""></div>
                        </div>
                        <div class="flex justify-between gap-md">
                          <div class="flex flex-col"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" 
                  url="/uploads/listing_images" 
                  :uploadOnDrop="true"
                    :multipleUpload="true" 
                    :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>


            <!-- Informatique -->


            <div v-if="typeCategorie == 'Informatique'">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Référence:</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="reference" id="reference" name="reference"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Marque </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="marque" id="marque" name="marque"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="flex flex-col md-flex-row">

                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Prix</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="prix" id="prix" name="prix"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] mx-2">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">RAM</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="ram" id="ram" name="ram"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Processeur </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="processeur" id="processeur" name="processeur"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Taille écran </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="screensize" id="screensize" name="screensize"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="flex flex-col md-flex-row">



                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rk:" for="square">Carte graphique: </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input v-model="gpu" id="gpu" name="gpu"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text">
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Reférence carte graphique integrée </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="gpuref" id="gpuref" name="gpuref"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">

                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%]">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="rooms">Type disque </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
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
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Taille du disque </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="disquesize" id="disquesize" name="disquesize"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea v-model="description" rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>


            <!-- Vehicule -->

            <div v-if="typeCategorie == 'Véhicules'">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Modèle:</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="modele" id="modele" name="modele"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Marque </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="marque" id="marque" name="marque"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    <div class="flex flex-col md-flex-row">
                     
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block" >
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Prix</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="prix" id="prix" name="prix"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] mx-2">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Année</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="annee" id="annee" name="annee"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Couleur </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="couleur" id="couleur" name="couleur"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Kilométrage  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="kilometrage" id="kilometrage" name="kilometrage"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <!-- <div class="flex flex-col md-flex-row">

                      

                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rk:" for="square">Carte graphique: </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value="">
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Reférence carte graphique integrée </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="flex flex-col md-flex-row">
                      
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%]">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="rooms">Type Boite </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input"  v-model="typeboite" type="radio" name="typeboite" id="typeboite1"
                                  value="Manuelle">
                                <label class="form-check-label" for="typeboite1">Manuelle</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" v-model="typeboite" type="radio" name="typeboite" id="typeboite2"
                                  value="Automatique">
                                <label class="form-check-label" for="typeboite2">Automatique</label>
                              </div>
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Energie</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="energie" id="energie" name="energie"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" ></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea v-model="description" rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>

            <!-- Emplois -->

            <div v-if="typeCategorie == 'Emploi'">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                      <div class="max-w-none lg:max-w-[100%] lg:min-w-[100%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Societé:</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[100%] lg:min-w-[100%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">L'utilité dde poste  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>


            <!-- Téléphones -->
            <div v-if="typeCategorie == 'Téléphones'">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Référence :</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="reference" id="reference" name="reference"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Marque </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="marque" id="marque" name="marque"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    <div class="flex flex-col md-flex-row">
                     
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%]">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Modèle </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="modele" id="modele" name="modele"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block  mx-2" >
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Prix</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="prix" id="prix" name="prix"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Couleur </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="couleur" id="couleur" name="couleur"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Etat   </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="etat" id="etat" name="etat"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="flex flex-col md-flex-row">

                      

                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rk:" for="square">OS: </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input v-model="os" id="os" name="os"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text">
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Type Reseaux</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input  v-model="reseau" id="reseau" name="reseau"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text"></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="flex flex-col md-flex-row">
                      
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%]">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="rooms">Mémoire </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input v-model="memoire" id="memoire" name="memoire"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" >
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">RAM</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="ram" id="ram" name="ram"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" ></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%]">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ro:" for="rooms">SIM </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full">
                              <input v-model="sim" id="sim" name="sim"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" >
                            </div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2" data-rhf-name="nb_bathrooms">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Copie</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input v-model="copie" id="copie" name="copie"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" ></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Photo à la une !</h3>
                <div style="position: relative;">
                  <DropZone
                  :uploadOnDrop="false" :multipleUpload="false" @vdropzone-success="handleSuccess" />
                </div>
                <!-- <input type="file" @change="handleFileUpload( $event )"/> -->
                <!-- <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/> -->

                <h3 class="mb-xl text-headline-2 font-semi-bold">Galerie</h3>
                <div style="position: relative;">
                  <DropZone method="POST" v-model="listing_images" :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="false"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>

            <!-- Vétements -->
            <div v-if="typeCategorie == 'Vêtements'">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">
                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <p class="text-body-2"></p>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Gros / Détail :</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Location / Vente </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    <div class="flex flex-col md-flex-row">
                     
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block" >
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Etat </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] mx-2">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Taille </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">prix </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>


            <!-- Electronique & Electroménager -->
      
            <div v-if="typeCategorie.match(/^.*Electronique.*/)">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">


                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Référence :</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Etat </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    <div class="flex flex-col md-flex-row">
                     
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block" >
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Taille écran  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] mx-2">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Marque  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">prix </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>

            <!-- Services -->

            <div v-if="typeCategorie.match(/^.*Services.*/)">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">


                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce" ></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>

            <!-- Voyages -->

            <div v-if="typeCategorie.match(/^.*Voyages.*/)">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">


                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Période  :</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Destination  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    <div class="flex flex-col md-flex-row">
                     
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block" >
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rs:" for="nb_bathrooms">Type de l'establissement   </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="nb_bathrooms" name="nb_bathrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric" maxlength="30" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] block lg:min-w-[50%] mx-2">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Désignation/ Nom d'etablissement  </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">prix </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing_images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce"></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea v-model="descripton" rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>

            <!-- Divers -->

            <div v-if="typeCategorie.match(/^.*Divers.*/)">
              <div class="src__Box-sc-10d053g-0 hUqdBx mx-auto" v-if="isPlusInfo">


                <div
                  class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] ">
                  <h3 class="mb-xl text-headline-2 font-semi-bold">Dites-nous en plus</h3>
                  <div class="grid grid-cols-1 gap-xl">


                    <div class="max-w-none lg:max-w-full block" data-rhf-name="real_estate_type">
                      <div class="inline-block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:r3:" for="real_estate_type">Choisissez votre type de bien<span
                              data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                              class="text-caption text-on-surface/dim-3">*</span></label><input type="hidden"
                            id="radix-:r2:" name="real_estate_type" aria-required="true" required="" value="1">
                          <div class="flex flex-wrap">
                            <button type="button" v-for="(subCat, index) in subCategories" :key="subCat.id"
                              class=" flex flex-col items-center flex-shrink-0 min-w-none h-[8rem] w-[8rem] mb-md cursor-pointer relative mr-lg last:mr-none"
                              tabindex="0" :value="subCat.id" name="real_estate_type" @click="checkBienSub(subCat.id)">
                              <div
                                class="flex flex-col items-center justify-center flex-shrink min-w-none h-[8rem] w-[8rem] p-sm border-sm rounded-sm duration-200 border-main"
                                :class="[subCat.id == SubcategerieCheck ? 'text-main' : '']">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="House"
                                  fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24"
                                  data-spark-component="icon" aria-hidden="true" focusable="false">
                                  <path fill-rule="evenodd"
                                    d="m5.2,12.7c-.1,0-.2-.1-.4-.1-.5,0-1,.4-1.1.8v5.6c0,2.2,1.8,4,4,4h8.6c2.2,0,4-1.8,4-4v-5.4c-.1-.5-.6-.8-1.1-.8-.1,0-.3,0-.4.1-.4.2-.8.6-.8,1.1v5c0,.9-.8,1.7-1.7,1.7H7.7c-.9,0-1.7-.8-1.7-1.7v-5.1c0-.6-.3-1-.8-1.2Zm9.1,5.7c.6-.5,1-1.3,1-2.2v-1.9c0-1.6-1.3-2.9-2.8-2.9h-.9c-1.6,0-2.8,1.3-2.8,2.9v1.9c0,.9.4,1.7,1,2.2.5.4,1.1.7,1.8.7h.9c.7-.1,1.3-.3,1.8-.7Zm.5-16.2c-1.6-1.6-4.1-1.6-5.6,0L.9,10.6c-.4.4-.4,1.2,0,1.6.2.2.5.3.8.3s.6-.1.8-.3L10.8,3.8c.7-.7,1.7-.7,2.4,0l8.3,8.4c.2.2.5.3.8.3s.6-.1.8-.3c.4-.4.4-1.2,0-1.6L14.8,2.2Zm-2.3,11.5h-.9c-.3,0-.5.2-.5.6v1.9c0,.3.2.6.5.6h.9c.3,0,.5-.2.5-.6v-1.9c0-.3-.2-.6-.5-.6Z">
                                  </path>
                                </svg>
                                <div class="mt-sm w-full overflow-hidden text-ellipsis whitespace-nowrap text-center">{{
                                  subCat.name }}
                                </div>
                              </div><svg v-if="subCat.id == SubcategerieCheck" viewBox="0 0 24 24"
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
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col md-flex-row">
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block">
                        <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:rq:" for="bedrooms">Etat   :</label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" inputmode="numeric"  value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-none lg:max-w-[50%] lg:min-w-[50%] block mx-2 ">
                        <div data-spark-component="form-field" class="relative flex flex-col gap-sm"><label
                            data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                            id="radix-:ri:" for="building_year">Prix:   </label>
                          <div class="relative inline-flex w-full after:hidden after:hidden">
                            <div class="relative inline-flex w-full"><input id="bedrooms" name="bedrooms"
                                class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                                aria-invalid="false" type="text" value=""></div>
                          </div>
                          <div class="flex justify-between gap-md">
                            <div class="flex flex-col"></div>
                          </div>
                        </div>
                      </div>
                      

                    </div>
                  </div>
                  <div
                    class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                    <div class="flex-1"><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                        aria-busy="false" aria-live="off" type="button" @click="retourImobl">Retour</button></div><button
                      data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                      aria-busy="false" aria-live="off" type="submit" data-test-id="submit-next"
                      @click="continueVerImgImobl">Continuer</button>
                  </div>
                </div>
              </div>
              <div v-if="isImageImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Ajouter des photos</h3>
                <div style=" border: 1px solid red; position: relative;">
                  <DropZone :maxFiles="Number(10000000000)" url="/uploads/listing-images" :uploadOnDrop="true"
                    :multipleUpload="true" :parallelUpload="3" />
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourPlusInfoImobl">Retour</button>

                  </div>

                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme"
                    aria-busy="false" aria-live="off" type="submit" 
                    @click="UploadImgImobli">Continuer</button>
                </div>
              </div>
              <div
                class=" relative grow shrink bg-surface p-xl rounded-lg sm:min-h-none sm:pb-xl min-h-[calc(100vh - 6rem)] pb-[7rem] "
                v-if="isDescrImobl">
                <h3 class="mb-xl text-headline-2 font-semi-bold">Décrivez votre bien !</h3>
                <p class="text-body-2"></p>
                <div class="grid grid-cols-1 gap-xl">
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="subject">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r22:" for="subject">Titre de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="subject" name="subject"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg"
                            required="" aria-describedby="subject-helper-text-0" aria-invalid="false" type="text"
                            inputmode="text" maxlength="200" v-model="titreAnnonce" ></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="subject-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            n'avez pas besoin de mentionner « Achat » ou « Vente » ici.</span></div><span
                          data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">6/200</span>
                      </div>
                    </div>
                  </div>
                  <div class="max-w-none lg:max-w-full block" data-rhf-name="body">
                    <div data-spark-component="form-field" class="flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm"
                        id="radix-:r25:" for="body">Description de l'annonce<span
                          data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                          class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><textarea rows="8" name="body" id="body" required=""
                            maxlength="4000" aria-describedby="body-helper-text-0"
                            class="relative border-sm peer w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:bg-on-surface/dim-5 focus:ring-1 focus:ring-inset disabled:border-outline min-h-sz-44 border-outline hover:border-outline-high focus:ring-outline-high focus:border-outline-high rounded-l-lg rounded-r-lg pl-lg pr-lg py-[var(--sz-10)] resize-y"
                            aria-invalid="false" data-spark-component="textarea"></textarea></div>
                      </div>
                      <div class="flex justify-between gap-md">
                        <div class="flex flex-col"><span id="body-helper-text-0"
                            data-spark-component="form-field-helper-message"
                            class="text-on-surface/dim-1 text-caption">Vous
                            devez renseigner des informations légales dans la partie description au risque de sanction.
                            <br></span></div><span data-spark-component="form-field-characters-count"
                          class="text-caption text-neutral">0/4000</span>
                      </div>
                    </div><button type="button" class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog"
                      aria-expanded="false" aria-controls="radix-:r27:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        concernant le DPE</span></button><button type="button"
                      class="border-0 mt-sm block text-left undefined" aria-haspopup="dialog" aria-expanded="false"
                      aria-controls="radix-:r2a:" data-state="closed"><span
                        class="block text-caption text-on-surface/dim-1 underline undefined">Voir les mentions
                        obligatoires
                        relatives aux biens immobiliers situés dans une zone à risque</span></button>
                  </div>
                </div>
                <div
                  class="flex justify-between fixed z-sticky bottom-[0] left-[0] right-[0] shadow bg-surface px-xl py-md sm:z-base sm:relative sm:mt-2xl sm:shadow-none sm:p-none">
                  <div class="flex-1">
                    <button data-spark-component="button"
                      class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support"
                      aria-busy="false" aria-live="off" type="button" @click="retourImageImobl">Retour</button>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused btn btn-theme">Terminer</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        </div>

        <div class="col-lg-3 order-lg-2 order-1" v-if="isLogin">
          <div class="styles_tips__NUVkc">
            <div class="styles_drawing__FxLLl">
              <hr class="h-[1px] flex-auto border-main"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                data-title="Icône tips" fill="currentColor" stroke="none" class="fill-current text-main w-sz-40 h-sz-40"
                data-spark-component="icon" aria-hidden="true" focusable="false">
                <title>Icône tips</title>
                <path
                  d="m10.32,22c-.41,0-.79-.16-1.08-.45-.29-.29-.46-.67-.47-1.09v-1.93c-.73-.46-1.34-1.08-1.81-1.81-.58-.91-.92-1.96-.97-3.04-.05-1.08.19-2.16.69-3.12.5-.96,1.25-1.76,2.16-2.33.92-.57,1.96-.88,3.03-.9s2.13.24,3.07.78c.93.53,1.72,1.31,2.26,2.24.54.94.82,2.01.82,3.08-.02,1.13-.33,2.22-.92,3.17-.48.77-1.11,1.41-1.86,1.9v1.95c0,.44-.18.83-.47,1.11-.29.29-.68.45-1.09.45h-3.36Zm.44-2.02h2.47v-2.07c0-.39.22-.73.56-.9.66-.34,1.22-.84,1.61-1.47.39-.63.61-1.36.62-2.11,0-.72-.18-1.43-.55-2.06-.36-.62-.88-1.15-1.51-1.5-.62-.35-1.35-.52-2.05-.51-.72.02-1.42.23-2.02.61-.61.38-1.11.92-1.44,1.56-.33.64-.49,1.36-.46,2.08.03.72.26,1.42.65,2.03.39.61.93,1.1,1.57,1.42.34.17.56.52.56.9v2.03Zm10.23-9.39h-2.15c-.55,0-1-.45-1-1.01s.45-1.01,1-1.01h2.15c.55,0,1,.45,1,1.01s-.45,1.01-1,1.01Zm-15.85,0h-2.15c-.55,0-1-.45-1-1.01s.45-1.01,1-1.01h2.15c.55,0,1,.45,1,1.01s-.45,1.01-1,1.01Zm2.63-2.94c-.26,0-.52-.1-.71-.3l-1.52-1.55c-.39-.4-.38-1.04,0-1.43.39-.4,1.03-.39,1.42,0l1.52,1.55c.39.4.38,1.04,0,1.43-.19.19-.45.29-.7.29h0Zm8.42,0c-.26,0-.51-.1-.7-.29-.39-.4-.39-1.04,0-1.43l1.52-1.55c.39-.4,1.02-.4,1.42,0,.39.4.39,1.04,0,1.43l-1.52,1.55c-.19.2-.45.3-.71.3h0Zm-4.22-1.45c-.55,0-1-.45-1-1.01v-2.17c0-.56.45-1.01,1-1.01s1,.45,1,1.01v2.17c0,.56-.45,1.01-1,1.01Z">
                </path>
              </svg>
              <hr class="h-[1px] flex-auto border-main">
            </div>
            <div class="text-theme">Votre annonce sera trouvée plus facilement !<br><br>Vous aurez 50% de chances en plus
              d’être contacté
              si votre annonce est dans la bonne catégorie.</div>
          </div>
        
        </div>
      </div>

    </div>
  </div>
</template>
<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/authStore';
// import { useUserStore } from '../../stores/user'
import { useCategoryStore } from '../../stores/categorie'
import DropZone from 'dropzone-vue';
// import Dropzone from "dropzone";
import { useDropzone } from "vue3-dropzone";

import 'dropzone-vue/dist/dropzone-vue.common.css';
import '../../plugins/scroll'
export default {
  components: {
    DropZone,
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
      name:'',
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
      reference:'',
      marque:'',
      modele:'',
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
      energie:'',
      video_provider:'',
      video_url:'',
      seo_meta_tags:'',
      meta_description:'',
      website:'',
      email:'',
      phone:'',
      listing_type:'',
      social:'',
      date_added:'',
      listing_thumbnail:'',
      listing_cover:'',
      listing_images:[],
      photos:'',
      code:'',
      titreAnnonce:'',
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
  methods: {
    async handleSuccess(file, response) {
    // La fonction appelée lorsqu'un téléchargement réussit
    console.log('Upload success:', response);

    this.listing_thumbnail = response.data.url;

    console.log('Enrol Thumbnail:', this.listing_thumbnail);

    await this.postAnnonce();
  },
    // handleFileUpload( event ){
    //   console.log('File selected:', event.target.files[0]);
    // this.listing_thumbnail = event.target.files[0];
  // },
    async postAnnonce() {
      // Check if user_id is available
      if (!this.user_id) {
        // Handle the case when user_id is not available
        console.error("User ID is not available");
        return;
      }
      const combinedCategoryIds = [this.categorie, this.subcategorie];
      console.log('Enrol Data:', this.listing_thumbnail, this.listing_images, this.combinedCategoryIds, this.user_id,this.reference,this.couleur, this.memoire, this.ram, this.description, this.name, this.sim);

      const listingData = new URLSearchParams();
      listingData.append('user_id', this.user_id);
      listingData.append('name', this.name);
      listingData.append('description', this.description);
      listingData.append('country_id', this.country_id);
      listingData.append('city_id', this.city_id);
      listingData.append('state_id', this.state_id);
      listingData.append('address', this.address);
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
      listingData.append('etat', this.etat);
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
      listingData.append('photos', this.photos);
      listingData.append('code', this.code);

      // Make API request
      axios.post('/api/add_listing', listingData, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
    })
        .then(response => {
          // Handle successful response
          this.msg = 'Listing add successfull';
          this.classAlert = 'success';
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
    checkBienSub(sub) {
      console.log('sub', sub);
      this.SubcategerieCheck = sub
      console.log('check', this.SubcategerieCheck);

    },

    versTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0
    }

  }
}
</script>
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

</script>
  