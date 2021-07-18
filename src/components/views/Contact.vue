<template>
    <div class="container">
        <div class="page-content" v-if="!loading">
            <BannerSection v-bind:slug="'contact'" />
            <Details />
            <Form />
        </div>

        <Loading v-else />
    </div>
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Details from '../partials/contact/Details'
import Form from '../partials/contact/Form'

import Loading from '../partials/global/Loading'

export default {
    name: 'Contact',
    components: {
        BannerSection,
        Details,
        Form
    },
    data() {
        return {
            loading: false
        }
    },
    metaInfo() {
        return {
            title: 'Friendly Cab - Contact',
            meta: [
                { name: 'description', content: 'Contact us and let us know your request' },
                { property: 'og:title', content: 'Friendly Cab - Contact'},
                { property: 'og:site_name', content: 'Friendly Cab'},
                { property: 'og:description', content: 'Contact us and let us know your request' }
            ]
        }
    }
}
</script>