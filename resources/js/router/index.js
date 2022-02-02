import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Layout from '../components/Layout'
import Login from '../components/Login'
import User from '../components/User'
import Car from '../components/Car'
import CarAvailability from '../components/CarAvailability'
import Example from '../components/ExampleComponent'

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
        component: Example,
      },
      {
        path: 'user',
        name: 'user',
        component: User,
      },
      {
        path: 'car',
        name: 'car',
        component: Car,
      },
      {
        path: 'car/availability',
        name: 'car_availability',
        component: CarAvailability,
      },
    ]
  },
]

export default new Router ({
    mode: 'history',
    routes
})