<script setup>

import PrimaryButton from "../Shared/PrimaryButton.vue";
import BreadCrumps from "../Shared/BreadCrumps.vue";
import MenuItem from "../Shared/MenuItem.vue";
import Restaurant from "@/Pages/Restaurant.vue";

defineProps({
    items: Array
});
</script>

<template>
    <Restaurant>
        <template #default>
            <div class="flex justify-between mb-12">
                <BreadCrumps class="basis-3/4 mt-3"/>
                <PrimaryButton class="w-1/6">Add</PrimaryButton>
            </div>
            <div class="grid grid-cols-4 gap-8">
                <MenuItem v-for="item in items" :name="item.name" :ingredients="item.ingredients"
                          :price="item.price+'$'"
                />
                <!--                  discount="-20%" after_discount="8$"-->
            </div>
        </template>
    </Restaurant>
</template>

<style scoped>

</style>
