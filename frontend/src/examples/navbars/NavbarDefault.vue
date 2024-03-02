
<template>
    <nav class="navbar text-dark navbar-expand-lg navbar-dark bg-white shadow-none" :class="{
      'z-index-3 w-100 shadow-none navbar-transparent my-3':
        props.transparent,
      'my-3 blur border-radius-lg z-index-3 py-2 shadow py-2 start-0 end-0 mx-4 position-absolute mt-4':
        props.sticky,
      'navbar-light bg-white py-3': props.light,
      ' navbar-dark bg-gradient-dark z-index-3 py-3': props.dark
    }">
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
  
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div :class="props.transparent || props.light || props.dark
        ? 'container'
        : 'container-fluid px-0'
        ">
        <RouterLink class="navbar-brand d-none d-md-block" :class="[
          (props.transparent && textDark.value) || !props.transparent
            ? 'text-dark font-weight-bolder ms-sm-3'
            : 'text-dark font-weight-bolder ms-sm-3',
          isLogin ? 'logo-center' : ''
        ]" :to="{ name: 'presentation' }" rel="tooltip" title="Designed and Coded by Creative Tim"
          data-placement="bottom">
          Lebonomar
        </RouterLink>
        <ul class="navbar-nav d-lg-block w-100 pr-0" v-if="isDeposeAnnoce && !isLogin">
          <li class="nav-item">Deposer une annonce
          </li>
        </ul>
        <ul class="navbar-nav d-lg-block w-100 pr-0" v-if="!isDeposeAnnoce && !isLogin">
          <li class="nav-item">
            <RouterLink :to="{ name: 'deposer-une-annonce' }" class="btn btn-sm mb-0 btn-yellow "><i
                class="fas fa-plus-circle"></i>Deposer une annonce</RouterLink>
          </li>
        </ul>
  
        <div class="collapse S navbar-collapse  w-100 pt-3 pb-2 py-lg-0" id="navigation" v-if="isDeposeAnnoce && !isLogin">
          <ul class="navbar-nav navbar-nav-hover ms-auto">
            <li class="nav-item dropdown dropdown-hover mx-2 text-center nav1 quitter">
              <RouterLink :to="{ name: 'presentation' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                :class="getTextColor()">
                Quitter
              </RouterLink>
  
            </li>
  
          </ul>
  
        </div>
        <div class="collapse S navbar-collapse  w-100 pt-3 pb-2 py-lg-0" id="navigation" v-if="!isDeposeAnnoce && !isLogin">
          <ul class="navbar-nav navbar-nav-hover ms-auto">
            <li class="nav-item dropdown dropdown-hover mx-2 text-center nav1">
              <i class="far fa-bell"></i>
              <RouterLink :to="{ name: 'annonces' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                :class="getTextColor()">
                Mes recherches
              </RouterLink>
  
            </li>
            <li class="nav-item dropdown dropdown-hover mx-2 text-center nav1">
              <i class="far fa-heart"></i>
              <RouterLink :to="{ name: 'annonces' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                :class="getTextColor()">
                Favoris
              </RouterLink>
  
            </li>
            <li class="nav-item dropdown dropdown-hover mx-2 text-center nav1">
              <i class="far fa-comment-alt"></i>
              <RouterLink :to="{ name: 'annonces' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                :class="getTextColor()">
                Messages
              </RouterLink>
  
            </li>
            <RouterLink
            v-if="userLoggedIn" 
              :to="{ name: 'RedirectToDashboard' }"
                class="nav-item dropdown dropdown-hover mx-2 text-center nav1">
            <li class="">
              <img :src='get_user_thumbnail' class="overflow-hidden leading-none h-[2.4rem] w-[2.4rem] rounded-full">
              
  
                <span>{{ userData.name }}</span>
            </li>
          </RouterLink>
          <RouterLink 
          v-else
              :to="{ name: 'signin-basic' }"
                class="nav-item dropdown dropdown-hover mx-2 text-center nav1">
            <li class="">
              <i class="far fa-user"></i>

  
                <span>Se Connecter</span>
            </li>
          </RouterLink>

          </ul>
  
        </div>
      </div>
      <div class="bg-blue" v-if="!isDeposeAnnoce && !isLogin">
        <div class="container">
          <div class="collapse S navbar-collapse  w-100 pt-3 pb-2 py-lg-0" id="navigation">
            <ul class="navbar-nav ">
              <li class="nav-item dropdown dropdown-hover mx-2" v-for="(category, index) in categories_avec_Sub" :key="category.id">
  
                <RouterLink :to="{ name: 'annonces' }"
                  class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" v-if="category.parent == '0'">
                  {{ category.name }}
                </RouterLink>
  
                <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuPages">
                  <div class="row d-none d-lg-block container">
                    <div class="col-12 px-4 py-2">
                      <div class="row">
                        <div class="position-relative">
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                          {{ category.name }}
                          </div>
  
                          <RouterLink v-for="(sub, index) in category.sub" :key="sub.id" :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>{{ sub.name }}</span>
                          </RouterLink>
                          <!-- <RouterLink :to="{ name: 'maison' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Terrain</span>
                          </RouterLink>
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Account
                          </div>
  
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Locations
                          </div>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Appartement</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Parking</span>
                          </RouterLink> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-lg-none">
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0">
                      Appartement
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>About Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Contact Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Author</span>
                    </RouterLink>
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                      Account
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Sign In</span>
                    </RouterLink>
                  </div>
                </div>
              </li>
              <!-- <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                  Véhicules
                </a>
                <div
                  class="dropdown-menu  dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuBlocks">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Voitures
                                </h6>
                                <span class="text-sm">Tous voitures</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Peugeot
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Renault
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Moto
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Yamaha
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BMW
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BWS
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Equipement
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement moto
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement voiture
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement tracteur
                          </RouterLink>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12">
                      <div class="d-flex mb-2">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Locations de vacances
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Locations saisonnières
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Features
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Navigation
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Navbars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Nav Tabs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Pagination
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Input Areas
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Inputs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Forms
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Attention Catchers
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Alerts
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Modals
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Tooltips & Popovers
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Elements
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Avatars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Badges
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Breadcrumbs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Buttons
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Button Groups
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Dropdowns
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Progress Bars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Toggles
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Typography
                      </RouterLink>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuLocation" data-bs-toggle="dropdown" aria-expanded="false">
  
                  Locations de vacances
                </a>
                <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuLocation">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location saisonnières
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Hôtel
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location en europe
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12 g-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Getting Started
                        </h6>
                        <span class="text-sm">All about overview, quick start, license and
                          contents</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Foundation
                        </h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Components
                        </h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Plugins
                        </h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Utility Classes
                        </h6>
                        <span class="text-sm">For those who want flexibility, use our utility
                          classes</span>
                      </a>
                    </div>
                  </div>
                </div>
  
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
  
                <RouterLink :to="{ name: 'annonces' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white"
                 >
                  Emploi
                </RouterLink>
  
                <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuPages">
                  <div class="row d-none d-lg-block">
                    <div class="col-12 px-4 py-2">
                      <div class="row">
                        <div class="position-relative">
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                            Ventes immobilières
                          </div>
  
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Appartement</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Terrain</span>
                          </RouterLink>
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Account
                          </div>
  
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Locations
                          </div>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Appartement</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Parking</span>
                          </RouterLink>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-lg-none">
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0">
                      Appartement
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>About Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Contact Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Author</span>
                    </RouterLink>
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                      Account
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Sign In</span>
                    </RouterLink>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                  Mode
                </a>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuBlocks">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Voitures
                                </h6>
                                <span class="text-sm">Tous voitures</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Peugeot
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Renault
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Moto
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Yamaha
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BMW
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BWS
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Equipement
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement moto
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement voiture
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement tracteur
                          </RouterLink>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12">
                      <div class="d-flex mb-2">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Locations de vacances
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Locations saisonnières
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Features
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Navigation
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Navbars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Nav Tabs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Pagination
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Input Areas
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Inputs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Forms
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Attention Catchers
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Alerts
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Modals
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Tooltips & Popovers
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Elements
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Avatars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Badges
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Breadcrumbs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Buttons
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Button Groups
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Dropdowns
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Progress Bars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Toggles
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Typography
                      </RouterLink>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
  
                  Maison & Jardin
                </a>
                <div class="dropdown-menu  dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg"
                  aria-labelledby="dropdownMenuDocs">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location saisonnières
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Hôtel
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location en europe
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
  
                <RouterLink :to="{ name: 'annonces' }" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white"
                  >
                  Famille
                </RouterLink>
  
                <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuPages">
                  <div class="row d-none d-lg-block">
                    <div class="col-12 px-4 py-2">
                      <div class="row">
                        <div class="position-relative">
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                            Ventes immobilières
                          </div>
  
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Appartement</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Terrain</span>
                          </RouterLink>
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Account
                          </div>
  
                          <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                            Locations
                          </div>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Appartement</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Maison</span>
                          </RouterLink>
                          <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                            <span>Parking</span>
                          </RouterLink>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-lg-none">
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0">
                      Appartement
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>About Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Contact Us</span>
                    </RouterLink>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Author</span>
                    </RouterLink>
                    <div class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-0 mt-3">
                      Account
                    </div>
                    <RouterLink :to="{ name: 'signin-basic' }" class="dropdown-item border-radius-md">
                      <span>Sign In</span>
                    </RouterLink>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                  Électronique
                </a>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3"
                  aria-labelledby="dropdownMenuBlocks">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Voitures
                                </h6>
                                <span class="text-sm">Tous voitures</span>
                              </div>
                              <img :src="downArrow" alt="down-arrow" class="arrow" />
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Peugeot
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Renault
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Moto
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                              <img :src="downArrow" alt="down-arrow" class="arrow" />
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Yamaha
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BMW
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            BWS
                          </RouterLink>
                        </div>
                      </li>
                      <li class="nav-item dropdown dropdown-hover dropdown-subitem list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="javascript:;">
                          <div class="d-flex">
                            <div class="w-100 d-flex align-items-center justify-content-between">
                              <div>
                                <h6
                                  class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                  Equipement
                                </h6>
                                <span class="text-sm">Voir tout</span>
                              </div>
                              <img :src="downArrow" alt="down-arrow" class="arrow" />
                            </div>
                          </div>
                        </a>
                        <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement moto
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement voiture
                          </RouterLink>
                          <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                            Equipement tracteur
                          </RouterLink>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12">
                      <div class="d-flex mb-2">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Locations de vacances
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Locations saisonnières
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Features
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Navigation
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Navbars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Nav Tabs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Pagination
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Input Areas
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Inputs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Forms
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Attention Catchers
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Alerts
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Modals
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Tooltips & Popovers
                      </RouterLink>
                      <div class="d-flex mb-2 mt-3">
                        <div class="w-100 d-flex align-items-center justify-content-between">
                          <div>
                            <h6
                              class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                              Elements
                            </h6>
                          </div>
                        </div>
                      </div>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Avatars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Badges
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Breadcrumbs
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Buttons
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Button Groups
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Dropdowns
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Progress Bars
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Toggles
                      </RouterLink>
                      <RouterLink class="dropdown-item ps-3 border-radius-md mb-1" :to="{ name: 'signin-basic' }">
                        Typography
                      </RouterLink>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white" 
                  id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
  
                  Loisirs
                </a>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg"
                  aria-labelledby="dropdownMenuDocs">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location saisonnières
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Hôtel
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location en europe
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12 g-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Getting Started
                        </h6>
                        <span class="text-sm">All about overview, quick start, license and
                          contents</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Foundation
                        </h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Components
                        </h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Plugins
                        </h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Utility Classes
                        </h6>
                        <span class="text-sm">For those who want flexibility, use our utility
                          classes</span>
                      </a>
                    </div>
                  </div>
                </div>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg"
                  aria-labelledby="dropdownMenuDocs">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Emploi
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Tout emploi
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Offre d'emploi
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Formation professionnel
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12 g-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Getting Started
                        </h6>
                        <span class="text-sm">All about overview, quick start, license and
                          contents</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Foundation
                        </h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Components
                        </h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Plugins
                        </h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Utility Classes
                        </h6>
                        <span class="text-sm">For those who want flexibility, use our utility
                          classes</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-hover mx-2">
                <a role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center text-white"
                  id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
  
                  Autre
                </a>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg"
                  aria-labelledby="dropdownMenuDocs">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location saisonnières
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Hôtel
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Location en europe
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12 g-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Getting Started
                        </h6>
                        <span class="text-sm">All about overview, quick start, license and
                          contents</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Foundation
                        </h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Components
                        </h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Plugins
                        </h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Utility Classes
                        </h6>
                        <span class="text-sm">For those who want flexibility, use our utility
                          classes</span>
                      </a>
                    </div>
                  </div>
                </div>
                <div
                  class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg"
                  aria-labelledby="dropdownMenuDocs">
                  <div class="d-none d-lg-block">
                    <ul class="list-group">
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Emploi
                          </h6>
  
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Tout emploi
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Offre d'emploi
                          </h6>
                        </a>
                      </li>
                      <li class="nav-item list-group-item border-0 p-0">
                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="">
                          <h6
                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                            Formation professionnel
                          </h6>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="row d-lg-none">
                    <div class="col-md-12 g-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Getting Started
                        </h6>
                        <span class="text-sm">All about overview, quick start, license and
                          contents</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Foundation
                        </h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Components
                        </h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Plugins
                        </h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href="./pages/about-us.html">
                        <h6
                          class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                          Utility Classes
                        </h6>
                        <span class="text-sm">For those who want flexibility, use our utility
                          classes</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
  
  
    </nav>
  
    <!-- End Navbar -->
  </template>
  
  <script>
  import { mapState } from 'pinia'
  import { useUserStore } from '../../stores/user'
  import { useCategoryStore } from '../../stores/categorie'
  export default {
    
    data() {
      return {
        CategoryStore: useCategoryStore(),
        userStore: useUserStore(),
        categories_avec_Sub:[]
      };
    },
    computed: {
      ...mapState(useUserStore, ['isLogin']),
      ...mapState(useCategoryStore, ['categories', 'subCategories'])
    },
    async mounted() {
      await this.CategoryStore.getCategories();
      this.categories.forEach( async(element) => {
       await this.CategoryStore.getsubCategories(element.id)
      console.log('sub ',this.subCategories);
       
        element.sub=this.subCategories
        this.categories_avec_Sub.push(element)
        this.categories_avec_Sub= this.categories_avec_Sub.sort((c1,c2)=> c1.id-c2.id)
  
      })
    },
    methods: {
      
     
    }
  }
  </script>
  
  <script setup>
  import { RouterLink, useRoute } from "vue-router";
import { ref, onMounted, watch  } from "vue";
import { useWindowsWidth } from "../../assets/js/useWindowsWidth";
import { computed } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';
import axios from 'axios';
  
  // images
  import ArrDark from "@/assets/img/down-arrow-dark.svg";
  import downArrow from "@/assets/img/down-arrow.svg";
  import DownArrWhite from "@/assets/img/down-arrow-white.svg";
  // import { storeToRefs } from 'pinia'
  // import { useCategoryStore } from '../../stores/categorie'
  // const { categories, loading, } = storeToRefs(useCategoryStore())
  // const { getCategories } = useCategoryStore()
  // getCategories()
  
  const route = useRoute();
  const isDeposeAnnoce = ref(false)
  const isLogin = ref(false)
  
  const store = useAuthStore();
  const router = useRouter();

  // Getter for checking if the user is logged in
  const userLoggedIn = computed(() => store.isLogin);

  // Getter to get the information of the connected user
  const userData = computed(() => store.userData);
  const checkLocalStorage = () => {
  const userData = localStorage.getItem('userData');
  if (userData) {
    store.login(JSON.parse(userData));
  } else {
    router.push('/');
  }
};
const get_user_thumbnail = ref('');
onMounted(() => {
  checkLocalStorage();
});

  const props = defineProps({
    action: {
      type: Object,
      route: String,
      color: String,
      label: String,
      default: () => ({
        route: "",
        color: "bg-gradient-success",
        label: "Déposer une annonce"
      })
    },
    transparent: {
      type: Boolean,
      default: false
    },
    light: {
      type: Boolean,
      default: false
    },
    dark: {
      type: Boolean,
      default: false
    },
    sticky: {
      type: Boolean,
      default: false
    },
    darkText: {
      type: Boolean,
      default: false
    }
  });
  
  // set arrow  color
  function getArrowColor() {
    if (props.transparent && textDark.value) {
      return ArrDark;
    } else if (props.transparent) {
      return DownArrWhite;
    } else {
      return ArrDark;
    }
  }
  
  // set text color
  const getTextColor = () => {
    let color;
    if (props.transparent && textDark.value) {
      color = "text-dark";
    } else if (props.transparent) {
      color = "text-dark";
    } else {
      color = "text-dark";
    }
  
    return color;
  };
  
  // set nav color on mobile && desktop
  
  let textDark = ref(props.darkText);
  const { type } = useWindowsWidth();
  
  if (type.value === "mobile") {
    textDark.value = true;
  } else if (type.value === "desktop" && textDark.value == false) {
    textDark.value = false;
  }
  
  watch(
    () => type.value,
    (newValue) => {
      if (newValue === "mobile") {
        textDark.value = true;
      } else {
        textDark.value = false;
      }
    },)
  
  watch(route, () => {
    if (route.name == 'deposer-une-annonce') {
      isDeposeAnnoce.value = true
      isLogin.value = false
    } if (route.name != 'deposer-une-annonce' && route.name != 'login' && route.name != 'signin-up' && route.name != 'signin-up-company') {
      isDeposeAnnoce.value = false
      isLogin.value = false
  
    }
    if (route.name == 'signin-basic' || route.name == 'signin-up' || route.name == 'signin-up-company') {
      isDeposeAnnoce.value = false
      isLogin.value = true
  
    }
  
  
  })

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
  checkLocalStorage();


    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
  });
  </script>
  <style>
  /* @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap'); */
  
  .navbar .navbar-brand {
    font-size: 32px !important;
    font-family: 'Dancing Script', cursive;
  }
  
  nav.navbar {
    padding: 0 !important;
    margin: 0 !important;
    background: #fff;
    border-bottom: 1px solid #e2e2e2;
  }
/*   
  .navbar .nav-link {
    font-size: 1.08rem !important;
  } */
  </style>