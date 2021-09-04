<template>
    <div class="about-content" v-if="aboutObject">
        <div class="page-content">
            <BannerSection v-bind:slug="'about'" />
            <AboutUs v-if="aboutObject.acf.about_section.enable_section" />
            <Benefits v-if="aboutObject.acf.benefits_section.enable_section" />
            <ServicesSection v-bind:slug="'about'" v-if="aboutObject.acf.services_section.enable_section" />
            <Additional v-if="aboutObject.acf.additional_section.enable_section" />
        </div>
    </div>
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import AboutUs from '../partials/about/AboutUs'
import Benefits from '../partials/about/Benefits'
import ServicesSection from '../partials/global/ServicesSection'
import Additional from '../partials/about/Additional'

import store from '../../store/shared_state'

export default {
    name: 'About',
    components: {
        BannerSection,
        AboutUs,
        Benefits,
        ServicesSection,
        Additional
    },
    computed: {
        aboutObject() { return store.state.aboutContent }
    },
    metaInfo() {
        return {
            title: 'Friendly Cab - About',
            meta: [
                { name: 'description', content: 'Have a look at what we offer and how we beat our competition' },
                { property: 'og:title', content: 'Friendly Cab - About'},
                { property: 'og:site_name', content: 'Friendly Cab'},
                { property: 'og:description', content: 'Have a look at what we offer and how we beat our competition' }
            ]
        }
    }
}
</script>