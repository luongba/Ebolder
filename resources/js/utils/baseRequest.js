import axios from 'axios'
import { Api } from "./Api";
const apiUrl = Api.baseUrlApi;

const instance = axios.create({
    baseURL: apiUrl,
    "Content-Type": "application/json",
})

instance.interceptors.response.use(function(response){
    return response
}, function (error) {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    // Do something with response error
    window.location.href = "/logout"
    return Promise.reject(error);
})
let token = window.localStorage.getItem("token");
if(token) {
    instance.defaults.headers['Authorization'] =  "Bearer " + token;
}

export default {
    getHeaders() {
        let token = window.localStorage.getItem("token");
        if (token == null) {
            return {};
        }
        return { Authorization: "Bearer " + token };
    },

    get(url) {
        return instance.get(url);
    },
    post(url, data) {
        return instance.post(url, data);
    },
    put(url, data) {
        return instance.put(url, data);
    },
};
