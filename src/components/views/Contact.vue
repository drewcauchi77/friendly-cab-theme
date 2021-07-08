<template>
    <div class="container">
        <div class="page-content" v-if="!loading">
            <BannerSection />
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
    }
}
</script>