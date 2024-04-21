<script setup>

import Header from "../Shared/Header.vue";
import Restaurant from "../Shared/Cards/Restaurant.vue";

defineProps({
    restaurants: Array
})

</script>

<template>
    <Header/>

    <img src="../../images/banner-home.webp">

    <main class="mt-20 w-3/4 mx-auto">
        <h1 class="text-6xl mx-auto w-min mb-5">Restaurants</h1>
        <div class="grid lg:grid-cols-3 gap-10 px-8 py-5">
            <Restaurant v-for="restaurant in restaurants" :name="restaurant.name" :location="restaurant.location"
                        :id="restaurant.id" :phone="restaurant.phone_number"/>
        </div>
    </main>
</template>

<style scoped>

</style>
