<template>
    <main class="page-content">
        <Header />
        <router-view></router-view>
        <Footer />
    </main>
</template>

<script>
import Header from './components/partials/global/Header'
import Footer from './components/partials/global/Footer'

export default {
    components: {
        Header,
        Footer
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