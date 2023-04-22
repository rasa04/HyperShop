<template>
  <Header />
  <ProductDetails />
  <Footer />
</template>

<script setup>
import Header from "@/components/partials/Header.vue";
import ProductDetails from "@/components/Product/ProductDetails.vue";
import Footer from "@/components/partials/Footer.vue";
import {onMounted} from "vue";
import {initFlowbite} from "flowbite";

onMounted(() => {
  initFlowbite()
})
</script>

<style scoped>

</style>