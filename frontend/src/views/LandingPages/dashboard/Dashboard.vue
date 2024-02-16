<template>
    <div>
      <h1>Tableau de bord</h1>
      <div v-if="userLoggedIn">
        <p>Bienvenue, {{ userData.name }}!</p>
        <p>Votre rôle: {{ userData.role }}</p>
        <!-- Contenu spécifique à chaque rôle -->
        <div v-if="userData.role_id === 1"> <!-- Administrateur -->
          <!-- Contenu pour l'administrateur -->
        </div>
        <div v-else-if="userData.role_id === 2"> <!-- Utilisateur -->
          <!-- Contenu pour l'utilisateur -->
        </div>
      </div>
      <div v-else>
        <p>Veuillez vous connecter pour accéder à cette page.</p>
      </div>
    </div>
  </template>
  
  <script>
  import { computed } from 'vue';
 import { useRouter } from 'vue-router';
  
  import { useAuthStore } from '@/stores/authStore'; // Assurez-vous de mettre le chemin correct
  
  export default {
    setup() {
      const store = useAuthStore();
      const router = useRouter();
  
      // Getter pour vérifier si l'utilisateur est connecté
      const userLoggedIn = computed(() => store.isLoggedIn);
  
      // Getter pour obtenir les informations de l'utilisateur connecté
      const userData = computed(() => store.userData);
  
      const login = () => {
        // Logique pour rediriger vers la page de connexion
      };
  
      // Vérifiez si les données de l'utilisateur sont disponibles dans le localStorage
      const checkLocalStorage = () => {
        const userData = localStorage.getItem('user_data');
        if (userData) {
          store.login(JSON.parse(userData)); // Stockez les données de l'utilisateur dans le magasin Pinia
        } else {
          // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
          // Vous pouvez également afficher un message d'erreur
          // ou effectuer d'autres actions en fonction de vos besoins
          router.push('/login');
        }
      };
  
      // Appelez la fonction pour vérifier le localStorage lors du chargement de la page
      checkLocalStorage();
  
      return { userLoggedIn, userData, login };
    }
  };
  
//   export default {
//     data() {
//       return {
//         userData: null
//       };
//     },
//     mounted() {
//       // Vérifiez si l'utilisateur est connecté
//       const userData = localStorage.getItem('user_data');
//       if (userData) {
//         this.userData = JSON.parse(userData);
//       } else {
//         // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
//         this.$router.push('/login');
//       }
//     }
//   };
  </script>
  