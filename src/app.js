import Vue from 'vue'
import VueMeta from 'vue-meta'

import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

Vue.use(VueMeta)

new Vue({
    el: '#app',
    router,
    render: h => h(App),
})
