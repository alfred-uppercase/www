<template >
    <div class="bg-sigin " >
      <div class="row justify-content-md-center ">
        <div class="col-5">
          <div class="card mt-7 max-width-498 mt-9">
            <div class="card-body">
  
  
              <div class="code-verification">
                <div
                  class="px-lg mx-auto py-xl flex flex-col gap-2xl bg-background max-md:h-full max-w-[498px] md:shadow md:rounded-lg md:p-2xl md:mt-[56px]">
                  <div class="flex flex-col gap-md">
                    <h1 class="text-on-surface text-display-3">Voilà. <br> Votre compte est crée!</h1>
  
                  </div>
                  <div class="flex items-center gap-md flex-row w-full flex justify-center flex-wrap"
                    data-testid="questionAction">
                    <div data-testid="questionText">
                      <p class="text-callout">vous pouvez  maintenant vendre,acheter,louer,chercher,discuter... et surtout trouver votre bonheur
                      </p>
                    </div>
  
                  </div>
                  <div class="mt-2 mb-2">
                      <ul>
                        <li><i class="far fa-check-circle text-success"></i> Adresse e-mail verifiée</li>
                        <li><i class="far fa-check-circle text-success"></i> Numéro de téléphone verifiée</li>
  
                      </ul>
                    </div>
                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton" @click="ValidationCodePhone">C'est parti</button>
                 
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
     
  <script>
  import axios from 'axios';
  import { ref } from 'vue'
  import { VueTelInput } from 'vue3-tel-input'
  import 'vue3-tel-input/dist/vue3-tel-input.css'
  
  export default {
    name: 'LoginPage',
    components: {
      VueTelInput,
    },
    data() {
      return {
        email: '',
        password: '',
        validationErrors: {},
        isSubmitting: false,
        isTypeCompte: true,
        isPersCommenceMail: false,
        isVerificationCode: false,
        codeVerification: 0,
        isDefPwd: false,
        showPassword: false,
        isDefTel: false,
        phone: '',
        isVerificationCodePhone: false,
        nom: '',
        isDefNom: false
      };
    },
    created() {
      if (localStorage.getItem('token') != "" && localStorage.getItem('token') != null) {
        this.$router.push('/user/dashboard')
      }
    },
    methods: {
      loginAction() {
        this.isSubmitting = true;
  
        // Validation côté client
        if (!this.email || !this.password) {
          this.validationErrors = { general: 'Email and password are required.' };
          this.isSubmitting = false;
          return;
        }
  
        let payload = {
          email: this.email,
          password: this.password,
        };
  
        axios.post('/api/validate_login/', payload)
          .then(response => {
            if (response.data && response.data.token) {
              localStorage.setItem('token', response.data.token);
              this.$router.push('/user/dashboard');
            } else {
              this.validationErrors = { general: 'Incorrect Email or Password.' };
              this.isSubmitting = false;
            }
          })
          .catch(error => {
            console.error('Axios Error:', error);
  
            this.isSubmitting = false;
  
            if (error.response && error.response.data && error.response.data.errors != undefined) {
              this.validationErrors = error.response.data.errors;
            } else if (error.response && error.response.data && error.response.data.error != undefined) {
              this.validationErrors = { general: error.response.data.error };
            } else {
              this.validationErrors = { general: 'An error occurred during login.' };
            }
          });
      },
      personnel() {
        this.isPersCommenceMail = true
        this.isTypeCompte = false
        this.isVerificationCode = false
        this.isDefPwd = false
        this.isDefTel = false
        this.isDefNom = false
  
      },
      sendCodebyEmail() {
        this.isPersCommenceMail = false
        this.isTypeCompte = false
        this.isVerificationCode = true
        this.isDefPwd = false
        this.isDefTel = false
        this.isDefNom = false
  
  
      },
      ValidationCode() {
        this.isPersCommenceMail = false
        this.isTypeCompte = false
        this.isVerificationCode = false,
          this.isDefPwd = true
        this.isDefTel = false
        this.isDefNom = false
  
  
      },
      toggleShow() {
        const passwordField = document.querySelector('#password')
        if (passwordField.getAttribute('type') === 'password') passwordField.setAttribute('type', 'text')
        else passwordField.setAttribute('type', 'password')
        this.showPassword = !this.showPassword;
      },
      savePassword() {
        this.isPersCommenceMail = false
        this.isTypeCompte = false
        this.isVerificationCode = false,
          this.isDefPwd = false
        this.isDefTel = true
        this.isDefNom = false
  
      },
      verifieCodePhone() {
        this.isPersCommenceMail = false
        this.isTypeCompte = false
        this.isVerificationCode = false,
          this.isDefPwd = false
        this.isDefTel = false
        this.isVerificationCodePhone = true
        this.isDefNom = false
  
      },
      onInput(phone, phoneObject, input) {
        if (phoneObject?.formatted) {
          this.phone = phoneObject.formatted;
        }
      },
      ValidationCodePhone() {
        this.isPersCommenceMail = false
        this.isTypeCompte = false
        this.isVerificationCode = false,
          this.isDefPwd = false
        this.isDefTel = false
        this.isVerificationCodePhone = false
        this.isDefNom = true
  
      }
  
  
    },
  };
  </script>