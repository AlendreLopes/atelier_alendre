<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>
        </form>

        <!-- Container -->
        <div
            class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10"
        >
            <!-- Login component -->
            <div class="flex shadow-md">
                <!-- Login form -->
                <div
                    class="flex flex-wrap content-center justify-center rounded-l-md bg-white"
                    style="width: 24rem; height: 32rem"
                >
                    <div class="w-72">
                        <!-- Heading -->
                        <h1 class="text-xl font-semibold">Welcome back</h1>
                        <small class="text-gray-400"
                            >Welcome back! Please enter your details</small
                        >

                        <!-- Form -->
                        <form class="mt-4">
                            <div class="mb-3">
                                <label class="mb-2 block text-xs font-semibold"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    placeholder="Enter your email"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500"
                                />
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 block text-xs font-semibold"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    placeholder="*****"
                                    class="block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500"
                                />
                            </div>

                            <div class="mb-3 flex flex-wrap content-center">
                                <input
                                    id="remember"
                                    type="checkbox"
                                    class="mr-1 checked:bg-purple-700"
                                />
                                <label
                                    for="remember"
                                    class="mr-auto text-xs font-semibold"
                                    >Remember for 30 days</label
                                >
                                <a
                                    href="#"
                                    class="text-xs font-semibold text-purple-700"
                                    >Forgot password?</a
                                >
                            </div>

                            <div class="mb-3">
                                <button
                                    class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md"
                                >
                                    Sign in
                                </button>
                                <button
                                    class="flex flex-wrap justify-center w-full border border-gray-300 hover:border-gray-500 px-2 py-1.5 rounded-md"
                                >
                                    <img
                                        class="w-5 mr-2"
                                        src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA"
                                    />
                                    Sign in with Google
                                </button>
                            </div>
                        </form>

                        <!-- Footer -->
                        <div class="text-center">
                            <span class="text-xs text-gray-400 font-semibold"
                                >Don't have account?</span
                            >
                            <a
                                href="#"
                                class="text-xs font-semibold text-purple-700"
                                >Sign up</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Login banner -->
                <div
                    class="flex flex-wrap content-center justify-center rounded-r-md"
                    style="width: 24rem; height: 32rem"
                >
                    <img
                        class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md"
                        src="https://i.imgur.com/9l1A4OS.jpeg"
                    />
                </div>
            </div>

            <!-- Credit -->
            <div class="mt-3 w-full">
                <p class="text-center">
                    Made by
                    <a
                        target="_blank"
                        href="https://www.instagram.com/_inubayuaji/"
                        class="text-purple-700"
                        >Inu Bayu Aji</a
                    >
                    and ispired by
                    <a
                        target="_blank"
                        href="https://dribbble.com/shots/17564792-Log-in-page-Untitled-UI"
                        class="text-purple-700"
                        >this</a
                    >.
                </p>
            </div>
        </div>
    </AuthenticationCard>
</template>
