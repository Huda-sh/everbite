<script setup>
import {usePage} from "@inertiajs/vue3";

let category_path = usePage().props.category_path;
</script>

<template>
    <div class="px-10">
        <ul class="inline-flex gap-2 font-semibold">
            <li class="text-gray-500"><a><span class="hover:underline">Menu</span></a></li>
            <li v-for="item in category_path" class="text-gray-500"><a> > <span class="hover:underline">{{ item.name }}</span></a></li>
<!--            <li class="text-yellow-500"><a><span class="hover:underline">sub Category3</span></a></li>-->
        </ul>
    </div>
</template>

<style scoped>

</style>
