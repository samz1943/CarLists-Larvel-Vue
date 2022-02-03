import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Layout from '../components/Layout'
import Login from '../components/Login'
import User from '../components/User'
import UserProfile from '../components/UserProfile'
import Car from '../components/Car'
import CarAvailability from '../components/CarAvailability'
import Home from '../components/Home'

const routes = [
  {
    path: '/',
    component: Layout,
    children: [
      {
        path: '/',
        name: 'login',
        component: Login,
      },
      {
        path: 'home',
        name: 'home',
        component: Home,
      },
      {
        path: 'user',
        name: 'user',
        component: User,
      },
      {
        path: 'user/:id',
        name: 'userProfile',
        component: UserProfile,
      },
      {
        path: 'car',
        name: 'car',
        component: Car,
      },
      {
        path: 'car/:id/availability',
        name: 'carAvailability',
        component: CarAvailability,
      },
    ]
  },
]

export default new Router ({
    mode: 'history',
    routes
})