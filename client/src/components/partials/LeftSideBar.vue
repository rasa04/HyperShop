<template>
  <div id="sidebar" class="w-full max-md:fixed">
    <button type="button" @click.prevent="filtersStore.toggle()"
            class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg
          md:hidden focus:ring-2 focus:ring-gray-200
          dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open sidebar</span>
      <i class="fa fa-bars"></i>
    </button>

    <aside id="sidebar-multi-level-sidebar" class="top-0 left-0 w-64 transition-transform sm:translate-x-0"
           :class="{'max-md:hidden' : !filtersStore.toggled}" aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2">
          <PriceRanger />
          <Categories />
          <Brands />
        </ul>
      </div>
    </aside>
  </div>
</template>

<script>
import Categories from "@/components/partials/LeftSideBar/Categories.vue";
import Brands from "@/components/partials/LeftSideBar/Brands.vue";
import PriceRanger from "@/components/partials/LeftSideBar/PriceRanger.vue";
import { useFiltersStore } from "@/stores/FiltersStore";

export default {
  name: "LeftSideBar",

  components: {
    PriceRanger,
    Brands,
    Categories
  },

  data() {
    return {
      filtersStore: useFiltersStore(),
    }
  },
  created() {
    this.filtersStore.getFilterList()
  }
}
</script>

