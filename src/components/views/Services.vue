<template>
    <div class="container">
        <div class="page-content" v-if="!loading">
            <BannerSection v-bind:slug="'services'" />
            <Cars />
            <ServicesSection />
        </div>

        <Loading v-else />
    </div>
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Cars from '../partials/services/Cars'
import ServicesSection from '../partials/global/ServicesSection'

import Loading from '../partials/global/Loading'

export default {
    name: 'Services',
    components: {
        BannerSection,
        Cars,
        ServicesSection,
        Loading
    },
    data() {
        return {
            loading: false
        }
    },
    metaInfo() {
        return {
            title: 'Friendly Cab - Services',
            meta: [
                { name: 'description', content: 'Have a look at what we offer and how we beat our competition' },
                { property: 'og:title', content: 'Friendly Cab - Services'},
                { property: 'og:site_name', content: 'Friendly Cab'},
                { property: 'og:description', content: 'Have a look at what we offer and how we beat our competition' }
            ]
        }
    }
}
</script>