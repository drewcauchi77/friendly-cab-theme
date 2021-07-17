import axios from 'axios'

export const setHomeContentMixin = {
    data() {
        return {
            setAdvantagesSectionData: [],
            setCabSectionData: [],
            setHowItWorksSectionData: [],
            setIntroductionSectionData: [],
            setSchoolFormSectionData: [],
            setTestimonialsSectionData: [],
            isHomeLoading: true
        }
    },
    created() {
        this.fetchHomeContent()
    },
    methods: {
        async fetchHomeContent(){
            const response = await axios.get('/wp-json/wp/v2/pages?slug=home')

            this.setAdvantagesSectionData = response.data[0].acf.advantages_section
            this.setCabSectionData = response.data[0].acf.cab_section
            this.setHowItWorksSectionData = response.data[0].acf.how_it_works_section
            this.setIntroductionSectionData = response.data[0].acf.introduction_section
            this.setSchoolFormSectionData = response.data[0].acf.school_form_section
            this.setTestimonialsSectionData = response.data[0].acf.testimonials_section
            console.log(this.setAdvantagesSectionData);
            this.isHomeLoading = false
        }
    },
}