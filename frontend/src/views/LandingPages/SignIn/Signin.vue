<!-- <script setup>



</script> -->
<template >
    <div class="bg-sigin">
  
      <div class="row justify-content-md-center">
        <div class="col-5">
          <div class="card mt-7 max-width-498">
            <div class="card-body">
              <div class="type-compte" v-if="isTypeCompte">
                <h5 class="card-title mb-4">Créez un compte</h5>
                <p>Bénéficiez d’une expérience personnalisée avec du contenu en lien avec votre activité et vos centres
                  d’intérêt sur notre service.</p>
                <div role="radiogroup" aria-orientation="vertical" dir="ltr" data-spark-component="radio-group"
                  class="flex flex-col gap-lg" tabindex="0" data-orientation="vertical" style="outline: none;">
                  <div class="flex items-start gap-md text-body-1">
                    <button type="button" role="radio" aria-checked="false" data-state="unchecked" value="part"
                      class="flex shrink-0 items-center justify-center rounded-full border-md outline-none hover:ring-4 focus-visible:ring-2 focus-visible:ring-on-surface disabled:cursor-not-allowed disabled:border-outline/dim-2 disabled:hover:ring-transparent u-shadow-border-transition h-sz-24 w-sz-24 border-outline spark-state-checked:border-basic hover:ring-basic-container"
                      id="radix-10" aria-labelledby="radix-12" data-qa-id="part" data-testid="part" tabindex="0"
                      data-orientation="vertical" data-radix-collection-item="" @click="personnel">
                      <span data-state="unchecked"
                        class="relative block h-3/5 w-3/5 after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:h-none after:w-none after:block after:rounded-[50%] after:content-[''] after:transition-all after:spark-state-checked:h-full after:spark-state-checked:w-full after:bg-basic"></span></button><label
                      class="grow cursor-pointer" for="radix-10" id="radix-12">Pour vous *</label>
                  </div>
                  <div class="flex items-start gap-md text-body-1">
                    <button type="button" role="radio" aria-checked="false" data-state="unchecked" value="pro"
                      class="flex shrink-0 items-center justify-center rounded-full border-md outline-none hover:ring-4 focus-visible:ring-2 focus-visible:ring-on-surface disabled:cursor-not-allowed disabled:border-outline/dim-2 disabled:hover:ring-transparent u-shadow-border-transition h-sz-24 w-sz-24 border-outline spark-state-checked:border-basic hover:ring-basic-container"
                      id="radix-11" aria-labelledby="radix-13" data-qa-id="pro" data-testid="pro" tabindex="-1"
                      data-orientation="vertical" data-radix-collection-item="" @click="SignInCompany">
                      <span data-state="unchecked"
                        class="relative block h-3/5 w-3/5 after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2 after:h-none after:w-none after:block after:rounded-[50%] after:content-[''] after:transition-all after:spark-state-checked:h-full after:spark-state-checked:w-full after:bg-basic"></span></button><label
                      class="grow cursor-pointer" for="radix-11" id="radix-13">Pour votre entreprise</label>
                  </div>
                </div>
                <div class="flex gap-md mt-4"><span class="text-body-1">Vous avez déjà un compte ?</span><a
                    class="underline cursor-pointer text-body-1-link font-bold" data-qa-id="login">Me connecter</a>
                </div>
                <div class="flex flex-col gap-lg pt-lg border-t-sm border-neutral">
                  <p class="text-caption text-on-surface"><span>* Vous agissez à titre professionnel ?</span><a
                      class="underline cursor-pointer font-bold text-caption-link text-support ml-md">Créez plutôt un compte
                      pro !</a></p>
                  <p class="text-small text-on-surface">À défaut, en application de l’article L 132-2 du Code de la
                    consommation qui sanctionne les pratiques commerciales trompeuses, vous encourez une peine
                    d’emprisonnement de 2 ans et une amende de 300 000 euros.</p>
                </div>
              </div>
              <div class="comm-email " v-if="isPersCommenceMail">
                <form @submit.prevent="sendCodebyEmail()">
                  <h1 class="text-display-3 text-on-surface">Commençons par un e-mail</h1>
                  <div data-spark-component="form-field" class="!gap-sm text-body-1 flex flex-col gap-sm mb-4">
                    <label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-7"
                      for="email">E-mail<span data-spark-component="label-required-indicator" role="presentation"
                        aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                    <div class="relative inline-flex w-full after:hidden after:hidden">
                      <div class="relative inline-flex w-full">
                        <input id="email" name="email" v-model="email"
                          class=" border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg"
                          required="" aria-invalid="false" type="email" autocomplete="email">
                      </div>
                    </div>
                  </div>
                  <div data-spark-component="checkbox" class="mb-2 flex items-start gap-md text-body-1 mt-lg mb-2xl"><button
                      type="button" role="checkbox" aria-checked="false" data-state="unchecked" value="on"
                      class=" border-gray h-sz-24 w-sz-24 shrink-0 items-center justify-center rounded-sm border-md bg-transparent outline-none "
                      id="radix-9" aria-labelledby="radix-11"></button><input type="checkbox" aria-hidden="true"
                      tabindex="-1" value="on"
                      style="transform: translateX(-100%); position: absolute; pointer-events: none; opacity: 0; margin: 0px; width: 23.9844px; height: 23.9844px;"><label
                      data-spark-component="label" class="text-body-1 grow cursor-pointer" for="radix-9"
                      id="radix-11">Recevoir les bons plans de nos sites partenaires</label></div>
                      <Alert v-if="msg" :msg="msg" :classAlert="classAlert"></Alert>
                  
                      <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton">Suivant</button>
                  <div
                    class="py-lg border-t-sm border-t-neutral text-neutral text-caption sm:py-none sm:border-t-none mt-lg">
                    <a
                      class="underline cursor-pointer underline cursor-pointer text-neutral hover:text-neutral-hovered focus:text-neutral-focused active:text-neutral-pressed">Me
                      renseigner</a> sur les finalités du traitement de mes données personnelles, les destinataires, le
                    responsable du traitement, les durées de conservation, les coordonnées du DPO et mes droits
                  </div>
                </form>
              </div>
              <div class="code-verification" v-if="isVerificationCode">
                <form @submit.prevent="ValidationCode()">
                <div
                  class="px-lg mx-auto py-xl flex flex-col gap-2xl bg-background max-md:h-full max-w-[498px] md:shadow md:rounded-lg md:p-2xl md:mt-[56px]">
                  <div class="flex flex-col gap-md">
                    <h1 class="text-on-surface text-display-3">Vérifions ensemble votre e-mail.</h1>
                    <p class="text-body-1 text-on-surface">Saisissez le code reçu à l’adresse e‑mail
                      :<br><b>{{ email }}</b></p>
                  </div>
                  <div class="relative">
                    <input
                      class="border-gray relative ring-1 ring-inset mb-2 peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral  rounded-l-lg rounded-r-lg pl-lg pr-lg w-full h-full"
                      type="text" 
                      data-testid="code-input" style="height: 40px;" v-model="codeVerification">
  
                  </div>
                  <Alert v-if="msg" :msg="msg" :classAlert="classAlert"></Alert>
                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton">Suivant</button>
                  <div class="flex items-center gap-md flex-row w-full flex justify-center flex-wrap"
                    data-testid="questionAction">
                    <div data-testid="questionText">
                      <p class="text-callout">Je n’ai rien reçu</p>
                    </div>
                    <div data-testid="actionTextLink" tabindex="0"><a
                        class="underline cursor-pointer underline cursor-pointer text-main-variant hover:text-main-variant-hovered focus:text-main-variant-focused active:text-main-variant-pressed text-subhead">Me
                        renvoyer un code</a></div>
                  </div>
                </div>
            </form>
              </div>
              <div class="definir-pwd" v-if="isDefPwd">
                <div class="flex flex-col gap-md grow-0">
                  <h1 class="text-headline-1-expanded font-bold">Définissez votre mot de passe</h1>
                  <p class="text-callout font-regular">Choisissez un mot de passe que vous n’utilisez nulle part ailleurs.
                  </p>
                  <div class="flex flex-col mb-2xl">
                    <div data-spark-component="form-field" class="!w-full !gap-sm flex flex-col gap-sm"><label
                        data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-26"
                        for="password">Mot de passe<span data-spark-component="label-required-indicator" role="presentation"
                          aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                      <div class="relative inline-flex w-full after:hidden after:hidden">
                        <div class="relative inline-flex w-full"><input id="password" name="password"
                            class="border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-none pl-lg pr-lg"
                            required="" aria-invalid="false" autocomplete="new-password" type="password" v-model="password"></div>
                        <div class="rounded-r-lg">
                          <button
                            class="border-gray u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset bg-surface min-w-sz-44 h-sz-44 rounded-lg text-on-surface hover:bg-surface-hovered enabled:active:bg-surface-pressed focus-visible:bg-surface-focused px-none text-body-1 overflow-hidden ring-1 ring-inset shrink-0 h-full focus-visible:relative focus-visible:z-raised ring-outline ml-[-1px] !rounded-l-none rounded-r-lg"
                            @click="toggleShow">
                            <i class="fas my-auto" :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div><button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold focus-visible:outline-none focus-visible:u-ring [&amp;:not(:focus-visible)]:ring-inset min-w-sz-44 h-sz-44 rounded-lg cursor-not-allowed opacity-dim-3 bg-main text-on-main hover:bg-main-hovered enabled:active:bg-main-pressed focus-visible:bg-main-focused w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton" @click="savePassword">Suivant</button>
                </div>
              </div>
              <!-- <div class="definir-tel" v-if="isDefTel">
                <div
                  class="px-lg mx-auto py-xl flex flex-col gap-2xl bg-background max-md:h-full max-w-[498px] md:shadow md:rounded-lg md:p-2xl md:mt-[56px]">
                  <div class="flex flex-col gap-sm grow-0">
                    <h1 class="text-headline-1-expanded font-bold">Complétons avec un numéro de téléphone</h1>
                    <p class="text-callout font-regular">Améliorer votre expérience est notre priorité : renseignez votre
                      numéro de téléphone mobile pour protéger votre compte</p>
                    <form>
                      <div data-spark-component="form-field" class="mt-xl text-body-1 flex flex-col gap-sm"><label
                          data-spark-component="form-field-label" class="text-body-1 flex-row flex items-center gap-sm"
                          id="radix-24" for="phone_number" data-test-id="label">Numéro de téléphone<span
                            data-spark-component="label-required-indicator" role="presentation" aria-hidden="true"
                            class="text-caption text-on-surface/dim-3">*</span></label>
                        <vue-tel-input :value="phone" @input="onInput" mode="international"></vue-tel-input>
                      </div><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold border-0 mt-2"
                        aria-busy="false" aria-live="off"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                          data-title="InfoOutline" fill="currentColor" stroke="none"
                          class="fill-current text-current w-sz-24 h-sz-24" data-spark-component="icon" aria-hidden="true"
                          focusable="false">
                          <path
                            d="m12,16.82c.57,0,1.03-.46,1.03-1.03v-4.64c0-.57-.46-1.03-1.03-1.03s-1.03.46-1.03,1.03v4.64c0,.57.46,1.03,1.03,1.03Zm0-7.66c.78,0,1.41-.63,1.41-1.41s-.63-1.41-1.41-1.41-1.41.63-1.41,1.41.63,1.41,1.41,1.41Z">
                          </path>
                          <path fill-rule="evenodd"
                            d="m12,2C6.48,2,2,6.48,2,12s4.48,10,10,10,10-4.48,10-10S17.52,2,12,2Zm-7.89,10c0-4.36,3.53-7.89,7.89-7.89s7.89,3.53,7.89,7.89-3.53,7.89-7.89,7.89-7.89-3.53-7.89-7.89Z">
                          </path>
                        </svg><span class="text-body-2">En savoir plus</span></button><button data-spark-component="button"
                        class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold w-full mt-xl btn btn-theme mt-3"
                        type="submit" data-testid="submitButton" @click="verifieCodePhone">Suivant</button>
                    </form>
                  </div>
                </div>
              </div> -->
              <!-- <div class="code-verification" v-if="isVerificationCodePhone">
                <div
                  class="px-lg mx-auto py-xl flex flex-col gap-2xl bg-background max-md:h-full max-w-[498px] md:shadow md:rounded-lg md:p-2xl md:mt-[56px]">
                  <div class="flex flex-col gap-md">
                    <h1 class="text-on-surface text-display-3">Vérifions ensemble votre numéro de téléphone.</h1>
                    <p class="text-body-1 text-on-surface">Saisissez le code reçu au
                      :<br><b>{{ phone }}</b></p>
                  </div>
                  <div class="relative">
                    <input
                      class="border-gray relative ring-1 ring-inset mb-2 peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral  rounded-l-lg rounded-r-lg pl-lg pr-lg w-full h-full"
                      type="text" pattern="\d" autocomplete="one-time-code" inputmode="numeric" data-qa-id="code-input"
                      data-testid="code-input" style="height: 40px;" v-model="codeVerification">
  
                  </div>
                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton" @click="ValidationCodePhone">Suivant</button>
                  <div class="flex items-center gap-md flex-row w-full flex justify-center flex-wrap"
                    data-testid="questionAction">
                    <div data-testid="questionText">
                      <p class="text-callout">Je n’ai rien reçu</p>
                    </div>
                    <div data-testid="actionTextLink" tabindex="0"><a
                        class="underline cursor-pointer underline cursor-pointer text-main-variant hover:text-main-variant-hovered focus:text-main-variant-focused active:text-main-variant-pressed text-subhead">Me
                        renvoyer un code</a></div>
                  </div>
                </div>
              </div> -->
  
              <div class="code-verification" v-if="isDefNom">
                <form @submit.prevent="creationdecompte()">

                <div
                  class="px-lg mx-auto py-xl flex flex-col gap-2xl bg-background max-md:h-full max-w-[498px] md:shadow md:rounded-lg md:p-2xl md:mt-[56px]">
                  <div class="flex flex-col gap-md">
                    <h1 class="text-on-surface text-display-3">Et pour finir,</h1>
  
                  </div>
                  <div data-spark-component="form-field" class="!gap-sm text-body-1 flex flex-col gap-sm mb-4">
                <label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" for="genre">Genre</label>
                <div class="flex gap-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="homme" name="genre" value="Mr" v-model="genre">
                        <label class="form-check-label" for="homme">Mr</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="femme" name="genre" value="Mme" v-model="genre">
                        <label class="form-check-label" for="femme">Mme</label>
                    </div>
                </div>
            </div>
                  <div data-spark-component="form-field" class="!gap-sm text-body-1 flex flex-col gap-sm mb-4">
                    <label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-7"
                      for="nom">Nom<span data-spark-component="label-required-indicator" role="presentation"
                        aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                    <div class="relative inline-flex w-full after:hidden after:hidden">
                      <div class="relative inline-flex w-full">
                        <input id="name" name="name" v-model="name"
                          class=" border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg"
                          required="" aria-invalid="false" type="text">
                      </div>
                    </div>
                  </div>
                  <div data-spark-component="form-field" class="!gap-sm text-body-1 flex flex-col gap-sm mb-4">
                    <label data-spark-component="form-field-label" class="text-body-1 flex items-center gap-sm" id="radix-7"
                      for="prenom">Prénom<span data-spark-component="label-required-indicator" role="presentation"
                        aria-hidden="true" class="text-caption text-on-surface/dim-3">*</span></label>
                    <div class="relative inline-flex w-full after:hidden after:hidden">
                      <div class="relative inline-flex w-full">
                        <input id="prenom" name="prenom" v-model="lastname"
                          class=" border-gray relative ring-1 ring-inset peer box-border w-full appearance-none outline-none bg-surface text-ellipsis text-body-1 text-on-surface caret-neutral focus:ring-2 autofill:shadow-surface autofill:shadow-[inset_0_0_0px_1000px] disabled:cursor-not-allowed disabled:bg-on-surface/dim-5 disabled:text-on-surface/dim-3 read-only:cursor-default read-only:border-on-surface/dim-3 read-only:bg-on-surface/dim-5 h-sz-44 ring-outline hover:ring-outline-high focus:ring-outline-high disabled:ring-outline rounded-l-lg rounded-r-lg pl-lg pr-lg"
                          required="" aria-invalid="false" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center gap-md flex-row w-full flex justify-center flex-wrap"
                    data-testid="questionAction">
                    <div data-testid="questionText">
                      <p class="text-callout">Votre nom d'utilisateur sera visible sur votre profil ainsi que sur votre
                        futures annonces.Vous pouvez le moifier qquand vous le souhaitez!
                      </p>
                    </div>
  
                  </div>
                  <button data-spark-component="button"
                    class="u-shadow-border-transition box-border inline-flex items-center justify-center gap-md whitespace-nowrap px-lg text-body-1 font-bold  w-full btn btn-theme"
                    aria-live="off" type="submit" data-testid="submitButton">Créer un
                    compte</button>
                  <div class="flex items-center gap-md flex-row w-full flex justify-center flex-wrap"
                    data-testid="questionAction">
                    <div data-testid="questionText">
                      <p class="text-callout">En créant mon compte, je reconnais avoir lu et aaccepté les Conditions
                        Générles de vente et les Condition Générles d'Utilisation et je confirme être age d'au moins 18 ans
                      </p>
                    </div>
  
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
     
<script>
  import axios from 'axios';
  import Alert from "@/views/LandingPages/Signin/Alert.vue";
  import { ref } from 'vue'
  import { useRouter } from 'vue-router';
  export default {
    name: 'LoginPage',
    components: {
    //   VueTelInput,
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
            userData.append('email', this.email);
  
            axios.post('/api/pending_email/', userData)
            .then(response => {
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
  
            axios.post('/api/verify_email/', userData)
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
  
            axios.post('/api/register_post/', userData)
            .then(response => {
                if (response.data.success) {
                this.msg = response.data.message;
                this.classAlert = 'success';
                this.$router.push({ name: 'felicitation' })
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
        this.$router.push({ name: 'felicitation' })
      },
      SignInCompany(){
        this.$router.push({ name: 'signin-up-company' })
  
      }
  
    },
  };
  </script>
<style>
.alert{
    font-size: 1.2rem!important;
}
p, label{
  font-size: 1.2rem!important;
}
</style>