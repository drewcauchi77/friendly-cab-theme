import Vue from 'vue'
import VueMeta from 'vue-meta'
import VueSlickCarousel from 'vue-slick-carousel'

import App from './App.vue'
import router from './router'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

Vue.config.productionTip = false

Vue.use(VueSlickCarousel)
Vue.use(VueMeta)

new Vue({
    el: '#app',
    router,
    render: h => h(App),
})
