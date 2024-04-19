<script setup>

import Header from "../../Shared/Header.vue";
import RestaurantInfo from "../../Shared/RestaurantInfo.vue";
</script>

<template>
    <Header/>
    <RestaurantInfo/>
    <div class="px-36 py-10 bg-gray-100">
        <slot name="default"></slot>
    </div>
</template>

<style scoped>

</style>
