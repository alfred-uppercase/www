
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
                  class="underline mr-sm"><span itemprop="name">Accueil</span></router-link>
                <meta itemprop="position" content="1">
              </li>
              <li data-qa-id="breadcrumb-item-5" itemscope="" itemprop="itemListElement"
                itemtype="https://schema.org/ListItem" class="indexstyles__Item-sc-p0j0dm-2 hRGkjr">
                <p aria-current="page" class="font-bold text-on-surface"><span itemprop="name">{{ listingDetails.name }}</span></p>
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
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined"><h2 class="flex items-center text-headline-2">{{ get_phrase.about }}</h2><div data-qa-id="adview_description_container"><p class="whitespace-pre-line text-body-1 [overflow-wrap:anywhere]" v-html="listingDetails.description"></p></div></div>
        
          <!-- Criteres -->
          <div class="mx-lg grid gap-lg py-xl border-b-sm border-b-neutral/dim-4 lg:mx-md undefined"><h2 class="flex items-center text-headline-2">Critères</h2><div class="styles_criteria__U5Ul8 flex flex-wrap" data-qa-id="criteria_container"><div class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_condition"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="Like" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m4.94,19.5c-.52,0-.94-.41-.94-.93v-6.65c0-.48.4-.87.89-.87h4.54c.77,0,1.16-.76,1.33-1.39l.61-3.44c.07-.94.85-1.68,1.8-1.72,1.18,0,1.59.96,1.8,1.68.29,1.1.22,2.25-.19,3.31h2.85c.67-.02,1.31.26,1.74.76.55.81.75,1.8.56,2.75l-.59,4.47c0,.54-.22,1.06-.61,1.44-.39.38-.91.59-1.46.59H4.94Zm4.1-7.69h-4.18c-.06,0-.12.05-.12.11v6.65s.02.09.05.12c.03.03.07.05.12.05h4.12v-6.93Zm4.11-6.56c-.57.05-1.02.51-1.04,1.08l-.62,3.48c-.24,1.1-.86,1.78-1.68,1.96v6.97s7.45,0,7.45,0c.72,0,1.29-.57,1.29-1.28l.6-4.56c.15-.74,0-1.51-.4-2.15-.29-.33-.72-.51-1.16-.49h-1.94c-1.29,0-1.54-.03-1.71-.27-.07-.12-.09-.26-.05-.39.45-1.01.56-2.13.32-3.21-.31-1.06-.71-1.15-1.06-1.15Z"></path></svg><div><p class="mb-sm text-caption opacity-dim-1">État</p><span class="text-body-1 font-bold">Très bon état</span></div></div><div class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_diy_type"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="DiyType" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m16.45,11.63c.19,0,.35.13.38.3v.07s0,1.1,0,1.1h.85c.2.33.31.7.31,1.11,0,1.01-.71,1.86-1.68,2.13l.02-.05c-.59,1.76-2.29,2.64-4.24,2.71-2.51,0-4.55-2.13-4.55-4.74,0-.2.17-.36.39-.36s.39.16.39.36c0,2.19,1.7,4.01,3.78,4.01,1.49-.06,2.79-.63,3.37-1.86-1.18-.1-2.11-1.05-2.11-2.2,0-.4.11-.78.31-1.11h.85v-1.1c0-.2.17-.37.39-.37.19,0,.35.13.38.3v.07s0,1.11,0,1.11h.77v-1.11c0-.2.17-.37.39-.37Zm.73,2.21h-3c-.03.12-.05.24-.05.37,0,.81.69,1.47,1.55,1.47s1.55-.66,1.55-1.47c0-.13-.02-.25-.05-.37Zm-.34-6.63c.43,0,.77.33.77.74v1.47c0,.41-.35.74-.77.74h-7.74v2.21c0,.41-.35.74-.77.74h-1.55c-.43,0-.77-.33-.77-.74v-2.21h0c0-1.86,1.01-2.88,2.91-2.94h.18s7.74,0,7.74,0Zm0,.74h-7.74c-1.53,0-2.26.65-2.31,2.06v.15h-.01v2.21h1.55v-2.58c0-.2.17-.37.39-.37h8.13v-1.47Zm-2.71-2.21c1.08,0,2.01.6,2.45,1.47h-.9c-.35-.45-.92-.74-1.55-.74s-1.2.29-1.55.74h-.9c.43-.87,1.37-1.47,2.45-1.47Zm3.1-.74c.21,0,.39.16.39.37,0,.18-.14.33-.32.36h-.07s-6.19,0-6.19,0c-.21,0-.39-.16-.39-.37,0-.18.14-.33.32-.36h.07s6.19,0,6.19,0Z"></path></svg><div><p class="mb-sm text-caption opacity-dim-1">Type</p><span class="text-body-1 font-bold">Matériel</span></div></div><div class="flex w-full pr-lg sm:w-6/12 md:w-4/12" data-test-id="criteria" data-qa-id="criteria_item_diy_product"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-title="DiyProduct" fill="currentColor" stroke="none" class="fill-current text-current w-sz-24 h-sz-24 mr-md rounded-full bg-neutral-container" data-spark-component="icon" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="m5.89,4.56l2.01,1.23c.1.04.18.12.22.22.03.1,0,.21-.05.3l-.47.7,3.65,3.66h0c.12-.14.3-.21.48-.21.11,0,.21.02.31.05l1.44-1.45c-.1-.3-.15-.62-.15-.94,0-1.71,1.39-3.11,3.1-3.11.37,0,.73.07,1.08.2.13.05.22.16.24.29.02.13-.02.27-.12.36l-1.46,1.33.21,1.02,1,.34,1.4-1.22c.1-.09.25-.12.38-.08.13.04.23.15.26.29.04.2.07.41.07.62,0,1.71-1.39,3.11-3.1,3.11-.38,0-.75-.07-1.1-.21l-.61.61,4.28,4.29c.35.34.55.81.56,1.3,0,.36-.16.7-.42.95l-.91.92c-.23.22-.53.35-.84.37h-.12c-.48,0-.94-.21-1.28-.56l-4.25-4.26-4.36,4.43c-.23.23-.54.37-.87.39h-.12c-.35,0-.69-.14-.94-.39-.25-.25-.4-.59-.39-.95,0-.35.14-.69.39-.94l5.1-5.16c-.04-.1-.07-.21-.07-.32,0-.19.07-.36.2-.5l.02-.02-3.67-3.66-.68.47c-.08.07-.19.11-.3.09-.1-.04-.18-.12-.22-.22l-1.23-2.01c-.09-.15-.07-.35.05-.47l.4-.4.4-.4c.13-.12.32-.15.47-.05Zm7.25,7.18c-.13,0-.25.03-.35.11l-.98.93c-.15.24-.17.53-.07.78.05.11.13.21.23.3.03.03.05.06.07.1l4.44,4.46c.19.2.45.32.73.33.15,0,.29-.05.4-.15l.91-.92c.1-.11.15-.24.15-.39,0-.29-.12-.57-.33-.78l-4.42-4.45s-.08-.04-.11-.07c-.04-.04-.07-.08-.12-.11-.16-.1-.36-.13-.56-.13Zm-2.16.95l-5.02,5.08c-.11.1-.17.24-.17.39,0,.15.06.3.17.4.08.09.19.14.3.16h.09c.15,0,.29-.05.39-.16l4.44-4.45c-.15-.23-.24-.49-.26-.76-.02-.18-.01-.36.03-.54l.03-.12Zm.8-1.42l-.26.2s-.02.02-.03.03c-.02.02-.04.04-.07.06l-.22.22s.02.01.03.02h.04s.19.19.19.19l.52-.51-.18-.18h-.01s-.01-.02-.01-.02Zm3.05-4.78c-.45.43-.72,1.02-.73,1.64,0,.31.08.61.21.88.06.15.03.31-.09.43l-1.55,1.55c.14-.04.29-.06.43-.06.33-.03.67.05.96.23l.87-.88c.12-.12.3-.15.45-.07.67.32,1.45.29,2.1-.06.65-.35,1.09-.99,1.19-1.73l-.97.87c-.1.09-.25.12-.38.08l-1.42-.47c-.13-.04-.23-.16-.26-.29l-.29-1.47c-.03-.13.01-.27.12-.36l1.04-.92c-.62-.02-1.22.2-1.68.63Zm-9.04-1.11l-.19.19s-.06.05-.1.07l-.14.16.84,1.4.53-.36.4-.6-1.35-.86Z"></path></svg><div><p class="mb-sm text-caption opacity-dim-1">Produit</p><span class="text-body-1 font-bold">Chauffage fixe </span></div></div></div></div>
        
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
                  <div class="_1o09v">
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
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
// import Social from '/views/Presentation/annonces/social.vue';

const listingDetails = ref({});
const get_phrase = ref({});
const get_amenity = ref({});
const slugs = ref('');
const get_user_thumbnail = ref('');
const get_user_detail = ref('');
const get_users = ref('');
const romspecs  = ref([]);
// const get_user = ref('');
const route = useRoute();
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
// Fetch the ID from the route params
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
    console.log('Slug name:', slug.data);
    slugs.value = slug.data;

    const amnety = await axios.get(`/api/get_amenities/`);
    console.log('Slug name:', amnety.data);
    get_amenity.value = amnety.data;


    const currentSlug = slugs.value;

    const response = await axios.get(`/home/listing/${currentSlug}/${currentId}`);
    console.log('Response from single listing:', response.data);
    listingDetails.value = response.data;

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
    // Fonction pour trouver la chambre avec le prix le moins cher
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
</style>
    
  
  <!-- ListingSingle.vue -->