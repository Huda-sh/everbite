<script setup>
import {Link} from '@inertiajs/vue3';
defineProps({
    url: String
});
</script>

<template>
    <div class="icon text-lg mr-0 float-right">
        <Link :href="url" method="delete" class="rounded-3xl bg-red-800 text-white px-3 py-1 pt-0 " as="button">
            x
        </Link>
    </div>
</template>

<style scoped>
.icon {
    transition: all 0.2s ease-in-out;
}

.icon:hover {
    transform: scale(1.2);
}

.icon:active {
    transform: scale(0.95);
}
</style>
