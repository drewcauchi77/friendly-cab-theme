<template>
    <div class="services-content" v-if="servicesObject">
        <div class="page-content">
            <BannerSection v-bind:slug="'services'" />
            <Cars v-if="servicesObject.acf.cars_section.enable_section" />
            <ServicesSection v-bind:slug="'services'" v-if="servicesObject.acf.services_section.enable_section" />
        </div>
    </div>
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Cars from '../partials/services/Cars'
import ServicesSection from '../partials/global/ServicesSection'

import store from '../../store/shared_state'

export default {
    name: 'Services',
    components: {
        BannerSection,
        Cars,
        ServicesSection
    },
    computed: {
        servicesObject() { return store.state.servicesContent }
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