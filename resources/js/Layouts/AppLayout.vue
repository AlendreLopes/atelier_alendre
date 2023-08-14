<script setup>
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import NavBar from "@/Components/NavBarDashboard.vue";

const showMessage = ref(false);

const page = usePage();

// const flash = computed(() => page.props.flash.message);

if (page.props.flash.message) {
    hideMessage();
}

function setShowMessage(setValue) {
    showMessage.value = setValue;
}

function hideMessage() {
    setShowMessage(true);
    setTimeout(() => setShowMessage(false), 3000);
}
</script>

<template>
    <div>
        <Banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page NavBar -->
            <NavBar></NavBar>

            <!-- Messages -->
            <div
                v-if="showMessage"
                class="bg-indigo-600"
                x-data="{open: true}"
                x-show="open"
            >
                <div class="max-w-3xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                            <span class="flex p-2 rounded-lg bg-indigo-800">
                                <!-- Heroicon name: outline/speakerphone -->
                                <svg
                                    class="h-6 w-6 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                                    />
                                </svg>
                            </span>
                            <p class="m-3 font-medium text-white truncate">
                                {{ $page.props.flash.message }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
