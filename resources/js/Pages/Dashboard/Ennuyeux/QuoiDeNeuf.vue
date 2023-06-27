<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppWhats.vue";
import Chat from "@/Pages/Dashboard/Ennuyeux/Chat.vue";
</script>
<template>
    <Head title="Whats App" />
    <AppLayout>
        <div class="py-2">
            <div class="max-w-8xl mx-auto sm:px-4 lg:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Chat />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
