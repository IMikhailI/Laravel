<template>
  <div class="p-4">
    <h1 class="text-2xl mb-4">Номера</h1>

    <p v-if="!authStore.token" class="mb-3">
      Войдите в систему, чтобы посмотреть номера.
    </p>

    <template v-else>
      <p v-if="dataStore.errorMessage" class="text-red-500 mb-3">
        {{ dataStore.errorMessage }}
      </p>

      <DataTable :value="dataStore.rooms" 
        dataKey="id" paginator lazy
        :rows="rows" :first="first" 
        :totalRecords="dataStore.roomsTotal" 
        :loading="dataStore.loading" showGridlines
        :rowsPerPageOptions="[2, 5, 10]"
        stripedRows @page="onPage"
      >
        <Column field="id" header="ID" />
        <Column field="room_number" header="Номер комнаты" />
        <Column field="building_id" header="ID корпуса" />
        <Column field="beds_count" header="Количество мест" />
        <Column field="price" header="Цена" />

        <template #empty>
          Номера не найдены.
        </template>
      </DataTable>
    </template>
  </div>
</template>

<script>
import { useDataStore } from '@/stores/dataStore'
import { useAuthStore } from '@/stores/authStore'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'

export default {
  components: {
    DataTable,
    Column,
  },

  data() {
    return {
      dataStore: useDataStore(),
      authStore: useAuthStore(),
      first: 0,
      rows: 5,
    }
  },

  watch: {
    'authStore.token'(token) {
      if (token) {
        this.loadData()
      } else {
        this.dataStore.rooms = []
        this.dataStore.roomsTotal = 0
        this.dataStore.errorMessage = ''
      }
    },
  },

  methods: {
    async loadData() {
      await this.dataStore.getRoomsTotal()
      await this.dataStore.getRooms(0, this.rows)
    },

    onPage(event) {
      this.first = event.first
      this.rows = event.rows

      this.dataStore.getRooms(event.page, event.rows)
    },
  },

  mounted() {
    if (this.authStore.token) {
      this.loadData()
    }
  },
}
</script>
