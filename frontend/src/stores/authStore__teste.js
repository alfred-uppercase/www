import { defineStore } from 'pinia';
import axios from 'axios';
// import { router } from '@/router';
import { useRouter } from "vue-router";

// import { useAlertStore } from '@/stores';

const baseUrl = `/api`;
const router = useRouter();

export const useAuthStore = defineStore({
    id: 'auth',
    state: () => ({
        user: JSON.parse(localStorage.getItem('user')),
        returnUrl: null
    }),
    actions: {
        async login(username, password) {
            try {
                const response = await axios.post(`${baseUrl}/validate_login_api`, { username, password });
                const user = response.data;

                // update pinia state
                this.user = user;

                // store user details and jwt in local storage to keep user logged in between page refreshes
                localStorage.setItem('user', JSON.stringify(user));

                // redirect to previous url or default to home page
                router.push(this.returnUrl || '/');
            } catch (error) {
                // const alertStore = useAlertStore();
                // alertStore.error(error.response.data.message);
            }
        },
        logout() {
            this.user = null;
            localStorage.removeItem('user');
            router.push('/login');
        }
    }
});
