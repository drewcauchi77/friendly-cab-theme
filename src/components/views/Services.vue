<template>
    <div class="services-content" v-if="!isServicesLoading">
        <div class="page-content">
            <BannerSection v-bind:slug="'services'" />
            <Cars />
            <ServicesSection />
        </div>
    </div>

    <Loading v-else />
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Cars from '../partials/services/Cars'
import ServicesSection from '../partials/global/ServicesSection'

import Loading from '../partials/global/Loading'

import { setServicesContentMixin } from '../../mixins'

export default {
    name: 'Services',
    components: {
        BannerSection,
        Cars,
        ServicesSection,
        Loading
    },
    mixins: [setServicesContentMixin],
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