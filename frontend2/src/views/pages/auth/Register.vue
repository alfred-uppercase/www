<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';

const { layoutConfig } = useLayout();

const checked = ref(false);

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});

const Selectedcomptetype = ref('Production');
const comptetype = ref([
    { name: 'Pour moi', key: 'A' },
    { name: 'Pour mon entréprise', key: 'M' },
]);




</script>

<template>
    <div class="my-8 surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
        <div class="flex flex-column align-items-center justify-content-center">
            <img :src="logoUrl" alt="Sakai logo" class="mb-5 w-6rem flex-shrink-0" />
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <!--Type de compte-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isTypeCompte">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Profile</div>
                        <span class="text-600 font-medium">Bénéficiez d’une expérience personnalisée avec du contenu en <br>lien avec votre activité et vos centres d’intérêt sur notre service.</span>
                    </div>

                    <div>
                        <div class="card flex justify-content-center">
                            <div class="flex flex-column gap-3">
                                <!-- <div v-for="category in comptetype" :key="category.key" class="flex align-items-center">
                                    <RadioButton v-model="Selectedcomptetype" :inputId="category.key" name="dynamic" :value="category.name" />
                                    <label :for="category.key" class="ml-2">{{ category.name }}</label>
                                </div> -->
                                <div class="flex align-items-center">
                                    <RadioButton  inputId="1" name="dynamic" />
                                    <label for="1" class="ml-2" @click="personnel">Pour moi</label>
                                </div>
                                <div class="flex align-items-center">
                                    <RadioButton  inputId="2" name="dynamic" />
                                    <label for="2" class="ml-2" @click="SignInCompany">Pour mon entréprise</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Type de compte-->
                <!--Email-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isPersCommenceMail">
                    <form @submit.prevent="sendCodebyEmail()">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Commençons par un e-mail</div>
                        <span class="text-600 font-medium">Votre email adresse</span>
                    </div>

                    <div>
                        <div class="flex justify-content-center">
                            <div class="flex flex-column gap-3">
                                <!-- <div v-for="category in comptetype" :key="category.key" class="flex align-items-center">
                                    <RadioButton v-model="Selectedcomptetype" :inputId="category.key" name="dynamic" :value="category.name" />
                                    <label :for="category.key" class="ml-2">{{ category.name }}</label>
                                </div> -->
                                <InputText id="email1" type="text" placeholder="Email address" class="w-full md:w-30rem mb-5" style="padding: 1rem" v-model="email" />
                                <Alert class="my-7" v-if="msg" :msg="msg" :classAlert="classAlert"></Alert>
                            
                            </div>
                        </div>
                        <Button type="submit" class="my-2" label="Suivant" />

                    </div>
                </form>
                </div>
                <!--Email-->

                <!--Code de verification-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isVerificationCode">
                    <form @submit.prevent="ValidationCode()">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Authenticate Your Account</div>
                        <span class="text-600 font-medium">Please enter the code sent to your mail :<br/> <b>{{ email }}</b></span>
                    </div>

                    <div>
                        <div class="flex justify-content-center flex-column align-items-center">
                            <InputOtp v-model="codeVerification" :length="6" style="gap: 0">
                                <template  #default="{ attrs, events, index }">
                                    <input type="text" v-bind="attrs" v-on="events" class="custom-otp-input" />
                                    <div v-if="index === 3" class="px-3">
                                        <i class="pi pi-minus" />
                                    </div>
                                </template>
                            </InputOtp>
                            <Alert class="success px-0 my-2" v-if="msg" :msg="msg" :classAlert="classAlert"></Alert>

                            <div class="flex justify-content-between align-self-stretch">
                                <Button @click="sendCodebyEmail()" label="Resend Code" link class="p-0"></Button>
                                <Button type="submit" label="Submit Code"></Button>
                            </div>
                        </div>

                    </div>
                </form>
                </div>
                <!--Code de verification-->

                <!--Mot de passe-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDefPwd">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Mot de passe</div>
                        <span class="text-600 font-medium">Please enter the code sent to your mail.</span>
                    </div>

                    <div>
                        <div class="flex justify-content-center">
                            <div class="flex flex-column gap-3">
                                <!-- <div v-for="category in comptetype" :key="category.key" class="flex align-items-center">
                                    <RadioButton v-model="Selectedcomptetype" :inputId="category.key" name="dynamic" :value="category.name" />
                                    <label :for="category.key" class="ml-2">{{ category.name }}</label>
                                </div> -->
                            <Password id="password1" v-model="password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>
                            </div>
                        </div>
                        <Button  @click="savePassword" type="submit" class="my-2" label="Suivant" />
                    </div>
                </div>
                <!--Mot de passe-->

  
                <!--Information-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDefNom">
                    <form @submit.prevent="creationdecompte()">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Et pour finir,</div>
                        <!-- <span class="text-600 font-medium">Please enter the code sent to your mail.</span> -->
                    </div>

                    <div>
                        <div class="flex justify-content-center">
                            <div class="flex flex-column gap-3">
                                <div class="p-fluid formgrid grid">
                                    <div class="field col-12 md:col-6">
                                        <label for="firstname2">Nom</label>
                                        <InputText v-model="name" id="firstname2" type="text" />
                                    </div>
                                    <div class="field col-12 md:col-6">
                                        <label for="lastname2">Prénom</label>
                                        <InputText v-model="lastname" id="lastname2" type="text" />
                                    </div>
                                    <div class="field col-12">
                                        <label for="address">Address</label>
                                        <Textarea v-model="address" id="address" rows="4" />
                                    </div>
                                    <!-- <div class="field col-12 md:col-6">
                                        <label for="city">City</label>
                                        <InputText id="city" type="text" />
                                    </div>
                                    <div class="field col-12 md:col-3">
                                        <label for="state">State</label>
                                        <Dropdown id="state" v-model="dropdownItem" :options="dropdownItems" optionLabel="name" placeholder="Select One"></Dropdown>
                                    </div>
                                    <div class="field col-12 md:col-3">
                                        <label for="zip">Zip</label>
                                        <InputText id="zip" type="text" />
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <Button type="submit" class="my-2" label="Créer un compte" />

                    </div>
                </form>
                </div>
                <!--End Info-->

                <!--Congratulation-->
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px" v-if="isDefDone">
                    <div class="text-center mb-5">
                        <!-- <img src="/demo/images/login/avatar.png" alt="Image" height="50" class="mb-3" /> -->
                        <div class="text-900 text-3xl font-medium mb-3">Félicitaion ! </div>
                        <span class="text-600 font-medium">Vous pouvez maintenant vous connecter.</span>
                    </div>

                    <div>

                        <Button class="my-2" label="Se connecter" />

                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
</template>

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
.custom-otp-input {
    width: 48px;
    height: 48px;
    font-size: 24px;
    appearance: none;
    text-align: center;
    transition: all 0.2s;
    border-radius: 0;
    border: 1px solid var(--surface-400);
    background: transparent;
    outline-offset: -2px;
    outline-color: transparent;
    border-right: 0 none;
    transition: outline-color 0.3s;
    color: var(--text-color);
}

.custom-otp-input:focus {
    outline: 2px solid var(--primary-color);
}

.custom-otp-input:first-child,
.custom-otp-input:nth-child(5) {
    border-top-left-radius: 12px;
    border-bottom-left-radius: 12px;
}

.custom-otp-input:nth-child(3),
.custom-otp-input:last-child {
    border-top-right-radius: 12px;
    border-bottom-right-radius: 12px;
    border-right-width: 1px;
    border-right-style: solid;
    border-color: var(--surface-400);
}
</style>
<!-- <script setup>
import { ref } from 'vue';

const loading = ref(false);

</script> -->
<script>
    import axios from 'axios';
    import Alert from "./Alert.vue";
    import { ref } from 'vue'
    import { useRouter } from 'vue-router';

    export default {
      name: 'LoginPage',
      components: {
        Alert,
      },
      data() {
        return {
          msg: '',
          validationErrors: {},
          isSubmitting: false,
          isTypeCompte: true,
          isPersCommenceMail: false,
          isVerificationCode: false,
          // codeVerification: 0,
          isDefPwd: false,
          isDefDone: false,
          showPassword: false,
          isDefTel: false,
          phone: '',
          isVerificationCodePhone: false,
          // nom: '',
          isDefNom: false,
          genre: '',
          email: '',
          codeVerification: '',
          password: '',
          name: '',
          lastname: '',
          adresse: '',
          phone: '',
          siret: '',
          nomdesociete: '',
          adresse: '',
          codepostal: '',
          secteur: '',
          acceptTerms: false,
          // router : useRouter()
        };
      },
      methods: {
      sendCodebyEmail() {
              const userData = new URLSearchParams();
              const loading = ref(false);

              userData.append('email', this.email);
    
              axios.post('http://localhost/api/pending_email/', userData)
              .then(response => {
                    loading.value = true;
                    setTimeout(() => {
                        loading.value = false;
                    }, 2000);
                  this.msg = 'Code sent successful';
                  this.classAlert = 'success';
                  this.isPersCommenceMail = false;
                  this.isVerificationCode = true;
              })
              .catch(error => {
              // Handle error response
              if (error.response.status === 400) {
                  this.msg = 'Please fill in all the fieldsd';
              } else if (error.response.status === 500) {
                  this.msg = 'Internal Server Error. Please try again later.';
              } else {
                  this.msg = 'An unexpected error occurred.';
              }
              this.classAlert = 'error';
              });
        },
        ValidationCode() {
              const userData = new URLSearchParams();
              userData.append('email', this.email);
              userData.append('verification_code', this.codeVerification);
    
              axios.post('http://localhost/api/verify_email/', userData)
              .then(response => {
                  if (response.data.success) {
                  this.msg = response.data.message;
                  this.classAlert = 'success';
                  this.isPersCommenceMail = false
                  this.isTypeCompte = false
                  this.isVerificationCode = false,
                  this.isDefPwd = true
                  this.isDefTel = false
                  this.isDefNom = false
                  } else {
                      this.msg = response.data.message;
                      this.classAlert = 'error';
                  }
              })
              .catch(error => {
              // Handle error response
              console.log('False');
              if (error.response.status === 400) {
                  this.msg = 'Please fill in all the fieldsd';
              } else if (error.response.status === 500) {
                  this.msg = 'Internal Server Error. Please try again later.';
              } else {
                  this.msg = 'Code incorrect.';
              }
              this.classAlert = 'error';
              });
        },
        creationdecompte() {
              const userData = new URLSearchParams();
              userData.append('email', this.email);
              userData.append('password', this.password);
              userData.append('name', this.name);
              userData.append('lastname', this.lastname);
              userData.append('selected_civilite', this.genre);
    
              axios.post('http://localhost/api/register_post/', userData)
              .then(response => {
                  if (response.data.success) {
                  this.msg = response.data.message;
                  this.classAlert = 'success';
                //   this.$router.push({ name: 'felicitation' })
                    this.isDefDone = true
                    this.isDefNom = false
                    this.isTypeCompte = false
                    this.isVerificationCode = false
                    this.isDefPwd = false
                    this.isDefTel = false
                  } else {
                      this.msg = response.data.message;
                      this.classAlert = 'error';
                  }
              })
              .catch(error => {
              // Handle error response
              console.log('False');
              if (error.response.status === 400) {
                  this.msg = 'Please fill in all the fieldsd';
              } else if (error.response.status === 500) {
                  this.msg = 'Internal Server Error. Please try again later.';
              } else {
                  this.msg = 'Code incorrect.';
              }
              this.classAlert = 'error';
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
      //   sendCodebyEmail() {
      //     this.isPersCommenceMail = false
      //     this.isTypeCompte = false
      //     this.isVerificationCode = true
      //     this.isDefPwd = false
      //     this.isDefTel = false
      //     this.isDefNom = false
    
    
      //   },
      //   ValidationCode() {
      //     this.isPersCommenceMail = false
      //     this.isTypeCompte = false
      //     this.isVerificationCode = false,
      //       this.isDefPwd = true
      //     this.isDefTel = false
      //     this.isDefNom = false
    
    
      //   },
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
          this.isDefTel = false
          this.isDefNom = true
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
        },
    
        creation(){
        //   this.$router.push({ name: 'felicitation' })
        //   this.isDefDone = true
        },
        SignInCompany(){
          this.$router.push({ name: 'signin-up-company' })
    
        }
    
      },
    };
</script>
