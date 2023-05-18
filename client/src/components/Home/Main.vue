<template>
  <section class="w-full grid md:grid-cols-4">
    <LeftSideBar/>
    <div class="w-fit md:col-span-3">
      <div class="mt-16">
        <h2 class="text-5xl p-10 text-lime-800 fond-bold text-center select-none">Hits</h2>
        <div class="w-full grid md:grid-cols-3 grid-flow-row">
          <Product v-for="product in productsStore.products.data" :product="product" />
        </div>
      </div>
      <PaginationComponent v-if="!productsStore.isFetching"/>
      <RecommendedItems />
    </div>
  </section>
</template>

<script>
import PaginationComponent from "@/components/partials/UI/PaginationComponent.vue";
import RecommendedItems from "@/components/partials/RecommendedItems.vue";
import LeftSideBar from "@/components/partials/LeftSideBar.vue";
import Product from "@/components/Product/Product.vue";
import { useProductsStore } from "@/stores/ProductsStore";

export default {
  name: "Main",

  components: {
    PaginationComponent,
    RecommendedItems,
    LeftSideBar,
    Product,
  },

  data() {
    return {
      productsStore: useProductsStore()
    }
  },
  created() {
    this.productsStore.refreshProducts()
  }
}
</script>