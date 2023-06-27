<script setup>
import About from "@/Pages/Site/About.vue";
import Contact from "@/Pages/Site/Contact.vue";
import Footer from "@/Pages/Site/Footer.vue";
import NavBar from "@/Pages/Site/NavBar.vue";

defineProps({
    appCopyRight: String,
    appHome: Object,
    appLogin: Boolean,
    appName: String,
    appRegister: Boolean,
});
</script>
<template>
    <a id="home"></a>
    <NavBar
        :appLogin="appLogin"
        :appName="appName"
        :appRegister="appRegister"
    ></NavBar>
    <About></About>
    <Contact></Contact>
    <Footer></Footer>
</template>
