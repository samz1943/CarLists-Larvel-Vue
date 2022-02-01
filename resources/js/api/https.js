import axios from 'axios'
import Vue from 'vue'
import store from '../store'
import router from '../router'

const vm = new Vue()

let http = axios.create({
  baseURL: "http://localhost:8000/api",
  timeout: 10000,
})

http.interceptors.request.use((config) => {
  config.headers = {
    "Accept": "application/json",
    Authorization: 'Bearer ' + localStorage.getItem('token')
  }

  return config
}, error => {
  return Promise.reject(error)
})

const interceptor = http.interceptors.response.use(response => {
  return response;
}, error => {
  switch (error.response.status) {
    case 401:
      //logout user
      console.log("401")
      localStorage.removeItem("token")
      store.commit('setLoggedIn', false)
      router.push('/')
      break
    case 404:
      console.log("404")
      break
    case 422:
      console.log("422")
      return Promise.reject(error.response)
      break
    case 500:
      console.log("500")
      localStorage.removeItem("token")
      store.commit('setLoggedIn', false)
      router.push('/')
      break
    default:
      console.log("error")
  }
  return Promise.reject(error)
})

export default http
