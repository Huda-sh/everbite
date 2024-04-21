<script setup>
import PrimaryButton from "../Components/PrimaryButton.vue";
import {onMounted, ref} from "vue";
import Modal from "./Modal.vue";
import FormInput from "../Components/FormInput.vue";
import TextAreaInput from "../Components/TextAreaInput.vue";
import {useForm} from "@inertiajs/vue3";

defineProps({id: Number});
let showModal = ref(false);

let form = useForm({
    name: "",
});
let submit = async (id) => {
    if (id === undefined) {
        await form.post('/category/');
    } else {
        await form.post('/category/' + id);
    }
    showModal.value = false;
};
</script>
<template>
    <PrimaryButton @click="showModal=true" class="lg:w-1/6 mt-3 me-2">Add Category</PrimaryButton>
    <Teleport to="body">
        <Modal
            :show="showModal"
            @close="showModal=false">
            <template #header>Add New Category</template>
            <template #default>
                <form class="mt-6" @submit.prevent="submit(id)">
                    <FormInput v-model="form.name" :error="form.errors.name" type="name" name="name" id="name"
                               placeholder="Name"/>
                    <PrimaryButton type="submit" class="w-36 float-right" :disabled="form.processing">Add
                    </PrimaryButton>
                </form>
            </template>
        </Modal>
    </Teleport>
</template>

<style scoped>

</style>
