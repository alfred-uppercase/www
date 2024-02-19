<template>

         <div class="row justify-content-md-center mt-5">
             <div class="col-4">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title mb-4">Sign In</h5>
                         <form role="form" class="text-start" @submit.prevent="login()">
                             <!-- <p v-if="Object.keys(validationErrors).length != 0" class='text-center '><small class='text-danger'>Incorrect Email or Password</small></p> -->
                             <div class="mb-3">
                                 <label 
                                     htmlFor="email"
                                     class="form-label">
                                         Email ffaddress
                                 </label>
                                 <input 
                                     v-model="email"
                                     type="email"
                                     class="form-control"
                                     id="email"
                                     name="email"
                                 />
                             </div>
                             <div class="mb-3">
                                 <label 
                                     htmlFor="password"
                                     class="form-label">Password
                                 </label>
                                 <input 
                                     v-model="password"
                                     type="password"
                                     class="form-control"
                                     id="password"
                                     name="password"
                                 />
                             </div>
                             <p v-if="errorMsg" class="text-danger">{{ errorMsg }}</p>
                             <div class="d-grid gap-2">
                                <!-- <MaterialButton
                      class="my-4 mb-2"
                      variant="gradient"
                      type="submit"
                      color="success"
                      fullWidth
                      >S'inscrire</MaterialButton
                    > -->
                                 <button 
                         
                                     type="submit"
                                     class="btn btn-primary btn-block">Login</button>
                                 <p class="text-center">Don't have account? 
                                     <router-link to="/register">Register here </router-link>
                                 </p>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
          
 </template>
   
   <script>
   import { ref, computed } from "vue";
   import axios from 'axios';
  // import { useUserStore } from '@/stores/user'
   import { useAuthStore } from '@/stores/authStore';
   import { useRouter } from 'vue-router';
   
   export default {
     setup() {
       const authStore = useAuthStore();
       const router = useRouter();
       const userLoggedIn = computed(() => authStore.isLogin);
       const userData = computed(() => authStore.userData);
   
       const email = ref('');
       const password = ref('');
       const errorMsg = ref('');
   
       const login = () => {
         // Vérifiez d'abord si l'utilisateur est déjà connecté
         if (userLoggedIn.value) {
           router.push('/mon-compte');
           return; // Arrêtez l'exécution de la fonction ici pour éviter d'envoyer la requête au serveur
         }
   
         const loginData = new URLSearchParams();
         loginData.append('email', email.value);
         loginData.append('password', password.value);
   
         axios.post('/api/validate_login_api', loginData)
           .then(response => {
             if (response.data.status === 'success') {
               const userData = response.data.user_data;
   
               // Set user data in auth store
               authStore.login(userData);
   
               // Redirect to the appropriate dashboard
              //  redirectToDashboard(userData.role_id);
              router.push({name: 'UserDashboard'});
             } else {
               // If authentication fails, set the error message
               errorMsg.value = response.data.message;
             }
           })
           .catch(error => {
             errorMsg.value = 'Email ou mot de passe incorrect';
             console.error(error);
           });
       };
   
      //  const redirectToDashboard = (roleId) => {
      //    if (roleId === 1) {
      //      router.push('/testeaa');
      //    } else if (roleId === 2) {
      //      router.push('/teste');
      //    }
      //  };
      console.log('userLoggedIn before watch:', userLoggedIn);
       return { userLoggedIn, userData, email, password, errorMsg, login };
     },
   };
   
   </script>
   