<script setup>
import { onMounted, watch } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import VueMultiselect from "vue-multiselect";

import AppLayout from "@/Layouts/AppLayout.vue";

import InputError from "@/Components/InputError.vue";

import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputText from "@/Components/TextInput.vue";

import Table from "@/Components/Table.vue";
import THeader from "@/Components/TableHeaderData.vue";
import THeaderRow from "@/Components/TableHeaderRow.vue";
import TBodyRow from "@/Components/TableBodyRow.vue";
import TBodyHeader from "@/Components/TableBodyHeader.vue";
import TBodyData from "@/Components/TableBodyData.vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    roles: Array,
    permissions: Array,
});

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
    roles: [],
    permissions: [],
});

const submit = () => {
    form.transform((data) => ({
        ...data,
    })).put(route("users.update", props.user?.id), {
        onFinish: () => form.reset("name", "email"),
    });
};

// After DOM has finished we call
onMounted(() => {
    form.roles = props.user?.roles;
    form.permissions = props.user?.permissions;
});
// And observation
watch(
    () => props.user,
    () => {
        (props.roles = props.user?.roles),
            (props.permissions = props.user?.permissions);
    }
);
</script>

<template>
    <Head title="UpdateUUser" />

    <AppLayout>
        <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Update User ]</h2>
                <Link
                    :href="route('users.index')"
                    class="text-white font-semibold p-1 bg-violet-500 hover:bg-violet-700 rounded"
                    >Back to Users</Link
                >
            </div>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-md mx-auto p-6">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <InputText
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autofocus
                                    autocomplete="name"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />
                                <InputText
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="mt-1 block w-full"
                                    autocomplete="username"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="roles" value="Roles" />
                                <VueMultiselect
                                    v-model="form.roles"
                                    :options="roles"
                                    :multiple="true"
                                    :close-on-select="true"
                                    placeholder="Select the role"
                                    label="name"
                                    track-by="id"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="permissions"
                                    value="Permissions"
                                />
                                <VueMultiselect
                                    v-model="form.permissions"
                                    :options="permissions"
                                    :multiple="true"
                                    :close-on-select="true"
                                    placeholder="Select the permissions"
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
                                    Update User
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                    <div
                        class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
                    >
                        <h1 class="p-1">Roles</h1>
                        <Table>
                            <template #header>
                                <THeaderRow>
                                    <THeader>ID</THeader>
                                    <THeader>Name</THeader>
                                    <THeader>Action</THeader>
                                </THeaderRow>
                            </template>
                            <template #default>
                                <TBodyRow
                                    v-for="userRole in user.roles"
                                    :key="userRole.id"
                                    class="border-b"
                                >
                                    <TBodyHeader>{{ userRole.id }}</TBodyHeader>
                                    <TBodyData>{{ userRole.name }}</TBodyData>
                                    <TBodyData class="space-x-4">
                                        <Link
                                            :href="
                                                route('users.roles.revoke', [
                                                    user.id,
                                                    userRole.id,
                                                ])
                                            "
                                            method="DELETE"
                                            as="button"
                                            class="text-red-400 hover:text-red-900"
                                            preserve-scroll
                                        >
                                            Revoke
                                        </Link>
                                    </TBodyData>
                                </TBodyRow>
                            </template>
                        </Table>
                    </div>
                    <div
                        class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
                    >
                        <h1>Permissions</h1>
                        <Table>
                            <template #header>
                                <THeaderRow>
                                    <THeader>ID</THeader>
                                    <THeader>Name</THeader>
                                    <THeader>Action</THeader>
                                </THeaderRow>
                            </template>
                            <template #default>
                                <TBodyRow
                                    v-for="userPermission in user.permissions"
                                    :key="userPermission.id"
                                    class="border-b"
                                >
                                    <TBodyHeader>{{
                                        userPermission.id
                                    }}</TBodyHeader>
                                    <TBodyData>{{
                                        userPermission.name
                                    }}</TBodyData>
                                    <TBodyData class="space-x-4">
                                        <Link
                                            :href="
                                                route(
                                                    'users.permissions.revoke',
                                                    [user.id, userPermission.id]
                                                )
                                            "
                                            method="DELETE"
                                            as="button"
                                            class="text-red-400 hover:text-red-900"
                                            preserve-scroll
                                        >
                                            Revoke
                                        </Link>
                                    </TBodyData>
                                </TBodyRow>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
