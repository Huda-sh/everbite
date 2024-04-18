<script setup>
import FormInput from "../../Shared/FormInput.vue";
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from "../../Shared/PrimaryButton.vue";

let form = useForm({
    email:"",
    password:"",
});

let submit = () => {
    console.log('post req');
    form.post('/login');
};

</script>

<template>
<main class="grid place-items-center min-h-screen bg-orange-50">
    <div class="container w-1/3 bg-slate-200">
        <div class="heading">Login</div>
        <form action="" class="form" @submit.prevent="submit">
            <FormInput v-model="form.email" :error="form.errors.email" type="email" name="email" id="email" placeholder="E-mail"/>
            <FormInput v-model="form.password" :error="form.errors.password" type="password" name="password" id="password" placeholder="Password"/>
            <PrimaryButton type="submit">Login</PrimaryButton>
        </form>
    </div>
</main>
</template>

<style scoped>
.container {
    //max-width: 350px;
    background: #fff1d6;
    background: linear-gradient(0deg, rgb(255, 253, 247) 0%, rgb(255, 254, 253) 100%);
    border-radius: 40px;
    padding: 25px 35px;
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(255, 196, 60, 0.55) 0px 30px 30px -20px;
    margin: 20px;
}

.heading {
    text-align: center;
    font-weight: 900;
    font-size: 30px;
    color: #faba28;
}

.form {
    margin-top: 20px;
}
</style>
