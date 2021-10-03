<template>
    <footer v-if="footerObject">
        <div class="container">
            <div class="footer-container">
                <div class="upper-container">
                    <div class="site-logo">
                        <router-link to="/">
                            <img :src="footerObject.acf.site_logo.url" :alt="footerObject.acf.site_logo.alt">
                        </router-link>
                    </div>

                    <div class="contact-details">
                        <div class="single-contact">
                            <font-awesome-icon icon="map-marker-alt" />
                            <div class="contact address-contact" v-html="footerObject.acf.contact_section.address"></div>
                        </div>

                        <div class="single-contact">
                            <font-awesome-icon icon="envelope" />
                            <div class="contact email-contact" v-html="footerObject.acf.contact_section.email_address"></div>
                        </div>

                        <div class="single-contact">
                            <font-awesome-icon icon="phone-alt" />
                            <div class="contact phone-contact" v-html="footerObject.acf.contact_section.phone_number"></div>
                        </div>
                    </div>
                </div>

                <div class="links-container">
                    <div class="navigation-container">
                        <Menu v-bind:slug="'footer'" />
                    </div>

                    <div class="social-container">
                        <div class="social-title" v-html="footerObject.acf.social_section.title"></div>

                        <ul class="social-links">
                            <li v-for="item in footerObject.acf.social_section.item" :key="item.name">
                                <a :href="item.link" target="_blank">
                                    <font-awesome-icon :icon="['fab', item.icon_name]" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bottom-container">
                    <div class="rights">
                        <span>{{ footerObject.acf.bottom_section.reserved_text }} {{ new Date().getFullYear() }}</span>
                    </div>

                    <ul class="policy-links">
                        <li v-for="(item, index) in footerObject.acf.bottom_section.item" :key="index">
                            <router-link :to="item.link">
                                <span>{{ item.name }}</span>
                            </router-link>
                            <span v-if="footerObject.acf.bottom_section.item.length > 1 && footerObject.acf.bottom_section.item.length !== index+1">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import Menu from './Menu'

import store from '../../../store/shared_state'

export default {
    name: 'Footer',
    components: {
        Menu
    },
    computed: {
        footerObject() { return store.state.footerContent },
    },
}
</script>