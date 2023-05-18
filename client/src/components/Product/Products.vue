<template>
  <section class="w-full" id="advertisement">
    <div class="w-full">
      <img class="w-full px-10" src="@/assets/images/shop/advertisement.jpg" alt="" />
    </div>
  </section>
  <section class="grid md:grid-cols-4">
    <LeftSideBar/>
    <div class="md:col-span-3">
      <h2 class="text-3xl p-5 text-lime-800 fond-bold text-center select-none">Products</h2>
      <div class="grid md:grid-cols-3 grid-flow-row">
        <Product v-for="product in productsStore.products.data" :product="product" />
      </div>
      <PaginationComponent v-if="!productsStore.isFetching"/>
    </div>
  </section>
</template>

<script>
import LeftSideBar from "@/components/partials/LeftSideBar.vue";
import Product from "@/components/Product/Product.vue";
import PaginationComponent from "@/components/partials/UI/PaginationComponent.vue";
import { useProductsStore } from "@/stores/ProductsStore";

export default {
  name: "Products",

  components: {
    PaginationComponent,
    Product,
    LeftSideBar
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