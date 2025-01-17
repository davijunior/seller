<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateProductForm from '@/Components/CreateProductForm.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps(['products']);
</script>

<template>
    <Head title="Produtos"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Produtos
            </h2>
        </template>

        <CreateProductForm></CreateProductForm>
        
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Data da criação</th>
                </tr>
            </thead>
            <tbody v-for="product in products">
                <tr>
                    <td class="text-center border">{{ product.title }}</td>
                    <td class="text-center border">
                        {{ product.created_at }}
                    </td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>