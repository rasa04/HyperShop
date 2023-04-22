<template>

  <header class="w-full select-none">
    <div class="md:flex grid w-full bg-lime-700 text-lime-100 p-1"><!--header_top-->
      <div>
      <RouterLink to="#" class="mx-5 hover:text-lime-500"><i class="fa fa-phone"></i> +1 66 01 88 821</RouterLink>
      <RouterLink to="#" class="mx-5 hover:text-lime-500"><i class="fa fa-envelope"></i> info@domain.com</RouterLink>
      </div>
      <div class="flex-1 max-md:float-left grid grid-cols-5 gap-3">
          <RouterLink to="#"><i class="mx-2 hover:text-lime-500 fa fa-facebook"></i></RouterLink>
          <RouterLink to="#"><i class="mx-2 hover:text-lime-500 fa fa-twitter"></i></RouterLink>
          <RouterLink to="#"><i class="mx-2 hover:text-lime-500 fa fa-linkedin"></i></RouterLink>
          <RouterLink to="#"><i class="mx-2 hover:text-lime-500 fa fa-dribbble"></i></RouterLink>
          <RouterLink to="#"><i class="mx-2 hover:text-lime-500 fa fa-google"></i></RouterLink>
      </div>
    </div><!--/header_top-->

    <div class="w-full md:flex max-md:grid max-md:grid-rows-2 md:items-center bg-lime-100 p-2"><!--header-middle-->
      <div class="flex justify-around space-x-10">
        <div class="float-left md:ml-3 max-md:ml-10">
          <RouterLink to="/"><img src="@/assets/images/home/logo.png" alt="" /></RouterLink>
        </div>
          <LangDropdown />
      </div>
      <div class="w-full flex justify-end space-x-4">
            <RouterLink  v-if="isLogged" to="/wishlist">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-bookmark"></i>
                <p class="max-md:hidden float-right">Wishlist</p>
              </div>
            </RouterLink>
            <RouterLink  v-if="isLogged" :to="{name: 'checkout'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-crosshairs"></i>
                <p class="max-md:hidden float-right">Checkout</p>
              </div>
            </RouterLink>
            <RouterLink  v-if="isLogged" :to="{name: 'cart'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-shopping-cart"></i>
                <p class="max-md:hidden float-right">Cart</p>
              </div>
            </RouterLink>
            <RouterLink :to="{name: 'products'}" :class="{active : this.$router.currentRoute._value.name === 'products'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-product-hunt"></i>
                <p class="max-md:hidden float-right">Products</p>
              </div>
            </RouterLink>
            <RouterLink :to="{name: 'blogs'}" :class="{active : this.$router.currentRoute._value.name === 'blogs'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-book"></i>
                <p class="max-md:hidden float-right">Blog</p>
              </div>
            </RouterLink>
            <RouterLink v-if="isLogged" :to="{name: 'account'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-user"></i>
                <p class="max-md:hidden float-right">Account</p>
              </div>
            </RouterLink>
            <RouterLink v-else :to="{name: 'signIn'}">
              <div class="hover:text-lime-500">
                <i class="transition duration-300 ease-in float-left md:p-1 fa fa-sign-in"></i>
                <p class="max-md:hidden float-right">Sign in</p>
              </div>
            </RouterLink>
      </div>
    </div>
  </header>
</template>

<script>
import LangDropdown from "@/components/partials/UI/LangDropdown.vue";
import router from "@/router";

export default {
  name: "Header",

  components: {
    LangDropdown
  },

  data() {
    return {
      isLogged: false
    }
  },

  mounted() {
    this.isLogged = localStorage.getItem('TOKEN')
  }
}
</script>

<style scoped>

</style>