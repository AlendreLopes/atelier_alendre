<script setup>
import ChatEllipsisVertical from "@/Components/ChatEllipsisVertical.vue";
import ChatSearch from "@/Components/ChatSearch.vue";
import ChatUserGroup from "@/Components/ChatUserGroup.vue";

import ChatViewRow from "@/Pages/Dashboard/Ennuyeux/ChatViewRow.vue";
</script>
<template>
    <div id="chat-view-header" class="fixed w-[420px] z-10">
        <div
            class="bg-white w-full flex justify-between items-center px-3 py-2"
        >
            <img
                class="rounded-full w-10"
                src="https://random.imagecdn.app/100/100"
                alt="Fake"
            />
            <div class="flex items-center justify-between">
                <ChatUserGroup></ChatUserGroup>
                <ChatEllipsisVertical
                    class="cursor-pointer"
                ></ChatEllipsisVertical>
            </div>
        </div>
    </div>
    <div id="chat-search" class="bg-white w-full px-2 border-b shadow-sm">
        <div class="mt-1 px-1 flex items-center justify-between">
            <ChatSearch class="ml-2"></ChatSearch>
            <input
                class="ml-5 w-full bg-white py-1.5 px-2.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:text-sm placeholder:text-gray-500"
                autocomplete="off"
                placeholder="Start a new chat"
                type="text"
            />
        </div>
    </div>
    <div
        id="chat-view-messages"
        class="pt-1 z-0 overflow-auto fixed h-[calc(100vh-100px)] w-[42px]"
    >
        <ChatViewRow></ChatViewRow>
    </div>
</template>
