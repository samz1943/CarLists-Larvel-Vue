import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Layout from '../components/Layout'
import Login from '../components/Login'
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
    ]
  },
]

export default new Router ({
  routes
})