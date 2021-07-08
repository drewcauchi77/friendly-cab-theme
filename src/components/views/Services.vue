<template>
    <div class="container">
        <div class="page-content" v-if="!loading">
            <BannerSection />
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
    }
}
</script>