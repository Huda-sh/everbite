<script setup>

import BreadCrumps from "../Shared/Components/BreadCrumps.vue";
import MenuItem from "../Shared/Cards/MenuItem.vue";
import {usePage} from "@inertiajs/vue3";
import Restaurant from "@/Pages/Restaurant.vue";
import AddCategoryModal from "@/Shared/Modals/AddCategoryModal.vue";
import AddItemModal from "@/Shared/Modals/AddItemModal.vue";

defineProps({
    items: Array,
    id: Number
});
let category_path = usePage().props.category_path;
</script>

<template>
    <Restaurant>
        <template #default>
            <div class="flex justify-between mb-12">
                <BreadCrumps class="basis-3/4 mt-3"/>
                <AddCategoryModal v-if="items.length === 0 && category_path.length < 4" :id="id"/>
                <AddItemModal :id="id"/>
            </div>
            <div class="grid grid-cols-4 gap-8">
                <MenuItem v-for="item in items" :name="item.name" :ingredients="item.ingredients"
                          :price="item.price+'$'" :id="item.id"
                          :discount="item.discount"
                          :after_discount="item.after_discount"
                />
            </div>
        </template>
    </Restaurant>
</template>

<style scoped>

</style>
