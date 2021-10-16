<template>
    <section class="our-story-section" v-if="aboutObject">
        <div class="container">
            <h2 v-html="aboutObject.acf.our_story_section.title"></h2>
            <h3 v-html="aboutObject.acf.our_story_section.tagline"></h3>
            <p v-html="aboutObject.acf.our_story_section.details"></p>
             <VueSlickCarousel v-bind="settings">
               <div class="card" v-for="item in aboutObject.acf.our_story_section.image_section.image" :key="item.ID">
                    <div class="inner-card">
                        <img :src="item.url" :alt="item.alt" />
                    </div>
               </div>

                <template #prevArrow>
                    <div class="prevArrow">
                          <font-awesome-icon :icon="['fa','arrow-left']" />
                    </div>
                </template>
                
                <template #nextArrow>
                    <div class="nextArrow">
                          <font-awesome-icon :icon="['fa', 'arrow-right']" />
                    </div>
                </template>
            </VueSlickCarousel>
        </div>
    </section>
</template>

<script>
import store from '../../../store/shared_state'
import VueSlickCarousel from 'vue-slick-carousel'

export default {
    name: 'OurStory',
    components: {
        VueSlickCarousel
    },
    data() {
        return {
            settings:{
                infinite: false,
                slidesToShow: 3,
                speed: 500,
                swipe: true,
                slidesToScroll: 1,
                responsive: [
                    {
                    breakpoint: 1400,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                    breakpoint: 1399,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                    breakpoint: 767,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
               
            },    
        }
    },
    computed: {
        aboutObject() { return store.state.aboutContent }
    }
}
</script>