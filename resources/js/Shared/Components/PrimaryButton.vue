<script setup>
defineProps({
    type:String
});
</script>

<template>
    <button class="login-button" :type="type"><slot/></button>
</template>

<style scoped>

.login-button {
    display: block;
    font-weight: bold;
    background: linear-gradient(45deg, #f6ce67 0%, #ffd663 100%);
    color: white;
    padding-block: 15px;
    border-radius: 20px;
    box-shadow: rgba(255, 196, 60, 0.55) 0px 20px 10px -15px;
    border: none;
    transition: all 0.2s ease-in-out;
}

.login-button:hover {
    transform: scale(1.03);
    box-shadow: rgba(255, 196, 60, 0.55) 0px 23px 10px -20px;
}

.login-button:active {
    transform: scale(0.95);
    box-shadow: rgba(255, 196, 60, 0.55) 0px 15px 10px -10px;
}
.login-button:disabled{
    background: #718096;
    color: #cbdaee;
}
.login-button:disabled:hover{
    transform: none;
}

</style>
