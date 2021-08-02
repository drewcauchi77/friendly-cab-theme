<template>
    <section class="cars-section" v-if="!isServicesLoading">
        <div class="section-title text-center lower-below-text-border" v-html="setCarsSectionData.title"></div>

        <div class="container">
            <div class="cars-content">
                <div class="cars-header">
                    <div class="car-selector" v-for="(car, index) in setCarsSectionData.cars" :key="index" @click="showCar = index" :class="{ active: (showCar == index) }">
                        <span>{{ car.car.post_title }}</span>
                    </div>
                </div>

                <div class="cars-main">
                    <transition name="fade"  v-for="(car, index) in setCarsSectionData.cars" :key="index">
                        <div class="single-car" v-if="showCar == index">
                            <h3>{{ car.car.post_title }}</h3>

                            <div class="car-details" v-if="car.car.acf.details" v-html="car.car.acf.details"></div>

                            <div class="car-benefits">
                                <div class="single-benefit" v-if="car.car.acf.includes.number_of_bags">
                                    <font-awesome-icon icon="suitcase" />
                                    <span>{{ car.car.acf.includes.number_of_bags }} Bags</span>
                                </div>

                                <div class="single-benefit" v-if="car.car.acf.includes.number_of_passengers">
                                    <font-awesome-icon icon="user" />
                                    <span>{{ car.car.acf.includes.number_of_passengers }} Seats</span>
                                </div>

                                <div class="single-benefit" v-if="!car.car.acf.includes.air_conditioner">
                                    <font-awesome-icon icon="fan" />
                                    <span>AC</span>
                                </div>
                            </div>
                            
                            <div class="car-image">
                                <img v-if="car.car.acf.image" :src="car.car.acf.image.url" :alt="car.car.acf.image.alt">

                                <div class="price">
                                    <div class="inner-price-text">
                                        <span class="per-km">/km</span>
                                        <span class="car-price"><strong>&euro;</strong>{{ car.car.acf.price_per_km }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { setServicesContentMixin } from '../../../mixins'

export default {
    name: 'Cars',
    mixins: [setServicesContentMixin],
    data() {
        return {
            showCar: 0,
        }
    }
}
</script>