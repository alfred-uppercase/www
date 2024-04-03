import axios from 'axios';
export default {
    async login(param) {
        return axios.post('http://localhost/api/validate_login_api',param)
    },

    async register(param){
        return axios.post('http://localhost/api/register_post',param)
    }
}