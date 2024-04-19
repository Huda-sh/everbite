<script setup>

import PrimaryButton from "../Shared/PrimaryButton.vue";
import BreadCrumps from "../Shared/BreadCrumps.vue";
import MenuItem from "../Shared/MenuItem.vue";
</script>

<template>
    <div class="flex justify-between mb-12">
        <BreadCrumps class="basis-3/4 mt-3"/>
        <PrimaryButton class="w-1/6">Add</PrimaryButton>
    </div>
    <div class="grid grid-cols-4 gap-8">
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" discount="-20%" after_discount="8$"/>
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$"/>
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" />
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" discount="-20%" after_discount="8$"/>
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" />
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" discount="-20%" after_discount="8$"/>
        <MenuItem name="Shawerma" ingredients="chicken . souce . bread . pickles" price="10$" />
    </div>
</template>

<style scoped>

</style>
