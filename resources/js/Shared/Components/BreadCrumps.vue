<script setup>
import {Link, usePage} from "@inertiajs/vue3";

let category_path = usePage().props.category_path;
console.log(category_path);
</script>

<template>
    <div class="px-10">
        <ul class="inline-flex gap-2 font-semibold">
            <li class="text-gray-500"><Link href="/restaurant/" as="button"><span class="hover:underline">Menu</span></Link></li>
            <li v-for="(item, index) in category_path" class="text-gray-500"><Link :href="'/category/'+item.id" as="button"> > <span
                :class="{
                'hover:underline':true,
                'text-yellow-500': index === category_path.length - 1
            }"
            >{{ item.name }}</span></Link></li>
        </ul>
    </div>
</template>

<style scoped>

</style>
