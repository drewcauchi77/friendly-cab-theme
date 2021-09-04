<template>
    <section class="details-section" v-if="contactObject">
        <div class="container">
            <div class="section-title lower-below-text-border" v-html="contactObject.acf.contact_section.title"></div>

            <div class="contact-details">
                <div class="single-contact" v-for="(detail, index) in contactObject.acf.contact_section.contact_details" :key="index">
                    <div class="icon">
                        <img :src="detail.detail.icon.url" :alt="detail.detail.icon.alt">
                    </div>
                    <div class="title">
                        <h3>{{ detail.detail.title }}</h3>
                    </div>
                    <div class="contact" v-html="detail.detail.content">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'Details',
    computed: {
        contactObject() { return store.state.contactContent }
    }
}
</script>