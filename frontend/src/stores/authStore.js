// authStore.js
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    isLogin: false,
    userData: null,
  }),

  actions: {
    login(userData) {
      console.log('Logging in:', userData);
      this.isLogin = true;
      this.userData = userData;
      localStorage.setItem('userData', JSON.stringify(userData));
    },

    logout() {
      this.isLogin = false;
      this.userData = null;
      localStorage.removeItem('userData');
    },

    checkAuth() {
      const userData = localStorage.getItem('userData');
      if (userData) {
        this.isLogin = true;
        this.userData = JSON.parse(userData);
      }
    },
  },
});
