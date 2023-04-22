<script>
import Header from "@/components/partials/Header.vue";
import Footer from "@/components/partials/Footer.vue";
import Slider from "@/components/partials/Slider.vue";
import Main from "@/components/Home/Main.vue";
import {initFlowbite} from "flowbite";

export default {
  components: {
    Header,
    Footer,
    Slider,
    Main
  },
  mounted() {
      initFlowbite()
  }
}
</script>

<template>
  <Header />
  <Slider />
  <Main />
  <Footer />
</template>
