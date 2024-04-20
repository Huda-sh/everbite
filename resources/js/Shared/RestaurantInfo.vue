<script setup>
import {usePage} from "@inertiajs/vue3";
import UpdateDiscountModal from "./UpdateDiscountModal.vue";

let id = usePage().props.auth.user.id;
let name = usePage().props.auth.user.name;
let location = usePage().props.auth.user.location;
let phone_number = usePage().props.auth.user.phone_number;

</script>

<template>
    <div class="w-3/4 mx-auto my-16">
        <div class="flex justify-between">
            <h1 class="text-4xl font-semibold basis-8/12">{{ name }}</h1>
            <UpdateDiscountModal :id="id" type="restaurant" class="float-right me-0"/>
        </div>
        <p class="text-gray-600 mt-6">{{ location }}</p>
        <p class="text-gray-600 mt-6">{{ phone_number }}</p>
    </div>
</template>

<style scoped>

</style>
