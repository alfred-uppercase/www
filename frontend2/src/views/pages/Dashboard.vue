

<script setup>
import { computed, onMounted, watch, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/authStore';
import achatsVentes from '@/assets/img/examples/achats-ventes.avif';
import annonces from '@/assets/img/examples/annonces.avif';
import help from '@/assets/img/examples/help.avif';
import parametres from '@/assets/img/examples/parametres.avif';
import privateProfile from '@/assets/img/examples/private-profile.avif';
import securite from '@/assets/img/examples/securite.avif';
import vacances from '@/assets/img/examples/vacances.avif';
import axios from 'axios';



const store = useAuthStore();
const router = useRouter();

// Getter for checking if the user is logged in
const userLoggedIn = computed(() => store.isLogin);

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
const get_user_thumbnail = ref('');

onMounted(async () => {
    try {
      // Use the outer id variable, not the one defined in onMounted
      const currentId = userData.value.user_id;
      if (!currentId) {
        console.error('Error: User ID is undefined');
        return;
      }
  
      const get_user_thumbnails = await axios.get(`http://localhost/api/get_user_thumbnail/${userData.value.user_id}`);
      console.log('User thumbail:', get_user_thumbnails.data)
      get_user_thumbnail.value = get_user_thumbnails.data;

    } catch (error) {
      console.error('Error fetching single listing:', error);
    }
  });
console.log('userLoggedIn before watch:', userLoggedIn);

// Use watch to react to changes in userLoggedIn and userData
watch([userLoggedIn, userData], ([newUserLoggedIn, newUserData]) => {
  console.log('userLoggedIn ok:', newUserLoggedIn);
  console.log('userData:', newUserData);
});

  </script>

<template>
<!-- {{ user_data }} -->
<div v-if="userLoggedIn">
  {{ userData.name }}
  <Button label="Déconnecter" @click="logout" severity="danger" />
</div>
</template>
<!-- <script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/authStore';

export default {
  data() {
    return {
      listing_thumbnail:null,
      user_id:null,
      email:null,
    };
  },
  computed: {
    ...mapState(useAuthStore, ['isLogin','userData']),
  },
  mounted() {
    this.user_id = this.userData ? this.userData.user_id : null;
    this.email = this.userData ? this.userData.email : null;
  },
  methods: {
    handleThumbnailUpload() {
        this.listing_thumbnail = this.$refs.listing_thumbnail.files[0];
      },
    addFiles(){
        this.$refs.listing_images.click();
      },
      addPicture() {
      if (!this.user_id) {
        console.error("User ID is not available");
        return;
      }
      const listingData = new FormData();
      listingData.append('user_image', this.listing_thumbnail);
      listingData.append('email', this.email);

      axios.post('http://localhost/api/edit_user/' + this.user_id, listingData, {
      headers: {
        // 'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Type': 'multipart/form-data'
      },
    })
        .then(response => {
          // Handle successful response
          this.msg = 'Listing add successfull';
          this.classAlert = 'success';
          response.data.files;
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
  }
}
</script> -->