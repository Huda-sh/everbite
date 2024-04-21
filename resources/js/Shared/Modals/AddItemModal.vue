<script setup>
import PrimaryButton from "../Components/PrimaryButton.vue";
import {ref} from "vue";
import Modal from "./Modal.vue";
import FormInput from "../Components/FormInput.vue";
import TextAreaInput from "../Components/TextAreaInput.vue";
import {useForm} from "@inertiajs/vue3";

defineProps({id: Number});
let form = useForm({
    name: "",
    price: "",
    ingredients: "",
});
let showModal = ref(false);
let submit = async (id) => {
    await form.post('/item/' + id);
    showModal.value = false;
};
</script>
<template>
    <PrimaryButton @click="showModal=true" class="lg:w-1/6 mt-3">Add Item</PrimaryButton>
    <Teleport to="body">
        <Modal
            :show="showModal"
            @close="showModal=false">
            <template #header>Add New Menu Item</template>
            <template #default>
                <form class="mt-6" @submit.prevent="submit(id)">
                    <FormInput v-model="form.name" :error="form.errors.name" type="text" name="name" id="name" placeholder="Name"/>
                    <FormInput v-model="form.price" :error="form.errors.price" type="number" name="price" id="price" placeholder="Price"/>
                    <TextAreaInput v-model="form.ingredients" :error="form.errors.ingredients" name="ingredients" id="ingredients" placeholder="Ingredients ..."/>
                    <PrimaryButton type="submit" class="w-36 float-right">Add</PrimaryButton>
                </form>
            </template>
        </Modal>
    </Teleport>
</template>

<style scoped>

</style>
