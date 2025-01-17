<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateSaleForm from '@/Components/CreateSaleForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['sales', 'offers']);
</script>

<template>
    <Head title="Vendas"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Vendas
            </h2>
        </template>

        <CreateSaleForm :offers="offers"></CreateSaleForm>

        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Conteúdo da venda</th>
                </tr>
            </thead>
            <tbody v-for="sale in sales">
                <tr>
                    <td class="text-center border">{{ sale.sale_date }}</td>
                    <td class="text-center border">
                        {{ sale.offer_quantity }}x {{sale.offer.title}} 
                    </td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>