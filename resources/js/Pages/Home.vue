<script setup>

import Header from "../Shared/Header.vue";
import Restaurant from "../Shared/Restaurant.vue";
import FormInput from "../Shared/FormInput.vue";
</script>

<template>
    <Header/>

    <img src="../../images/banner-home.png">

    <main class="mt-20 w-3/4 mx-auto">
        <h1 class="text-6xl mx-auto w-min">Restaurants</h1>
        <FormInput placeholder="Search" class="mt-3"></FormInput>
        <div class="grid grid-cols-3 gap-10 px-8 py-5">
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
            <Restaurant name="Abo Abdo" location="Al-Mazzeh" phone="0987654321"/>
        </div>
    </main>
</template>

<style scoped>

</style>
