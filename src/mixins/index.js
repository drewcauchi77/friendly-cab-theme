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

            this.isHomeLoading = false
        }
    },
}

export const setAboutContentMixin = {
    data() {
        return {
            setAboutSectionData: [],
            setAdditionalSectionData: [],
            setBenefitsSectionData: [],
            setServicesSectionData: [],
            isAboutLoading: true
        }
    },
    created() {
        this.fetchAboutContent()
    },
    methods: {
        async fetchAboutContent() {
            const response = await axios.get('/wp-json/wp/v2/pages?slug=about')

            this.setAboutSectionData = response.data[0].acf.about_section
            this.setAdditionalSectionData = response.data[0].acf.additional_section
            this.setServicesSectionData = response.data[0].acf.services_section
            this.setBenefitsSectionData = response.data[0].acf.benefits_section
            console.log(this.setAdditionalSectionData);

            this.isAboutLoading = false
        }
    }
}

export const setServicesContentMixin = {
    data() {
        return {
            setCarsSectionData: [],
            setServicesSectionData: [],
            isServicesLoading: true
        }
    },
    created() {
        this.fetchServicesContent()
    },
    methods: {
        async fetchServicesContent() {
            const response = await axios.get('/wp-json/wp/v2/pages?slug=services')

            this.setCarsSectionData = response.data[0].acf.cars_section
            this.setServicesSectionData = response.data[0].acf.services_section

            this.isServicesLoading = false
        }
    }
}

export const setContactContentMixin = {
    data() {
        return {
            setContactSectionData: [],
            setFormSectionData: [],
            isContactLoading: true
        }
    },
    created() {
        this.fetchContactContent()
    },
    methods: {
        async fetchContactContent() {
            const response = await axios.get('/wp-json/wp/v2/pages?slug=contact')

            this.setContactSectionData = response.data[0].acf.contact_section
            this.setFormSectionData = response.data[0].acf.form_section

            this.isContactLoading = false
        }
    }
}