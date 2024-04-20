<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import {ref} from "vue";
import Modal from "./Modal.vue";
import FormInput from "./FormInput.vue";
import SecondaryButton from "./SecondaryButton.vue";
import {useForm} from "@inertiajs/vue3";

let showModal = ref(false);
defineProps({
    id:Number,
    type:String
});

let form = useForm({
    discountable_id: 0,
    discount:null
});

let submit = async (id, type) => {
    await form.post('/discount/'+type+'/'+id);
    showModal.value = false;
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
            <form class="mt-6" @submit.prevent="submit(id, type)">
                    <FormInput v-model="form.discount" :error="form.errors.discount" type="number" name="discount" id="discount" placeholder="Discount Percentage"/>
                    <PrimaryButton type="submit" class="w-36 float-right">Save</PrimaryButton>
                </form>
            </template>
        </Modal>
    </Teleport>
</template>

<style scoped>

</style>
