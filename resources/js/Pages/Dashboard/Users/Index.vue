<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { useRolesAndPermissions } from "@/Composables/RolesAndPermissions";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
const { hasRole } = useRolesAndPermissions();
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <template #header>
            <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
                <h2>[ Users ]</h2>
                <Link
                    v-if="hasRole('theCreator', 'admin')"
                    :href="route('roles.index')"
                    :active="route().current('roles.index')"
                >
                    Roles
                </Link>
                <Link
                    v-if="hasRole('theCreator', 'admin')"
                    :href="route('permissions.index')"
                    :active="route().current('permissions.index')"
                >
                    Permissions
                </Link>
                <Link
                    v-if="hasRole('theCreator', 'admin', 'whatsapp')"
                    :href="route('ennuyeux.index')"
                    :active="route().current('ennuyeux.index')"
                >
                    WhatsApp
                </Link>
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
