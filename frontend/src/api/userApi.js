import axios from 'axios';
export default {
    async login(param) {
        return axios.post('/api/validate_login_api',param)
    },

    async register(param){
        return axios.post('/api/register_post',param)
    }
}