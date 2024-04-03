<!-- <script setup>
import { useLayout } from '@/layout/composables/layout';
// import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';

const { layoutConfig } = useLayout();
const email = ref('');
const password = ref('');
// const checked = ref(false);

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script> -->

<template>
    <div class="my-8 surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
        <div class="flex flex-column align-items-center justify-content-center">
            <img :src="logoUrl" alt="Sakai logo" class="mb-5 w-6rem flex-shrink-0" />
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Welcome</div>
                        <span class="text-600 font-medium">Sign in to continue</span>
                    </div>
                    <form role="form" class="text-start" @submit.prevent="login()">
                    <div>
                        <label for="email1" class="block text-900 text-xl font-medium mb-2">Email</label>
                        <InputText id="email1" type="text" placeholder="Email address" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="email" />

                        <label for="password1" class="block text-900 font-medium text-xl mb-2">Password</label>
                        <Password :feedback="false" id="password1" v-model="password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>

                        <div class="flex align-items-center justify-content-between mb-5 gap-5">
                            <div class="flex align-items-center">
                                <Checkbox v-model="checked" id="rememberme1" binary class="mr-2"></Checkbox>
                                <label for="rememberme1">Remember me</label>
                            </div>
                            <a class="font-medium no-underline ml-2 text-right cursor-pointer" style="color: var(--primary-color)">Forgot password?</a>
                        </div>
                        <Button :loading="loading" type="submit" label="Sign In" class="w-full p-3 text-xl"/>
                        <RouterLink to="/auth/register"><Button label="S'inscrire" class="my-2 w-full p-3 text-xl" severity="secondary" outlined/></RouterLink>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
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

      axios.post('http://localhost/api/validate_login_api', loginData)
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

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
svg.p-icon.p-input-icon{
  cursor: pointer;
}
</style>
