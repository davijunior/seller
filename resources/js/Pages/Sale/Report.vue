<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateSaleForm from '@/Components/CreateSaleForm.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['report']);
</script>

<template>
    <Head title="Vendas"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Vendas por produtos
            </h2>
        </template>
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Vendas</th>
                </tr>
            </thead>
            <tbody v-for="item in report">
                <tr>
                    <td class="text-center border">{{ item.product_name }}</td>
                    <td class="text-center border">
                        {{ item.total_quantity_sold }} vendidos
                    </td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>