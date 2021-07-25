<template>
    <footer v-if="!loading" >
        <div class="container">
            <div class="footer-container">
                <div class="upper-container">
                    <div class="site-logo">
                        <router-link to="/">
                            <img :src="footerSiteLogo.url" :alt="footerSiteLogo.alt">
                        </router-link>
                    </div>

                    <div class="contact-details">
                        <div class="single-contact">
                            <font-awesome-icon icon="map-marker-alt" />
                            <div class="contact address-contact" v-html="footerContactDetails.address"></div>
                        </div>

                        <div class="single-contact">
                            <font-awesome-icon icon="envelope" />
                            <div class="contact email-contact" v-html="footerContactDetails.email_address"></div>
                        </div>

                        <div class="single-contact">
                            <font-awesome-icon icon="phone-alt" />
                            <div class="contact phone-contact" v-html="footerContactDetails.phone_number"></div>
                        </div>
                    </div>
                </div>

                <div class="links-container">
                    <div class="navigation-container">
                        <Menu v-bind:slug="'footer'" />
                    </div>

                    <div class="social-container">
                        <div class="social-title" v-if="footerSocialDetails.title" v-html="footerSocialDetails.title"></div>

                        <ul class="social-links">
                            <li v-for="item in footerSocialDetails.item" :key="item.name">
                                <a :href="item.link" target="_blank">
                                    <font-awesome-icon :icon="['fab', item.icon_name]" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bottom-container">
                    <div class="rights">
                        <span>{{ footerBottomDetails.reserved_text }} {{ new Date().getFullYear() }}</span>
                    </div>

                    <ul class="policy-links">
                        <li v-for="(item, index) in footerBottomDetails.item" :key="index">
                            <router-link :to="item.link">
                                <span>{{ item.name }}</span>
                            </router-link>
                            <span v-if="footerBottomDetails.item.length > 1 && footerBottomDetails.item.length !== index+1">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import axios from 'axios'
import Menu from './Menu'

export default {
    name: 'Footer',
    components: {
        Menu
    },
    data() {
        return {
            loading: true,
            footerSiteLogo: [],
            footerContactDetails: [],
            footerSocialDetails: [],
            footerBottomDetails: []
        }
    },
    created() {
        this.fetchFooter()
    },
    methods: {
        async fetchFooter() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug=footer')
            this.footerSiteLogo = response.data[0].acf.site_logo
            this.footerContactDetails = response.data[0].acf.contact_section
            this.footerSocialDetails = response.data[0].acf.social_section
            this.footerBottomDetails = response.data[0].acf.bottom_section
            this.loading = false
        },
    }
}
</script>