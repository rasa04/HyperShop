import { defineStore } from "pinia";
import axios from "axios";

export const useProductsStore = defineStore('Products', {
    state: () => ({
        products: {},
        isFetching: true,
        categoriesFilter: {},
        brandsFilter: {},
        priceFilter: {},
        pageFilter: 1,
    }),

    actions: {
        refreshProducts() {
            try {
                axios.get(`${import.meta.env.VITE_API_URL}/api/products`, {
                    params: {
                    'categories': this.categoriesFilter,
                    'brands': this.brandsFilter,
                    'prices': this.priceFilter,
                    'page': this.pageFilter,
                    }
                }).then((response) => {
                    this.products = response.data
                    this.isFetching = false
                })
            } catch(error) {
                console.log(error);
            }
        },
        changeCategories(res) {
            this.categoriesFilter = res
            this.refreshProducts()
        },
        changeBrands(res) {
            this.brandsFilter = res
            this.refreshProducts()
        },
        changePrices(res) {
            this.priceFilter = res
            this.refreshProducts()
        },
    },


    getters: {
        filters() {
            return {
              "categories": this.categoriesFilter,
              "brands": this.brandsFilter,
              "prices": this.priceFilter,
            }
        }
    }
})