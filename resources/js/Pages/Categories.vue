<script setup>

import Restaurant from "./Restaurant.vue";
import BreadCrumps from "../Shared/Components/BreadCrumps.vue";
import Category from "../Shared/Cards/Category.vue";
import AddCategoryModal from "../Shared/Modals/AddCategoryModal.vue";
import {usePage} from "@inertiajs/vue3";

defineProps({
    categories:Array,
    id:Number
});

</script>

<template>
    <Restaurant>
        <template #default>
            <div class="flex justify-between mb-12">
                <BreadCrumps :id="id" class="basis-3/4 mt-3"/>
                <AddCategoryModal v-if="usePage().props.auth.user.is_owner" :id="id"/>
            </div>
            <div class="grid lg:grid-cols-4 gap-8">
                <Category v-for="category in categories" :name="category.name" :id="category.id" :discount="category.discount"/>
            </div>
        </template>
    </Restaurant>
</template>

<style scoped>

</style>
