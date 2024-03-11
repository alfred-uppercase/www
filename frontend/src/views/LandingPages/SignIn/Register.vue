<script setup>
import { onMounted } from "vue";

// example components
import DefaultNavbar from "@/examples/navbars/NavbarDefault.vue";
import Alert from "@/views/LandingPages/Signin/Alert.vue";
import Header from "@/examples/Header.vue";

//Vue Material Kit 2 components
import MaterialInput from "@/components/MaterialInput.vue";
import MaterialSwitch from "@/components/MaterialSwitch.vue";
import MaterialButton from "@/components/MaterialButton.vue";

// material-input
import setMaterialInput from "@/assets/js/material-input";
onMounted(() => {
  setMaterialInput();
});


</script>
<template>
  <DefaultNavbar transparent />
  <Header>
    <div
      class="page-header align-items-start min-vh-100"
      :style="{
        backgroundImage:
          'url(https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80)'
      }"
      loading="lazy"
    >
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div
                class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
              >
                <div
                  class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1"
                >
                  <h4
                    class="text-white font-weight-bolder text-center mt-2 mb-0"
                  >
                    S'inscrire
                  </h4>
                  <div class="row mt-3">
                    <!-- <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post" action="/api/register_post" @submit.prevent="register()">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="email" type="email" class="form-control" name="email" placeholder="Email *" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="password" type="password" class="form-control" name="password" placeholder="Mot de passe *" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="name" type="text" class="form-control" name="name" placeholder="Nom *" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="lastname" type="text" class="form-control" name="lastname" placeholder="Nom *" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="address" type="text" class="form-control" name="address" placeholder="Adresse *" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input v-model="phone" type="number" class="form-control" name="phone" placeholder="Phone *" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input v-model="siret" type="text" class="form-control" name="siret" placeholder="SIRET" required>
                  </div>
                  <div class="form-group">
                    <input v-model="nomdesociete" type="text" class="form-control" name="nomdesociete" placeholder="Company Name" required>
                  </div>
                  <div class="form-group">
                    <input v-model="adresse" type="text" class="form-control" name="adresse" placeholder="Company Address" required>
                  </div>
                  <div class="form-group">
                    <input v-model="codepostal" type="text" class="form-control" name="codepostal" placeholder="Postal Code" required>
                  </div>
                  <div class="form-group">
                    <input v-model="secteur" type="text" class="form-control" name="secteur" placeholder="Business Sector" required>
                  </div>
                  <Alert v-if="msg" :msg="msg" :classAlert="classAlert"></Alert>
                  <div class="text-center">
                    <MaterialButton
                      class="my-4 mb-2"
                      variant="gradient"
                      type="submit"
                      color="success"
                      fullWidth
                      >S'inscrire</MaterialButton
                    >
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Vous avez déjà un compte?
                    <RouterLink
                        :to="{ name: 'signin-basic' }"
                        class="text-success text-gradient font-weight-bold"
                      >
                      Se connecter
                      </RouterLink>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div
                class="copyright text-center text-sm text-white text-lg-start"
              >
                © {{ new Date().getFullYear() }},
                <a
                  href=""
                  class="font-weight-bold text-white"
                  target="_blank"
                  >Echri.store</a
                >
                Tout droit reservé
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul
                class="nav nav-footer justify-content-center justify-content-lg-end"
              >
                <li class="nav-item">
                  <a
                    href=""
                    class="nav-link text-white"
                    target="_blank"
                    >Accueil</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href=""
                    class="nav-link text-white"
                    target="_blank"
                    >Apropos</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href=""
                    class="nav-link text-white"
                    target="_blank"
                    >Nous contacter</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </Header>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      selectedCivilite: 'Mm',
      email: '',
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
    };
  },
  methods: {
    register() {
      console.log('User Data:', this.email, this.password, this.name, this.lastname, this.adresse, this.phone);
      console.log('User Company Data:', this.siret, this.nomdesociete, this.adresse, this.codepostal, this.secteur);
      // Prepare data for API request
      const userData = new URLSearchParams();
      userData.append('email', this.email);
      userData.append('password', this.password);
      userData.append('name', this.name);
      userData.append('lastname', this.lastname);
      userData.append('selected_civilite', this.selectedCivilite);
      userData.append('adresse', this.adresse);
      userData.append('address', this.address);
      userData.append('phone', this.phone);
      userData.append('siret', this.siret);
      userData.append('nomdesociete', this.nomdesociete);
      userData.append('codepostal', this.codepostal);
      userData.append('secteur', this.secteur);

      // Make API request
      axios.post('/api/register_post', userData, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
    })
        .then(response => {
          // Handle successful response
          this.msg = 'User registered successfully';
          this.classAlert = 'success';
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
  },
};
</script>