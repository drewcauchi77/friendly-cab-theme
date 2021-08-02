import Vue from 'vue'
import VueMeta from 'vue-meta'
import VueSlickCarousel from 'vue-slick-carousel'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faMapMarkerAlt, faEnvelope, faPhoneAlt, faSuitcase, faUser, faFan } from '@fortawesome/free-solid-svg-icons'
import { faFacebook, faTwitter, faInstagram, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from './App.vue'
import router from './router'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

Vue.config.productionTip = false

Vue.use(VueSlickCarousel)
Vue.use(VueMeta)

library.add(faMapMarkerAlt)
library.add(faEnvelope)
library.add(faPhoneAlt)
library.add(faSuitcase)
library.add(faUser)
library.add(faFan)
library.add(faFacebook)
library.add(faTwitter)
library.add(faInstagram)
library.add(faLinkedin)

Vue.component('font-awesome-icon', FontAwesomeIcon)

new Vue({
    el: '#app',
    router,
    render: h => h(App),
})
