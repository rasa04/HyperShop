<template>
  <div>
    <button id="dropdownDefaultButton"
            data-dropdown-toggle="dropdown"
            class="text-lime-200 bg-lime-700 hover:bg-lime-500 transition duration-50
            font-medium rounded-lg text-sm p-2 text-center inline-flex items-center
            dark:bg-blue-600 dark:hover:bg-blue-700" type="button">
      English
      <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none"
           stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-40 hidden bg-lime-100 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
      <ul class="transition duration-800 ease-in py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-lime-200 hover:text-lime-700 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-lime-200 hover:text-lime-700 dark:hover:bg-gray-600 dark:hover:text-white">Russians</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-lime-200 hover:text-lime-700 dark:hover:bg-gray-600 dark:hover:text-white">Chinese</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "LangDropdown",

  data() {
    return {
      state: true
    }
  },

  methods: {
    changeState() {

    }
  }
}
</script>

<style scoped>

</style>