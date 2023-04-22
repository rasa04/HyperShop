<template>
  <div class="w-full" v-if="product.name !== undefined">
    <div>
      <RouterLink :to="{name: 'product', params: {id: product.id}}">
        <img v-if="product.product_images.length"
             class="w-screen p-2 rounded-lg hover:scale-110 transition duration-200"
             :src="`http://127.0.0.1:8000/storage/${product.product_images[0].url}`" :alt="product.name" />
        <img class="w-screen p-2 rounded-lg hover:scale-110 transition duration-200"
             src="https://via.placeholder.com/360x360.png/000000?text=NO+IMAGE" v-else>
      </RouterLink>
      <p class="flex justify-center items-center text-lime-800 font-bold text-lg">{{ product.name }}</p>
      <h2 class="flex justify-center items-center text-yellow-300 text-2xl font-bold">${{ product.price }}</h2>
    </div>
    <div class="select-none grid grid-cols-2">
      <ul class="md:mx-2 max-md:mx-10 p-3">
        <div href="#" @mouseover="aboutState = !aboutState" @mouseout="aboutState = !aboutState"
           @click="aboutState = !aboutState"
           class="block text-lime-700 hover:bg-lime-200 p-1 rounded-md"><i class="fa fa-info-circle"></i><p>About</p>
        </div>

        <div @mouseover="aboutState = !aboutState" @mouseout="aboutState = !aboutState"
         class="absolute z-10 inline-block w-64 text-sm font-light text-gray-500 transition-opacity
          duration-300 bg-white border border-gray-200 rounded-lg shadow-sm
          dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600"
         :class="{'hidden' : !aboutState}">
          <div class="p-3">
            <RouterLink :to="{name: 'product', params: {id: product.id}}">
              <p class="hover:underline text-base font-semibold leading-none text-gray-900 dark:text-white">{{ product.name }}</p>
            </RouterLink>
            <p class="mb-3 text-sm font-normal text-lime-500">${{product.price}}</p>
            <p class="mb-4 text-sm font-light">{{ product.about }}</p>
            <ul class="flex text-sm font-light">
              <li class="mr-2">
                <a href="#" class="hover:underline">
                  <span>Quantity: </span>
                  <span class="font-semibold text-gray-900 dark:text-white">{{ product.quantity }}</span>
                </a>
              </li>
              <li class="mr-2" v-if="product.brand !== null">
                <a href="#" class="hover:underline">
                  <span>Brand: </span>
                  <span class="font-semibold text-gray-900 dark:text-white">{{ product.brand.name }}</span>
                </a>
              </li>
              <li class="mr-2" v-if="product.category !== null">
                <a href="#" class="hover:underline">
                  <span>Category: </span>
                  <span class="font-semibold text-gray-900 dark:text-white">{{ product.category.name }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <a @click.prevent="addToCard(product.id)" class="block text-lime-700 hover:bg-lime-200 p-1 rounded-md"><i class="fa fa-shopping-cart"></i><p>To cart</p></a>
      </ul>
      <ul class="md:mx-2 max-md:mx-10 p-3">
        <a href="#" class="block text-lime-700 hover:bg-lime-200 p-1 rounded-md"><i class="fa fa-bookmark"></i><p>To wishlist</p></a>
        <a href="#" class="block text-lime-700 hover:bg-lime-200 p-1 rounded-md"><i class="fa fa-plus-square"></i><p>To compare</p></a>
      </ul>
    </div>
  </div>
</template>

<script>

import {formToJSON} from "axios";

export default {
  name: "Product",

  data() {
    return {
      aboutState: false
    }
  },

  props: {
    product: Object
  },

  methods: {
    addToCard(id) {
      let cart = localStorage.getItem('cart')
      let newProduct = [{'id': id, 'quantity': 1}]
      if (!cart) {
        localStorage.setItem('cart', JSON.stringify(newProduct))
      } else {
        cart = JSON.parse(cart)
        cart.forEach(productInCart => {
          if (productInCart.id === id) {
            productInCart.quantity = Number(productInCart.quantity) + 1
            newProduct = null
          }
        })
        Array.prototype.push.apply(cart, newProduct)
        localStorage.setItem('cart', JSON.stringify(cart))
        console.log('works')
      }
    }
  }

}
</script>

<style scoped>

</style>