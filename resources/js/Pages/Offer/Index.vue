<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateOfferForm from '@/Components/CreateOfferForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['offers', 'products_list']);
console.log(props.products_list);
</script>

<template>
    <Head title="Ofertas"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Ofertas
            </h2>
        </template>

        <CreateOfferForm :products_list="products_list"></CreateOfferForm>
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th>Oferta</th>
                    <th>Produto</th>
                </tr>
            </thead>
            <tbody v-for="offer in offers">
                <tr>
                    <td class="text-center border">{{offer.title}}</td>
                    <td class="text-center border">
                        <ul v-for="product in offer.products">
                            <li>{{product.pivot.quantity}}x {{ product.title }}</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>