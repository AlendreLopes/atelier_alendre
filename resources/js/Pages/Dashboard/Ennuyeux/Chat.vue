<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import ApplicationMark from "@/Components/ApplicationMark.vue";
</script>

<template>
    <div>
        <!-- <div class="p-2 lg:p-4 bg-white border-b border-gray-200">
            <div
                class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6 p-4 lg:p-6"
            >
                <div>
                    <div class="flex items-center">
                        <h1 class="text-2xl font-medium text-gray-900">
                            <ApplicationMark class="inline h-9" />
                            Welcome to your WhatsApp application!
                        </h1>
                    </div>
                </div>
                <div>
                    <div class="flex items-right">
                        <h2
                            class="flex right-0 text-xl font-semibold text-gray-900"
                        >
                            CABEÇALHO DIREITA
                        </h2>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="flex flex-row bg-gray-200 bg-opacity-25 p-2 lg:p-8">
            <div
                class="h-screen basis-1/4 rounded-lg p-2 dark:bg-sky-900/70 dark:border-0"
            >
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                        />
                    </svg>
                    <h2 class="ml-2 text-xl font-semibold text-gray-900">
                        Contacts
                    </h2>
                </div>
                <div class="relative rounded-xl p-2 rounded-xl">
                    <div
                        class="flex rounded-xl p-2 h-16 dark:bg-sky-400/20 dark:border-0"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z"
                            />
                            <path
                                fill-rule="evenodd"
                                d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <p class="ml-2 text-purple-700 dark:text-sky-200">
                            Static parent
                            <br />
                            Static parent
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="basis-3/4 ml-1 bg-purple-400/20 border border-purple-700/10 rounded-lg p-2 dark:bg-sky-900/70 dark:border-0"
            >
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"
                        />
                    </svg>
                    <h2 class="ml-2 text-xl font-semibold text-gray-900">
                        Chat
                    </h2>
                </div>

                <div class="relative rounded-xl overflow-auto p-6">
                    <div class="relative text-sm font-medium leading-6">
                        <div
                            class="static bg-purple-400/20 border border-purple-700/10 p-4 h-96 dark:bg-sky-400/20 dark:border-0"
                        >
                            <p class="text-purple-700 dark:text-sky-200">
                                Static parent
                            </p>
                            <br />
                        </div>
                    </div>
                </div>
                <div
                    class="absolute bottom-0 left-25% w-full bg-purple-500 shadow-lg rounded-lg p-4 text-white dark:bg-sky-500"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            d="M4.5 4.5a3 3 0 00-3 3v9a3 3 0 003 3h8.25a3 3 0 003-3v-9a3 3 0 00-3-3H4.5zM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06z"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M18.97 3.659a2.25 2.25 0 00-3.182 0l-10.94 10.94a3.75 3.75 0 105.304 5.303l7.693-7.693a.75.75 0 011.06 1.06l-7.693 7.693a5.25 5.25 0 11-7.424-7.424l10.939-10.94a3.75 3.75 0 115.303 5.304L9.097 18.835l-.008.008-.007.007-.002.002-.003.002A2.25 2.25 0 015.91 15.66l7.81-7.81a.75.75 0 011.061 1.06l-7.81 7.81a.75.75 0 001.054 1.068L18.97 6.84a2.25 2.25 0 000-3.182z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    <p>Absolute child</p>

                    <input type="email" name="" id="" />
                </div>
            </div>
        </div>
    </div>
</template>
