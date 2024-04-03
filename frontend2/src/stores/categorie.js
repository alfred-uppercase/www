import { defineStore } from "pinia";
import categorieApi from "../api/categorieApi";
export const useCategoryStore = defineStore({
    id: 'category',
    state: () => ({
      categories: [],
      subCategories:[],
      loading: false,
    }),
    getters: {
    //   getPostsPerAuthor: (state) => {
    //     return (authorId) => state.posts.filter((post) => post.userId === authorId)
    //   }
    }, 
    actions: {
      async getCategories() {
        this.categories = []
        
        this.loading=true
        try {
          const res = await categorieApi.getAll()
          this.categories= res.data
          
        } catch (error) {
          this.error = error
        } finally {
          this.loading = false
        }
      },
      async getsubCategories(param) {
        this.subCategories = []
        try {
          const res = await categorieApi.getSubCategorie(param)
          this.subCategories= res.data
          
        } catch (error) {
          this.error = error
        } finally {
          this.loading = false
        }
      },
    //   async fetchPost(id) {
    //     this.post = null
    //     this.loading = true
    //     try {
    //       this.post = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`)
    //       .then((response) => response.json())
    //     } catch (error) {
    //       this.error = error
    //     } finally {
    //       this.loading = false
    //     }
    //   }
    }
  })