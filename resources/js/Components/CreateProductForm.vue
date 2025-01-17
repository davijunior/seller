<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';


const form = useForm({
    title: '',
});

const submit = () => {
    form.post(route('products.store'), {
        onFinish: () => form.reset('title'),
    });
};
</script>


<template>
    <div class="border-b border-gray-900/10 p-6 flex items-center justify-center">
        <form @submit.prevent="submit" class="w-full">
            <InputLabel for="title"/>
            <TextInput id="title" type="text" v-model="form.title" required class="w-2/3"/>
            <InputError class="mt-2" :message="form.errors.email" />

            <PrimaryButton class="w-1/4 flex-col ml-10"> Cadastrar </PrimaryButton>
        </form>
    </div>
</template>