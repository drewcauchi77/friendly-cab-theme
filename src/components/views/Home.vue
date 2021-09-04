<template>
    <div class="home-content" v-if="homeObject">
        <div class="page-content">
            <Introduction />
            <HowItWorks v-if="homeObject.acf.how_it_works_section.enable_section" />
            <Cab v-if="homeObject.acf.cab_section.enable_section"/>
            <SchoolForm v-if="homeObject.acf.school_form_section.enable_section" />
            <Advantages v-if="homeObject.acf.advantages_section.enable_section" />
            <Testimonials v-if="homeObject.acf.testimonials_section.enable_section" />
        </div>
    </div>
</template>

<script>
import Introduction from '../partials/home/Introduction'
import HowItWorks from '../partials/home/HowItWorks'
import Cab from '../partials/home/Cab'
import SchoolForm from '../partials/home/SchoolForm'
import Advantages from '../partials/home/Advantages'
import Testimonials from '../partials/home/Testimonials'

import store from '../../store/shared_state'

export default {
    name: 'Home',
    components: {
        Introduction,
        HowItWorks,
        Cab,
        SchoolForm,
        Advantages,
        Testimonials,
    },
    computed: {
        homeObject() { return store.state.homeContent }
    },
    metaInfo() {
        return {
            title: 'Friendly Cab - Home',
            meta: [
                { name: 'description', content: 'Contact Friendly Cab to book your professional cab service' },
                { property: 'og:title', content: 'Friendly Cab - Home'},
                { property: 'og:site_name', content: 'Friendly Cab'},
                { property: 'og:description', content: 'Contact Friendly Cab to book your professional cab service' }
            ]
        }
    }
}
</script>