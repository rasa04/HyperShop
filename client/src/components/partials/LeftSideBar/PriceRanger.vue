<template>
  <div v-if="filtersStore.filterList.price !== undefined" class="p-1 border-2 rounded-lg">
      <label for="price_ranger" class="block mb-2 font-medium text-lime-700 dark:text-white">Price:</label>
    <p class="pull-left">{{ this.priceRanger.min }}</p>
    <p class="pull-right">{{ this.priceRanger.max }}</p>
      <input id="price_ranger" type="range" v-model="this.priceRanger.min" :min="filtersStore.filterList.price" :max="this.priceRanger.max"
             class="w-full h-1 bg-gray-100 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 my-3 accent-red-500">
      <input id="price_ranger" type="range" v-model="this.priceRanger.max" :min="this.priceRanger.min" :max="filtersStore.filterList.price"
             class="w-full h-1 bg-gray-100 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 my-3 accent-red-500">
      <input type="button" class="w-full bg-yellow-300 rounded-lg p-1 hover:bg-yellow-400 font-bold" value="SET" @click.prevent="setPrice">
  </div>
</template>

<script>
import { useProductsStore } from "@/stores/ProductsStore";
import { useFiltersStore } from "@/stores/FiltersStore";

export default {
  name: "PriceRanger",

  data() {
    return {
      productsStore: useProductsStore(),
      filtersStore: useFiltersStore(),
      priceRanger: {
        "min": 1,
        "max": 10000
      }
    }
  },

  methods: {
    setPrice() {
      this.productsStore.changePrices(this.priceRanger)
    }
  },
}
</script>

<style scoped>

</style>