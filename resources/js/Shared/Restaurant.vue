<script setup>

import PrimaryButton from "./PrimaryButton.vue";

defineProps({
    name:String,
    location:String,
    phone:String
});
</script>

<template>
    <div class="rounded-3xl card px-5 py-3">
        <h2 class="font-bold text-xl mb-5">{{ name }}</h2>
        <p class="text-gray-400 mb-3">{{ location }}</p>
        <p class="text-gray-400 mb-5">{{ phone }}</p>
        <PrimaryButton>Menu</PrimaryButton>
    </div>
</template>

<style scoped>
.card {
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.46) 0%, rgba(255, 245, 226, 0.23) 100%);
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(169, 158, 134, 0.44) 0px 0px 40px -10px;
}
</style>
