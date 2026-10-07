import { defineStore } from 'pinia'
import axios from 'axios'

const backendUrl = import.meta.env.VITE_BACKEND_URL

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    token: localStorage.getItem('token') || null,
    isAuthenticated: false,
    errorMessage: '',
  }),

  actions: {
    async login(credentials) {
      this.errorMessage = ''

      try {
        const response = await axios.post(
          `${backendUrl}/login`,
          credentials,
          {
            headers: {
              Accept: 'application/json',
            },
          },
        )

        this.token = response.data.token
        this.user = response.data.user
        this.isAuthenticated = true

        localStorage.setItem('token', this.token)
      } catch (error) {
        if (error.response) {
          this.errorMessage =
            error.response.data.message || 'Ошибка авторизации'
        } else {
          this.errorMessage = error.message
        }
      }
    },

    async getUser() {
      if (!this.token) {
        return
      }

      this.errorMessage = ''

      try {
        const response = await axios.get(`${backendUrl}/user`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
            Accept: 'application/json',
          },
        })

        this.user = response.data
        this.isAuthenticated = true
      } catch (error) {
        this.user = null
        this.token = null
        this.isAuthenticated = false

        localStorage.removeItem('token')

        if (error.response) {
          this.errorMessage =
            error.response.data.message || 'Ошибка получения пользователя'
        } else {
          this.errorMessage = error.message
        }
      }
    },

    async logout() {
      try {
        if (this.token) {
          await axios.get(`${backendUrl}/logout`, {
            headers: {
              Authorization: `Bearer ${this.token}`,
              Accept: 'application/json',
            },
          })
        }
      } finally {
        this.user = null
        this.token = null
        this.isAuthenticated = false
        this.errorMessage = ''

        localStorage.removeItem('token')
      }
    },
  },
})