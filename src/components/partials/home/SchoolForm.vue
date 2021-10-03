<template>
    <section class="school-form-section" v-if="homeObject" id="school-form">
        <div class="container">
            <div class="section-title lower-below-text-border" v-html="homeObject.acf.school_form_section.title"></div>

            <div class="school-form-container">
                <form v-on:submit.prevent="sendApplication">
                    <fieldset class="transport-info" v-if="currentStep == 1">
                        <h3>Transport Information</h3>
                        <div class="select-container">
                            <label for="prev_year_use">Have you made use of our school transport system during the last scholastic year? (*)</label>
                            <select name="prev_year_use" id="prev_year_use" v-model="transport_info.prev_year_use" required>
                                <option value="" disabled hidden>Choose:</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="select-container">
                            <label for="transport_days">Which days do you require transport? (*)</label>
                            <select name="transport_days" id="transport_days" v-model="transport_info.transport_days" required>
                                <option value="" selected disabled hidden>Choose:</option>
                                <option>Monday to Friday</option>
                                <option>Specific days only</option>
                            </select>
                        </div>

                        <div class="checkbox-container" v-if="transport_info.transport_days == 'Specific days only'">
                            <label class="section-title">Please specify which days you require transport: (*)</label>
                            <div class="checkbox-container-options">
                                <div>
                                    <label for="monday">Monday</label>
                                    <input type="checkbox" id="monday" value="Monday" v-model="transport_info.specify_days">
                                </div>
                                <div>
                                    <label for="tuesday">Tuesday</label>
                                    <input type="checkbox" id="tuesday" value="Tuesday" v-model="transport_info.specify_days">
                                </div>
                                <div>
                                    <label for="wednesday">Wednesday</label>
                                    <input type="checkbox" id="wednesday" value="Wednesday" v-model="transport_info.specify_days">
                                </div>
                                <div>
                                    <label for="thursday">Thursday</label>
                                    <input type="checkbox" id="thursday" value="Thursday" v-model="transport_info.specify_days">
                                </div>
                                <div>
                                    <label for="friday">Friday</label>
                                    <input type="checkbox" id="friday" value="Friday" v-model="transport_info.specify_days">
                                </div>
                            </div>
                        </div>

                        <div class="select-container">
                            <label for="am_pm">When do you require transport? (*)</label>
                            <select name="am_pm" id="am_pm" v-model="transport_info.am_pm" required>
                                <option value="" selected disabled hidden>Choose:</option>
                                <option>Morning only</option>
                                <option>Evening only</option>
                                <option>Both</option>
                            </select>
                        </div>

                        <div class="select-container">
                            <label for="school">Which school do you require transport to? (*)</label>
                            <select name="school" id="school" v-model="transport_info.school" required>
                                <option value="" selected disabled hidden>Choose:</option>
                                <option v-for="(school, index) in this.schoolNames" :key="index">{{ school.school_name }}</option>
                            </select>
                        </div>
                    </fieldset>

                    <fieldset class="pick-up-drop-off-info" v-if="currentStep == 2">
                        <h3>Pick-Up &amp; Drop-Off Information</h3>
                        <div class="textarea-container">
                            <label for="pick_up_address">Please provide your preferred pick-up address: (*)</label>
                            <textarea name="pick_up_address" id="pick_up_address" v-model="pick_up_drop_off_info.pick_up_address" placeholder="Insert pick-up address here" required></textarea>
                        </div>

                        <div class="checkbox-container">
                            <label for="same_addresses">Same address for drop-off as pick-up address?</label>
                            <input type="checkbox" name="same_addresses" id="same_addresses" value="1" v-model="pick_up_drop_off_info.same_addresses">
                        </div>

                        <div class="textarea-container" v-if="!pick_up_drop_off_info.same_addresses">
                            <label for="drop_off_address">Please provide your preferred drop-off address: (*)</label>
                            <textarea name="drop_off_address" id="drop_off_address" v-model="pick_up_drop_off_info.drop_off_address" placeholder="Insert drop-off address here" required></textarea>
                        </div>

                        <div class="textarea-container">
                            <label for="special_instructions">Special Instructions</label>
                            <textarea name="special_instructions" id="special_instructions" v-model="pick_up_drop_off_info.special_instructions" placeholder="Example: Just in front of Maypole"></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="student-info" v-if="currentStep == 3">
                        <h3>Student Information</h3>
                        <div class="input-container">
                            <label for="name_of_student">Name of student: (*)</label>
                            <input type="text" name="name_of_student" id="name_of_student" v-model="student_info.name_of_student" placeholder="Insert name here" required>
                        </div>

                        <div class="input-container">
                            <label for="surname_of_student">Surname of student: (*)</label>
                            <input type="text" name="surname_of_student" id="surname_of_student" v-model="student_info.surname_of_student" placeholder="Insert surname here" required>
                        </div>

                        <div class="input-container">
                            <label for="student_id_card">Student ID card number: (*)</label>
                            <input type="text" name="student_id_card" id="student_id_card" v-model="student_info.student_id_card" placeholder="Insert ID card number here Eg: 2564409D" required>
                        </div>

                        <div class="select-container">
                            <label for="years">Student school year: (*)</label>
                            <select name="years" id="years" v-model="student_info.student_year" required>
                                <option value="" selected disabled hidden>Choose:</option>
                                <option v-for="(year, index) in this.schoolYears" :key="index">{{ year.school_year }}</option>
                            </select>
                        </div>

                        <div class="checkbox-container">
                            <label class="section-title">Additional requests:</label>
                            <div class="checkbox-container-options">
                                <div>
                                    <label for="wheelchair_user">Wheelchair user</label>
                                    <input type="checkbox" id="wheelchair_user" value="1" v-model="student_info.wheelchair_user">
                                </div>
                                <div>
                                    <label for="cannot_climb_high_steps">Cannot climb high steps</label>
                                    <input type="checkbox" id="cannot_climb_high_steps" value="1" v-model="student_info.cannot_climb_high_steps">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="parentguardian-info" v-if="currentStep == 4">
                        <h3>Parent/Guardian Information</h3>
                        <div class="input-container">
                            <label for="name_of_parentguardian">Name of parent/guardian: (*)</label>
                            <input type="text" name="name_of_parentguardian" id="name_of_parentguardian" v-model="parentguardian_info.name_of_parentguardian" placeholder="Insert name here" required>
                        </div>

                        <div class="input-container">
                            <label for="surname_of_parentguardian">Surname of parent/guardian: (*)</label>
                            <input type="text" name="surname_of_parentguardian" id="surname_of_parentguardian" v-model="parentguardian_info.surname_of_parentguardian" placeholder="Insert surname here" required>
                        </div>

                        <div class="input-container">
                            <label for="parentguardian_id_card">Parent/Guardian ID card number: (*)</label>
                            <input type="text" name="parentguardian_id_card" id="parentguardian_id_card" v-model="parentguardian_info.parentguardian_id_card" placeholder="Insert ID card number here" required>
                        </div>

                        <div class="input-container">
                            <label for="mobile_number">Parent/Guardian mobile number: (*)</label>
                            <input type="phone" name="mobile_number" id="mobile_number" v-model="parentguardian_info.mobile_number" placeholder="Insert mobile number here" required>
                        </div>

                        <div class="input-container">
                            <label for="secondary_mobile_number">Parent/Guardian secondary mobile number: (*)</label>
                            <input type="phone" name="secondary_mobile_number" id="secondary_mobile_number" v-model="parentguardian_info.secondary_mobile_number" placeholder="Insert mobile number here" required>
                        </div>

                        <div class="input-container">
                            <label for="email_address">Email address: (*)</label>
                            <input type="email" name="email_address" id="email_address" v-model="parentguardian_info.email_address" placeholder="Insert email address here" required>
                        </div>

                        <div class="textarea-container">
                            <label for="address_of_parentguardian">Parent/Guardian home address: (*)</label>
                            <textarea name="address_of_parentguardian" id="address_of_parentguardian" v-model="parentguardian_info.address_of_parentguardian" placeholder="Insert home address here" required></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="consent-info" v-if="currentStep == 5">
                        <h3>Disclaimer and Consent Forms</h3>
                        <div class="consent-container" v-for="(consent, index) in this.consentForms" :key="index">
                            <h4>{{ consent.consent_form.title }}</h4>
                            <div class="consent-form-text" v-html="consent.consent_form.content"></div>

                            <div class="checkbox-container">
                                <label for="consent_agreement">I agree to have read and understood <strong>{{ consent.consent_form.title }}</strong></label>
                                <input type="checkbox" value="1" v-model="consent_info.consent_forms_agreement[index]" required>
                            </div>
                        </div>

                        <div class="checkbox-container fc-terms">
                            <label for="consent_agreement">I agree to Friendly Cab <strong><router-link to="terms">Terms &amp; Conditions</router-link></strong></label>
                            <input type="checkbox" value="1" id="tcs_agreement" v-model="consent_info.terms_agreement" required>
                        </div>
                    </fieldset>

                    <fieldset class="confirm-info" v-if="currentStep == 6">
                        <h3>Confirm Details and Submit</h3>

                        <p>Please make sure to check and confirm below details before submitting</p>

                        <table>
                            <tr>
                                <th>Transport Information</th>
                            </tr>
                            <tr>
                                <td>Days: 
                                    <span v-if="transport_info.transport_days == 'Monday to Friday'">{{ transport_info.transport_days }}</span>
                                    <span v-if="transport_info.specify_days.length > 0">{{ transport_info.specify_days.join(' | ') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Time (Morning/Evening): 
                                    <span>{{ transport_info.am_pm }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>School: 
                                    <span>{{ transport_info.school }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="edit-button"><span class="blue-text" @click="goToStep(1)">Edit</span></td>
                            </tr>

                            <tr>
                                <th>Pick-Up &amp; Drop-Off Information</th>
                            </tr>
                            <tr>
                                <td>Pick-Up Address:
                                    <span>{{ pick_up_drop_off_info.pick_up_address }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Drop-Off Address:
                                    <span>{{ pick_up_drop_off_info.drop_off_address }}</span>
                                </td>
                            </tr>
                            <tr v-if="pick_up_drop_off_info.special_instructions">
                                <td>Special Instructions:
                                    <span>{{ pick_up_drop_off_info.special_instructions }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="edit-button"><span class="blue-text" @click="goToStep(2)">Edit</span></td>
                            </tr>

                            <tr>
                                <th>Student Information</th>
                            </tr>
                            <tr>
                                <td>Full Name:
                                    <span>{{ student_info.name_of_student }} {{ student_info.surname_of_student }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>ID Card No.:
                                    <span>{{ student_info.student_id_card }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Year: 
                                    <span>{{ student_info.student_year }}</span>
                                </td>
                            </tr>
                            <tr v-if="student_info.wheelchair_user || student_info.cannot_climb_high_steps">
                                <td>Additional requests:
                                    <span v-if="student_info.wheelchair_user">Wheelchair user</span>
                                    <span v-if="student_info.wheelchair_user && student_info.cannot_climb_high_steps"> | </span>
                                    <span v-if="student_info.cannot_climb_high_steps">Cannot climb high steps</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="edit-button"><span class="blue-text" @click="goToStep(3)">Edit</span></td>
                            </tr>

                            <tr>
                                <th>Parent/Guardian Information</th>
                            </tr>
                            <tr>
                                <td>Full Name:
                                    <span>{{ parentguardian_info.name_of_parentguardian }} {{ parentguardian_info.surname_of_parentguardian }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>ID Card No.:
                                    <span>{{ parentguardian_info.parentguardian_id_card }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile No.:
                                    <span>{{ parentguardian_info.mobile_number }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Secondary Mobile No.:
                                    <span>{{ parentguardian_info.secondary_mobile_number }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Email Address:
                                    <span>{{ parentguardian_info.email_address }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Home Address:
                                    <span>{{ parentguardian_info.address_of_parentguardian }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="edit-button"><span class="blue-text" @click="goToStep(4)">Edit</span></td>
                            </tr>
                        </table>

                        <div class="submit-button button">
                            <button type="submit" class="button-blue" :disabled="loading">Submit</button>
                        </div>
                    </fieldset>
                </form>

                <div class="step-navigator" v-if="currentStep !== finalStep">
                    <div class="prev-button nav-button">
                        <span class="button-blue" v-show="currentStep !== 1" @click="currentStep--">Prev</span>
                    </div>

                    <div class="next-button nav-button">
                        <span class="button-blue" @click="checkStepData">Next</span>
                    </div>
                </div>

                <div class="error-response response" v-if="stepError" @click="clearErrorMessage">
                    <div class="close">&times;</div>
                    <span id="error-message">{{ stepError }}</span>
                </div>

                <div class="success-response response" v-if="successMessage" @click="clearSuccessMessage">
                    <div class="close">&times;</div>
                    <span id="error-message" >{{ successMessage }}</span>
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
    name: 'SchoolForm',
    data() {
        return {
            currentStep: 1,
            finalStep: 6,
            stepError: '',
            successMessage: '',
            loading: false,
            schoolNames: [],
            schoolYears: [],
            consentForms: [],
            transport_info: {
                prev_year_use: '',
                transport_days: '',
                specify_days: [],
                am_pm: '',
                school: ''
            },
            pick_up_drop_off_info: {
                pick_up_address: '',
                same_addresses: false,
                drop_off_address: '',
                special_instructions: ''
            },
            student_info: {
                name_of_student: '',
                surname_of_student: '',
                student_id_card: '',
                student_year: '',
                wheelchair_user: 0,
                cannot_climb_high_steps: 0
            },
            parentguardian_info: {
                name_of_parentguardian: '',
                surname_of_parentguardian: '',
                parentguardian_id_card: '',
                mobile_number: '',
                email_address: '',
                secondary_mobile_number: '',
                address_of_parentguardian: ''
            },
            consent_info: {
                consent_forms_agreement: [],
                terms_agreement: false
            },
            error_message: {
                next_error: 'Please fill in all required fields before proceeding to the next step',
                agreement_error: 'Agreement is required before proceeding to the next step',
                form_error: 'There has been an error processing your form. Please contact us or try again later.'
            }
        }
    },
    computed: {
        homeObject() { return store.state.homeContent }
    },
    created() {
        this.fetchFormDetails()
    },
    watch: {
        'pick_up_drop_off_info.same_addresses': function() {
            if(this.pick_up_drop_off_info.same_addresses) {
                this.pick_up_drop_off_info.drop_off_address = this.pick_up_drop_off_info.pick_up_address
            } else {
                this.pick_up_drop_off_info.drop_off_address = ''
            }
        }
    },
    methods: {
        sendApplication(e) {
            this.loading = true

            const gatheredData = {
                "title": this.student_info.name_of_student + ' ' + this.student_info.surname_of_student + ' (' + this.student_info.student_id_card + ')',
                "fields": {
                    "transport_info": {
                        "prev_year_use": this.transport_info.prev_year_use,
                        "transport_days": this.transport_info.transport_days,
                        "specify_days": this.transport_info.specify_days.join(' | '),
                        "am_pm": this.transport_info.am_pm,
                        "school": this.transport_info.school
                    },
                    "pick_up_drop_off_info": {
                        "pick_up_address": this.pick_up_drop_off_info.pick_up_address,
                        "drop_off_address": this.pick_up_drop_off_info.drop_off_address,
                        "special_instructions": this.pick_up_drop_off_info.special_instructions
                    },
                    "student_info": {
                        "name_of_student": this.student_info.name_of_student,
                        "surname_of_student": this.student_info.surname_of_student,
                        "student_id_card": this.student_info.student_id_card,
                        "student_year": this.student_info.student_year,
                        "wheelchair_user": this.student_info.wheelchair_user,
                        "cannot_climb_high_steps": this.student_info.cannot_climb_high_steps
                    },
                    "parentguardian_info": {
                        "name_of_parentguardian": this.parentguardian_info.name_of_parentguardian,
                        "surname_of_parentguardian": this.parentguardian_info.surname_of_parentguardian,
                        "parentguardian_id_card": this.parentguardian_info.parentguardian_id_card,
                        "mobile_number": this.parentguardian_info.mobile_number,
                        "email_address": this.parentguardian_info.email_address,
                        "secondary_mobile_number": this.parentguardian_info.secondary_mobile_number,
                        "address_of_parentguardian": this.parentguardian_info.address_of_parentguardian
                    }
                }
            }

            try {
                emailjs.send('service_uteqphw', 'template_1cveedq', e.target, 'user_iNJ5dF8dJRKWC1Xz7nhd7');
            } catch (error) {
                console.error(error)
            }

            axios.post('/wp-json/wp/v2/schoolapplications', gatheredData)
                .then(res => {
                    this.successMessage = 'Thank you for submitting this application. We will see your request as soon as possible and get back to you via the contact details you have provided.'
                    setTimeout(function () { 
                        this.successMessage = ''
                    }.bind(this), 10000)

                    // Reset data() back
                    this.currentStep = 1
                    this.transport_info.prev_year_use = ''
                    this.transport_info.transport_days = ''
                    this.transport_info.specify_days = []
                    this.transport_info.am_pm = ''
                    this.transport_info.school = ''

                    this.pick_up_drop_off_info.pick_up_address = ''
                    this.pick_up_drop_off_info.same_addresses = false
                    this.pick_up_drop_off_info.drop_off_address = ''
                    this.pick_up_drop_off_info.special_instructions = ''

                    this.student_info.name_of_student = ''
                    this.student_info.surname_of_student = ''
                    this.student_info.student_id_card = ''
                    this.student_info.student_year = ''
                    this.student_info.wheelchair_user = 0
                    this.student_info.cannot_climb_high_steps = 0

                    this.parentguardian_info.name_of_parentguardian = ''
                    this.parentguardian_info.surname_of_parentguardian = ''
                    this.parentguardian_info.parentguardian_id_card = ''
                    this.parentguardian_info.mobile_number = ''
                    this.parentguardian_info.email_address = ''
                    this.parentguardian_info.secondary_mobile_number = ''
                    this.parentguardian_info.address_of_parentguardian = ''

                    this.consent_info.consent_forms_agreement= [],
                    this.consent_info.terms_agreement = false

                    // EMAILJS HERE

                    this.scrollToSchoolForm()
                })
                .catch(error => {
                    this.stepError = this.error_message.form_error
                })
                .finally(() => {
                    this.loading = false
                })
        },
        async fetchFormDetails() {
            const response = await axios.get('/wp-json/wp/v2/forms?slug=school-form')
            this.schoolNames = response.data[0].acf.list_of_schools
            this.schoolYears = response.data[0].acf.list_of_school_years
            this.consentForms = response.data[0].acf.agreementconsent_forms

            for(var i = 0; i < this.consentForms.length; i++){
                this.consent_info.consent_forms_agreement.push(false)
            }
        },
        checkStepData() {
            switch (this.currentStep) {
                case 1:
                    if(this.transport_info.prev_year_use == '' 
                        || this.transport_info.am_pm == '' 
                        || this.transport_info.school == '' 
                        || (this.transport_info.transport_days == '' || (this.transport_info.transport_days == 'Specific days only' && this.transport_info.specify_days.length == 0))) {
                        this.haltFromNextStep(this.error_message.next_error)
                    } else {
                        this.goToNextStep()
                    }
                    break;
                case 2: 
                    if(this.pick_up_drop_off_info.pick_up_address == '' 
                        || (!this.pick_up_drop_off_info.same_addresses && this.pick_up_drop_off_info.drop_off_address == '')) {
                        this.haltFromNextStep(this.error_message.next_error)
                    } else {
                        if(this.pick_up_drop_off_info.same_addresses){
                            this.pick_up_drop_off_info.drop_off_address = this.pick_up_drop_off_info.pick_up_address
                        }
                        this.goToNextStep()
                    }
                    break;
                case 3:
                    if(this.student_info.name_of_student == ''
                        || this.student_info.surname_of_student == ''
                        || this.student_info.student_id_card == ''
                        || this.student_info.student_year == '') {
                        this.haltFromNextStep(this.error_message.next_error)
                    } else {
                        this.goToNextStep()
                    }
                    break;
                case 4:
                    if(this.parentguardian_info.name_of_parentguardian == ''
                        || this.parentguardian_info.surname_of_parentguardian == ''
                        || this.parentguardian_info.parentguardian_id_card == ''
                        || this.parentguardian_info.mobile_number == ''
                        || this.parentguardian_info.secondary_mobile_number == ''
                        || this.parentguardian_info.email_address == ''
                        || this.parentguardian_info.address_of_parentguardian == '') {
                        this.haltFromNextStep(this.error_message.next_error)
                    } else {
                        this.goToNextStep()
                    }
                    break;
                case 5:
                    if(this.consent_info.consent_forms_agreement.includes(false) 
                        || !this.consent_info.terms_agreement){
                        this.haltFromNextStep(this.error_message.agreement_error)
                    } else {
                        this.goToNextStep()
                    }
                    break;
            }
        },
        goToNextStep() {
            this.currentStep++
            this.stepError = ''
            this.scrollToSchoolForm()
        },
        goToStep(step) {
            this.currentStep = step
            this.scrollToSchoolForm()
        },
        haltFromNextStep(errorMsg) {
            this.stepError = errorMsg
            setTimeout(function () { 
                this.stepError = ''
            }.bind(this), 6000)
        },
        scrollToSchoolForm() {
            document.getElementById('school-form').scrollIntoView({
                behavior: 'smooth'
            })
        },
        clearErrorMessage() {
            this.stepError = ''
        },
        clearSuccessMessage() {
            this.successMessage = ''
        }
    }
}
</script>