import { defineStore } from "pinia";
import axios from "axios";

export const useFiltersStore = defineStore('Filters', {
    state: () => ({
        toggled: false,
        filterList: [],
    }),

    actions: {
        getFilterList() {
            axios.get('http://127.0.0.1:8000/api/filters').then(response => {
                this.filterList = response.data
            })
        },
        toggle() {
            this.toggled = !this.toggled
        },
    }
})