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
            <div class="flex">
                <div class="w-1/4 flex-col">
                    <InputLabel for="quantity" value="Quantidade"/>
                    <TextInput id="quantity" type="number" v-model="form.quantity" required class="w-full flex-col"/>
                </div>
                
                <div class="w-3/4 flex-col">
                    <InputLabel value="Oferta" />
                    <select class="w-full" id="prod_id" v-model="form.offer_id"> 
                        <option v-for="offer in offers" :key="offer.id" :value="offer.id"> 
                            {{ offer.title }} - {{ offer.id }}
                        </option>
                    </select>
                </div>
            </div>
            <PrimaryButton class="w-1/4 flex-col"> Cadastrar </PrimaryButton>
        </form>
    </div>
</template>