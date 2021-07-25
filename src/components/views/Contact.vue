<template>
    <div class="contact-content" v-if="!isContactLoading">
        <div class="page-content">
            <BannerSection v-bind:slug="'contact'" />
            <Details v-if="setContactSectionData.enable_section" />
            <Form />
        </div>
    </div>

    <Loading v-else />
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Details from '../partials/contact/Details'
import Form from '../partials/contact/Form'

import Loading from '../partials/global/Loading'

import { setContactContentMixin } from '../../mixins'

export default {
    name: 'Contact',
    components: {
        BannerSection,
        Details,
        Form,
        Loading
    },
    mixins: [setContactContentMixin],
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