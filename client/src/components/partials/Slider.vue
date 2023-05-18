<template>

  <div class="relative w-full" data-carousel="slide"> <!--slide or static-->
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 ease-in-out grid grid-cols-2 p-5" data-carousel-item>
        <div class="md:ml-12 max-md:ml-8 md:p-5">
          <h1 class="md:text-3xl max-md:text-md text-gray-500"><span class="text-green-500 font-bold">E</span>-SHOPPER</h1>
          <h2 class="md:text-2xl max-md:text-md text-black">Free E-Commerce Template</h2>
          <p class="max-md:hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <button type="button" class="rounded-lg bg-lime-500 p-2 text-lime-100">Get it now</button>
        </div>
        <div class="">
          <img src="@/assets/images/home/girl2.jpg" class="block" alt="...">
        </div>
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 ease-in-out  grid grid-cols-2 p-5" data-carousel-item>
        <div class="md:ml-12 max-md:ml-8 md:p-5">
          <h1 class="md:text-3xl max-md:text-md text-gray-500"><span class="text-green-500 font-bold">E</span>-SHOPPER</h1>
          <h2 class="md:text-2xl max-md:text-md text-black">Free E-Commerce Template</h2>
          <p class="max-md:hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <button type="button" class="rounded-lg bg-lime-500 p-2 text-lime-100">Get it now</button>
        </div>
        <div class="">
          <img src="@/assets/images/blog/blog-one.jpg" class="block" alt="...">
        </div>
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 ease-in-out  grid grid-cols-2 p-5" data-carousel-item>
        <div class="md:ml-12 max-md:ml-8 md:p-5">
          <h1 class="md:text-3xl max-md:text-md text-gray-500"><span class="text-green-500 font-bold">E</span>-SHOPPER</h1>
          <h2 class="md:text-2xl max-md:text-md text-black">Free E-Commerce Template</h2>
          <p class="max-md:hidden">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <button type="button" class="rounded-lg bg-lime-500 p-2 text-lime-100">Get it now</button>
        </div>
        <div class="">
          <img src="@/assets/images/home/girl3.jpg" class="block" alt="...">
        </div>
      </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
      <button type="button" class="bg-lime-500 hover:bg-lime-700 aria-selected:bg-lime-900 w-3 h-3 rounded-full" aria-selected="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="bg-lime-500 hover:bg-lime-700 aria-selected:bg-lime-900 w-3 h-3 rounded-full" aria-selected="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
      <button type="button" class="bg-lime-500 hover:bg-lime-700 aria-selected:bg-lime-900 w-3 h-3 rounded-full" aria-selected="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none hover:bg-lime-100 hover:opacity-25 transition duration-300" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-lime-100 dark:bg-gray-800/30 group-hover:bg-lime-200 hover:opacity-100 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="stroke-lime-500 w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="stroke-cyan-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none hover:bg-lime-100 hover:opacity-25 transition duration-300" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-lime-100 dark:bg-gray-800/30 group-hover:bg-lime-200 hover:opacity-100 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="stroke-lime-500 w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="stroke-cyan-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
  </div>
</template>

<script>

export default {
  name: "Slider",
}
</script>

<style scoped>

</style>