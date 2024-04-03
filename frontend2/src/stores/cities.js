import { defineStore } from "pinia";
import citiesApi from "../api/citiesApi";
export const useCitieStore = defineStore({
    id: 'cities',
    state: () => ({
      cities: [],
      loading: false,
    }),
    getters: {
   
    }, 
    actions: {
      async getCities() {
        this.cities = []
        this.loading=true
        try {
          const res = await citiesApi.getAll()
          this.cities= res.data
        } catch (error) {
          this.error = error
        } finally {
          this.loading = false
        }
      },
    
    }
  })