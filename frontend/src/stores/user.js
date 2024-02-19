import { defineStore } from "pinia";
import userApi from "../api/userApi";
export const useUserStore = defineStore({
  id: 'users',
  state: () => ({
    users: [],
    user: {},
    loading: false,
    isLogin: false,
  }),

  getters: {
    //   getPostsPerAuthor: (state) => {
    //     return (authorId) => state.posts.filter((post) => post.userId === authorId)
    //   }
  },
  actions: {
    async login(param) {
      this.user = {}
      try {
        const res = await userApi.login(param)
        console.log('resonse', res);
        this.user = res.data.user_data
        if (res.data.status) {
          this.isLogin = true
          localStorage.setItem('user_data', JSON.stringify(this.user));
        }

      } catch (error) {
        this.error = error
      } finally {
        this.loading = false
      }
    },

    async register(param) {
      const res = await userApi.register(param)

    }
  }
})