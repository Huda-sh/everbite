<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    show: Boolean
});
</script>

<template>
    <transition
        enter-from-class="opacity-0 scale-125"
        enter-to-class="opacity-100 scale-100"
        leave-from-class="opacity-100 scale-100"
        leave-to-class="opacity-0 scale-125"
        enter-active-class="transition duration-300"
        leave-active-class="transition duration-200"
    >
        <div v-if="show" class="modal-mask">
            <div class="modal-container">
                <div class="icon text-lg mr-0 float-right" @click="$emit('close')">
                    <div class="rounded-3xl bg-gray-700 text-white px-3 py-1 pt-0 " >
                        x
                    </div>
                </div>
                <header class="text-xl font-semibold text-amber-500">
                    <slot name="header">default header</slot>
                </header>
                <div>
                    <slot>default body</slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
.modal-mask {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .6);
    display: grid;
    place-items: center;
}

.modal-container {
    background: white;
    padding: 3rem;
    width: 80vw;
    max-width: 500px;
    border-radius: 40px;
}

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
