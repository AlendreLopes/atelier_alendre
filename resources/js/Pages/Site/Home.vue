<script setup>
import { Head } from "@inertiajs/vue3";
import About from "@/Pages/Site/About.vue";
import Contact from "@/Pages/Site/Contact.vue";
import Footer from "@/Pages/Site/Footer.vue";
import Hero from "@/Pages/Site/Hero.vue";
import NavBar from "@/Pages/Site/NavBar.vue";

defineProps({
    appCopyRight: String,
    appData: Object,
    appLogin: Boolean,
    appName: String,
    appRegister: Boolean,
});
</script>
<template>
    <a id="home"></a>
    <Head title="Home" />
    <Hero :appName="appName"></Hero>
    <NavBar
        :appLogin="appLogin"
        :appName="appName"
        :appRegister="appRegister"
    ></NavBar>
    <About :appName="appName"></About>
    <Contact :appData="appData"></Contact>
    <Footer :appData="appData" :appCopyRight="appCopyRight"></Footer>
</template>
