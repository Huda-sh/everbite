<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import {ref} from "vue";
import Modal from "./Modal.vue";
import FormInput from "./FormInput.vue";
import TextAreaInput from "./TextAreaInput.vue";

let showModal = ref(false);
</script>
<template>
    <PrimaryButton @click="showModal=true" class="w-1/6">Add</PrimaryButton>
    <Teleport to="body">
        <Modal
            :show="showModal"
            @close="showModal=false">
            <template #header>Add New Menu Item</template>
            <template #default>
                <form class="mt-6">
                    <FormInput type="email" name="email" id="email" placeholder="Name"/>
                    <FormInput type="number" name="email" id="email" placeholder="Price"/>
                    <TextAreaInput name="email" id="email" placeholder="Ingredients ..."/>
                </form>
            </template>
            <template #footer>
                <PrimaryButton type="submit" class="w-36">Add</PrimaryButton>
            </template>
        </Modal>
    </Teleport>
</template>

<style scoped>

</style>
