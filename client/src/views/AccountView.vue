<template>
  <Header />
  <div v-if="user" class="w-full grid place-items-center h-screen bg-lime-200">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="flex justify-end px-4 pt-4">
        <div class="px-4 pt-4">
          <RouterLink :to="{name: 'home'}" class="border rounded-lg p-1 hover:bg-lime-100 transition duration-300" type="button">Back</RouterLink>
        </div>
        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4
                focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
          <span class="sr-only">Open dropdown</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2" aria-labelledby="dropdownButton">
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://via.placeholder.com/360x360.png/000000?text=NO+IMAGE" alt="Bonnie image"/>
        <h3 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ user.display_name }}</h3>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">@{{ user.username }}</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ user.email }}</span>
        <div class="flex mt-4 space-x-3 md:mt-6">
          <RouterLink :to="{name: 'cart'}"
             class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-black border rounded-lg
             hover:bg-lime-500 dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-300"
          >Cart</RouterLink>
          <a @click.prevent="logOut"
             class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900
             bg-white border border-gray-300 rounded-lg hover:bg-red-500 select-none cursor-pointer
              focus:ring-4 focus:outline-none focus:ring-gray-200 transition duration-300
             dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700"
          >Log out</a>
        </div>
      </div>
    </div>
  </div>
  <Footer />
</template>

<script>
import router from "@/router";
import {initFlowbite} from "flowbite";
import axios from "axios";
import Header from "@/components/partials/Header.vue";
import Footer from "@/components/partials/Footer.vue";

export default {
  name: "AccountView",
  components: {Footer, Header},

  data() {
    return {
    user: null
    }
  },

  methods: {
    logOut() {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem('TOKEN'),
          "Accept": "application/json",
          "Content-Type": "application/json",
        }
      }
      axios.post('http://127.0.0.1:8000/api/logout', {}, config)
      .then(response => {
        console.log(response)
      })
      .then(() => {
        localStorage.removeItem('TOKEN')
        localStorage.removeItem('cart')
        router.push({name: 'home'})
      })
    }
  },

  created() {
    this.isLogged = localStorage.getItem('TOKEN')
    const config = {
      headers: {
        "Authorization": "Bearer " + localStorage.getItem('TOKEN'),
        "Accept": "application/json",
        "Content-Type": "application/json",
      }
    }
    axios.get('http://127.0.0.1:8000/api/users', config).then(response => {
      this.user = response.data.data
      console.log(this.user)
    }).catch(error => {
      console.log(error)
      router.push({name: 'home'})
    })
    initFlowbite()
  }
}
</script>

<style scoped>

</style>