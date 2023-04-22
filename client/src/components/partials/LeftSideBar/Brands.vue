<template>
  <li>
    <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75
      rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            @click.prevent="changeState"
      >
      <i class="fa fa-circle-o"></i>
      <span class="flex-1 ml-3 text-left whitespace-nowrap">Brands</span>
      <i :class="{'fa fa-angle-down' : brandState, 'fa fa-angle-right' : !brandState}"></i>
    </button>
    <ul id="" class="py-2 text-gray-800" v-show="brandState">
      <li v-for="brand in filtersStore.filterList.brands" class="hover:bg-gray-100 p-2" :class="{ 'bg-yellow-100' : checkedBrands.includes(brand.id)}">
        <button type="button" @click.prevent="checkBrand(brand.id)" class="flex items-center w-full p-2 text-base font-normal text-gray-900
      transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
          <p class="truncate"><span class="pull-right">(50)</span>{{brand.name}}</p>
        </button>
      </li>
    </ul>
  </li>
</template>

<script>
import { useFiltersStore } from "@/stores/FiltersStore";
import { useProductsStore } from '@/stores/ProductsStore';
export default {
  name: "Brands",

  data() {
    return {
      productsStore: useProductsStore(),
      filtersStore: useFiltersStore(),
      brandState: true,
      checkedBrands: [],
    }
  },

  methods: {
    changeState() {
      this.brandState = !this.brandState
    },
    checkBrand(brand) {
      if (this.checkedBrands.includes(brand)) this.checkedBrands = this.checkedBrands.filter(item => item !== brand)
      else this.checkedBrands.push(brand)
    }
  },

  watch: {
    checkedBrands: {
      deep: true,
      handler(newValue) {
        this.productsStore.changeBrands(newValue)
      }
    }
  },
}
</script>

<style scoped>

</style>