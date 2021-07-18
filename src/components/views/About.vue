<template>
    <div class="about-content" v-if="!isAboutLoading">
        <div class="page-content">
            <BannerSection v-bind:slug="'about'" />
            <AboutUs />
            <Benefits />
            <ServicesSection />
            <Additional />
        </div>
    </div>

    <Loading v-else />
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import AboutUs from '../partials/about/AboutUs'
import Benefits from '../partials/about/Benefits'
import ServicesSection from '../partials/global/ServicesSection'
import Additional from '../partials/about/Additional'

import Loading from '../partials/global/Loading'

import { setAboutContentMixin } from '../../mixins'

export default {
    name: 'About',
    components: {
        BannerSection,
        AboutUs,
        Benefits,
        ServicesSection,
        Additional,
        Loading
    },
    mixins: [setAboutContentMixin],
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