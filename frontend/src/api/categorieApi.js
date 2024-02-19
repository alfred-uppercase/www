import axios from 'axios';
export default {
    async getAll() {
        return axios.get('/api/get_categories_parent')
    },
    async getSubCategorie(param){
        return axios.get('/api/get_sub_categories/'+param)
    }
}