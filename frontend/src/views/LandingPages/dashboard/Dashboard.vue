
<script>
  import { computed, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';

export default {
  setup() {
    const store = useAuthStore();
    const router = useRouter();

    // Getter for checking if the user is logged in
    const userLoggedIn = computed(() => store.isLoggedIn);

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
      return { userLoggedIn, userData, logout };
    },
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
  
<template>
    <div>
      <h1>Tableau de bord</h1>
      <div v-if="userLoggedIn">
        <p>Bienvenue, {{ userData.name }}!</p>
        <p>Votre rôle: {{ userData.role }}</p>
        <button @click="logout">Se déconnecter</button>
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
  
  