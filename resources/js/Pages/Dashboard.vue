<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <template #header>
            <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
                <h2>Dashboard</h2>
            </div>
        </template>

        <div class="py-2">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
