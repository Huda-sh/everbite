<script setup>
import DeleteIcon from "./DeleteIcon.vue";
import PrimaryButton from "./PrimaryButton.vue";
import SecondaryButton from "./SecondaryButton.vue";
import UpdateDiscountModal from "./UpdateDiscountModal.vue";

defineProps({
    name: String,
    ingredients: String,
    price: String,
    discount: String,
    after_discount: String,
    id:Number,
});

</script>

<template>
    <div class="
    rounded-3xl card card bg-white flex-col justify-self-center
">
        <DeleteIcon :url="`/item/${id}`"/>
        <div class="m-12">
            <p class="text-2xl font-semibold align-baseline">
                {{ name }} {{id}}
                <span v-if="discount" class="text-sm text-white bg-amber-300 p-1 px-2 rounded-xl">{{ discount }}</span>
            </p>
            <p class="text-xl text-gray-500">
                {{ ingredients }}
            </p>

            <div class="flex">
                <p class="text-3xl font-bold align-baseline">
          <span
              :class="{
                    'me-3' : true,
                    'line-through' : discount
                }">
          {{ price }}</span>
                    <span v-if="after_discount" class="text-4xl text-amber-400 me-3">{{ after_discount }}</span>
                </p>
            </div>
        </div>
        <UpdateDiscountModal class="px-9">Update Discount</UpdateDiscountModal>
    </div>
</template>

<style scoped>

</style>
