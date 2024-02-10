<template>

         <div class="row justify-content-md-center mt-5">
             <div class="col-4">
                 <div class="card">
                     <div class="card-body">
                         <h5 class="card-title mb-4">Sign In</h5>
                         <form role="form" class="text-start">
                             <!-- <p v-if="Object.keys(validationErrors).length != 0" class='text-center '><small class='text-danger'>Incorrect Email or Password</small></p> -->
                             <div class="mb-3">
                                 <label 
                                     htmlFor="email"
                                     class="form-label">
                                         Email address
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
                             <div class="d-grid gap-2">
                                 <button 
                                     :disabled="isSubmitting"
                                     @click="login()"
                                     type="button"
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
 import axios from 'axios';

   
 export default {
    data() {
        return {
            email: '',
            password: '',
            errorMsg: '',
        };
    },
    methods: {
        login() {
            const loginData = {
                email: this.email,
                password: sha1(this.password),
            };

            axios.post('/api/validate_login_api', loginData)
                .then(response => {
                    if (response.data.status === 'success') {
                        const userData = response.data.user_data;
                        // Set user data in local storage or Vuex store
                        localStorage.setItem('user_data', JSON.stringify(userData));
                        
                        // Redirect to the appropriate dashboard
                        if (userData.role_id === 1) {
                            this.$router.push('/admin/dashboard');
                        } else if (userData.role_id === 2) {
                            this.$router.push('/user/dashboard');
                        }
                    } else {
                        this.errorMsg = response.data.message;
                    }
                })
                .catch(error => {
                    this.errorMsg = 'An unexpected error occurred.';
                    console.error(error);
                });
        },
    },
};
</script>