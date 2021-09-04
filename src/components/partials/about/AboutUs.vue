<template>
    <div class="container about-us-section">
       <div class="few-words-section">
            <div v-html="setAboutSectionData.tagline"> </div>
            <div v-html="setAboutSectionData.title"> </div>
            <div class="text" v-html="setAboutSectionData.details"> </div>

            <div class="about-content">
                <div class="about-header">
                    <div class="car-selector" v-for="(sec, index) in setAboutSectionData.list.list_item" :key="index" @click="showCar = index" :class="{ active: (showCar == index) }">
                        <span>{{ sec.title }}</span>
                    </div>
                </div>
                 <div class="about-main">
                    <transition name="fade"  v-for="(sec, index) in setAboutSectionData.list.list_item" :key="index">
                        <div class="single-car" v-if="showCar == index">
                             <span v-html="sec.details"></span>
                        </div>
                    </transition>
                </div>

               
            </div>
            
       </div>
       <div class="image-section">
            <div class="inner-sec">
                <img :src="setAboutSectionData.image_section.image.url" :alt="setAboutSectionData.image_section.image.alt" />
                <div class="text">
                    <p>{{setAboutSectionData.image_section.image_text}}</p>
                </div>
            </div>
       </div>
    </div>
</template>

<script>
import { setAboutContentMixin } from '../../../mixins'

export default {
    name: 'AboutUs',
    mixins: [setAboutContentMixin],
    data() {
        return {
            showCar: 0,
        }
    }
}
</script>