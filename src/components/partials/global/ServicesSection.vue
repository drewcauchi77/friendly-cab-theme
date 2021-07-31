<template>
    <section class="services-section" v-if="!loading">
        <div class="services-container container">
            <div v-if="allServicesContent.title" class="section-title text-center lower-below-text-border" v-html="allServicesContent.title"></div>

            <div class="services-list">
                <div class="single-service" v-for="(service, index) in allServicesContent.services" :key="index">
                    <div class="image-link" @click="openModal(index)" :style="{ backgroundImage: 'url(' + service.service.acf.image.url + ')' }">  </div>

                    <div class="service-details">
                        <h3>{{ service.service.post_title }}</h3>
                        <div class="service-summary" v-html="service.service.acf.summary"></div>
                        <span class="button-blue" @click="openModal(index)">Read more</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modals">
            <transition name="fade" v-for="(service, index) in allServicesContent.services" :key="index">
                <div class="modal" v-if="showModal == index">
                    <div class="underlay" @click="closeModal"></div>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>{{ service.service.post_title }}</h3>
                            <span class="close" @click="closeModal">&#10005;</span>
                        </div>
                        <div class="modal-details" v-html="service.service.acf.content"></div>
                        <router-link :to="service.service.acf.button.link" @click="closeModal" class="button-blue">{{ service.service.acf.button.text }}</router-link>
                    </div>
                </div>
            </transition>
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
            allServicesContent: [],
            showModal: null,
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
        },
        openModal(index) {
            this.showModal = index
        },
        closeModal() {
            this.showModal = null
        }
    }
}
</script>