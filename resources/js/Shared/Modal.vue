<script setup>
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
                <header class="text-xl font-semibold text-amber-500">
                    <slot name="header">default header</slot>
                </header>
                <div>
                    <slot>default body</slot>
                </div>
                <footer class="footer flex justify-between">
                        <button @click="$emit('close')">Close</button>
                    <slot name="footer">
                    </slot>
                </footer>
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

.footer {
    border-top: 1px solid #ccc;
    margin-top: 1rem;
    padding-top: 0.5rem;
}

.footer button {
    background: #9ca3af;
    padding: .25rem .75rem;
    border-radius: 20px;
    color: white;
}

.footer button:hover {
    background: #5e5b5b;
}
</style>
