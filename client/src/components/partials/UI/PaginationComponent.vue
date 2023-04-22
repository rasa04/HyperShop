<template>
  <nav v-if="productsStore.products.meta.last_page > 1" class="p-2 w-full flex justify-center items-center flex-wrap">
    <a v-for="link in productsStore.products.meta.links"
       :class="{
          'bg-lime-700 text-lime-100' : productsStore.products.meta.current_page.toString() === link.label,
          'hidden' : link.url === null ||
            (Math.abs(link.label - productsStore.products.meta.current_page) > 2)
        }"
       @click.prevent="paginate(link.url)"
       class="px-3 md:mx-2 py-2 leading-tight text-gray-500 bg-lime-100 rounded-lg cursor-pointer select-none
           hover:bg-lime-900 hover:text-lime-100 transition duration-100
            dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400
           dark:hover:bg-gray-700 dark:hover:text-white" v-html="link.label"
    >
    </a>
  </nav>
</template>
<script>
import axios from "axios";
import { useProductsStore } from "../../../stores/ProductsStore";

export default {
  name: "PaginationComponent",

  data() {
    return {
      productsStore: useProductsStore()
    }
  },

  methods: {
    paginate($link) {
      if ($link === null) return
      axios.get($link, {
        params: this.productsStore.filters
      })
      .then((response) => {
        this.productsStore.products = response.data
      })
    }
  },

}
</script>

<style scoped>

</style>