<script setup>
import FormInput from "../../Shared/FormInput.vue";
import {useForm} from "@inertiajs/vue3";
import PrimaryButton from "../../Shared/PrimaryButton.vue";

let form = useForm({
    name:"",
    location:"",
    phone_number:"",
    email:"",
    password:"",
});

let submit = () => {
    console.log('post req');
    form.post('/register');
};

</script>

<template>
    <main class="grid place-items-center min-h-screen">
        <div class="container w-1/3 bg-slate-200">
            <div class="heading">Register</div>
            <form action="" class="form" @submit.prevent="submit">
                <FormInput v-model="form.name" :error="form.errors.name" type="text" name="name" id="name" placeholder="Restaurant name"/>
                <FormInput v-model="form.location" :error="form.errors.location" type="text" name="location" id="location" placeholder="Location"/>
                <FormInput v-model="form.phone_number" :error="form.errors.phone_number" type="text" name="phone_number" id="phone_number" placeholder="Phone number"/>
                <FormInput v-model="form.email" :error="form.errors.email" type="email" name="email" id="email" placeholder="E-mail"/>
                <FormInput v-model="form.password" :error="form.errors.password" type="password" name="password" id="password" placeholder="Password"/>
                <PrimaryButton type="submit" :disabled="form.processing" class="w-full">Register</PrimaryButton>
            </form>
        </div>
    </main>
</template>

<style scoped>
.container {
    background: #fff1d6;
    background: linear-gradient(0deg, rgb(255, 253, 247) 0%, rgb(255, 254, 253) 100%);
    border-radius: 40px;
    padding: 25px 35px;
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(169, 158, 134, 0.44) 0px 0px 50px -5px;
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
