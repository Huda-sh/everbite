<script setup>
import DeleteIcon from "./DeleteIcon.vue";
import UpdateDiscountModal from "./UpdateDiscountModal.vue";
import {Link} from '@inertiajs/vue3';

defineProps({
    name: String,
    id: Number,
    discount: Number
});
</script>

<template>
    <Link :href="'/category/'+id" as="button">
    <div class="rounded-3xl card card bg-white flex-col justify-self-center w-full">
            <DeleteIcon :url="'category/'+id"/>
        <p class="text-2xl font-semibold mx-12 my-12 mb-8 flex justify-center align-baseline">
            {{ name }} {{id}}
            <span v-if="discount" class="ms-2 text-sm text-white bg-amber-300 p-1 px-2 rounded-xl">-{{
                    discount
                }}%</span>
        </p>
        <UpdateDiscountModal class="mx-auto w-10/12 mb-3" :id="id" :key="id">Update Discount</UpdateDiscountModal>
    </div>
    </Link>
</template>

<style scoped>
.card {
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(169, 158, 134, 0.44) 0px 0px 40px -10px;
    transition: all 0.2s ease-in-out;
}
.card:hover{
    transform: scale(1.03);
}
.card:active{
    transform: scale(0.95);
}
</style>
