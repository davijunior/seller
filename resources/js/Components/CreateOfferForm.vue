<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['products_list']);

const form = useForm({
    title: '',
    products: [],
});

const offer_products = ref([]);

const addProductToOffer = () => { 
    const product_id = document.getElementById('prod_id').value;
    const quantity = document.getElementById('qty').value;

    if (!product_id || !quantity) return;

    const selected_product = props.products_list.find(p => p.id === parseInt(product_id));
    offer_products.value.push({ product: selected_product, quantity: parseInt(quantity) });

    // Limpar os campos após adicionar
    document.getElementById('prod_id').value = '';
    document.getElementById('qty').value = ''; 
};

const removeProduct = (product_id) => {
    offer_products.value = offer_products.value.filter(product => product.product.id !== product_id);
}


const submit = () => {
    form.products = offer_products.value;
    form.post(route('offers.store'), {
        onFinish: () => form.reset('title'),
    });
};
</script>


<template>
    <div class="border-b border-gray-900/10 p-6 flex items-center justify-center">
        <form @submit.prevent="submit" class="w-full">
            <InputLabel for="title" value="Titulo da Oferta"/>
            <TextInput id="title" type="text" v-model="form.title" required class="w-full"/>
            <InputError class="mt-2" :message="form.errors.email" />
            <div>
                <InputLabel value="Produto" />
                <select class="w-2/3" id="prod_id"> 
                    <option v-for="p in products_list" :key="p.id" :value="p.id"> 
                        {{ p.title }}
                    </option>
                </select>
            </div>
            <div>
                <InputLabel value="Quantidade" />
                <TextInput id="qty" type="number" class="w-full"/>

                <button type="button" @click="addProductToOffer" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 dark:border-gray-500 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-800" > 
                    Adicionar 
                </button>
            </div>
            <table class="table-fixed w-full">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody v-for="prod in offer_products" class="w-full">
                    <tr>
                        <td class="text-center border">{{prod.product.title}}</td>
                        <td class="text-center border">{{ prod.quantity }}</td>
                        <td class="text-center border">
                            <button type="button" @click="() => removeProduct(prod.product.id)">-</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <PrimaryButton class="w-1/4 flex-col"> Cadastrar </PrimaryButton>
        </form>
    </div>
</template>