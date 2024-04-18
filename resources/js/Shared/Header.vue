<script setup>

import FormInput from "./FormInput.vue";
import PrimaryButton from "./PrimaryButton.vue";
import Restaurant from "./Restaurant.vue";
</script>

<template>


    <header class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <img src="../../images/logo.png" class="h-16" alt="EverBite Logo"/>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center me-3">
                    Signup
                </button>
                <button type="button"
                        class="text-white bg-orange-800 hover:bg-orange-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Sign in
                </button>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
