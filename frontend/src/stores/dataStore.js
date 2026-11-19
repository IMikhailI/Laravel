import { defineStore } from 'pinia'
import axios from 'axios'

const backendUrl = import.meta.env.VITE_BACKEND_URL

function getHeaders() {
  const token = localStorage.getItem('token')

  const headers = {
    Accept: 'application/json',
  }

  if (token) {
    headers.Authorization = `Bearer ${token}`
  }

  return headers
}

export const useDataStore = defineStore('data', {
  state: () => ({
    buildings: [],
    buildingsTotal: 0,

    rooms: [],
    roomsTotal: 0,

    guests: [],
    guestsTotal: 0,

    loading: false,
    errorMessage: '',
  }),

  actions: {
    async getBuildings(page = 0, perpage = 5) {
      this.loading = true
      this.errorMessage = ''

      try {
        const response = await axios.get(`${backendUrl}/buildings`, {params: { page, perpage }, headers: getHeaders()})

        this.buildings = response.data
      } catch (error) {
        this.buildings = []
        this.errorMessage = error.response?.data?.message || error.message
      } finally {
        this.loading = false
      }
    },

    async getBuildingsTotal() {
      try {
        const response = await axios.get(`${backendUrl}/buildings/total`, {headers: getHeaders()})

        this.buildingsTotal = response.data
      } catch (error) {
        this.buildingsTotal = 0
        this.errorMessage = error.response?.data?.message || error.message
      }
    },

    async getRooms(page = 0, perpage = 5) {
      this.loading = true
      this.errorMessage = ''

      try {
        const response = await axios.get(`${backendUrl}/rooms`, {params: { page, perpage }, headers: getHeaders()})

        this.rooms = response.data
      } catch (error) {
        this.rooms = []
        this.errorMessage = error.response?.data?.message || error.message
      } finally {
        this.loading = false
      }
    },

    async getRoomsTotal() {
      try {
        const response = await axios.get(`${backendUrl}/rooms/total`, {headers: getHeaders()})

        this.roomsTotal = response.data
      } catch (error) {
        this.roomsTotal = 0
        this.errorMessage = error.response?.data?.message || error.message
      }
    },

    async getGuests(page = 0, perpage = 5) {
      this.loading = true
      this.errorMessage = ''

      try {
        const response = await axios.get(`${backendUrl}/guests`, {params: { page, perpage }, headers: getHeaders()})

        this.guests = response.data
      } catch (error) {
        this.guests = []
        this.errorMessage = error.response?.data?.message || error.message
      } finally {
        this.loading = false
      }
    },

    async getGuestsTotal() {
      try {
        const response = await axios.get(`${backendUrl}/guests/total`, {headers: getHeaders()})

        this.guestsTotal = response.data
      } catch (error) {
        this.guestsTotal = 0
        this.errorMessage = error.response?.data?.message || error.message
      }
    },
  },
})
