<template>
    <section class="services-section" v-if="!loading">
        <div class="services-container container">
            <div v-if="allServicesContent.title" class="section-title text-center lower-below-text-border" v-html="allServicesContent.title"></div>

            <div class="services-list">
                <div class="single-service" v-for="(service, index) in allServicesContent.services" :key="index">
                    <router-link :to="'/services/' + service.service.post_name">
                        <img :src="service.service.acf.image.url" :alt="service.service.acf.image.alt">
                    </router-link>

                    <div class="service-details">
                        <h3>{{ service.service.post_title }}</h3>
                        <div class="service-summary" v-html="service.service.acf.summary"></div>
                        <router-link class="button-blue" :to="'/services/' + service.service.post_name">Read more</router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    name: 'ServicesSection',
    data() {
        return {
            loading: true,
            allServicesContent: []
        }
    },
    props: {
        slug: String
    },
    created() {
        this.fetchServicesContent()
    },
    methods: {
        async fetchServicesContent() {
            const response = await axios.get('/wp-json/wp/v2/pages?slug='+this.slug)
            this.allServicesContent = response.data[0].acf.services_section
            this.loading = false
        }
    }
}
</script>