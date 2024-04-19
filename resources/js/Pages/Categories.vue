<script setup>

import Home from "./Restaurant.vue";
import BreadCrumps from "../Shared/BreadCrumps.vue";
import Category from "../Shared/Category.vue";
import AddCategoryModal from "../Shared/AddCategoryModal.vue";


defineProps({
    categories:Array,
    id:Number
});

</script>

<template>
    <Home>
        <template #default>
            <div class="flex justify-between mb-12">
                <BreadCrumps class="basis-3/4 mt-3"/>
                <AddCategoryModal :id="id"/>
            </div>
            <div class="grid grid-cols-4 gap-8">
                <Category v-for="category in categories" :name="category.name" :id="category.id"/>
            </div>
        </template>
    </Home>
</template>

<style scoped>

</style>
