import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import CheckoutView from "@/views/CheckoutView.vue";
import ContactView from "@/views/ContactView.vue";
import ProductsView from "@/views/Product/ProductsView.vue";
import CartView from "@/views/Product/CartView.vue";
import ProductDetailsView from "@/views/Product/ProductDetailsView.vue";
import BlogView from "@/views/Blog/BlogView.vue";
import BlogShowView from "@/views/Blog/BlogShowView.vue";
import NotFoundView from "@/views/NotFoundView.vue";
import SignInView from "@/views/Auth/SignInView.vue";
import RegisterView from "@/views/Auth/RegisterView.vue";
import AccountView from "@/views/AccountView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
      // component: () => import('@/views/HomeView.vue')
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: CheckoutView
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView
    },
    {
      path: '/products',
      name: 'products',
      component: ProductsView
      // component: () => import('@/views/Product/ProductsView.vue')
    },
    {
      path: '/products/:id',
      name: 'product',
      component: () => import('@/views/Product/ProductDetailsView.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView
    },
    {
      path: '/signIn',
      name: 'signIn',
      component: SignInView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/account',
      name: 'account',
      component: () => import('@/views/AccountView.vue')
    },
    {
      path: '/wishlist',
      name: 'wishlist',
      component: ProductsView
    },
    {
      path: '/blogs',
      name: 'blogs',
      component: BlogView
    },
    {
      path: '/blog/:id',
      name: 'blog.show',
      component: BlogShowView
    },
    {
      path: '/404',
      name: '404',
      component: NotFoundView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
