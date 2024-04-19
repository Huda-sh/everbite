<script setup>

import Home from "./Home.vue";
import BreadCrumps from "../../Shared/BreadCrumps.vue";
import Category from "../../Shared/Category.vue";
import PrimaryButton from "../../Shared/PrimaryButton.vue";
import MenuItem from "../../Shared/MenuItem.vue";
import {ref} from "vue";
import Modal from "../../Shared/Modal.vue";
import AddItemModal from "../../Shared/AddItemModal.vue";

</script>

<template>
    <Home>
        <template #default>
            <div class="flex justify-between mb-12">
                <BreadCrumps class="basis-3/4 mt-3"/>
                <AddItemModal></AddItemModal>
            </div>
            <div class="grid grid-cols-4 gap-8">
<!--                <Category name="Drinks"/>-->
            </div>
        </template>
    </Home>
</template>

<style scoped>

</style>
