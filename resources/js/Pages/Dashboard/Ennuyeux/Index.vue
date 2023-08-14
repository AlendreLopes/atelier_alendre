<script setup>
import { Head, Link } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";

import ChatSideBar from "@/Pages/Dashboard/Ennuyeux/ChatSideBar.vue";
import ChatView from "@/Pages/Dashboard/Ennuyeux/ChatView.vue";
</script>

<template>
    <Head title="WhatsApp" />
    <AppLayout>
        <!-- <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Whatsapp ]</h2>
            </div>
        </template> -->

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg"
                ></div>
            </div>
        </div>
    </AppLayout>
</template>
