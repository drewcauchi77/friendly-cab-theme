<template>
    <main class="page-content">
        <Loading v-if="showLoader" />
        
        <div v-else-if="!showLoader">
            <Header />
            <router-view></router-view>
            <Footer />
        </div>
    </main>
</template>

<script>
import store from './store/shared_state'
import Header from './components/partials/global/Header'
import Footer from './components/partials/global/Footer'

import Loading from './components/partials/global/Loading'

export default {
    components: {
        Header,
        Footer,
        Loading
    },
    computed: {
        showLoader() { return store.state.showLoader }
    },
    metaInfo() {
        return {
            title: 'Friendly Cab',
            meta: [
                { name: 'description', content: 'Your number #1 professional cab service' },
                { property: 'og:title', content: 'Friendly Cab'},
                { property: 'og:site_name', content: 'Friendly Cab'},
                { property: 'og:description', content: 'Your number #1 professional cab service' }
            ]
        }
    }
}
</script>