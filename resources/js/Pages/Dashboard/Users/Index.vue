<script setup>
import { Head, Link } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";

import Table from "@/Components/Table.vue";
import TableHeaderRow from "@/Components/TableHeaderRow.vue";
import TableHeaderData from "@/Components/TableHeaderData.vue";
import TableBodyHeader from "@/Components/TableBodyHeader.vue";
import TableBodyRow from "@/Components/TableBodyRow.vue";
import TableBodyData from "@/Components/TableBodyData.vue";

defineProps(["users"]);
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout>
        <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Users ]</h2>
                <Link
                    :href="route('users.create')"
                    class="text-white font-semibold p-1 bg-violet-500 hover:bg-violet-700 rounded"
                    >New User</Link
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
                                <TableHeaderData>Name</TableHeaderData>
                                <TableHeaderData>E-mail</TableHeaderData>
                                <TableHeaderData>Action</TableHeaderData>
                            </TableHeaderRow>
                        </template>
                        <template #default>
                            <TableBodyRow
                                v-for="user in users"
                                :key="user.id"
                                class="border-b"
                            >
                                <TableBodyData class="text-center">{{
                                    user.id
                                }}</TableBodyData>
                                <TableBodyData>{{ user.name }}</TableBodyData>
                                <TableBodyData>{{ user.email }}</TableBodyData>
                                <TableBodyData class="text-center">
                                    <Link
                                        :href="route('users.edit', user.id)"
                                        class="text-violet-400 hover:text-violet-600 mx-1"
                                        >Edit</Link
                                    >
                                    <Link
                                        :href="route('users.destroy', user.id)"
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
