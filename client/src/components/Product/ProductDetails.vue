<template>
  <section>
    <div class="md:grid md:grid-cols-4">
      <LeftSideBar />
      <div class="col-span-3" v-if="!isProductFetching">
        <div v-if="product.product_images.length" class="md:flex items-center my-12">
          <img :src="`${this.VITE_API_URL}/storage/${product.product_images[0].url}`"
               class="md:w-1/2 max-md:w-full hover:md:scale-110 transition duration-800" alt="" />
          <div class="w-1/2 p-1 grid grid-cols-3 gap-2" id="similar_products">
            <div v-for="image in product.product_images" class="text-center">
              <img class="hover:md:scale-110" :src="`${this.VITE_API_URL}/storage/${image.url}`" alt="" />
              <p>{{ product.name }}</p>
            </div>
          </div>
        </div>
        <div v-else class="md:flex items-center my-12">
          <img src="https://via.placeholder.com/360x360.png/000000?text=DEFAUL+IMAGE"
               class="md:w-1/2 max-md:w-full hover:md:scale-110 transition duration-800" alt="" />
        </div>
        <div class="w-full bg-lime-100 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
            <li class="w-full">
              <button id="stats-tab" type="button" @click="changeStateOfTabs(0)" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Info</button>
            </li>
            <li class="w-full">
              <button id="faq-tab" type="button" @click="changeStateOfTabs(1)" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">About</button>
            </li>
            <li class="w-full">
              <button id="about-tab" type="button" @click="changeStateOfTabs(2)" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Services</button>
            </li>
          </ul>
          <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" :class="{ hidden : !stateOfTabs[0] }">
              <dl class="grid max-w-screen-xl text-center grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-3xl font-extrabold">{{ product.quantity }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Purchased</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-3xl font-extrabold">{{ product.quantity }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Quantity</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-3xl font-extrabold">{{ product.price }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Price</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-3xl font-extrabold">{{ product.id }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Product id</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-sm font-extrabold">{{ new Date(product.created_at) }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Date</dd>
                </div>
                <div v-if="this.product.brand !== null" class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-xl font-extrabold">{{ product.brand.name }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Brand</dd>
                </div>
                <div v-if="this.product.category !== null" class="flex flex-col items-center justify-center">
                  <dt class="mb-2 text-3xl font-extrabold">{{ product.category.name }}</dt>
                  <dd class="font-light text-gray-500 dark:text-gray-400">Category</dd>
                </div>
              </dl>
            </div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="faq" :class="{ hidden : !stateOfTabs[1] }">
              <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h2 id="accordion-flush-heading-1">
                  <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                    <span>About {{ product.name }}</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                  <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ product.about }}</p>
                  </div>
                </div>
                <h2 id="accordion-flush-heading-2">
                  <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                    <span>Is there a Figma file available?</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                  <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                    <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                  </div>
                </div>
                <h2 id="accordion-flush-heading-3">
                  <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                    <span>What are the differences between Flowbite and Tailwind UI?</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                  <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                    <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                      <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                      <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" :class="{ hidden : !stateOfTabs[2] }">
              <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the world’s potential</h2>
              <!-- List -->
              <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                <li class="flex space-x-2">
                  <!-- Icon -->
                  <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                  <span class="font-light leading-tight">Dynamic reports and dashboards</span>
                </li>
                <li class="flex space-x-2">
                  <!-- Icon -->
                  <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                  <span class="font-light leading-tight">Templates for everyone</span>
                </li>
                <li class="flex space-x-2">
                  <!-- Icon -->
                  <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                  <span class="font-light leading-tight">Development workflow</span>
                </li>
                <li class="flex space-x-2">
                  <!-- Icon -->
                  <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                  <span class="font-light leading-tight">Limitless business automation</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <RecommendedItems />
      </div>
    </div>
  </section>
</template>

<script>
import RecommendedItems from "@/components/partials/RecommendedItems.vue";
import LeftSideBar from "@/components/partials/LeftSideBar.vue";
import axios from "axios";

export default {
  name: "ProductDetails",
  components: {
    RecommendedItems,
    LeftSideBar
  },

  data() {
    return {
      product: {},
      isProductFetching: true,
      stateOfTabs: [true, false, false],
      VITE_API_URL: import.meta.env.VITE_API_URL
    }
  },

  methods: {
    changeStateOfTabs(tab) {
      this.stateOfTabs[tab] = true
      if (tab !== 0) this.stateOfTabs[0] = false
      if (tab !== 1) this.stateOfTabs[1] = false
      if (tab !== 2) this.stateOfTabs[2] = false
    }
  },

  created() {
    axios.get(`${this.VITE_API_URL}/api/products/${this.$route.params.id}`).then((response) => {
      this.isProductFetching = false
      this.product = response.data.data
      console.log(this.product)
    })
  },

}
</script>

<style scoped>

</style>