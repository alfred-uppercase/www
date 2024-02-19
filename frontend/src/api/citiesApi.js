import axios from 'axios';
export default {
    async getAll() {
        return axios.get('/api/get_cities')
    },
}