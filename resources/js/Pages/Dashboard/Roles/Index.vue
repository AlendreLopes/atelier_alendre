<script setup>
import { Head, Link } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";

import Table from "@/Components/Table.vue";
import TableHeaderRow from "@/Components/TableHeaderRow.vue";
import TableHeaderData from "@/Components/TableHeaderData.vue";
import TableBodyHeader from "@/Components/TableBodyHeader.vue";
import TableBodyRow from "@/Components/TableBodyRow.vue";
import TableBodyData from "@/Components/TableBodyData.vue";

defineProps({
    roles: Object,
});
</script>

<template>
    <Head title="Roles" />
    <AppLayout>
        <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Roles ]</h2>
                <Link
                    :href="route('roles.create')"
                    class="text-white font-semibold p-1 bg-violet-500 hover:bg-violet-700 rounded"
                    >New Role</Link
                >
            </div>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Table>
                        <template #header>
                            <TableHeaderRow>
                                <TableHeaderData>Id</TableHeaderData>
                                <TableHeaderData>Role</TableHeaderData>
                                <TableHeaderData>Actions</TableHeaderData>
                            </TableHeaderRow>
                        </template>
                        <template #default>
                            <TableBodyRow v-for="role in roles" :key="role.id">
                                <TableBodyData class="text-center">{{
                                    role.id
                                }}</TableBodyData>
                                <TableBodyData>{{ role.name }}</TableBodyData>
                                <TableBodyData class="text-center">
                                    <Link
                                        :href="route('roles.edit', role.id)"
                                        class="text-violet-400 hover:text-violet-600 mx-1"
                                        >Edit</Link
                                    >
                                    <Link
                                        :href="route('roles.destroy', role.id)"
                                        method="DELETE"
                                        as="button"
                                        class="text-red-300 hover:text-red-600"
                                        >Delete</Link
                                    >
                                </TableBodyData>
                            </TableBodyRow>
                        </template>
                    </Table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
