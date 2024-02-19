import axios from 'axios';
export default {

    async addListing(param){
        return axios.post('/api/add_listing',param)
    }
}