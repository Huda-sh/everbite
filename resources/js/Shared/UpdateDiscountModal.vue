<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import {ref} from "vue";
import Modal from "./Modal.vue";
import FormInput from "./FormInput.vue";
import SecondaryButton from "./SecondaryButton.vue";

let showModal = ref(false);
defineProps({
    id:Number,
});

let submit = ()=>{

};
</script>
<template>
    <SecondaryButton @click="showModal=true" class="mx-auto mb-3 px-10">Update Discount</SecondaryButton>
    <Teleport to="body">
        <Modal
            :show="showModal"
            @close="showModal=false">
            <template #header>Update Discount</template>
            <template #default>
                <form class="mt-6">
                    <FormInput type="number" name="amount" id="amount" placeholder="Discount Percentage"/>
                </form>
            </template>
            <template #footer>
                <PrimaryButton type="submit" class="w-36">Save</PrimaryButton>
            </template>
        </Modal>
    </Teleport>
</template>

<style scoped>

</style>
