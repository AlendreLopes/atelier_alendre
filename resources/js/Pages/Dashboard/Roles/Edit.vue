<script setup>
import { onMounted, watch } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Multiselect from "vue-multiselect";

import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

// Table
import Table from "@/Components/Table.vue";
import TableHeaderRow from "@/Components/TableHeaderRow.vue";
import TableHeaderData from "@/Components/TableHeaderData.vue";
import TableBodyHeader from "@/Components/TableBodyHeader.vue";
import TableBodyRow from "@/Components/TableBodyRow.vue";
import TableBodyData from "@/Components/TableBodyData.vue";

const props = defineProps({
    role: {
        type: Object,
        required: true,
    },
    permissions: Array,
});
//
const form = useForm({
    name: props.role.name,
    permissions: [],
});
//
// const submit = () => {
//     form.transform((data) => ({ ...data })).put(
//         route("roles.update", props.role.id),
//         {
//             onFinish: () => form.reset("name"),
//         }
//     );
// };
const submit = () => {
    form.transform((data) => ({
        ...data,
    })).put(route("roles.update", props.role.id), {
        onFinish: () => form.reset("name"),
    });
};
//
onMounted(() => (form.permissions = props.role?.permissions));
//
watch(
    () => props.role,
    () => (props.permissions = props.role?.permissions)
);
</script>

<template>
    <Head title="Edit Role" />
    <AppLayout>
        <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Editing Role ]</h2>
                <Link
                    :href="route('roles.index')"
                    class="text-white font-semibold p-1 bg-violet-500 hover:bg-violet-700 rounded"
                    >Back to Roles</Link
                >
            </div>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mt-6 mb-6 max-w-md mx-auto">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="name"
                                    class="mt-1 block w-full"
                                    autofocus
                                    autocomplete="username"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="permissions"
                                    value="Permissions"
                                    class="mt-2"
                                />
                                <Multiselect
                                    v-model="form.permissions"
                                    :options="permissions"
                                    :multiple="true"
                                    :close-on-select="true"
                                    placeholder="Pick some"
                                    label="name"
                                    track-by="id"
                                />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Edit
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                    <div
                        class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
                    >
                        <h1>Permissions</h1>
                        <Table>
                            <template #header>
                                <TableHeaderRow>
                                    <TableHeaderData>ID</TableHeaderData>
                                    <TableHeaderData>Name</TableHeaderData>
                                    <TableHeaderData>Action</TableHeaderData>
                                </TableHeaderRow>
                            </template>
                            <template #default>
                                <TableBodyRow
                                    v-for="rolePermission in role.permissions"
                                    :key="rolePermission.id"
                                    class="border-b"
                                >
                                    <TableBodyHeader>{{
                                        rolePermission.id
                                    }}</TableBodyHeader>
                                    <TableBodyData>{{
                                        rolePermission.name
                                    }}</TableBodyData>
                                    <TableBodyData class="space-x-4">
                                        <Link
                                            :href="
                                                route(
                                                    'roles.permissions.revoke',
                                                    [role.id, rolePermission.id]
                                                )
                                            "
                                            method="DELETE"
                                            as="button"
                                            class="text-red-400 hover:text-red-900"
                                            preserve-scroll
                                        >
                                            Revoke R {{ role.id }} P
                                            {{ rolePermission.id }}
                                        </Link>
                                    </TableBodyData>
                                </TableBodyRow>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
