import Vue from 'vue'
import VueMeta from 'vue-meta'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faMapMarkerAlt, faEnvelope, faPhoneAlt, faSuitcase, faUser, faFan, faArrowRight, faArrowLeft} from '@fortawesome/free-solid-svg-icons'
import { faFacebook, faTwitter, faInstagram, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from './App.vue'
import router from './router'
import store from './store/shared_state'
import { getContentObject } from './helpers/service'

library.add(faMapMarkerAlt)
library.add(faEnvelope)
library.add(faArrowRight)
library.add(faArrowLeft)
library.add(faPhoneAlt)
library.add(faSuitcase)
library.add(faUser)
library.add(faFan)
library.add(faFacebook)
library.add(faTwitter)
library.add(faInstagram)
library.add(faLinkedin)

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(VueSlickCarousel)
Vue.use(VueMeta)

Vue.config.productionTip = false

router.beforeEach((to, from, next) => {
    if(to.hash !== '') {
        var myVar = setInterval(function (){
            if(store.state.showLoader == false){
                setTimeout(function() {
                    window.scroll({
                        top: document.getElementById(to.hash.substring(1)).offsetTop - document.getElementById('site-header').offsetHeight - 45,
                        behavior: 'smooth'
                    });
                }, 500);
                clearInterval(myVar)
            }
        }, 200)
        next()
    } else {
        setTimeout(function() {
            window.scroll({
                top: 0,
                behavior: 'smooth'
            });
        }, 500);
        next()
    }
})

new Vue({
    router,
    data: {
        sharedState: store.state
    },
    computed: {
        homeObject() { return store.state.homeContent },
        aboutObject() { return store.state.aboutContent },
        servicesObject() { return store.state.servicesContent },
        contactObject() { return store.state.contactContent }
    },
    created() {
        getContentObject().then(res => {
            if(res === true) {
                setTimeout(function() { 
                    store.setShowLoader(false, 'init() -> created()')
                }, 1000);
            } else {
                store.setShowError(true, 'init() -> created()')
            }
        })
    },
    render: h => h(App)
}).$mount('#app')