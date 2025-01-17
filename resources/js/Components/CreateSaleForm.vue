<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['offers']);

const form = useForm({
    quantity: '',
    offer_id: '',
});


const submit = () => {
    form.post(route('sales.store'), {
        onFinish: () => form.reset('quantity'),
    });
};
</script>


<template>
    <div class="border-b border-gray-900/10 p-6 flex items-center justify-center">
        <form @submit.prevent="submit" class="w-full">
            <InputLabel for="quantity" value="Quantidade"/>
            <TextInput id="quantity" type="number" v-model="form.quantity" required class="w-full"/>
            <InputError class="mt-2" :message="form.errors.email" />
            <div>
                <InputLabel value="Oferta" />
                <select class="w-2/3" id="prod_id" v-model="form.offer_id"> 
                    <option v-for="offer in offers" :key="offer.id" :value="offer.id"> 
                        {{ offer.title }} - {{ offer.id }}
                    </option>
                </select>
            </div>
            <PrimaryButton class="w-1/4 flex-col"> Cadastrar </PrimaryButton>
        </form>
    </div>
</template>