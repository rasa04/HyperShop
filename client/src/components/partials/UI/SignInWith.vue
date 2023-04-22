<template>
  <div class="mt-5">
    <button type="button" class="w-full flex justify-center text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4
          focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center
          dark:focus:ring-[#4285F4]/55 mr-2 mb-2"
    >
      <i class="fa fa-google mr-1"></i>
      Sign in with Google
    </button>
  </div>
  <div class="mt-5">
    <button type="button" class="w-full flex justify-center text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4
          focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center
          dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2"
    >
      <i class="fa fa-apple mr-1"></i>
      Sign in with Apple
    </button>
  </div>
  <div class="mt-5">
    <button type="button" class="w-full flex justify-center text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4
        focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center
        dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2"
    >
      <i class="fa fa-github mr-1"></i>
      Sign in with Github
    </button>
  </div>
</template>

<script>
export default {
  name: "SignInWith"
}
</script>

<style scoped>

</style>