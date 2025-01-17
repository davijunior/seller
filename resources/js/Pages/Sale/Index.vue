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

        <div v-for="sale in sales">
            <p>{{ sale.sale_date }} -[ {{ sale.offer_quantity }} x {{sale.offer.title}} ]</p>
        </div>

    </AuthenticatedLayout>
</template>