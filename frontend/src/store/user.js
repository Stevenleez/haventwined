import axiosClient from "../axios.js"
import { defineStore } from 'pinia'

const useUserStore = defineStore('user', {
    state: () => ({
        user: null,
    }),
    actions: {
        fetchUser: (state, payload) => {
            return axiosClient.get('/api/user')
                .then(({ data }) => {
                    console
                    this.user = data
                })
        }
    }
})

export default useUserStore