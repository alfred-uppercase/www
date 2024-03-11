
<template>
    <footer class="footer pt-5 mt-5" v-if="!isLogin">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-4 ">
            <div style="font-size: 32px !important; font-family: 'Dancing Script', cursive;">
              <a href="/"
                class="router-link-active router-link-exact-active navbar-brand d-none d-md-block text-dark font-weight-bolder ms-sm-3"
                rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" aria-current="page">
                Echri.store </a>
            </div>
            <ul class="navbar-nav d-lg-block  my-4 w-100 pr-0">
              <li class="nav-item"><a href="javascript:;" class="btn btn-sm mb-0 btn-yellow"><i
                    class="fas fa-plus-circle "></i>Deposer une annonce</a></li>
            </ul>
            <div>
              <ul class="d-flex flex-row ms-n3 nav">
                <li class="nav-item" v-for="{ icon, link } of socials" :key="link">
                  <a class="nav-link pe-1" :href="link" target="_blank" v-html="icon">
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-6 mb-4" v-for="{ name, items } of menus" :key="name">
            <h6 class="text-sm">{{ name }}</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item" v-for="item of items" :key="item.name">
                <a class="nav-link" :href="item.href" target="_blank">
                  {{ item.name }}
                </a>
              </li>
            </ul>
          </div>
  
        </div>
      </div>
    </footer>
    <div class="footer-global" v-if="!isLogin">
      <div class="container ">
        <div class="row pt-4">
          <div class="col-3 grid">
            <p>À PROPOS DU BONCOIN</p>
            <ul class="flex flex-col gap-md ">
              <li class="list-footer"><a href="" target="_blank" title="Qui sommes-nous ?">Qui
                  sommes-nous ?</a></li>
              <li class="list-footer"><a title="Nous rejoindre" href="">Nous rejoindre</a></li>
              <li class="list-footer"><a href="" target="_blank" title="Nos engagements">Nos
                  engagements</a></li>
              <li class="list-footer"><a href="" target="_blank" title="L’Avenir a du bon">L’Avenir a du bon</a></li>
              <li class="list-footer"><a href="" target="_blank" title="Le bon observatoire">Le
                  bon observatoire</a></li>
              <li class="list-footer"><a href="" target="_blank" title="Espace presse">Espace
                  presse</a></li>
            </ul>
          </div>
          <div class="col-3 grid">
            <p>INFORMATIONS LÉGALES</p>
            <ul class="flex flex-col gap-md text-body-2 text-on-support hover:[&amp;_a]:underline">
              <li class="list-footer"><a rel="nofollow" title="Conditions générales d’utilisation" href="">Conditions
                  générales d’utilisation</a></li>
              <li class="list-footer"><a rel="nofollow" title="Référencement et classement des annonces"
                  href="">Référencement et classement des annonces</a></li>
              <li class="list-footer"><a rel="nofollow" title="Conditions générales de vente" href="">Conditions
                  générales de vente</a></li>
              <li class="list-footer"><a rel="nofollow" title="Vie privée / cookies" href="">Vie privée /
                  cookies</a></li>
              <li class="list-footer"><a rel="nofollow" title="Vos droits et obligations" href="">Vos droits et
                  obligations</a></li>
              <li class="list-footer"><a rel="nofollow" title="Avis utilisateurs" href="">Avis
                  utilisateurs</a></li>
              <li class="list-footer"><a rel="nofollow" title="Charte de bonne conduite" href="">Charte de bonne
                  conduite</a></li>
              <li class="list-footer"><a rel="nofollow" title="Paiement en plusieurs fois" href="">Paiement en plusieurs
                  fois</a></li>
              <li class="list-footer"><a rel="nofollow" title="Accessibilité" href="">Accessibilité</a>
              </li>
            </ul>
          </div>
          <div class=" col-3 grid">
            <p>NOS SOLUTIONS PROS</p>
            <ul class="flex flex-col gap-md text-body-2 text-on-support hover:[&amp;_a]:underline">
              <li class="list-footer"><a title="Publicité" target="_blank" rel="noopener noreferrer"
                  data-qa-id="footer_pub_link" href="">Publicité</a></li>
              <li class="list-footer"><a href="" target="_blank" rel="noopener noreferrer"
                  title="Professionnels de l’immobilier" data-qa-id="footer_real_estate_link">Professionnels de
                  l’immobilier</a></li>
              <li class="list-footer"><a href="" target="_blank" rel="noopener noreferrer" title="Vos recrutements"
                  data-qa-id="footer_recruitment_link">Vos
                  recrutements</a></li>
              <li class="list-footer"><a target="_blank" rel="noopener noreferrer" title="Professionnels de l'auto"
                  data-qa-id="footer_auto_link" href="">Professionnels de
                  l’auto</a></li>
              <li class="list-footer"><a href="" target="_blank" rel="noopener noreferrer"
                  title="Professionnels du tourisme" data-qa-id="footer_holidays_link">Professionnels du tourisme</a></li>
              <li class="list-footer"><a target="_blank" rel="noopener noreferrer" title="Autres solutions professionnelles"
                  data-qa-id="footer_multicat_link" href="">Autres solutions professionnelles</a></li>
              <li class="list-footer"><a title="Annuaire des professionnels" data-qa-id="footer_pro_phonebook_link"
                  href="">Annuaire des professionnels</a></li>
              <li class="list-footer"><a title="Dépôt d‘offres d‘emploi : tarif réservé aux TPE"
                  data-qa-id="footer_jobsTPE_link" href="">Dépôt d‘offres d‘emploi : tarif
                  réservé aux TPE</a></li>
            </ul>
          </div>
          <div class="col-3 grid">
            <p>DES QUESTIONS ?</p>
            <ul class="flex flex-col gap-md text-body-2 text-on-support hover:[&amp;_a]:underline">
              <li class="list-footer"><a title="Aide" href="">Aide</a></li>
              <li class="list-footer"><a title="Le paiement sécurisé" href="">Le service de
                  paiement sécurisé et la livraison</a></li>
              <li class="list-footer"><a title="Le porte-monnaie" href="">Le porte-monnaie</a></li>
              <li class="list-footer"><a title="Le service de réservation de vacances en ligne pour les hôtes" href="">Le
                  service de réservation de vacances en ligne pour les hôtes</a>
              </li>
              <li class="list-footer"><a title="Votre dossier de location en ligne" href="">Votre
                  dossier de location en ligne</a></li>
              <li class="list-footer"><a title="Votre espace bailleur" href="">Votre espace
                  bailleur</a></li>
              <li class="list-footer"><a href="" target="_blank" rel="noopener noreferrer nofollow"
                  title="Statut de nos services">Statut de nos services</a></li>
            </ul>
          </div>
          <div class="col-6">
            <div class="float-start">
              <p class="">
                Tout droit réservé ©
                {{ new Date().getFullYear() }}
                Echri.store
                <a href="" target="_blank"></a>.
              </p>
            </div>
          </div>
          <div class="col-6">
            <div class="float-end">
              <span class="">Retrouvez-nous sur:</span>
              <ul class="reseaux_sociaux">
                <li><i class="fab fa-facebook"></i></li>
                <li><i class="fab fa-linkedin"></i></li>
                <li><i class="fab fa-instagram"></i></li>
              </ul>
  
  
  
            </div>
          </div>
        </div>
  
      </div>
  
    </div>
  </template>
  
  <script setup>
  import logoDark from "@/assets/img/logo-ct-dark.png";
  import { RouterLink, useRoute } from "vue-router";
  import { ref, watch } from "vue";
  const route = useRoute();
  
  const isDeposeAnnoce = ref(false)
  const isLogin = ref(false)
  defineProps({
    brand: {
      type: Object,
      name: String,
      logo: String,
      route: "",
      default: () => ({
        name: "Echri.store",
        logo: logoDark,
        route: "/"
      })
    },
    socials: {
      type: Array,
      icon: String,
      link: String,
      default: () => [
        {
          icon: '<i class="fab fa-facebook text-lg opacity-8"></i>',
          link: ""
        },
        {
          icon: '<i class="fab fa-twitter text-lg opacity-8"></i>',
          link: ""
        },
        {
          icon: '<i class="fab fa-dribbble text-lg opacity-8"></i>',
          link: ""
        },
        {
          icon: '<i class="fab fa-github text-lg opacity-8"></i>',
          link: ""
        },
        {
          icon: '<i class="fab fa-youtube text-lg opacity-8"></i>',
          link: ""
        }
      ]
    },
    menus: {
      type: Array,
      name: String,
      items: {
        type: Array,
        name: String,
        href: String
      },
      default: () => [
        {
          name: "Immobilier",
          items: [
            {
              name: "Appartement",
              href: ""
            },
            {
              name: "Hotel",
              href: ""
            },
            {
              name: "Maisons",
              href: ""
            },
            { name: "Location", href: "" }
          ]
        },
        {
          name: "Carrière",
          items: [
            { name: "Offre d'emploi", href: "" },
            {
              name: "CDI & CDD",
              href: ""
            },
            {
              name: "Freelance",
              href: ""
            }
          ]
        },
        {
          name: "Véhicules",
          items: [
            {
              name: "Voiture",
              href: ""
            },
            {
              name: "Moto",
              href: ""
            },
            {
              name: "Pièces occasions",
              href: ""
            },
            {
              name: "Vendre ma voiture",
              href: ""
            }
          ]
        },
        {
          name: "Apropos",
          items: [
            {
              name: "Apropos de nous",
              href: ""
            },
            {
              name: "Termes et Conditions",
              href: ""
            },
            {
              name: "Nous contacter",
              href: ""
            }
          ]
        }
      ]
    }
  });
  
    watch(route, () => {
      if (route.name == 'depose_annonces') {
        isDeposeAnnoce.value = true
        isLogin.value=false
      } if (route.name != 'depose_annonces' && route.name != 'login' && route.name != 'signin-up' && route.name != 'signin-up-company') {
        isDeposeAnnoce.value = false
        isLogin.value=false
  
      }
      if (route.name == 'signin-basic' ||  route.name == 'signin-up' || route.name == 'signin-up-company') {
        isDeposeAnnoce.value = false
        isLogin.value=true
  
      }
    })
  </script>
  