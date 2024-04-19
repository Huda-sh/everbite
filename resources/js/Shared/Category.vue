<script setup>
import DeleteIcon from "./DeleteIcon.vue";
import SecondaryButton from "./SecondaryButton.vue";
import UpdateDiscountModal from "./UpdateDiscountModal.vue";

defineProps({
    name: String,
    id: Number,
    discount: Number
});
</script>

<template>
    <div class="rounded-3xl card card bg-white flex-col justify-self-center w-full">
            <DeleteIcon :url="'category/'+id"/>
        <p class="text-2xl font-semibold mx-12 my-12 mb-8 flex justify-center align-baseline">
            {{ name }}
            <span v-if="discount" class="ms-2 text-sm text-white bg-amber-300 p-1 px-2 rounded-xl">-{{
                    discount
                }}%</span>
        </p>
        <UpdateDiscountModal class="mx-auto w-10/12 mb-3" :id="id" :key="id">Update Discount</UpdateDiscountModal>
    </div>
</template>

<style scoped>
.card {
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(169, 158, 134, 0.44) 0px 0px 40px -10px;
}
</style>
