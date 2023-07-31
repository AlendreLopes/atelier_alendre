<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";

import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    name: "",
});

const submit = () => {
    form.transform((data) => ({
        ...data,
    })).post(route("permissions.store"), {
        onFinish: () => form.reset("name"),
    });
};
</script>
<template>
    <Head title="Permissions"></Head>
    <AppLayout>
        <template #header>
            <div
                class="flex justify-between space-x-4 sm:-my-px sm:ml-10 sm:flex"
            >
                <h2>[ Create a New Permission ]</h2>
                <Link
                    :href="route('permissions.index')"
                    class="text-white font-semibold p-1 bg-violet-500 hover:bg-violet-700 rounded"
                    >Back to Permissions</Link
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

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Create
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
