<script setup>
import { Head } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import NavBar from "@/Components/NavBarDashboard.vue";
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page NavBar -->
            <NavBar></NavBar>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
