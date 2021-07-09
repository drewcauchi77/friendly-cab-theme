<template>
    <transition name="slide-slow">
        <div class="loading-container">
            <div class="spinner-container">
                <div class="lds-ring">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'Loading',
}
</script>