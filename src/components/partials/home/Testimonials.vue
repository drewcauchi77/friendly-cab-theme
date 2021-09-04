<template>
    <div class="container" v-if="homeObject">
        <div class="testimonials-section">
            <div class="section-title text-center lower-below-text-border" v-html="homeObject.acf.testimonials_section.title"></div>

            <VueSlickCarousel v-bind="settings">
               <div class="card" v-for="item in homeObject.acf.testimonials_section.testimonials" :key="item.testimonial.ID">
                    <div class="inner-card">
                        <p class="normal-text feedback" v-html="item.testimonial.acf.content.feedback"></p>
                        <div class="user-section">
                            <img :src="item.testimonial.acf.content.avatar.url" :alt="item.testimonial.acf.content.avatar.url"/>
                            <h4>{{item.testimonial.post_title}}</h4>
                            <p class="normal-text">{{item.testimonial.acf.content.title}}</p>
                        </div>
                    </div>
               </div>

                <template #prevArrow>
                    <div class="prevArrow"></div>
                </template>
                
                <template #nextArrow>
                    <div class="nextArrow"></div>
                </template>
            </VueSlickCarousel>

        </div>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import store from '../../../store/shared_state'

export default {
    name: 'Testimonials',
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
        homeObject() { return store.state.homeContent }
    }
}
</script>