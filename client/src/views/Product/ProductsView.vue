<template>
  <Header />
  <Products />
  <Footer />
</template>

<script setup>
import Products from "@/components/Product/Products.vue";
import Header from "@/components/partials/Header.vue";
import Footer from "@/components/partials/Footer.vue";
import {onMounted} from "vue";
import {initFlowbite} from "flowbite";

onMounted(() => {
  initFlowbite()
})
</script>

<style scoped>

</style>