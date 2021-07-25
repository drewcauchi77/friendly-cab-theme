<template>
    <section class="details-section" v-if="!isContactLoading">
        <div class="container">
            <div class="section-title lower-below-text-border" v-html="setContactSectionData.title"></div>

            <div class="contact-details">
                <div class="single-contact" v-for="(detail, index) in setContactSectionData.contact_details" :key="index">
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
import { setContactContentMixin } from '../../../mixins'

export default {
    name: 'Details',
    mixins: [setContactContentMixin]
}
</script>