<template>
    <section class="container about-us-section" v-if="aboutObject">
       <div class="few-words-section">
            <div v-html="aboutObject.acf.about_section.tagline"> </div>
            <div v-html="aboutObject.acf.about_section.title"> </div>
            <div class="text" v-html="aboutObject.acf.about_section.details"> </div>

            <div class="about-content">
                <div class="about-header">
                    <div class="car-selector" v-for="(sec, index) in aboutObject.acf.about_section.list.list_item" :key="index" @click="showCar = index" :class="{ active: (showCar == index) }">
                        <span>{{ sec.title }}</span>
                    </div>
                </div>
                 <div class="about-main">
                    <transition name="fade"  v-for="(sec, index) in aboutObject.acf.about_section.list.list_item" :key="index">
                        <div class="single-car" v-if="showCar == index">
                             <span v-html="sec.details"></span>
                        </div>
                    </transition>
                </div>
            </div>
       </div>

       <div class="image-section">
            <div class="inner-sec">
                <img :src="aboutObject.acf.about_section.image_section.image.url" :alt="aboutObject.acf.about_section.image_section.image.alt" />
                <div class="text">
                    <p>{{ aboutObject.acf.about_section.image_section.image_text }}</p>
                </div>
            </div>
       </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'

export default {
    name: 'AboutUs',
    data() {
        return {
            showCar: 0,
        }
    },
    computed: {
        aboutObject() { return store.state.aboutContent }
    }
}
</script>