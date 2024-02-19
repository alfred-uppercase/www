// authStore.js
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    isLoggedIn: false,
    userData: null,
  }),

  actions: {
    login(userData) {
      console.log('Logging in:', userData);
      this.isLoggedIn = true;
      this.userData = userData;
      localStorage.setItem('userData', JSON.stringify(userData));
    },

    logout() {
      this.isLoggedIn = false;
      this.userData = null;
      localStorage.removeItem('userData');
    },

    checkAuth() {
      const userData = localStorage.getItem('userData');
      if (userData) {
        this.isLoggedIn = true;
        this.userData = JSON.parse(userData);
      }
    },
  },
});
