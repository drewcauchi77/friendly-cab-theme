import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../components/views/Home'
import About from '../components/views/About'
import Services from '../components/views/Services'
import Service from '../components/views/Service'
import Contact from '../components/views/Contact'
import NotFound from '../components/views/NotFound'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    component: About
  },
  {
    path: '/services',
    name: 'Services',
    component: Services
  },
  {
    path: '/services/:slug',
    name: 'Service',
    component: Service
  },
  {
    path: '/contact',
    name: 'Contact',
    component: Contact
  },
  {
    path: '*',
    name: 'NotFound',
    component: NotFound
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router