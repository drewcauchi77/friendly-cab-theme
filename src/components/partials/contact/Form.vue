<template>
    <section class="contact-form-section" v-if="contactObject">
        <div class="container">
            <div class="section-title lower-below-text-border" v-html="contactObject.acf.form_section.title"></div>

            <div class="contact-form-container" v-if="!isBot">
                <form v-on:submit.prevent="onSubmit">
                    <fieldset class="name">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" v-model="name" placeholder="Name (*)" required>
                    </fieldset>

                    <fieldset class="phone">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" v-model="phone" placeholder="Phone (*)" required>
                    </fieldset>

                    <fieldset class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" v-model="email" placeholder="Email (*)" required>
                    </fieldset>

                    <fieldset class="website">
                        <label for="website">Don’t fill this out if you're human</label>
                        <input type="text" name="website" id="website" v-model="website" placeholder="Website (*)">
                    </fieldset>

                    <fieldset class="message">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" v-model="message" placeholder="Message (*)" required></textarea>
                    </fieldset>

                    <fieldset class="submit">
                        <button type="submit" class="button-blue" :disabled="loading">{{ loading ? "Sending..." : "Send Now" }}</button>
                    </fieldset>
                </form>

                <div class="error-response response" v-if="error" @click="hideMessage">
                    <div class="close">&times;</div>
                    <span id="error-message">Unfortunately, an unexpected error has occurred. Please try again or reach out to us through one of the above details.</span>
                </div>

                <div class="success-response response" v-if="success" @click="hideMessage">
                    <div class="close">&times;</div>
                    <span id="error-message" >Thank you for contacting us. Your message has been sent</span>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
import store from '../../../store/shared_state'
import emailjs from 'emailjs-com'

export default {
    name: 'Form',
    data() {
        return {
            loading: false,
            error: false,
            success: false,
            isBot: false,
            name: '',
            phone: '',
            email: '',
            message: '',
            website: null
        }
    },
    computed: {
        contactObject() { return store.state.contactContent }
    },
    methods: {
        onSubmit(e) {
            this.loading = true
            this.error = false
            this.success = false

            if(this.website !== null) {
                this.isBot = true
            } else {
                const gatheredData = {
                    "title": 'Message from '+ this.name,
                    "fields": {
                        "name": this.name,
                        "phone": this.phone,
                        "email": this.email,
                        "message": this.message 
                    }
                }

                try {
                    emailjs.sendForm('service_uteqphw', 'template_u9rxr31', e.target, 'user_iNJ5dF8dJRKWC1Xz7nhd7', {
                        name: this.name,
                        phone: this.phone,
                        email: this.email,
                        message: this.message
                    })
                } catch(error) {
                    console.error(error)
                }

                axios.post('/wp-json/wp/v2/contactforms', gatheredData)
                    .then(res => {
                        this.success = true
                        
                        setTimeout(function () { 
                            this.success = false
                        }.bind(this), 10000)

                        // Reset data() back
                        this.name = ''
                        this.phone = ''
                        this.email = ''
                        this.message = ''
                    }).catch(error => {
                        this.error = false

                        setTimeout(function () { 
                            this.error = false
                        }.bind(this), 10000)
                    }).finally(() => {
                        this.loading = false
                    })
            }
        },
        hideMessage() {
            this.error = false
            this.success = false
        }
    }
}
</script>