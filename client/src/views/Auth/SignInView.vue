<template>
  <div class="w-full h-screen grid grid-rows-6 justify-items-center items-center">
    <div id="banner" class="w-full flex items-center justify-center select-none pointer-events-none">
      <img class="h-full" src="@/assets/images/home/logo.png">
    </div>
    <div id="form" class="row-span-5">
      <AuthInputData @update-value="res => this.credentials.username = res" icon="fa-envelope" :hidden="this.hideEmail"
         @hide-another="hideUsernameInput" @change-status="(status) => this.inputStatus = status" name="username"
      />
      <AuthInputData @update-value="res => this.credentials.email = res" icon="fa-at" :hidden="this.hideUsername"
         @hide-another="hideEmailInput" @change-status="(status) => this.inputStatus = status" name="email"
      />
      <AuthInputData @update-value="res => this.credentials.password = res" icon="fa-key" :hidden="false"
         @hide-another="" @change-status="(status) => this.passwordStatus = status" name="password"
      />
      <div class="mt-5">
        <button type="button"
          class="w-full flex justify-center text-white bg-lime-700 hover:bg-lime-600 focus:ring-2
            focus:outline-none focus:ring-lime-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex
            items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 mr-2 mb-2"
          :class="{ 'cursor-not-allowed' : !ableToContinue}"
          :disabled="!ableToContinue" @click.prevent="continueAuth"
        >
          Continue
        </button>
      </div>
      <div id="others" :class="{hidden : hideOthers}">
        <RouterLink :to="{name: 'register'}" class="w-full mt-3 relative flex justify-center items-center p-0.5 overflow-hidden
          text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400
          group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200
          dark:focus:ring-green-800"
        >
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            create an account
          </span>
        </RouterLink>
        <SignInWith />
      </div>
    </div>
  </div>
</template>

<script>
import SignInWith from "@/components/partials/UI/SignInWith.vue";
import AuthInputData from "@/components/partials/UI/AuthInputData.vue";
import axios from "axios";
import router from "@/router";

export default {
  name: "SignInView",

  components: {
    AuthInputData,
    SignInWith
  },

  data() {
    return {
      ableToContinue: false,
      hideEmail: false,
      hideUsername: false,
      hideOthers: false,
      inputStatus: false,
      passwordStatus: false,
      credentials: {
        username: null,
        email: null,
        password: null
      }
    }
  },

  methods: {
    hideUsernameInput() {
      this.hideUsername = !this.hideUsername
      this.hideOtherAuthWays()
    },
    hideEmailInput() {
      this.hideEmail = !this.hideEmail
      this.hideOtherAuthWays()
    },
    hideOtherAuthWays() {
      this.hideOthers = !this.hideOthers
    },
    continueAuth() {
      const config = {
        headers: {
          "Authorization": "Bearer " + localStorage.getItem('TOKEN'),
          "Accept": "application/json",
          "Content-Type": "application/json",
        }
      }
      // ES10 CODE
      let data = Object.fromEntries(Object.entries(this.credentials).filter(([_, field]) => field !== null))
      axios.post('http://127.0.0.1:8000/api/login', data, config).then(res => {
        localStorage.setItem('TOKEN', res.data.data.token)
        router.push({name: 'home'})
      }).catch(error => {
        console.log(error)
      })
    }
  },

  watch: {
    inputStatus(n, o) {
      this.ableToContinue = (this.inputStatus && this.passwordStatus)
    },
    passwordStatus(n, o) {
      this.ableToContinue = (this.inputStatus && this.passwordStatus)
    }
  },
}
</script>

<style scoped>

</style>