<template>
    <div class="home-content" v-if="!isHomeLoading">
        <div class="page-content">
            <Introduction />
            <HowItWorks v-if="setHowItWorksSectionData.enable_section" />
            <Cab v-if="setCabSectionData.enable_section"/>
            <SchoolForm v-if="setSchoolFormSectionData.enable_section" />
            <Advantages />
            <Testimonials />
        </div>
    </div>
    
    <Loading v-else />
</template>

<script>
import Introduction from '../partials/home/Introduction'
import HowItWorks from '../partials/home/HowItWorks'
import Cab from '../partials/home/Cab'
import SchoolForm from '../partials/home/SchoolForm'
import Advantages from '../partials/home/Advantages'
import Testimonials from '../partials/home/Testimonials'

import Loading from '../partials/global/Loading'

import { setHomeContentMixin } from '../../mixins'

export default {
    name: 'Home',
    components: {
        Introduction,
        HowItWorks,
        Cab,
        SchoolForm,
        Advantages,
        Testimonials, 
        Loading
    },
    mixins: [setHomeContentMixin]
}
</script>