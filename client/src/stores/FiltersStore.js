import { defineStore } from "pinia";
import axios from "axios";

export const useFiltersStore = defineStore('Filters', {
    state: () => ({
        toggled: false,
        filterList: [],
    }),

    actions: {
        getFilterList() {
            axios.get(`${import.meta.env.VITE_API_URL}/api/filters`).then(response => {
                this.filterList = response.data
            })
        },
        toggle() {
            this.toggled = !this.toggled
        },
    }
})