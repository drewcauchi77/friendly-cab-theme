<template>
    <section class="services-section" v-if="servicesListObject">
        <div class="services-container container">
            <div v-if="servicesListObject.acf.services_section.title" class="section-title text-center lower-below-text-border" v-html="servicesListObject.acf.services_section.title"></div>

            <div class="services-list">
                <div class="single-service" v-for="(service, index) in servicesListObject.acf.services_section.services" :key="index">
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
            <transition name="fade" v-for="(service, index) in servicesListObject.acf.services_section.services" :key="index">
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
import store from '../../../store/shared_state'

export default {
    name: 'ServicesSection',
    data() {
        return {
            showModal: null,
        }
    },
    props: {
        slug: String
    },
    computed: {
        servicesListObject() {
            switch(this.slug) {
                case 'about':
                    return store.state.aboutContent
                    break
                case 'services':
                    return store.state.servicesContent
                    break
                default: 
                    return 0
            }
        }
    },
    methods: {
        openModal(index) {
            this.showModal = index
        },
        closeModal() {
            this.showModal = null
        }
    }
}
</script>