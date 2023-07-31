<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";

import InputError from "@/Components/InputError.vue";

import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputText from "@/Components/TextInput.vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
});

const submit = () => {
    form.put(route("users.update", props.user?.id));
};
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
                </div>
            </div>
        </div>
    </AppLayout>
</template>
