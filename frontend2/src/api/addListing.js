import axios from 'axios';
export default {

    async addListing(param){
        return axios.post('http://localhost/api/add_listing',param)
    }
}