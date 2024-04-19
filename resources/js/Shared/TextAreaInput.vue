<script setup>
defineProps({
    modelValue:String,
    name:String,
    error:String,
    type: String,
    placeholder:String
});
</script>

<template>
    <div class="mb-6">
        <textarea class="input" :name="name" :id="name" :placeholder="placeholder" :value="modelValue" @input="$emit('update:modelValue',$event.target.value)"/>
        <div v-if="error" v-text="error" class="text-red-500 text-xs mt-1"></div>
    </div>
</template>

<style scoped>

.input {
    width: 100%;
    background: white;
    border: none;
    padding: 15px 20px;
    border-radius: 20px;
    margin-top: 15px;
    box-shadow: rgba(169, 158, 134, 0.44) 0px 10px 10px -5px;
    border-inline: 2px solid transparent;
}

.input::-moz-placeholder {
    color: rgb(170, 170, 170);
}

.input::placeholder {
    color: rgb(170, 170, 170);
}

.input:focus {
    outline: none;
    border-inline: 2px solid #ffd663;
}

</style>
