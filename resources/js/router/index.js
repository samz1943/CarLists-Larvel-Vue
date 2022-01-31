import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Layout from '../components/Layout'
import Example from '../components/ExampleComponent'

const routes = [
  {
    path: '/',
    component: Layout,
    children: [
      {
        path: '/',
        name: 'main',
        component: Example,
      },
    ]
  },
]

export default new Router ({
  routes
})