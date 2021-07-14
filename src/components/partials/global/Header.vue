<template>
    <header v-if="!loading" >
        <div class="container">
            <div class="header-container">
                <div class="site-logo">
                    <router-link to="/">
                        <img :src="headerSiteLogo.url" :alt="headerSiteLogo.alt">
                        <span class="company-title">FRIENDLY CABS</span>
                    </router-link>
                </div>

                <div class="menu">
                    <div class="mobile-menu-icon" @click="openNavMenu" :class="{ transform: navMenuOpen}">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="navigation-container" :class="{ open: navMenuOpen }">
                        <Menu />
                        <div class="phone-details">
                            <a :href="this.phoneNumber">
                                <div class="phone-icon">
                                    <PhoneIcon />
                                </div>
                                <div class="details-text" v-html="headerPhoneDetails"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import axios from 'axios'
import Menu from './Menu'
import PhoneIcon from '../../icons/PhoneIcon'

export default {
    name: 'Header',
    components: {
        Menu,
        PhoneIcon
    },
     data() {
        return {
            loading: true,
            headerSiteLogo: [],
            headerPhoneDetails: null,
            navMenuOpen: false
        }
    },
    created() {
        this.fetchHeader()
    },
    computed: {
        phoneNumber() {
            const getPhoneNumber = /<strong>(.*?)<\/strong>/g.exec(this.headerPhoneDetails);
            return 'tel:'+getPhoneNumber[1]
        }
    },
    methods: {
        async fetchHeader() {
            const response = await axios.get('/wp-json/wp/v2/menus?slug=header')
            this.headerSiteLogo = response.data[0].acf.site_logo
            this.headerPhoneDetails = response.data[0].acf.additional_details.text
            this.loading = false
        },
        openNavMenu() {
            this.navMenuOpen = !this.navMenuOpen

            if(this.navMenuOpen){
                document.documentElement.style.overflowY = 'hidden'
            }else{
                document.documentElement.style.overflowY = 'auto'
            }
        }
    }
    
}
</script>
