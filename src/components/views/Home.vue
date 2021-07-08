<template>
    <div class="container">
        <div class="page-content" v-if="!loading">
            <Introduction />
            <HowItWorks />
            <Cab />
            <SchoolForm />
            <Advantages />
            <Testimonials />
        </div>

        <Loading v-else />
    </div>
</template>

<script>
import Introduction from '../partials/home/Introduction'
import HowItWorks from '../partials/home/HowItWorks'
import Cab from '../partials/home/Cab'
import SchoolForm from '../partials/home/SchoolForm'
import Advantages from '../partials/home/Advantages'
import Testimonials from '../partials/home/Testimonials'

import Loading from '../partials/global/Loading'

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
    data() {
        return {
            loading: false
        }
    },
}
</script>