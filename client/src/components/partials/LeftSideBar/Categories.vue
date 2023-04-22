<template>
  <li>
    <button type="button" @click.prevent="changeState"
            class="flex items-center w-full p-2 text-base font-normal text-gray-900
      transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
      <i class="fa fa-laptop"></i>
      <span class="flex-1 ml-3 text-left whitespace-nowrap">Categories</span>
      <i :class="{'fa fa-angle-down' : categoryState, 'fa fa-angle-right' : !categoryState}"></i>
    </button>
    <ul id="" class="py-2 space-y-2" v-show="categoryState">
      <li v-for="category in filtersStore.filterList.categories"  :class="{ 'bg-yellow-100' : checkedCategories.includes(category.id)}">
        <button type="button" @click.prevent="checkCategory(category.id)" class="flex items-center w-full p-2 text-base font-normal text-gray-900
      transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
          <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ category.name }}</span>
        </button>
      </li>
    </ul>
  </li>
</template>

<script>
import { useProductsStore } from "@/stores/ProductsStore";
import { useFiltersStore } from "@/stores/FiltersStore";
export default {
  name: "Categories",

  data() {
    return {
      productsStore: useProductsStore(),
      filtersStore: useFiltersStore(),
      checkedCategories: [],
      categoryState: true,
    }
  },

  methods: {
    checkCategory(category) {
      if (this.checkedCategories.includes(category)) this.checkedCategories = this.checkedCategories.filter(item => item !== category)
      else this.checkedCategories.push(category)
    },
    changeState() {
        this.categoryState = !this.categoryState
    },
  },

  watch: {
    checkedCategories: {
      deep: true,
      handler(newValue) {
        this.productsStore.changeCategories(newValue)
      }
    }
  },

}
</script>

<style scoped>

</style>