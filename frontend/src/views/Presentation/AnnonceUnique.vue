
<template>
  <main id="mainContent">
    <div
      class="bg-background custom:mx-auto custom:my-xl custom:w-[calc(100%-4rem)] custom:min-w-page-min custom:max-w-page-max">
      <nav>
        <div class="_3IX1b">
          <div class="bg-surface p-md shadow">
            <div data-qa-id="adview_sticky_container"
              class="sc-53e18e84-1 jfZjwu src__CenteredWrapper-sc-1bgl6we-0 iCaNcC">
              <div class="mr-sm flex max-w-[80vw] items-center" data-test-id="adview_container">
                <div class="mr-md" data-qa-id="adview_sticky_image"><img
                    src="https://img.leboncoin.fr/api/v1/lbcpb1/images/e0/94/49/e09449b780ef9125aea8053b8e35ffe42573cae9.jpg?rule=ad-thumb"
                    class="max-h-sz-56 max-w-sz-64"></div>
                <div class="overflow-hidden" data-qa-id="adview_title">
                  <div class="visible relative line-clamp-2 text-ellipsis break-words">
                    <p class="text-subhead">{{ listingDetails.name }}</p>
                  </div>
                  <div class="flex items-center">
                    <div class="mr-md flex flex-wrap items-center justify-between" data-qa-id="adview_price">
                      <div class="flex">
                        <p class="text-headline-2  ">80&nbsp;€</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sc-53e18e84-2 hCcFEX">
                <div class="_1o09v">
                  <div class="sc-53e18e84-3 fdtoye">
                    <div data-qa-id="adview_button_contact_sticky" class="sc-53e18e84-4 fCRthz">
                      <div class="_1o09v"><button data-spark-component="button"
                          class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-support text-on-support hover:bg-support-hovered enabled:active:bg-support-pressed focus-visible:bg-support-focused w-full"
                          aria-busy="false" aria-live="off" data-pub-id="adview_button_contact_contact">Message</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-pub-id="clicked_annonce_saved" data-qa-id="adview_button_favorite_sticky" class="">
                  <div data-spark-component="popover-anchor">
                    <div data-test-id="adview_button_favorite">
                      <div class="styles_FavoriteButtonBubble__Vwihy"><button data-spark-component="button"
                          class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-surface text-on-surface hover:bg-surface-hovered enabled:active:bg-surface-pressed focus-visible:bg-surface-focused px-none text-body-1"
                          aria-busy="false" aria-live="off" aria-label="Sauvegarder"><svg viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" data-title="LikeOutline" fill="currentColor" stroke="none"
                            class="fill-current text-current u-current-font-size" data-spark-component="icon"
                            aria-hidden="true" focusable="false">
                            <path
                              d="m16.28,3c-1.72,0-3.24.83-4.28,2.11-1.04-1.28-2.57-2.11-4.28-2.11-3.21,0-5.72,2.85-5.72,6.24,0,2.77,1.41,4.75,1.97,5.51,1.87,2.47,4.38,4.11,6.67,5.6h.02c.25.17.49.33.73.49.32.21.73.22,1.06.02.21-.13.43-.26.63-.39h.02c2.39-1.48,5.02-3.1,6.95-5.68.64-.86,1.95-2.83,1.95-5.54,0-3.4-2.51-6.23-5.72-6.23h0Zm-8.57,2.12c1.46,0,2.76.96,3.35,2.39.16.38.52.64.93.64s.77-.25.93-.64c.6-1.44,1.9-2.39,3.36-2.39,1.99,0,3.7,1.79,3.69,4.13,0,2-.98,3.5-1.52,4.24-1.67,2.25-3.98,3.67-6.43,5.19l-.07.04-.21-.13c-2.33-1.52-4.54-2.97-6.18-5.14-.51-.67-1.54-2.18-1.54-4.2,0-2.33,1.7-4.13,3.7-4.13h0Z">
                            </path>
                          </svg></button></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="_1o09v w-full text-caption-link text-on-surface/dim-1 print:hidden md:mb-xl">
          <nav aria-label="Fil d’ariane" class="indexstyles__BreadcrumbNav-sc-p0j0dm-0 cFSvtW">
            <ol itemscope="" itemtype="https://schema.org/BreadcrumbList"
              class="indexstyles__BreadcrumbContainer-sc-p0j0dm-1 dPIzaI">
              <li data-qa-id="breadcrumb-item-0" itemscope="" itemprop="itemListElement"
                itemtype="https://schema.org/ListItem" class="indexstyles__Item-sc-p0j0dm-2 hRGkjr">
                <router-link
                :to="{ name: 'presentation' }"
                  class="underline mr-sm"><span itemprop="name">Accueil </span></router-link>
                <meta itemprop="position" content="1">
                > 
              </li>
              <!-- {{ category.name }} -->
              <li data-qa-id="breadcrumb-item-5" itemscope="" itemprop="itemListElement"
                itemtype="https://schema.org/ListItem" class="indexstyles__Item-sc-p0j0dm-2 hRGkjr">
                <p aria-current="page" class="font-bold text-on-surface"><span itemprop="name"> {{ listingDetails.name }}</span></p>
                <meta itemprop="position" content="6">
              </li>
            </ol>
          </nav>
        </div>
      </nav>

      <!-- Detail -->
      <article class="grid grid-cols-[1fr] custom:grid-cols-[65%_35%] print:inline" id="grid">
        
        <article class="col-[1] row-[1] min-w-page-min">
          <!-- Photos -->
          <section class="relative" data-qa-id="adview_spotlight_container">
            <div class="_1o09v"><div class="flex">
              <div v-if="listingDetails.photos">
          <lightgallery
              :settings="{ speed: 500, plugins: plugins }"
              :onInit="onInit"
              :onBeforeSlide="onBeforeSlide"
              class="relative flex h-sz-320 w-full"
            >
              <a
                data-lg-size="1406-1390"
              v-for="(photo, index) in parsePhotos(listingDetails.photos)" :key="index"
                class="gallery-item shrink-0 grow-0 basis-1/3 first-of-type:pr-md last-of-type:pl-md"
                :data-src="'/uploads/listing_images/' + photo"
                data-sub-html=""
              >
                <img
                  class="img-responsive"
                  :src="'/uploads/listing_images/' + photo"
                />
              </a>
              <!-- <a
                class="gallery-item"
                data-video='{"source": [{"src":"https://www.lightgalleryjs.com/videos/video1.mp4", "type":"video/mp4"}], "attributes": {"preload": false, "controls": true}}'
                data-poster=""
                data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@katherine_xx11' >Katherine Gu </a></h4><p> For all those years we were alone and helpless.</p>"
              >
                <img
                  width="200"
                  class="img-responsive"
                  src="https://www.lightgalleryjs.com/images/demo/html5-video-poster.jpg"
                />
              </a> -->
            </lightgallery>
          </div>
          </div>
          </div>
          </section>

          <!-- Details -->
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined">
            <div class="flex flex-col gap-lg" data-qa-id="adview_spotlight_description_container">
              <h1 class="break-words text-headline-1-expanded undefined" data-qa-id="adview_title">{{ listingDetails.name }}</h1>
              {{ listingDetails.address }}
              <div v-if="listingDetails.prix" class="mr-md flex flex-wrap items-center justify-between" data-qa-id="adview_price">
                <div class="flex">
                  <p class="text-headline-2  ">{{ formatPrice(listingDetails.prix) }}&nbsp;€</p>
                </div>
              </div>
              <div class="flex flex-wrap items-center">
                <div class="mr-md flex flex-wrap items-center justify-between" data-qa-id="adview_price">
                  <div class="flex" v-if="cheapestRoom(listingDetails.id)" :key="cheapestRoom(listingDetails.id).id">
                    <p class="text-headline-2  ">à partir de&nbsp;{{ cheapestRoom(listingDetails.id).price }} € / nuit</p>
                  </div>
                </div>
              </div>
              <div class="flex flex-col items-baseline justify-between gap-md md:flex-row">
                <p class="text-caption opacity-dim-1">{{ formattedDate(listingDetails.date_added) }}</p><div class="flex items-center gap-sm text-surface">
                  <div data-tip="Remonter en tête de liste" currentitem="false">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="MoveUp" fill="currentColor" stroke="none" class="fill-current text-main w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m4.85,4.88c.18-.18.44-.18.62,0l2.48,2.47c.27.37,0,.82-.35.82h-1.59v10.17c0,.46-.35.92-.89.92s-.88-.46-.88-.92v-10.17h-1.59c-.35,0-.53-.55-.27-.82l2.48-2.47Zm6.46,5.95h-1.77c-.53,0-.88-.46-.88-.92s.35-.92.88-.92h1.77c.53,0,.89.46.89.92s-.35.92-.89.92Zm5.31,4.21h-7.26c-.35,0-.71-.37-.71-.92s.27-.92.71-.92h7.26c.44,0,.71.37.71.92s-.26.92-.71.92Zm4.43,2.38h-11.68c-.44,0-.71.46-.71.92,0,.55.35.92.71.92h11.6c.44,0,.8-.37.8-.92,0-.46-.35-.92-.71-.92Z"></path><path fill-rule="evenodd" d="m5.64,4.71l2.49,2.48v.02c.38.51.03,1.21-.54,1.21h-1.35v9.92c0,.57-.44,1.16-1.13,1.16s-1.13-.59-1.13-1.16v-9.92h-1.35c-.32,0-.52-.25-.6-.48-.08-.23-.05-.54.16-.76h0s2.48-2.47,2.48-2.47c.27-.28.7-.28.97,0Zm-.35.34c-.08-.08-.19-.08-.27,0h0s-2.48,2.47-2.48,2.47c-.05.06-.08.16-.04.27.04.11.1.14.13.14h1.84v10.41c0,.35.27.67.64.67s.64-.32.64-.67V7.93h1.84c.13,0,.31-.21.17-.43l-2.47-2.46Zm3.12,4.87c0-.56.44-1.16,1.13-1.16h1.77c.69,0,1.13.59,1.13,1.16s-.44,1.16-1.13,1.16h-1.77c-.69,0-1.13-.59-1.13-1.16Zm1.13-.67c-.37,0-.64.32-.64.67s.27.67.64.67h1.77c.37,0,.64-.32.64-.67s-.27-.67-.64-.67h-1.77Zm-.89,4.08c.17-.22.42-.35.71-.35h7.26c.3,0,.55.13.72.35.16.21.24.5.24.81s-.07.6-.24.81c-.17.22-.42.35-.72.35h-7.26c-.53,0-.95-.52-.95-1.16,0-.31.07-.6.24-.81Zm.39.29c-.08.11-.14.28-.14.52,0,.46.29.67.46.67h7.26c.15,0,.25-.06.33-.16.08-.11.14-.28.14-.52s-.06-.41-.14-.52c-.08-.1-.18-.16-.33-.16h-7.26c-.15,0-.25.06-.33.16Zm0,4.24c-.09.13-.14.3-.14.49,0,.46.29.67.46.67h11.6c.28,0,.55-.23.55-.67,0-.17-.07-.35-.17-.48-.11-.14-.22-.19-.29-.19h-11.68c-.13,0-.23.06-.32.18Zm-.4-.28c.16-.22.4-.39.72-.39h11.68c.28,0,.52.18.68.38.16.21.27.49.27.78,0,.66-.44,1.16-1.04,1.16h-11.6c-.53,0-.95-.52-.95-1.16,0-.27.08-.55.23-.77Z"></path></svg>
                  </div>
                  <div class="__react_component_tooltip t01651f31-df1f-47ae-b9f0-e18e6cfd7a64 place-top type-dark" id="t01651f31-df1f-47ae-b9f0-e18e6cfd7a64" data-id="tooltip">

                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Description -->
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined">
            <h2 class="flex items-center text-headline-2">Description</h2>
            <div data-qa-id="adview_description_container">
              <p class="whitespace-pre-line text-body-1 [overflow-wrap:anywhere]" v-html="listingDetails.description"></p>
            </div>
          </div>
        
          <!-- Criteres -->
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined">
            <h2 class="flex items-center text-headline-2">Critères</h2>

            <div class="styles_criteria__U5Ul8 flex flex-wrap" data-qa-id="criteria_container">
                  <div v-if="listingDetails.typedebien <= '5'" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="HousingType" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12.37,5c.19,0,.34.13.38.3v.07s0,2.63,0,2.63h3.65v-1.16c0-.18.13-.33.31-.36h.07s1.49,0,1.49,0c.18,0,.34.13.37.3v.07s0,1.16,0,1.16h.48c.18,0,.34.13.37.3v.07s0,9.52,0,9.52c0,.18-.13.33-.31.36h-.07s-3.3,0-3.3,0v.38c0,.15-.09.28-.22.33l-.06.02h-.06s-4.79,0-4.79,0c-.19,0-.34-.16-.34-.36v-.38h-5.47c-.19,0-.34-.13-.38-.3v-.07s0-12.52,0-12.52c0-.18.14-.33.31-.37h.07s7.48,0,7.48,0Zm.71,7.48l-2.85,2.7h.46c.17,0,.31.13.34.29v.06s0,2.75,0,2.75h4.1v-2.75c0-.18.12-.32.28-.35h.06s.33,0,.33,0l-2.73-2.7Zm-7.83-6.74v11.79h5.1v-1.64s-1.01,0-1.01,0c-.29,0-.44-.35-.27-.57l.04-.05,2.88-2.73v-.17s0-6.63,0-6.63h-6.75Zm12.64,1.47h-.74v1.16c0,.18-.13.28-.31.31h-4.09v3.14l.1-.1c.12-.11.29-.12.42-.04l.05.04,3.59,3.55c.22.22.07.61-.24.61h-.85v1.64s2.92,0,2.92,0v-8.84h-.48c-.18,0-.34-.07-.37-.24v-.07s0-1.16,0-1.16Zm-1.02,2.21c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-2.25,0-2.25,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s2.25,0,2.25,0Zm-9-.74c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-1.5,0-1.5,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s1.5,0,1.5,0Zm3,0c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-1.5,0-1.5,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s1.5,0,1.5,0Zm-3-1.47c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-1.5,0-1.5,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s1.5,0,1.5,0Zm3,0c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-1.5,0-1.5,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s1.5,0,1.5,0Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Type de bien</p>
                        <span v-if="listingDetails.typedebien === '1'" class="text-body-1 font-bold">Maison</span>
                        <span v-else-if="listingDetails.typedebien === '2'" class="text-body-1 font-bold">Appartement</span>
                        <span v-else-if="listingDetails.typedebien === '3'" class="text-body-1 font-bold">Terrain</span>
                        <span v-else-if="listingDetails.typedebien === '4'" class="text-body-1 font-bold">Parking</span>
                        <span v-else-if="listingDetails.typedebien === '5'" class="text-body-1 font-bold">Autres</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.univers" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Capacity" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m19.12,10.5c.2,0,.38.17.38.38,0,.18-.13.34-.3.38h-3l-1.33,7.94c-.06.37-.56.41-.69.09l-.02-.07-1.22-5.39h-2.76l-1.01,5.38c-.03.18-.19.3-.36.3h-.07c-.18-.04-.3-.2-.3-.37v-.07s1.07-5.67,1.07-5.67c.03-.15.15-.27.29-.29h.06s3.36,0,3.36,0c.15,0,.28.09.34.23l.02.06.87,3.86,1.07-6.43c.03-.15.15-.27.29-.3h.07s3.23,0,3.23,0Zm-10.46-.75c.22,0,.34.19.34.38,0,.17-.14.38-.34.38h-3.41v4.5h.75c.24,0,.38.2.38.38v3.75c0,.19-.19.38-.38.38-.17,0-.38-.15-.38-.38v-3.38h-.75c-.23,0-.38-.19-.38-.38v-5.28c0-.17.12-.31.28-.34h.06s3.82,0,3.82,0Zm2.96-1.05c1.04,0,1.88.84,1.88,1.88s-.84,1.88-1.88,1.88-1.88-.84-1.88-1.88.84-1.88,1.88-1.88Zm0,.68c-.66,0-1.2.54-1.2,1.2s.54,1.2,1.2,1.2,1.2-.54,1.2-1.2-.54-1.2-1.2-1.2Zm5.62-4.13c1.24,0,2.25,1.01,2.25,2.25s-1.01,2.25-2.25,2.25-2.25-1.01-2.25-2.25,1.01-2.25,2.25-2.25Zm-10.5-.75c1.24,0,2.25,1.01,2.25,2.25s-1.01,2.25-2.25,2.25-2.25-1.01-2.25-2.25,1.01-2.25,2.25-2.25Zm10.5,1.5c-.83,0-1.5.67-1.5,1.5s.67,1.5,1.5,1.5,1.5-.67,1.5-1.5-.67-1.5-1.5-1.5Zm-10.5-.75c-.83,0-1.5.67-1.5,1.5s.67,1.5,1.5,1.5,1.5-.67,1.5-1.5-.67-1.5-1.5-1.5Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Univers</p>
                        <span class="text-body-1 font-bold">{{listingDetails.univers}}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.typedevetement" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Clothes" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.35,10.86c.2,0,.36.15.38.34l.77,7.62c.02.2-.11.37-.31.41l-3.85.76c-.2.04-.4-.08-.45-.28l-.4-1.57-.4,1.57c-.04.18-.21.29-.38.29h-.07s-3.85-.77-3.85-.77c-.19-.04-.33-.22-.31-.41l.77-7.62c.02-.19.19-.34.38-.34h7.69Zm-1.81,2.29h-3.6c-.17,1.19-.9,1.85-2.12,1.9h-.15s-.35,3.51-.35,3.51l3.14.62.68-2.69c.09-.36.58-.38.72-.07l.03.07.68,2.7,3.14-.62-.36-3.53c-1.03-.14-1.66-.79-1.81-1.87Zm-3.57-9.14s0,0,.01,0h.02s.01,0,.01,0c.02,0,.03,0,.04,0h0s4.23,1.15,4.23,1.15c.17.04.28.19.28.36v.06s-.39,2.67-.39,2.67c-.02.16-.15.29-.31.32h-.07s-1.15,0-1.15,0v1.14c0,.19-.14.34-.32.37h-.07c-.19,0-.35-.13-.38-.31v-.07s0-1.52,0-1.52c0-.19.14-.34.32-.37h.07s1.2,0,1.2,0l.29-2.01-3.68-.99-1.72,1.82c-.13.14-.35.16-.5.05l-.05-.05-1.81-1.83-3.69,1,.29,2.01h1.21c.19,0,.35.14.38.31v.07s0,6.48,0,6.48h1.54c.19,0,.35.14.38.31v.07c0,.19-.13.34-.31.37h-.07s-1.92,0-1.92,0c-.19,0-.35-.13-.38-.31v-.07s0-6.48,0-6.48h-1.15c-.17,0-.31-.11-.36-.26l-.02-.07-.38-2.67c-.02-.17.07-.33.22-.4l.06-.02,4.23-1.14s.07-.01.1-.01h-.05s.01,0,.01,0c0,0,.01,0,.02,0h.01s3.85,0,3.85,0Zm-.81,9.14h-1.3s-.12,1.14-.12,1.14h.06c.8-.04,1.23-.39,1.36-1.14Zm6,0h-.84c.11.61.41.96.95,1.09l-.11-1.09Zm-.15-1.52h-7l-.08.76h7.15l-.08-.76Zm-5.92-6.86h-2.04l1.04,1.05,1-1.05Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Type de vêtement</p>
                        <span class="text-body-1 font-bold">{{listingDetails.typedevetement}}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.taille" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Size" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.8,7.5c.39,0,.7.3.7.66v7.67c0,.37-.31.66-.7.66H5.2c-.39,0-.7-.3-.7-.66v-7.67c0-.37.31-.66.7-.66h13.6Zm-12.05.75h-1.5v6h9.37c.21,0,.38.17.38.38,0,.18-.14.34-.31.37h-.07s-9.37,0-9.37,0v.75h13.5v-7.5h-2.25v2.58c0,.23-.17.42-.38.42-.18,0-.34-.15-.37-.34v-.07s0-2.58,0-2.58h-1.5v1.76c0,.27-.17.49-.38.49-.18,0-.34-.17-.37-.4v-.09s0-1.76,0-1.76h-1.5v2.58c0,.23-.17.42-.38.42-.18,0-.34-.15-.37-.34v-.07s0-2.58,0-2.58h-1.5v1.76c0,.27-.17.49-.38.49-.18,0-.34-.17-.37-.4v-.09s0-1.76,0-1.76h-1.5v2.58c0,.23-.17.42-.38.42-.18,0-.34-.15-.37-.34v-.07s0-2.58,0-2.58Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Taille</p>
                        <span class="text-body-1 font-bold">{{listingDetails.taille}}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.marque" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ClothesBrand" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.41,4.5c.59,0,1.09.5,1.09,1.09v5.59c0,.26-.13.56-.33.76l-7.24,7.24c-.17.21-.46.33-.76.33-.26,0-.56-.13-.76-.33l-5.59-5.59c-.22-.19-.33-.44-.33-.76,0-.26.13-.56.33-.76l7.24-7.24c.19-.22.44-.33.76-.33h5.59Zm0,.81h-5.59c-.11,0-.15.03-.17.07l-7.26,7.26c-.07.05-.09.09-.09.19,0,.11.03.15.07.17l5.57,5.6s.12.08.2.08.15-.03.2-.08l7.24-7.24c.07-.05.09-.09.09-.19v-5.59c0-.15-.13-.27-.27-.27Zm-8.04,4.01c.11,0,.21.04.29.12l3.9,3.9c.08.08.12.18.12.28s-.04.21-.12.29c-.09.09-.21.12-.28.12-.08,0-.2-.04-.29-.12l-3.9-3.9c-.08-.08-.12-.18-.12-.29,0-.11.04-.21.12-.28.08-.08.18-.12.28-.12Zm1.07-1.09c.11,0,.21.04.29.12l3.9,3.9c.08.08.12.18.12.28,0,.11-.04.21-.12.29-.08.08-.2.12-.28.12s-.2-.04-.29-.12l-3.9-3.9c-.08-.08-.12-.18-.12-.29,0-.1.04-.21.12-.28.08-.08.18-.12.28-.12Zm3.68-1.12c.48-.48,1.29-.48,1.81,0,.24.28.36.57.36.91,0,.35-.13.68-.36.91-.26.23-.58.36-.91.36-.36,0-.67-.12-.91-.36-.23-.26-.36-.58-.36-.91,0-.35.13-.68.36-.91Zm.88.46c-.08,0-.2.04-.31.14-.09.07-.14.18-.14.31,0,.11.04.2.14.31.19.16.47.16.64,0,.08-.11.12-.2.12-.31,0-.11-.04-.2-.15-.31-.07-.1-.21-.14-.31-.14Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Marque</p>
                        <span class="text-body-1 font-bold">{{listingDetails.marque}}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.couleur" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_real_estate_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Color" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m11.94,4.5c1.22,0,1.93.33,2.19,1.02.16.43.15.79-.03,1.66l-.15.69-.06.34c-.13.79-.06,1.33.27,1.75.37.47.78.46,1.79.1l.28-.1c.86-.31,1.27-.37,1.77-.19.71.25,1.15,1.02,1.39,2.41.76,4.39-2.6,7.24-7.27,7.33h-.19c-4.1-.01-7.42-3.26-7.44-7.27v-.46c.01-3.93,3.21-7.14,7.23-7.26h.21Zm0,.72h-.19c-3.62.12-6.5,3.01-6.51,6.55v.46c.01,3.61,3,6.54,6.7,6.55h.18c4.26-.08,7.23-2.6,6.55-6.49-.2-1.16-.52-1.71-.92-1.85-.26-.09-.54-.05-1.14.15l-.56.2c-1.19.41-1.86.39-2.47-.39-.48-.61-.57-1.33-.42-2.3.02-.15.05-.29.09-.47l.09-.41c.18-.85.21-1.17.1-1.45-.13-.35-.55-.54-1.49-.54Zm-1.03,9.8c.8,0,1.44.63,1.44,1.41s-.65,1.41-1.44,1.41h-.42c-.8,0-1.44-.63-1.44-1.41s.65-1.41,1.44-1.41h.42Zm3.43-.5c.84,0,1.53.67,1.53,1.49v.14c0,.73-.57,1.34-1.32,1.41h-.12c-.8,0-1.45-.63-1.45-1.41v-.31c0-.35.14-.69.4-.94.22-.21.51-.35.83-.38h.13Zm-3.43,1.22h-.42c-.39,0-.7.31-.7.69s.32.69.7.69h.42c.39,0,.7-.31.7-.69s-.32-.69-.7-.69Zm3.44-.5h-.08c-.14.02-.27.08-.37.18-.12.11-.18.27-.18.43v.31c0,.38.32.69.69.69h.09c.36-.04.64-.34.64-.69v-.14c0-.43-.35-.77-.79-.77h0Zm2.41-3.35h.11c.74.07,1.31.68,1.31,1.41v.39c0,.66-.55,1.19-1.22,1.19h-.06c-.83,0-1.52-.64-1.59-1.46v-.12c0-.73.56-1.34,1.32-1.41h.13Zm0,.72h-.08c-.36.04-.64.34-.64.68v.09c.04.44.42.78.86.78h.06c.26,0,.48-.21.48-.47v-.39c0-.36-.28-.65-.62-.69h-.06Zm-8.15-5.53c.84-.59,2.01-.38,2.61.48.61.86.42,2.03-.42,2.62l-.59.42c-.84.59-2.01.38-2.61-.48-.61-.86-.42-2.03.42-2.62l.59-.42Zm2.02.9c-.37-.52-1.09-.66-1.6-.29l-.59.42c-.51.36-.63,1.08-.26,1.6.37.52,1.09.66,1.6.29l.59-.42c.51-.36.63-1.08.26-1.6Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Couleur</p>
                        <span class="text-body-1 font-bold">{{listingDetails.couleur}}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.surfacetotal" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_square">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Surface" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.63,5c.2,0,.37.16.37.37v13.26c0,.2-.16.37-.37.37H5.37c-.2,0-.37-.17-.37-.37V5.37c0-.2.16-.37.37-.37h13.26Zm-.41.78H5.78v12.44h12.44V5.78Zm-10.03,10.74l.03.04s-.04-.05-.06-.08v-.02s-.02-.03-.03-.04c0,0,0-.01,0-.02,0-.02,0-.03,0-.05,0,0,0-.01,0-.02v-.02s0-.04,0-.04h0s0-.03,0-.03c0-.02,0-.03,0-.05v-.02s.02-.03.02-.04v-.02s.02-.02.03-.03c0,0,0,0,0,0v-.02s.03-.01.03-.02h0s0-.02,0-.02l1.13-1.07c.16-.15.4-.14.55.02.13.14.14.35.03.5l-.05.05-.41.39h6.4v-6.41l-.4.42c-.15.16-.39.16-.55.02-.14-.13-.16-.34-.06-.49l.04-.06,1.07-1.13.02-.02.02-.02h-.01s0,0,0,0l.02-.02s0,0,0,0h0s.04-.02.04-.02c0,0,.01,0,.02-.01.01,0,.03-.01.04-.02h.02s.03-.01.05-.02c0,0,.01,0,.02,0,.01,0,.02,0,.04,0h.02s.01,0,.01,0c0,0,.01,0,.02,0,.02,0,.03,0,.05,0h.02s.03.02.04.02c0,0,.01,0,.02.01.01,0,.02.01.03.02,0,0,0,0,0,0h.02s.01.03.02.03h0s0,.02,0,.02l1.07,1.13c.15.16.14.4-.02.55-.14.13-.35.14-.5.03l-.05-.05-.4-.42v6.8c0,.19-.14.35-.32.38h-.07s-6.81,0-6.81,0l.43.4c.16.15.16.39.02.55-.13.14-.34.16-.49.06l-.06-.04-1.13-1.07-.02-.02-.03-.04h0s.02.02.02.02v-.02Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Surface totale du terrain</p>
                        <span class="text-body-1 font-bold">{{ listingDetails.surfacetotal }} m²</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.surface" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_square">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Surface" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.63,5c.2,0,.37.16.37.37v13.26c0,.2-.16.37-.37.37H5.37c-.2,0-.37-.17-.37-.37V5.37c0-.2.16-.37.37-.37h13.26Zm-.41.78H5.78v12.44h12.44V5.78Zm-10.03,10.74l.03.04s-.04-.05-.06-.08v-.02s-.02-.03-.03-.04c0,0,0-.01,0-.02,0-.02,0-.03,0-.05,0,0,0-.01,0-.02v-.02s0-.04,0-.04h0s0-.03,0-.03c0-.02,0-.03,0-.05v-.02s.02-.03.02-.04v-.02s.02-.02.03-.03c0,0,0,0,0,0v-.02s.03-.01.03-.02h0s0-.02,0-.02l1.13-1.07c.16-.15.4-.14.55.02.13.14.14.35.03.5l-.05.05-.41.39h6.4v-6.41l-.4.42c-.15.16-.39.16-.55.02-.14-.13-.16-.34-.06-.49l.04-.06,1.07-1.13.02-.02.02-.02h-.01s0,0,0,0l.02-.02s0,0,0,0h0s.04-.02.04-.02c0,0,.01,0,.02-.01.01,0,.03-.01.04-.02h.02s.03-.01.05-.02c0,0,.01,0,.02,0,.01,0,.02,0,.04,0h.02s.01,0,.01,0c0,0,.01,0,.02,0,.02,0,.03,0,.05,0h.02s.03.02.04.02c0,0,.01,0,.02.01.01,0,.02.01.03.02,0,0,0,0,0,0h.02s.01.03.02.03h0s0,.02,0,.02l1.07,1.13c.15.16.14.4-.02.55-.14.13-.35.14-.5.03l-.05-.05-.4-.42v6.8c0,.19-.14.35-.32.38h-.07s-6.81,0-6.81,0l.43.4c.16.15.16.39.02.55-.13.14-.34.16-.49.06l-.06-.04-1.13-1.07-.02-.02-.03-.04h0s.02.02.02.02v-.02Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Surface habitable</p>
                        <span class="text-body-1 font-bold">{{ listingDetails.surface }} m²</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.classeenergie" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_energy_rate">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Class" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.12,16.05c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.17-.38-.37v-2.21c0-.2.17-.37.38-.37h12.24Zm-.38.74H6.26v1.47h11.47v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h10.71Zm-.38.74H6.26v1.47h9.94v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h9.18Zm-.38.74H6.26v1.47h8.41v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37h-7.65c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h7.65Zm-.38.74h-6.88v1.47h6.88v-1.47Z"></path></svg>
                  <div><p class="mb-sm flex text-caption opacity-dim-1">Classe énergie
                        <button class="ml-md" type="button">
                          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="En savoir plus" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><title>En savoir plus</title><path d="m12,16.82c.57,0,1.03-.46,1.03-1.03v-4.64c0-.57-.46-1.03-1.03-1.03s-1.03.46-1.03,1.03v4.64c0,.57.46,1.03,1.03,1.03Zm0-7.66c.78,0,1.41-.63,1.41-1.41s-.63-1.41-1.41-1.41-1.41.63-1.41,1.41.63,1.41,1.41,1.41Z"></path><path fill-rule="evenodd" d="m12,2C6.48,2,2,6.48,2,12s4.48,10,10,10,10-4.48,10-10S17.52,2,12,2Zm-7.89,10c0-4.36,3.53-7.89,7.89-7.89s7.89,3.53,7.89,7.89-3.53,7.89-7.89,7.89-7.89-3.53-7.89-7.89Z"></path></svg>
                        </button>
                      </p>
                      <div data-test-id="energy-criteria" class="styles_EnergyCriteria__fmvTN styles_isEnergyRate__ZZQxP">
                        <div class="styles_item__YzUPI styles_letterA__gWihy"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'A' }"
                        >A</div>
                        <div class="styles_item__YzUPI styles_letterB__UT_cC"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'B' }"
                        >B</div>
                        <div class="styles_item__YzUPI styles_letterC__7ZJX7"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'C' }"
                        >C</div>
                        <div class="styles_item__YzUPI styles_letterD__vfOHa"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'D' }"
                        >D</div>
                        <div class="styles_item__YzUPI styles_letterE__dw7OU"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'E' }"
                        >E</div>
                        <div class="styles_item__YzUPI styles_letterF__gl17j"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'F' }"
                        >F</div>
                        <div class="styles_item__YzUPI styles_letterG__3U3eG"
                        :class="{ 'styles_active__6vnrC': listingDetails.classeenergie === 'G' }"
                        >G</div>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.exterieur" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_outside_access">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Terrace" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12.39,8.57v5.33h3.48c.21,0,.39.17.39.38,0,.19-.14.34-.32.37h-.07s-.77,0-.77,0v4.95c0,.21-.17.38-.39.38-.19,0-.35-.13-.38-.31v-.07s0-4.95,0-4.95h-1.93v4.57h.77c.21,0,.39.17.39.38,0,.19-.14.34-.32.37h-.07s-2.32,0-2.32,0c-.21,0-.39-.17-.39-.38,0-.19.14-.34.32-.37h.07s.77,0,.77,0v-4.57h-1.93v4.95c0,.21-.17.38-.39.38-.19,0-.35-.13-.38-.31v-.07s0-4.95,0-4.95h-.77c-.21,0-.39-.17-.39-.38,0-.19.14-.34.32-.37h.07s3.48,0,3.48,0v-5.33h-5.38c-.38,0-.55-.41-.3-.64l.06-.04,5.77-3.81c.14-.1.34-.1.48,0l5.77,3.81c.33.22.16.69-.24.69h-5.38ZM3.89,13.9c.19,0,.35.13.38.31v.07s0,1.9,0,1.9h2.7c.2,0,.36.15.38.33v.05s.76,2.96.76,2.96c.05.2-.07.41-.28.46-.18.05-.37-.05-.45-.21l-.02-.06-.7-2.76h-2.4v2.67c0,.21-.17.38-.39.38-.19,0-.35-.13-.38-.31v-.07s0-5.33,0-5.33c0-.21.17-.38.39-.38Zm16.23,0c.21,0,.39.17.39.38v5.4c-.04.18-.2.31-.39.31-.21,0-.39-.17-.39-.38v-2.67h-2.4l-.7,2.76-.02.06c-.08.16-.26.26-.45.21-.21-.05-.33-.26-.28-.46l.75-2.96v-.05c.04-.19.2-.33.4-.33h2.7v-1.97c.04-.18.2-.31.39-.31ZM12,4.85l-4.48,2.96h8.97l-4.48-2.96Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Extérieur</p>
                        <span class="text-body-1 font-bold">{{  listingDetails.exterieur }}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.ges" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_ges">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Class" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18.12,16.05c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.17-.38-.37v-2.21c0-.2.17-.37.38-.37h12.24Zm-.38.74H6.26v1.47h11.47v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h10.71Zm-.38.74H6.26v1.47h9.94v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37H5.88c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h9.18Zm-.38.74H6.26v1.47h8.41v-1.47Zm-1.15-4.42c.21,0,.38.16.38.37v2.21c0,.2-.17.37-.38.37h-7.65c-.21,0-.38-.16-.38-.37v-2.21c0-.2.17-.37.38-.37h7.65Zm-.38.74h-6.88v1.47h6.88v-1.47Z"></path></svg>
                  <div><p class="mb-sm flex text-caption opacity-dim-1">GES
                        <button class="ml-md" type="button">
                          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="En savoir plus" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16" data-spark-component="icon" aria-hidden="true" focusable="false"><title>En savoir plus</title><path d="m12,16.82c.57,0,1.03-.46,1.03-1.03v-4.64c0-.57-.46-1.03-1.03-1.03s-1.03.46-1.03,1.03v4.64c0,.57.46,1.03,1.03,1.03Zm0-7.66c.78,0,1.41-.63,1.41-1.41s-.63-1.41-1.41-1.41-1.41.63-1.41,1.41.63,1.41,1.41,1.41Z"></path><path fill-rule="evenodd" d="m12,2C6.48,2,2,6.48,2,12s4.48,10,10,10,10-4.48,10-10S17.52,2,12,2Zm-7.89,10c0-4.36,3.53-7.89,7.89-7.89s7.89,3.53,7.89,7.89-3.53,7.89-7.89,7.89-7.89-3.53-7.89-7.89Z"></path></svg>
                        </button>
                      </p>
                      <div data-test-id="energy-criteria" class="styles_EnergyCriteria__fmvTN styles_isGES__7aDSC">
                        <div class="styles_item__YzUPI styles_letterA__gWihy"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'A' }"
                        >A</div>
                        <div class="styles_item__YzUPI styles_letterB__UT_cC"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'B' }"
                        >B</div>
                        <div class="styles_item__YzUPI styles_letterC__7ZJX7"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'C' }"
                        >C</div>
                        <div class="styles_item__YzUPI styles_letterD__vfOHa"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'D' }"
                        >D</div>
                        <div class="styles_item__YzUPI styles_letterE__dw7OU"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'E' }"
                        >E</div>
                        <div class="styles_item__YzUPI styles_letterF__gl17j"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'F' }"
                        >F</div>
                        <div class="styles_item__YzUPI styles_letterG__3U3eG"
                        :class="{ 'styles_active__6vnrC': listingDetails.ges === 'G' }"
                        >G</div>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.nombredetage" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_nb_floors_building">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Floor" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m17.81,4.14c.12.14.1.35-.02.48l-.05.05-.96.7v4.95h1.85c.2,0,.37.17.37.37,0,.18-.13.34-.3.37h-.07s-2.59,0-2.59,0v1.86c0,.18-.13.34-.3.37h-.07s-2.59,0-2.59,0v1.86c0,.18-.13.34-.3.37h-.07s-2.59,0-2.59,0v1.86c0,.18-.13.33-.3.37h-.07s-1.85,0-1.85,0h0s-.74,0-.74,0h0s0,0,0,0v1.86c0,.21-.17.37-.37.37-.18,0-.33-.13-.36-.31v-.07s0-2.24,0-2.24c0-.21.17-.37.37-.37h.37v-4.61l-1.52,1.11c-.17.13-.42.1-.55-.07-.12-.14-.1-.35.02-.48l.05-.05,12.11-8.85c.17-.13.42-.1.55.07Zm-7.7,6.1l-2.22,1.62v5.16h1.48s0-1.86,0-1.86c0-.21.17-.37.37-.37h.37v-4.54Zm2.96-2.17l-2.22,1.62v5.09h1.48s0-1.86,0-1.86c0-.21.17-.37.37-.37h.37v-4.47Zm2.96-2.17l-2.22,1.62v5.02h1.48s0-1.86,0-1.86c0-.21.17-.37.37-.37h.37v-4.4Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Nombre d’étages dans l’immeuble</p>
                        <span class="text-body-1 font-bold">{{ listingDetails.nombredetage }}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.building_year" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_building_year">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Listing" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m18,14.36c.83,0,1.5.7,1.5,1.57s-.61,1.51-1.39,1.57h-.11s-8.25,0-8.25,0c-.83,0-1.5-.7-1.5-1.57s.61-1.51,1.39-1.57h.11s8.25,0,8.25,0Zm-12.75.13l.75.79.74-.78c.11-.12.28-.16.43-.12.15.04.27.17.31.33.04.16,0,.33-.11.45l-.75.78.75.78c.17.18.17.47,0,.65-.07.08-.17.13-.27.14-.12,0-.23-.05-.31-.14l-.78-.8-.76.8c-.08.09-.19.14-.31.14-.12,0-.23-.05-.31-.14-.09-.08-.13-.2-.13-.32s.05-.24.13-.32l.75-.79-.75-.77c-.08-.09-.13-.21-.13-.33s.05-.24.13-.33c.17-.18.45-.18.62,0Zm12.75.65h-8.25c-.41,0-.75.35-.75.79,0,.4.29.74.66.78h.09s8.25,0,8.25,0c.41,0,.75-.35.75-.79s-.34-.79-.75-.79Zm0-4.71c.83,0,1.5.7,1.5,1.57s-.61,1.51-1.39,1.57h-.11s-8.25,0-8.25,0c-.83,0-1.5-.7-1.5-1.57s.61-1.51,1.39-1.57h.11s8.25,0,8.25,0Zm-12.75.13l.75.79.74-.78c.11-.12.28-.16.43-.12.15.04.27.17.31.33.04.16,0,.33-.11.45l-.75.78.75.78c.17.18.17.47,0,.65-.07.08-.17.13-.27.14-.12,0-.23-.05-.31-.14l-.78-.8-.76.8c-.08.09-.19.14-.31.14-.12,0-.23-.05-.31-.14-.09-.08-.13-.2-.13-.32s.05-.24.13-.32l.75-.79-.75-.77c-.08-.09-.13-.21-.13-.33s.05-.24.13-.33c.17-.18.45-.18.62,0Zm12.75.65h-8.25c-.41,0-.75.35-.75.79,0,.4.29.74.66.78h.09s8.25,0,8.25,0c.41,0,.75-.35.75-.79s-.34-.79-.75-.79Zm0-4.71c.83,0,1.5.7,1.5,1.57s-.61,1.51-1.39,1.57h-.11s-8.25,0-8.25,0c-.83,0-1.5-.7-1.5-1.57s.61-1.51,1.39-1.57h.11s8.25,0,8.25,0Zm-12.75.13l.75.79.74-.78c.11-.12.28-.16.43-.12.15.04.27.17.31.33.04.16,0,.33-.11.45l-.75.78.75.78c.17.18.17.47,0,.65-.07.08-.17.13-.27.14-.12,0-.23-.05-.31-.14l-.78-.8-.76.8c-.08.09-.19.14-.31.14-.12,0-.23-.05-.31-.14-.09-.08-.13-.2-.13-.32s.05-.24.13-.32l.75-.79-.75-.77c-.08-.09-.13-.21-.13-.33s.05-.24.13-.33c.17-.18.45-.18.62,0Zm12.75.65h-8.25c-.41,0-.75.35-.75.79,0,.4.29.74.66.78h.09s8.25,0,8.25,0c.41,0,.75-.35.75-.79s-.34-.79-.75-.79Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Année de construction</p>
                        <span class="text-body-1 font-bold">{{ listingDetails.building_year }}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.honoraire" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_fai_included"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Honoraria" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m16.8,5c.19,0,.34.13.37.3v.07s0,5.4,0,5.4c0,.2-.17.37-.38.37-.19,0-.34-.13-.37-.3v-.07s0-5.03,0-5.03H7.31v12.53h9.11v-1.56c0-.18.13-.33.31-.36h.07c.19,0,.34.12.37.3v.07s0,1.93,0,1.93c0,.18-.13.33-.31.36h-.07s-9.87,0-9.87,0c-.19,0-.34-.13-.37-.3v-.07s0-2.32,0-2.32v-.02s-3.02-8.03-3.02-8.03c-.06-.17,0-.36.16-.44l.06-.03,2.8-.99v-1.43c0-.18.13-.33.31-.36h.07s9.87,0,9.87,0Zm1.63,4.24c.21-.35.67-.46,1.03-.26l.66.37c.36.2.49.65.28,1l-3.14,5.27c-.06.1-.14.18-.24.24-1.06.67-1.32.8-1.6.64-.25-.14-.29-.37-.25-1.22l.02-.45c0-.11.04-.22.1-.32l3.14-5.27Zm.66.37l-3.14,5.27-.02.33c0,.05,0,.1,0,.15v.3s.15-.09.15-.09c.11-.07.24-.14.38-.23l.15-.09,3.14-5.27-.66-.37Zm-12.54-2.02l-2.18.77,2.18,5.81v-6.58Zm7.97,5.52c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-5.32,0-5.32,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s5.32,0,5.32,0Zm0-2.21c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-5.32,0-5.32,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s5.32,0,5.32,0Zm-3.04-3.68c.21,0,.38.16.38.37,0,.18-.13.33-.31.36h-.07s-2.28,0-2.28,0c-.21,0-.38-.16-.38-.37,0-.18.13-.33.31-.36h.07s2.28,0,2.28,0Z"></path></svg>
                    <div>
                      <div><p class="mb-sm text-caption opacity-dim-1">Honoraires inclus</p>
                        <span class="text-body-1 font-bold">{{ listingDetails.honoraire }}</span>
                      </div>
                    </div>
                  </div>
                  <div v-if="listingDetails.reference" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_custom_ref"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Reference" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m17.61,4.5c.19,0,.35.13.38.31v.07s0,14.25,0,14.25c0,.18-.14.34-.32.37h-.07s-11.22,0-11.22,0c-.19,0-.35-.13-.38-.31v-.07s0-11.64,0-11.64c0-.07.02-.13.05-.19l.04-.05,2.33-2.61c.06-.07.14-.11.23-.12h.07s8.89,0,8.89,0Zm-.36.75h-8.26s-.03,2.25-.03,2.25c0,.22.03.75-.31.74h-.07s-1.84,0-1.84,0v10.5h10.5V5.25Zm-1.88,11.25c.21,0,.38.17.38.38,0,.18-.13.34-.31.37h-.07s-1.5,0-1.5,0c-.21,0-.38-.17-.38-.38,0-.18.13-.34.31-.37h.07s1.5,0,1.5,0Zm-3-3.75c.21,0,.38.17.38.38,0,.18-.13.34-.31.37h-.07s-3.75,0-3.75,0c-.21,0-.38-.17-.38-.38,0-.18.13-.34.31-.37h.07s3.75,0,3.75,0Zm2.25-1.5c.21,0,.38.17.38.38,0,.18-.13.34-.31.37h-.07s-6,0-6,0c-.21,0-.38-.17-.38-.38,0-.18.13-.34.31-.37h.07s6,0,6,0Zm-6.38-5.3l-1.5,1.55h0s1.5,0,1.5,0v-1.56Zm7.12.05c.21,0,.38.17.38.38,0,.18-.13.34-.31.37h-.07s-3.75,0-3.75,0c-.21,0-.38-.17-.38-.38,0-.18.13-.34.31-.37h.07s3.75,0,3.75,0Z"></path></svg>
                    <div><div><p class="mb-sm text-caption opacity-dim-1">Référence</p>
                      <span class="text-body-1 font-bold">{{ listingDetails.reference }}</span>
                    </div>
                  </div>
                  </div>

                  <div  v-if="listingDetails.etat" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_condition">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Like" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m4.94,19.5c-.52,0-.94-.41-.94-.93v-6.65c0-.48.4-.87.89-.87h4.54c.77,0,1.16-.76,1.33-1.39l.61-3.44c.07-.94.85-1.68,1.8-1.72,1.18,0,1.59.96,1.8,1.68.29,1.1.22,2.25-.19,3.31h2.85c.67-.02,1.31.26,1.74.76.55.81.75,1.8.56,2.75l-.59,4.47c0,.54-.22,1.06-.61,1.44-.39.38-.91.59-1.46.59H4.94Zm4.1-7.69h-4.18c-.06,0-.12.05-.12.11v6.65s.02.09.05.12c.03.03.07.05.12.05h4.12v-6.93Zm4.11-6.56c-.57.05-1.02.51-1.04,1.08l-.62,3.48c-.24,1.1-.86,1.78-1.68,1.96v6.97s7.45,0,7.45,0c.72,0,1.29-.57,1.29-1.28l.6-4.56c.15-.74,0-1.51-.4-2.15-.29-.33-.72-.51-1.16-.49h-1.94c-1.29,0-1.54-.03-1.71-.27-.07-.12-.09-.26-.05-.39.45-1.01.56-2.13.32-3.21-.31-1.06-.71-1.15-1.06-1.15Z"></path></svg>
                    <div><p class="mb-sm text-caption opacity-dim-1">État</p>
                      <span class="text-body-1 font-bold">{{ listingDetails.etat }}</span>
                    </div>
                  </div>
                  <div  v-if="listingDetails.type" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_diy_type">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="DiyType" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m16.45,11.63c.19,0,.35.13.38.3v.07s0,1.1,0,1.1h.85c.2.33.31.7.31,1.11,0,1.01-.71,1.86-1.68,2.13l.02-.05c-.59,1.76-2.29,2.64-4.24,2.71-2.51,0-4.55-2.13-4.55-4.74,0-.2.17-.36.39-.36s.39.16.39.36c0,2.19,1.7,4.01,3.78,4.01,1.49-.06,2.79-.63,3.37-1.86-1.18-.1-2.11-1.05-2.11-2.2,0-.4.11-.78.31-1.11h.85v-1.1c0-.2.17-.37.39-.37.19,0,.35.13.38.3v.07s0,1.11,0,1.11h.77v-1.11c0-.2.17-.37.39-.37Zm.73,2.21h-3c-.03.12-.05.24-.05.37,0,.81.69,1.47,1.55,1.47s1.55-.66,1.55-1.47c0-.13-.02-.25-.05-.37Zm-.34-6.63c.43,0,.77.33.77.74v1.47c0,.41-.35.74-.77.74h-7.74v2.21c0,.41-.35.74-.77.74h-1.55c-.43,0-.77-.33-.77-.74v-2.21h0c0-1.86,1.01-2.88,2.91-2.94h.18s7.74,0,7.74,0Zm0,.74h-7.74c-1.53,0-2.26.65-2.31,2.06v.15h-.01v2.21h1.55v-2.58c0-.2.17-.37.39-.37h8.13v-1.47Zm-2.71-2.21c1.08,0,2.01.6,2.45,1.47h-.9c-.35-.45-.92-.74-1.55-.74s-1.2.29-1.55.74h-.9c.43-.87,1.37-1.47,2.45-1.47Zm3.1-.74c.21,0,.39.16.39.37,0,.18-.14.33-.32.36h-.07s-6.19,0-6.19,0c-.21,0-.39-.16-.39-.37,0-.18.14-.33.32-.36h.07s6.19,0,6.19,0Z"></path></svg>
                    <div><p class="mb-sm text-caption opacity-dim-1">Type</p>
                      <span class="text-body-1 font-bold">{{ listingDetails.type }}</span>
                    </div>
                  </div>
                  <div v-if="listingDetails.produit" class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_diy_product">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="DiyProduct" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m5.89,4.56l2.01,1.23c.1.04.18.12.22.22.03.1,0,.21-.05.3l-.47.7,3.65,3.66h0c.12-.14.3-.21.48-.21.11,0,.21.02.31.05l1.44-1.45c-.1-.3-.15-.62-.15-.94,0-1.71,1.39-3.11,3.1-3.11.37,0,.73.07,1.08.2.13.05.22.16.24.29.02.13-.02.27-.12.36l-1.46,1.33.21,1.02,1,.34,1.4-1.22c.1-.09.25-.12.38-.08.13.04.23.15.26.29.04.2.07.41.07.62,0,1.71-1.39,3.11-3.1,3.11-.38,0-.75-.07-1.1-.21l-.61.61,4.28,4.29c.35.34.55.81.56,1.3,0,.36-.16.7-.42.95l-.91.92c-.23.22-.53.35-.84.37h-.12c-.48,0-.94-.21-1.28-.56l-4.25-4.26-4.36,4.43c-.23.23-.54.37-.87.39h-.12c-.35,0-.69-.14-.94-.39-.25-.25-.4-.59-.39-.95,0-.35.14-.69.39-.94l5.1-5.16c-.04-.1-.07-.21-.07-.32,0-.19.07-.36.2-.5l.02-.02-3.67-3.66-.68.47c-.08.07-.19.11-.3.09-.1-.04-.18-.12-.22-.22l-1.23-2.01c-.09-.15-.07-.35.05-.47l.4-.4.4-.4c.13-.12.32-.15.47-.05Zm7.25,7.18c-.13,0-.25.03-.35.11l-.98.93c-.15.24-.17.53-.07.78.05.11.13.21.23.3.03.03.05.06.07.1l4.44,4.46c.19.2.45.32.73.33.15,0,.29-.05.4-.15l.91-.92c.1-.11.15-.24.15-.39,0-.29-.12-.57-.33-.78l-4.42-4.45s-.08-.04-.11-.07c-.04-.04-.07-.08-.12-.11-.16-.1-.36-.13-.56-.13Zm-2.16.95l-5.02,5.08c-.11.1-.17.24-.17.39,0,.15.06.3.17.4.08.09.19.14.3.16h.09c.15,0,.29-.05.39-.16l4.44-4.45c-.15-.23-.24-.49-.26-.76-.02-.18-.01-.36.03-.54l.03-.12Zm.8-1.42l-.26.2s-.02.02-.03.03c-.02.02-.04.04-.07.06l-.22.22s.02.01.03.02h.04s.19.19.19.19l.52-.51-.18-.18h-.01s-.01-.02-.01-.02Zm3.05-4.78c-.45.43-.72,1.02-.73,1.64,0,.31.08.61.21.88.06.15.03.31-.09.43l-1.55,1.55c.14-.04.29-.06.43-.06.33-.03.67.05.96.23l.87-.88c.12-.12.3-.15.45-.07.67.32,1.45.29,2.1-.06.65-.35,1.09-.99,1.19-1.73l-.97.87c-.1.09-.25.12-.38.08l-1.42-.47c-.13-.04-.23-.16-.26-.29l-.29-1.47c-.03-.13.01-.27.12-.36l1.04-.92c-.62-.02-1.22.2-1.68.63Zm-9.04-1.11l-.19.19s-.06.05-.1.07l-.14.16.84,1.4.53-.36.4-.6-1.35-.86Z"></path></svg>
                    <div><p class="mb-sm text-caption opacity-dim-1">Produit</p>
                      <span class="text-body-1 font-bold">{{ listingDetails.produit }}</span>
                    </div>
                  </div>
            </div>
          </div>
        
          <!-- Criteres -->
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined"><div data-qa-id="adview_profile_part" class="overflow-hidden"><div class="mb-md flex justify-between"><div class="items-center overflow-hidden custom:flex custom:w-4/5"><div class="relative flex w-sz-64">
            <router-link v-if="listingDetails.user_id !== undefined" :key="listingDetails.user_id"
                    :to="{ name: 'userUnique', params: { user_id: listingDetails.user_id } }"
             rel="nofollow" class="styles_profilePicture__HJ2JL">
            <img :src="get_user_thumbnail" class="_1cnjm" alt="avatar de l’utilisateur"></router-link></div><div class="mt-lg truncate custom:ml-md custom:mt-none">
              <router-link v-if="listingDetails.user_id !== undefined" :key="listingDetails.user_id"
                    :to="{ name: 'userUnique', params: { user_id: listingDetails.user_id } }" rel="nofollow" class="block truncate text-headline-2 hover:underline">{{ get_users.name }}</router-link><div></div><div></div></div></div><button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support shrink-0" aria-busy="false" aria-live="off"><div>Suivre</div></button></div><div class="flex flex-col gap-md"><span class="flex items-center text-body-1"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="AccountOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-sm " data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12,4.19c-1.6,0-2.93,1.26-2.93,2.84s1.33,2.84,2.93,2.84,2.93-1.26,2.93-2.84-1.33-2.84-2.93-2.84Zm-5.23,2.84c0-2.77,2.32-5.03,5.23-5.03s5.23,2.27,5.23,5.03-2.32,5.03-5.23,5.03-5.23-2.27-5.23-5.03Zm5.23,8.54c-1.85,0-3.63.71-4.95,1.98-1.01.97-1.68,2.21-1.94,3.55-.12.6-.72.99-1.34.88-.63-.11-1.04-.68-.92-1.28.34-1.76,1.23-3.4,2.56-4.69,1.74-1.68,4.11-2.63,6.59-2.63s4.84.95,6.59,2.63c1.34,1.29,2.22,2.93,2.56,4.69.12.6-.3,1.17-.92,1.28-.63.11-1.23-.28-1.34-.88-.26-1.34-.93-2.58-1.94-3.55-1.31-1.27-3.09-1.98-4.95-1.98Z"></path></svg>Membre depuis décembre 2013</span><span class="flex items-center text-body-2 mt-sm"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ClockOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12,3.97C7.56,3.97,3.97,7.56,3.97,12s3.6,8.03,8.03,8.03,8.03-3.6,8.03-8.03S16.44,3.97,12,3.97ZM2,12C2,6.48,6.48,2,12,2s10,4.48,10,10-4.48,10-10,10S2,17.52,2,12Z"></path><path fill-rule="evenodd" d="m12,7.55c.54,0,.98.44.98.98v3.1l3.29,3.83c.35.41.31,1.03-.11,1.39-.41.35-1.03.31-1.39-.11l-3.52-4.11c-.15-.18-.24-.41-.24-.64v-3.47c0-.54.44-.98.98-.98Z"></path></svg>Répond généralement dans les 3 heures</span></div><section><div></div></section></div></div>
        </article>

        <!--  colonne -->
        <aside id="aside" class="col-[1] row-[2] min-w-page-min custom:col-start-2 custom:col-end-3 custom:row-start-1 custom:row-end-3 custom:ml-[2rem] custom:flex custom:flex-col">
          <section class="rounded-sm bg-surface shadow mx-lg mb-xl mt-none lg:mx-none _1o09v">
            <div class="overflow-hidden border-neutral/dim-4 custom:border-b-sm custom:mx-xl custom:py-xl">
              <div>
                <div class="flex items-center truncate">
                  <div class="relative flex w-sz-64">
                    <router-link v-if="listingDetails.user_id !== undefined" :key="listingDetails.user_id"
                    :to="{ name: 'userUnique', params: { user_id: listingDetails.user_id } }"
                    class="styles_profilePicture__HJ2JL"
                    >
                      <img :src="get_user_thumbnail" class="_1cnjm">
                    </router-link>
                  </div>
                  <div class="ml-lg flex flex-col overflow-hidden">
                    <router-link v-if="listingDetails.user_id !== undefined" :key="listingDetails.user_id"
                    :to="{ name: 'userUnique', params: { user_id: listingDetails.user_id } }" rel="nofollow" class="block truncate text-headline-2 hover:underline">
                    {{ get_users.name }}</router-link>
                    <div>

                    </div>
                    <div>

                    </div>
                  </div>
                  <a aria-label="Accéder à mon profil public" class="grow" rel="nofollow" href="/profil/4b435e44-8ef7-4113-b52e-265de8108ea7/offres">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ArrowVerticalRight" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 ml-auto" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m7.3,2.28c-.38.38-.4,1.02-.03,1.41l7.69,8.31-7.69,8.31c-.37.4-.36,1.03.03,1.41.38.38.99.37,1.36-.03l7.87-8.51c.15-.16.27-.34.35-.54.08-.21.12-.43.12-.65s-.04-.44-.12-.65c-.08-.2-.2-.38-.35-.54L8.66,2.31c-.37-.4-.98-.41-1.36-.03Z"></path></svg></a></div><div class="mt-lg grid gap-md"></div></div><div class="_1o09v"><span class="flex items-center text-body-2 pt-lg">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="ClockOutline" fill="currentColor" stroke="none" class="fill-current text-current w-sz-16 h-sz-16 mr-sm" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m12,3.97C7.56,3.97,3.97,7.56,3.97,12s3.6,8.03,8.03,8.03,8.03-3.6,8.03-8.03S16.44,3.97,12,3.97ZM2,12C2,6.48,6.48,2,12,2s10,4.48,10,10-4.48,10-10,10S2,17.52,2,12Z"></path><path fill-rule="evenodd" d="m12,7.55c.54,0,.98.44.98.98v3.1l3.29,3.83c.35.41.31,1.03-.11,1.39-.41.35-1.03.31-1.39-.11l-3.52-4.11c-.15-.18-.24-.41-.24-.64v-3.47c0-.54.44-.98.98-.98Z"></path></svg>Répond généralement dans les 3 heures</span>
                  </div>
                </div>
                <div class="mx-lg my-xl flex flex-col gap-md">

                  <div v-if="userLoggedIn"  class="mt-xl">
                    <div class="mb-md flex-1 last:mb-none" data-qa-id="adview_button_contact_contact">
                      <div class="_1o09v">
                        <button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-support text-on-support hover:bg-support-hovered enabled:active:bg-support-pressed focus-visible:bg-support-focused w-full" aria-busy="false" aria-live="off" data-pub-id="adview_button_contact_contact">Envoyer un message</button>
                      </div>
                    </div>
                    <div class="mb-md flex-1 last:mb-none" data-pub-id="clicknumero">
                      <div data-tip="" data-place="bottom" data-for="tooltip-no-salesmen" class="">
                        <button v-if="showNumber" data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support w-full" aria-busy="false" aria-live="off" :title="get_users.phone">{{ get_users.phone }}</button>
                        <button v-else @click="afficherNumero" data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-transparent border-sm border-current min-w-sz-44 h-sz-44 rounded-lg hover:bg-support/dim-5 enabled:active:bg-support/dim-5 focus-visible:bg-support/dim-5 text-support w-full" aria-busy="false" aria-live="off" title="voir le numéro">Voir le numéro</button>
                        
                      </div>
                    </div>
                  </div>
                  <div v-else class="_1o09v">
                    <button data-spark-component="button" class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg bg-support text-on-support hover:bg-support-hovered enabled:active:bg-support-pressed focus-visible:bg-support-focused w-full" aria-busy="false" aria-live="off" data-pub-id="adview_button_contact_contact">Message</button>
                  </div>
                </div>
          </section>
        </aside>

        <h3>Spécifications de la chambre :</h3>
                                                                    <ul>
                                                                        <li v-for="romspec in romspecs[listingDetails.id]" :key="romspec.id">
                                                                            {{ romspec.name }} - {{ romspec.description }} - {{ romspec.price }}
                                                                        </li>
                                                                    </ul>


      </article>

    </div>
  </main>







  <!-- <div>
  
          <h1 style="padding-top: 100px;">{{ listingDetails.name }}</h1>
          <p>{{ listingDetails.description }}</p>
          <p>Categories: {{ listingDetails.categories }}</p>
          <p>Amenities: {{ listingDetails.amenities }}</p>
  
          <div v-if="listingDetails.photos">
            <h2>Photos</h2>
            <img
              v-for="(photo, index) in parsePhotos(listingDetails.photos)"
              :key="index"
              :src="'/uploads/listing_images/' + photo"
              :alt="'Photo ' + (index + 1)"
            />
          </div>
        </div> --></template>
    
<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';

// import Social from '/views/Presentation/annonces/social.vue';
const route = useRoute();
const isLogin = ref(false);
const store = useAuthStore();
const userLoggedIn = computed(() => store.isLogin);
const listingDetails = ref({});
const get_phrase = ref({});
const get_amenity = ref({});
const slugs = ref('');
const get_user_thumbnail = ref('');
const get_user_detail = ref('');
const get_users = ref('');
const romspecs  = ref([]);
const category = ref(null);
const showNumber = ref(false);
// const get_user = ref('');
const id = ref(null);
// const claimingStatus = ref(0);
const parsePhotos = (photosString) => {
  try {
    return JSON.parse(photosString);
  } catch (error) {
    console.error('Error parsing photos:', error);
    return [];
  }
};
const fetchCategory = (categories) => {
  axios.get('/api/get_categories')
    .then(response => {
      const allCategories = response.data;
      categories.forEach(categoryId => {
        const foundCategory = allCategories.find(cat => cat.id === categoryId);
        if (foundCategory && foundCategory.name) {
          category.value = foundCategory;
        } else {
          console.error(`Category with ID ${categoryId} not found or missing name property.`);
        }
      });
    })
    .catch(error => {
      console.error('Error fetching categories:', error);
    });
};
id.value = route.params.id;

onMounted(async () => {
  try {
    // Use the outer id variable, not the one defined in onMounted
    const currentId = id.value;
    if (!currentId) {
      console.error('Error: Listing ID is undefined');
      return;
    }

    const slug = await axios.get(`/api/get_slug_name/${currentId}`);
    // console.log('Slug name:', slug.data);
    slugs.value = slug.data;

    // const amnety = await axios.get(`/api/get_amenities/`);
    // console.log('Slug name:', amnety.data);
    // get_amenity.value = amnety.data;


    const currentSlug = slugs.value;

    const response = await axios.get(`/home/listing/${currentSlug}/${currentId}`);
    console.log('Response from single listing:', response.data);
    listingDetails.value = response.data;
    fetchCategory(listingDetails.categories);

    const romspec = await axios.get(`/api/get_hotel_spec/${listingDetails.value.id}`);
    console.log('Response from Room spec:', romspec.data);
          
    romspecs.value[listingDetails.value.id] = romspec.data;

    const get_phrases = await axios.get('/api/get_phrase');
    console.log('Response from getphrase:', get_phrases.data);
    get_phrase.value = get_phrases.data;
    // claimingStatus.value = response.data.status;
    const get_user_thumbnails = await axios.get(`/api/get_user_thumbnail/${listingDetails.value.user_id}`);
    console.log('User thumbail:', get_user_thumbnails.data)
    get_user_thumbnail.value = get_user_thumbnails.data;
    const get_user = await axios.get(`/api/get_all_users/${listingDetails.value.user_id}`);
    console.log('Get user:', get_user.data);
    get_users.value = get_user.data;

  } catch (error) {
    console.error('Error fetching single listing:', error);
  }
});
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
function formatPrice(price) {
  const cleanPrice = price.replace(/[€\s]/g, '');
  const numberPrice = parseInt(cleanPrice);
  return numberPrice.toLocaleString('fr-FR');
}
function afficherNumero() {
    // showNumber.value = false; // Utiliser showNumber comme une référence
    setTimeout(() => {
        showNumber.value = true; // Utiliser showNumber comme une référence
    }, 3000); // 3 secondes
}
const cheapestRoom = (listingId) => {
  const rooms = romspecs.value[listingId];
    if (rooms && rooms.length > 0) {
      return rooms.reduce((min, romspecs) => (min.price < romspecs.price ? min : romspecs));
    }
  return null;
};
</script>
<script>
import Lightgallery from 'lightgallery/vue';
import lgZoom from 'lightgallery/plugins/zoom';
import lgVideo from 'lightgallery/plugins/video';

export default {
  name: 'App',
  components: {
    Lightgallery,
  },
  data: () => ({
    plugins: [lgZoom, lgVideo],
  }),
  methods: {

    onInit: () => {
      console.log('lightGallery has been initialized');
    },
    onBeforeSlide: () => {
      console.log('calling before slide');
    },
  },
};
</script> 
  
<style lang="css" scoped>
@import url('https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css');
@import url('https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lg-zoom.css');
@import url('https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lg-video.css');
</style>

    
<style>.gallery {
  display: flex;
  flex-wrap: wrap;
}

.gallery .imgcontent {
  max-width: 200px;
  width: 100%;
  margin-right: 20px;
}

.gallery .imgcontent img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.lightgallery-vue{
  overflow: hidden;
}
.img-responsive{
  height: 100%;
  object-fit: cover;
}
.first-of-type\:pr-md:nth-child(2) {
    padding-right: var(--spacing-md);
}
@keyframes styles_beating__wDdVu {
    0% {
        transform: scale(1)
    }

    40% {
        transform: scale(1.15)
    }

    70% {
        transform: scale(.95)
    }

    to {
        transform: scale(1)
    }
}

.styles_FavoriteButtonBubble__Vwihy {
    height: 4rem;
    width: 4rem
}

.styles_FavoriteButtonBubble__Vwihy.styles_disabled__eLQNS {
    cursor: not-allowed
}

.styles_FavoriteButtonBubble__Vwihy.styles_disabled__eLQNS svg {
    opacity: .3
}

.styles_FavoriteButtonBubble__Vwihy.styles_beating__wDdVu {
    animation: styles_beating__wDdVu .5s 1 alternate
}

.styles_locationContainer__pP74A {
    position: relative
}

.styles_locationContainerList__8einy {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #fff;
    max-height: 30vh;
    overflow: auto;
    z-index: 1000;
    border-radius: 4px;
    box-shadow: 0 1px 5px 0 rgba(0,0,0,.2),0 3px 1px -2px rgba(0,0,0,.04),0 2px 2px 0 rgba(0,0,0,.04)
}

.styles_locationContainerList__8einy>li {
    transition: background-color .25s ease-in-out
}

.styles_locationContainerList__8einy>li:focus,.styles_locationContainerList__8einy>li:hover {
    background: #e6ebef
}

.styles_EnergyCriteria__fmvTN {
    display: flex;
    width: 100%;
    align-items: center;
    font-size: 1rem
}

.styles_item__YzUPI {
    padding: 0 .35rem;
    align-items: center;
    display: flex;
    height: 1.5rem;
    color: #fff;
    font-weight: 600
}

.styles_active__6vnrC {
    font-size: 1.4rem;
    height: 2.2rem;
    padding: 0 .5rem;
    border: 2px solid #fff;
    box-sizing: content-box;
    box-shadow: 0 2px 4px rgba(0,0,0,.05);
    border-radius: 6px
}

.styles_isEnergyRate__ZZQxP .styles_letterA__gWihy {
    background: #379932
}

.styles_isEnergyRate__ZZQxP .styles_letterB__UT_cC {
    background: #3acc31
}

.styles_isEnergyRate__ZZQxP .styles_letterC__7ZJX7 {
    background: #cdfd33;
    color: #1a1a1a
}

.styles_isEnergyRate__ZZQxP .styles_letterD__vfOHa {
    background: #fbea49;
    color: #1a1a1a
}

.styles_isEnergyRate__ZZQxP .styles_letterE__dw7OU {
    background: #fccc2f;
    color: #1a1a1a
}

.styles_isEnergyRate__ZZQxP .styles_letterF__gl17j {
    background: #fb9c34
}

.styles_isEnergyRate__ZZQxP .styles_letterG__3U3eG {
    background: #fa1c1f
}

.styles_isEnergyRate__ZZQxP .styles_letterH__ONN7D {
    background: #4d4d4d
}

.styles_isEnergyRate__ZZQxP .styles_letterI__KvAIB {
    background: #151515
}

.styles_isGES__7aDSC .styles_letterA__gWihy {
    background: #f6edfe;
    color: #1a1a1a
}

.styles_isGES__7aDSC .styles_letterB__UT_cC {
    background: #e4c7fb;
    color: #1a1a1a
}

.styles_isGES__7aDSC .styles_letterC__7ZJX7 {
    background: #d2adf1;
    color: #1a1a1a
}

.styles_isGES__7aDSC .styles_letterD__vfOHa {
    background: #c99aef;
    color: #1a1a1a
}

.styles_isGES__7aDSC .styles_letterE__dw7OU {
    background: #b77ae9
}

.styles_isGES__7aDSC .styles_letterF__gl17j {
    background: #a659e9
}

.styles_isGES__7aDSC .styles_letterG__3U3eG {
    background: #8835d9
}

.styles_isGES__7aDSC .styles_letterH__ONN7D {
    background: #4d4d4d
}

.styles_isGES__7aDSC .styles_letterI__KvAIB {
    background: #151515
}

.styles_Graphic__ywlbv {
    width: 90%;
    max-width: 35rem;
    margin: 0 auto;
    padding: 2.4rem 0
}

.styles_content__neFwL {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 .8rem;
    height: 3rem
}

.styles_arrow__tLsWL {
    width: 0;
    height: 0;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-left: 15px solid transparent
}

.styles_active__om40W .styles_content__neFwL {
    padding: 0 0 0 .8rem
}

.styles_active__om40W .styles_activeContent__1yLmU {
    font-size: 2.3rem;
    background: inherit;
    border: 2px solid #fff;
    box-sizing: content-box;
    box-shadow: 0 1px 4px rgba(0,0,0,.2);
    border-radius: 6px;
    padding: 0 .8rem
}

.styles_graphic__UXv2z {
    margin: .8rem 0
}

.styles_item__h70Kc {
    display: flex;
    align-items: center;
    margin-bottom: .4rem;
    font-weight: 600
}

.styles_item__h70Kc:last-child {
    margin-bottom: 0
}

.styles_itemA__jIhLX .styles_content__neFwL {
    width: 30%
}

.styles_itemB__2FiRJ .styles_content__neFwL {
    width: 38%
}

.styles_itemC__JHvO7 .styles_content__neFwL {
    width: 46%
}

.styles_itemD__JypgN .styles_content__neFwL {
    width: 54%
}

.styles_itemE__Y1HRB .styles_content__neFwL {
    width: 62%
}

.styles_itemF__yUJoD .styles_content__neFwL {
    width: 70%
}

.styles_itemG__KFH1h .styles_content__neFwL {
    width: 78%
}

.styles_itemH__B2UZv .styles_content__neFwL {
    width: 86%
}

.styles_itemI__p2WFm .styles_content__neFwL {
    width: 94%
}

.styles_isEnergyRate__tKR1Z .styles_item__h70Kc {
    color: #1a1a1a
}

.styles_isEnergyRate__tKR1Z .styles_itemA__jIhLX .styles_content__neFwL {
    background: #379932;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemA__jIhLX .styles_arrow__tLsWL {
    border-left-color: #379932
}

.styles_isEnergyRate__tKR1Z .styles_itemB__2FiRJ .styles_content__neFwL {
    background: #3acc31;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemB__2FiRJ .styles_arrow__tLsWL {
    border-left-color: #3acc31
}

.styles_isEnergyRate__tKR1Z .styles_itemC__JHvO7 .styles_content__neFwL {
    background: #cdfd33;
    color: #1a1a1a
}

.styles_isEnergyRate__tKR1Z .styles_itemC__JHvO7 .styles_arrow__tLsWL {
    border-left-color: #cdfd33
}

.styles_isEnergyRate__tKR1Z .styles_itemD__JypgN .styles_content__neFwL {
    background: #fbea49;
    color: #1a1a1a
}

.styles_isEnergyRate__tKR1Z .styles_itemD__JypgN .styles_arrow__tLsWL {
    border-left-color: #fbea49
}

.styles_isEnergyRate__tKR1Z .styles_itemE__Y1HRB .styles_content__neFwL {
    background: #fccc2f;
    color: #1a1a1a
}

.styles_isEnergyRate__tKR1Z .styles_itemE__Y1HRB .styles_arrow__tLsWL {
    border-left-color: #fccc2f
}

.styles_isEnergyRate__tKR1Z .styles_itemF__yUJoD .styles_content__neFwL {
    background: #fb9c34;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemF__yUJoD .styles_arrow__tLsWL {
    border-left-color: #fb9c34
}

.styles_isEnergyRate__tKR1Z .styles_itemG__KFH1h .styles_content__neFwL {
    background: #fa1c1f;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemG__KFH1h .styles_arrow__tLsWL {
    border-left-color: #fa1c1f
}

.styles_isEnergyRate__tKR1Z .styles_itemH__B2UZv .styles_content__neFwL {
    background: #4d4d4d;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemH__B2UZv .styles_arrow__tLsWL {
    border-left-color: #4d4d4d
}

.styles_isEnergyRate__tKR1Z .styles_itemI__p2WFm .styles_content__neFwL {
    background: #151515;
    color: #fff
}

.styles_isEnergyRate__tKR1Z .styles_itemI__p2WFm .styles_arrow__tLsWL {
    border-left-color: #151515
}

.styles_isGES__A7vtM .styles_item__h70Kc {
    color: #1a1a1a
}

.styles_isGES__A7vtM .styles_itemA__jIhLX .styles_content__neFwL {
    background: #f6edfe;
    color: #1a1a1a
}

.styles_isGES__A7vtM .styles_itemA__jIhLX .styles_arrow__tLsWL {
    border-left-color: #f6edfe
}

.styles_isGES__A7vtM .styles_itemB__2FiRJ .styles_content__neFwL {
    background: #e4c7fb;
    color: #1a1a1a
}

.styles_isGES__A7vtM .styles_itemB__2FiRJ .styles_arrow__tLsWL {
    border-left-color: #e4c7fb
}

.styles_isGES__A7vtM .styles_itemC__JHvO7 .styles_content__neFwL {
    background: #d2adf1;
    color: #1a1a1a
}

.styles_isGES__A7vtM .styles_itemC__JHvO7 .styles_arrow__tLsWL {
    border-left-color: #d2adf1
}

.styles_isGES__A7vtM .styles_itemD__JypgN .styles_content__neFwL {
    background: #c99aef;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemD__JypgN .styles_arrow__tLsWL {
    border-left-color: #c99aef
}

.styles_isGES__A7vtM .styles_itemE__Y1HRB .styles_content__neFwL {
    background: #b77ae9;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemE__Y1HRB .styles_arrow__tLsWL {
    border-left-color: #b77ae9
}

.styles_isGES__A7vtM .styles_itemF__yUJoD .styles_content__neFwL {
    background: #a659e9;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemF__yUJoD .styles_arrow__tLsWL {
    border-left-color: #a659e9
}

.styles_isGES__A7vtM .styles_itemG__KFH1h .styles_content__neFwL {
    background: #8835d9;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemG__KFH1h .styles_arrow__tLsWL {
    border-left-color: #8835d9
}

.styles_isGES__A7vtM .styles_itemH__B2UZv .styles_content__neFwL {
    background: #4d4d4d;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemH__B2UZv .styles_arrow__tLsWL {
    border-left-color: #4d4d4d
}

.styles_isGES__A7vtM .styles_itemI__p2WFm .styles_content__neFwL {
    background: #151515;
    color: #fff
}

.styles_isGES__A7vtM .styles_itemI__p2WFm .styles_arrow__tLsWL {
    border-left-color: #151515
}

@media screen and (min-width: 768px) {
    .styles_content__MgqEZ {
        width:50rem
    }
}

.styles_paragraph__7LHQn {
    padding-bottom: 1.6rem
}

.styles_criteria__U5Ul8>* {
    margin-top: 1.6rem
}

.styles_criteria__U5Ul8 :nth-child(-n+1) {
    margin-top: 0
}

@media(min-width: 640px) {
    .styles_criteria__U5Ul8 :nth-child(-n+2) {
        margin-top:0
    }
}

@media(min-width: 768px) {
    .styles_criteria__U5Ul8 :nth-child(-n+3) {
        margin-top:0
    }
}

.styles_Arrow__sj1TW {
    position: absolute;
    z-index: 4;
    cursor: pointer;
    padding: 3.2rem;
    margin-top: -3.2rem;
    top: calc(50% - 1.7rem)
}

.styles_Arrow__sj1TW .styles_icon__vnDSu {
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .3s,box-shadow .3s,opacity .1s;
    background: rgba(0,0,0,.2);
    border-radius: 50%;
    width: 3.4rem;
    height: 3.4rem
}

.styles_Arrow__sj1TW:hover .styles_icon__vnDSu {
    background: rgba(0,0,0,.4)
}

.styles_Arrow__sj1TW.styles_previous__XWF63 {
    left: 3.2rem;
    margin-left: -3.2rem
}

.styles_Arrow__sj1TW.styles_next__Xx88d {
    right: 3.2rem;
    margin-right: -3.2rem
}

.styles_profilePicture__HJ2JL {
    height: 6.4rem;
    width: 6.4rem;
    min-width: 6.4rem;
    border-radius: 100%;
    overflow: hidden
}

.styles_profilePicture__HJ2JL img {
    width: 100%;
    height: 100%
}

.styles_Logo__0S1s0 {
    width: 7rem;
    height: 7rem;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(168,180,192,.24);
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fff;
    border-radius: 4px
}

.styles_Logo__0S1s0 img {
    max-width: 100%;
    max-height: 100%
}

.styles_Logo__0S1s0.styles_large__LQiLq {
    width: 10.4rem;
    height: 10.4rem
}

.styles_wrapperTop__1uhjP {
    display: grid;
    justify-content: start;
    align-items: center;
    grid-template: "logo . . ." "logo profile profile chevron" "logo note note    chevron" "logo badge topSeller chevron" "logo totads totads .";
    grid-template-rows: auto auto auto 1fr;
    grid-template-columns: auto auto 1fr auto
}

.styles_wrapperBottom__ypYSb {
    display: grid;
    justify-content: start;
    align-items: center;
    grid-template: "logo    logo    follow" "profile profile profile" "note    note    note" "badge   insee   insee" "topSeller   topSeller   topSeller" "kaBadges kaBadges kaBadges" "legal   legal   legal" "respt   respt   respt";
    grid-template-rows: auto auto auto auto auto auto auto auto;
    grid-template-columns: auto auto 1fr auto;
    @media (min-width: 971px) {
        grid-template:"logo  logo  .  .     follow" "logo  logo  profile profile follow" "logo  logo  note note    follow" "logo  logo  .    .   follow" "badge insee insee topSeller ." "kaBadges kaBadges kaBadges kaBadges kaBadges" "legal legal legal legal legal" "respt respt respt respt respt";
        grid-template-rows:1fr auto auto 1fr auto auto auto auto;grid-template-columns:min-content 5rem auto 1fr auto}
}

.styles_StickyTitle__kZl3c {
    margin-right: .8rem;
    display: flex;
    align-items: center;
    max-width: 80vw
}

.styles_title__X8TH_ {
    overflow: hidden
}

.styles_subject__8dv0K {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    word-wrap: break-word;
    text-overflow: ellipsis;
    position: relative;
    visibility: visible
}

.styles_thumbnail__BQGL9 {
    margin-right: .8rem
}

.styles_thumbnail__BQGL9 img {
    max-height: 5.5rem;
    max-width: 6rem
}

.styles_price__P8zWO p,.styles_price__P8zWO span {
    font-size: 1.6rem
}

.styles_bar__MZob5 {
    transition: "width 0.5s";
    background: repeating-linear-gradient(45deg,rgb(var(--colors-support-variant)/1),rgb(var(--colors-support-variant)/1) .3rem,rgb(var(--colors-support)/1) .3rem,rgb(var(--colors-support)/1) .6rem);
    border-radius: var(--border-radius-sm)
}

.styles_pictures__YGRJW {
    display: flex;
    flex-wrap: wrap
}

.styles_picture__xLhQe {
    position: relative;
    overflow: hidden;
    width: 8rem;
    height: 8rem;
    margin-right: var(--spacing-md);
    margin-bottom: var(--spacing-md);
    border-radius: var(--spacing-sm);
    cursor: pointer
}

.styles_picture__xLhQe img {
    height: 100%!important;
    width: 100%;
    max-width: 100%;
    object-fit: cover
}

.styles_layer__Xk1Za {
    position: absolute;
    width: 100%;
    bottom: 0;
    height: var(--spacing-lg);
    background-image: linear-gradient(to top,rgb(var(--colors-basic)/1),hsla(0,0%,100%,.6),hsla(0,0%,100%,0))
}

.styles_contentWrapper__iqXPg {
    align-items: center;
    display: flex;
    justify-content: center;
    width: inherit;
    height: 100%
}

.styles_contentWrapper__iqXPg.styles_zoomedIn__nwkCf {
    height: 100vh
}

.styles_preview__Mim8Z {
    display: flex;
    height: 100%;
    width: 40rem;
    margin-left: 7rem
}

.styles_carousel__C_9Bv {
    max-width: 100%;
    min-width: 70%
}

@media (min-width: 1280px) {
    .styles_contentWrapper__iqXPg {
        padding:0 6rem
    }

    .styles_contentWrapper__iqXPg[data-has-tabs=true] {
        padding: 0
    }

    .styles_carousel__C_9Bv {
        min-width: 50%;
        max-width: calc(100% - 47rem)
    }
}

.styles_slide__iykjR {
    display: flex!important;
    align-items: center;
    justify-content: center;
    cursor: zoom-in;
    height: 70vh;
    width: 100%;
    min-width: 1rem
}

.styles_slide__iykjR img {
    max-height: 100%!important;
    max-width: 100%;
    object-fit: contain
}

.styles_slide__iykjR.styles_zoomedIn__nwkCf {
    cursor: zoom-out;
    height: 100vh
}

.styles_slide__iykjR.styles_zoomedIn__nwkCf img {
    max-height: 100vh
}

.styles_slide__iykjR:focus-visible {
    box-shadow: none
}

.styles_modalFooter__pgRdv {
    width: inherit;
    box-shadow: 0 1px 8px 0 rgba(0,0,0,.2),0 3px 3px -2px rgba(0,0,0,.04),0 3px 4px 0 rgba(0,0,0,.14)
}

.styles_Location__gm_Ro {
    width: 100%;
    height: 100%;
    position: relative;
    scroll-margin-top: 15rem
}

@media print {
    .styles_Location__gm_Ro {
        height: 5rem
    }
}

.styles_preview__DGRPg {
    height: 26rem
}

.styles_interactive__9AoYP {
    height: 46rem
}

.styles_map__c_QsQ {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0
}

@media print {
    .styles_map__c_QsQ {
        display: none
    }
}

.styles_mapPreview__twtdt:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    cursor: pointer
}

.styles_tooltip__sx9Ze {
    border: 0;
    box-shadow: none;
    background-color: #000;
    color: #fff
}

.styles_interactive__gZQCz {
    height: 48rem
}

.styles_specifications__RKy49 {
    grid-area: spec;
    display: flex;
    gap: var(--spacing-lg);
    flex-wrap: wrap
}

@media (min-width: 768px) {
    .styles_specifications__RKy49 {
        margin-right:var(--spacing-lg)
    }
}

.styles_wrapper__LRNIr {
    display: grid;
    grid-template-areas: "image info" "spec spec" "action action";
    grid-template-columns: auto 1fr;
    padding: var(--spacing-xl) var(--spacing-lg);
    background-color: rgb(var(--colors-background-variant)/1);
    gap: var(--spacing-md) 0
}

@media (min-width: 768px) {
    .styles_wrapper__LRNIr {
        grid-template-columns:auto 1fr auto;
        grid-template-rows: 1fr;
        padding: var(--spacing-xl);
        grid-template-areas: "image info action" "image spec action"
    }
}

.styles_container__pTZMh {
    display: grid;
    grid-template-areas: "type quantity action" "price quantity action";
    width: "100%";
    grid-template-columns: 6fr 3fr auto;
    transition: all .25s ease-in-out;
    cursor: pointer;
    line-height: normal;
    padding: var(--spacing-xl)
}

.styles_price__uNppZ {
    grid-area: price;
    align-self: start
}

.styles_action__YxhGw {
    grid-area: action;
    text-align: right;
    display: flex;
    align-self: center;
    justify-content: flex-end;
    margin-left: var(--spacing-xl)
}

.styles_action__YxhGw>svg {
    transition: transform .25s ease-in-out
}

.styles_active__zWf0t>svg {
    transform: rotate(180deg)
}

.styles_ImageFit__iKSDp {
    position: relative;
    height: 100%;
    width: 100%;
    background-color: #f4f6f7;
    border: 1px solid #f4f6f7;
    overflow: hidden
}

.styles_ImageFit__iKSDp.styles_clickable__UxTEV {
    cursor: pointer
}

.styles_ImageFit__iKSDp>div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%
}

.styles_ImageFit__iKSDp.styles_fullWidth__4pjL_ img,.styles_ImageFit__iKSDp.styles_fullWidth__4pjL_ picture {
    height: auto!important;
    width: 100%
}

.styles_ImageFit__iKSDp.styles_fullHeight__P9zd0 img,.styles_ImageFit__iKSDp.styles_fullHeight__P9zd0 picture {
    height: 100%!important;
    width: auto;
    max-width: none
}

.styles_ImageFit__iKSDp.styles_cover__MsMH7 img,.styles_ImageFit__iKSDp.styles_cover__MsMH7 picture {
    height: 100%!important;
    width: 100%;
    max-width: 100%;
    object-fit: cover
}

.styles_ImageFit__iKSDp.styles_contain__MRUPC img,.styles_ImageFit__iKSDp.styles_contain__MRUPC picture {
    height: 100%!important;
    width: 100%;
    max-width: 100%;
    object-fit: contain
}

.styles_Skeleton__jtJjC {
    flex: 1 0 auto;
    overflow: hidden
}

.styles_shimmer__VMNDo {
    height: 32.5rem;
    background-color: #e6ebef;
    border-radius: 8px
}

.styles_bigLoadingDots__cArLF {
    animation: styles_wave__nBSgq 1s infinite alternate;
    animation-delay: .5s
}

.styles_bigLoadingDots__cArLF:after,.styles_bigLoadingDots__cArLF:before {
    width: 1rem;
    height: 1rem;
    border-radius: var(--border-radius-lg);
    background-color: rgb(var(--colors-neutral)/.16);
    color: rgb(var(--colors-neutral)/.16);
    content: "";
    display: inline-block;
    position: absolute;
    top: 0;
    animation: styles_wave__nBSgq 1s infinite alternate
}

.styles_bigLoadingDots__cArLF:before {
    left: -1.8rem;
    animation-delay: 0s
}

.styles_bigLoadingDots__cArLF:after {
    left: 1.8rem;
    animation-delay: 1s
}

.styles_dot__1sIx7 {
    animation: styles_blink__ilfz9 1.5s steps(2,start) infinite
}

.styles_dot__1sIx7:first-child {
    animation-delay: -.32s
}

.styles_dot__1sIx7:nth-child(2) {
    animation-delay: -.16s
}

@keyframes styles_wave__nBSgq {
    0% {
        background-color: rgb(var(--colors-neutral)/.16)
    }

    50%,to {
        background-color: rgb(var(--colors-neutral)/.72)
    }
}

@keyframes styles_blink__ilfz9 {
    to {
        visibility: hidden
    }
}
.text-body-1 {
    font-size: var(--font-size-body-1-font-size)!important;
    line-height: var(--font-size-body-1-line-height);
}
ol.indexstyles__BreadcrumbContainer-sc-p0j0dm-1.dPIzaI {
    display: flex;
}
</style>
    
  
  <!-- ListingSingle.vue -->