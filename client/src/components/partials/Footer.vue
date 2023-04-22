<template>
  <footer class="bg-gray-200 dark:bg-gray-900 mt-10">
    <div class="mx-auto w-full container p-4 sm:p-6">
      <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
          <RouterLink :to="{name: 'home'}" class="flex items-center">
            <img src="/src/assets/images/home/logo.png" class="h-16 mr-3" alt="FlowBite Logo" />
          </RouterLink>
        </div>
        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
            <ul class="text-gray-600 dark:text-gray-400">
              <li class="mb-4">
                <a href="/" class="hover:underline">Flowbite</a>
              </li>
              <li>
                <a href="/" class="hover:underline">Tailwind CSS</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
            <ul class="text-gray-600 dark:text-gray-400">
              <li class="mb-4">
                <a href="" class="hover:underline ">Github</a>
              </li>
              <li>
                <a href="" class="hover:underline">Discord</a>
              </li>
            </ul>
          </div>
          <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
            <ul class="text-gray-600 dark:text-gray-400">
              <li class="mb-4">
                <a href="#" class="hover:underline">Privacy Policy</a>
              </li>
              <li>
                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
          </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
          <div class="flex-1 max-md:float-left grid grid-cols-5 gap-3">
            <a aria-current="page" href="/products#" class="router-link-active router-link-exact-active">
              <i class="mx-2 hover:text-lime-500 fa fa-facebook"></i>
            </a>
            <a aria-current="page" href="/products#" class="router-link-active router-link-exact-active">
              <i class="mx-2 hover:text-lime-500 fa fa-twitter"></i>
            </a>
            <a aria-current="page" href="/products#" class="router-link-active router-link-exact-active">
              <i class="mx-2 hover:text-lime-500 fa fa-linkedin"></i>
            </a>
            <a aria-current="page" href="/products#" class="router-link-active router-link-exact-active">
              <i class="mx-2 hover:text-lime-500 fa fa-dribbble"></i>
            </a>
            <a aria-current="page" href="/products#" class="router-link-active router-link-exact-active">
              <i class="mx-2 hover:text-lime-500 fa fa-google-plus"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer"
}
</script>

<style scoped>

</style>