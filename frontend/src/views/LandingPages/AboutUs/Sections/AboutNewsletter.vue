<script setup>
import { onMounted } from "vue";
//Vue Material Kit 2 components
import MaterialInput from "@/components/MaterialInput.vue";
import MaterialButton from "@/components/MaterialButton.vue";

// material-input
import setMaterialInput from "@/assets/js/material-input";
onMounted(() => {
  setMaterialInput();
});

</script>
<template>
  <section class="my-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <h4>Soyez le premier à voir les nouvelles</h4>
          <p class="mb-4">
            Votre entreprise n'est peut-être pas active dans le secteur des logiciels, mais à terme, un
            une société de logiciels sera dans votre entreprise.
          </p>
          <form @submit.prevent="submitForm">

          <div class="row">
            <div class="col-8">

              <div class="form-group">
                      <input v-model="email" type="email" class="form-control" name="email" placeholder="Email *" required>
                    </div>
              <!-- <MaterialInput
                class="input-group-outline"
                id="email"
                :label="{ text: 'Votre email...', class: 'form-label' }"
                type="email"
              /> -->
            </div>
            <div class="col-4 ps-0">
              <MaterialButton
                variant="gradient"
                color="success"
                type="submit"
                class="mb-0 h-100 position-relative z-index-2"
                >S'abonner</MaterialButton
              >
            </div>
          </div>
          </form>
        </div>
        <div class="col-md-5 ms-auto mt-6 md-mt-0">
          <div class="position-relative">
            <img
              class="max-width-50 w-100 position-relative z-index-2"
              src="@/assets/img/macbook.png"
              alt="image"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      email: '',
    };
  },
  methods: {
    submitForm() {
      console.log('User Data:', this.email);
      
      const userData = new URLSearchParams();
      userData.append('email', this.email);

      // Make API request
      axios.post('/newsletter/subscribe', userData, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
    })
    .then(response => {
          // Handle the response based on your status
          if (response.data.status === 'success') {
            alert('Subscriber added successfully.');
          } else if (response.data.status === 'duplicate') {
            alert('Subscriber already exists.');
          } else {
            alert('Failed to add subscriber.');
          }
        })
        .catch(error => {
          console.error('An unexpected error occurred:', error);
        });

    },
  },
};
</script>
<style>
.m-auto h4{
  font-size: 50px;
  line-height: 50px;
}
</style>
