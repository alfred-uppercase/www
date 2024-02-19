import { createRouter, createWebHistory } from "vue-router";
import PresentationView from "../views/Presentation/PresentationView.vue";
import AboutView from "../views/LandingPages/AboutUs/AboutView.vue";
import ResultPage from '../views/Presentation/Listing.vue';
import RedirectToDashboard from '../views/LandingPages/dashboard/Dashboard.vue';
import UserDashboard from '../views/LandingPages/dashboard/Dashboard.vue';
import Annonces from '../views/Presentation/Annonces.vue';
import AnnoncesUnique from '../views/Presentation/AnnonceUnique.vue';
import deposeAnnonce from "../views/Presentation/deposeAnnonce.vue";
import UserUnique from '../views/Presentation/UserUnique.vue';
import ContactView from "../views/LandingPages/ContactUs/ContactView.vue";
import AuthorView from "../views/LandingPages/Author/AuthorView.vue";
import SignInBasicView from "../views/LandingPages/SignIn/Login_basic.vue";
import Register from "../views/LandingPages/SignIn/Register.vue";
import PageHeaders from "../layouts/sections/page-sections/page-headers/HeadersView.vue";
import PageFeatures from "../layouts/sections/page-sections/features/FeaturesView.vue";
import NavigationNavbars from "../layouts/sections/navigation/navbars/NavbarsView.vue";
import NavigationNavTabs from "../layouts/sections/navigation/nav-tabs/NavTabsView.vue";
import NavigationPagination from "../layouts/sections/navigation/pagination/PaginationView.vue";
import InputAreasInputs from "../layouts/sections/input-areas/inputs/InputsView.vue";
import InputAreasForms from "../layouts/sections/input-areas/forms/FormsView.vue";
import ACAlerts from "../layouts/sections/attention-catchers/alerts/AlertsView.vue";
import ACModals from "../layouts/sections/attention-catchers/modals/ModalsView.vue";
import ACTooltipsPopovers from "../layouts/sections/attention-catchers/tooltips-popovers/TooltipsPopoversView.vue";
import ElAvatars from "../layouts/sections/elements/avatars/AvatarsView.vue";
import ElBadges from "../layouts/sections/elements/badges/BadgesView.vue";
import ElBreadcrumbs from "../layouts/sections/elements/breadcrumbs/BreadcrumbsView.vue";
import ElButtons from "../layouts/sections/elements/buttons/ButtonsView.vue";
import ElButtonGroups from "../layouts/sections/elements/button-groups/ButtonGroupsView.vue";
import ElDropdowns from "../layouts/sections/elements/dropdowns/DropdownsView.vue";
import ElProgressBars from "../layouts/sections/elements/progress-bars/ProgressBarsView.vue";
import ElToggles from "../layouts/sections/elements/toggles/TogglesView.vue";
import ElTypography from "../layouts/sections/elements/typography/TypographyView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "presentation",
      component: PresentationView,
    },
    {
      path: "/pages/landing-pages/about-us",
      name: "about",
      component: AboutView,
    },
    {
      path: '/annonces/:id',
      name: 'annoncesUnique',
      component: AnnoncesUnique,
      props: true,
    },
    {
      path: '/user/:user_id',
      name: 'userUnique',
      component: UserUnique,
      props: true,
    },
    {
      path: "/recherche",
      name: "recherche",
      component: ResultPage,
      // props: route => ({ results: route.query.results }),
      // props: route => ({
      //   search_string: route.query.search_string || '',
      //   selected_city_id: route.query.selected_city_id || '',
      //   selected_category_id: route.query.selected_category_id || '',
      // }),
      props: route => ({
        results: JSON.parse(route.query.results) // Utilisez route.query.results
      }),
    },
    {
      path: "/annonces",
      name: "annonces",
      component: Annonces,
    },
    {
      path: '/mon-compte',
      name: 'RedirectToDashboard',
      component: RedirectToDashboard,      
      beforeEnter: (to, from, next) => {
        const userData = JSON.parse(localStorage.getItem('userData'));
        if (!userData) {
          next('/se-connecter');  // Redirect to /mon-compte if logged in
        } else {
          next();  // Continue to the login page
        }
      },
    },
    {
      path: '/admin/dashboard',
      name: 'AdminDashboard',
      beforeEnter: (to, from, next) => {
        // Votre logique de redirection pour le tableau de bord administrateur de CodeIgniter ici
        // Si l'utilisateur est un administrateur, redirigez-le vers la page d'administration de CodeIgniter
        // Sinon, redirigez-le vers la page de tableau de bord utilisateur Vue.js
      }
    },
    {
      path: '/user/dashboard',
      name: 'UserDashboard',
      component: UserDashboard, // Composant de tableau de bord de l'utilisateur
      beforeEnter: (to, from, next) => {
        // Vérifiez si l'utilisateur est connecté ou non
        const userData = JSON.parse(localStorage.getItem('user_data'));
        if (!userData) {
          // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
          next('/mon-compte');
        } else {
          // Si l'utilisateur est connecté, vérifiez si son rôle est celui d'utilisateur
          if (userData.role_id !== 2) {
            // Si l'utilisateur n'est pas un utilisateur, redirigez-le vers la page d'administration de CodeIgniter
            next('/admin/dashboard');
          } else {
            // Si l'utilisateur est un utilisateur, laissez-le accéder au tableau de bord utilisateur Vue.js
            next();
          }
        }
      }
    },
    {
      path: "/pages/landing-pages/contact-us",
      name: "contactus",
      component: ContactView,
    },
    {
      path: "/pages/landing-pages/author",
      name: "author",
      component: AuthorView,
    },
    {
      path: "/depose_annonces",
      name: "depose_annonces",
      component: deposeAnnonce,
    },
    {
      path: "/se-connecter",
      name: "signin-basic",
      component: SignInBasicView,
      beforeEnter: (to, from, next) => {
        const userData = JSON.parse(localStorage.getItem('userData'));
        if (userData) {
          next('/mon-compte');  // Redirect to /mon-compte if logged in
        } else {
          next();  // Continue to the login page
        }
      },
    },
    {
      path: "/register",
      name: "signin-up",
      component: Register,
    },
    {
      path: "/sections/page-sections/page-headers",
      name: "page-headers",
      component: PageHeaders,
    },
    {
      path: "/sections/page-sections/features",
      name: "page-features",
      component: PageFeatures,
    },
    {
      path: "/sections/navigation/navbars",
      name: "navigation-navbars",
      component: NavigationNavbars,
    },
    {
      path: "/sections/navigation/nav-tabs",
      name: "navigation-navtabs",
      component: NavigationNavTabs,
    },
    {
      path: "/sections/navigation/pagination",
      name: "navigation-pagination",
      component: NavigationPagination,
    },
    {
      path: "/sections/input-areas/inputs",
      name: "inputareas-inputs",
      component: InputAreasInputs,
    },
    {
      path: "/sections/input-areas/forms",
      name: "inputareas-forms",
      component: InputAreasForms,
    },
    {
      path: "/sections/attention-catchers/alerts",
      name: "ac-alerts",
      component: ACAlerts,
    },
    {
      path: "/sections/attention-catchers/modals",
      name: "ac-modals",
      component: ACModals,
    },
    {
      path: "/sections/attention-catchers/tooltips-popovers",
      name: "ac-tooltips-popovers",
      component: ACTooltipsPopovers,
    },
    {
      path: "/sections/elements/avatars",
      name: "el-avatars",
      component: ElAvatars,
    },
    {
      path: "/sections/elements/badges",
      name: "el-badges",
      component: ElBadges,
    },
    {
      path: "/sections/elements/breadcrumbs",
      name: "el-breadcrumbs",
      component: ElBreadcrumbs,
    },
    {
      path: "/sections/elements/buttons",
      name: "el-buttons",
      component: ElButtons,
    },
    {
      path: "/sections/elements/button-groups",
      name: "el-button-groups",
      component: ElButtonGroups,
    },
    {
      path: "/sections/elements/dropdowns",
      name: "el-dropdowns",
      component: ElDropdowns,
    },
    {
      path: "/sections/elements/progress-bars",
      name: "el-progress-bars",
      component: ElProgressBars,
    },
    {
      path: "/sections/elements/toggles",
      name: "el-toggles",
      component: ElToggles,
    },
    {
      path: "/sections/elements/typography",
      name: "el-typography",
      component: ElTypography,
    },
  ],
});
// router.beforeEach((to, from, next) => {
//   if (to.path === '/mon-compte' && !authStore.isLoggedIn) {
//     next('/se-connecter');
//   } else {
//     next();
//   }
// });
export default router;
