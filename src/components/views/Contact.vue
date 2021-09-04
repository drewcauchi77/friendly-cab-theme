<template>
    <div class="contact-content" v-if="contactObject">
        <div class="page-content">
            <BannerSection v-bind:slug="'contact'" />
            <Details v-if="contactObject.acf.contact_section.enable_section" />
            <Form v-if="contactObject.acf.form_section.enable_section" />
        </div>
    </div>
</template>

<script>
import BannerSection from '../partials/global/BannerSection'
import Details from '../partials/contact/Details'
import Form from '../partials/contact/Form'

import store from '../../store/shared_state'

export default {
    name: 'Contact',
    components: {
        BannerSection,
        Details,
        Form
    },
    computed: {
        contactObject() { return store.state.contactContent }
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