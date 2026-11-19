<template>
  <div class="p-4">
    <h1 class="text-2xl mb-4">Гости</h1>

    <p v-if="!authStore.token" class="mb-3">
      Войдите в систему, чтобы посмотреть гостей.
    </p>

    <template v-else>
      <p v-if="dataStore.errorMessage" class="text-red-500 mb-3">
        {{ dataStore.errorMessage }}
      </p>

      <DataTable :value="dataStore.guests" 
        dataKey="id" paginator lazy
        :rows="rows" :first="first" 
        :totalRecords="dataStore.guestsTotal" 
        :loading="dataStore.loading"
        :rowsPerPageOptions="[2, 5, 10]" 
        showGridlines stripedRows @page="onPage"
      >
        <Column field="id" header="ID" />
        <Column field="full_name" header="ФИО гостя" />

        <template #empty>
          Гости не найдены.
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
        this.first = 0
        this.loadData()
      } else {
        this.dataStore.guests = []
        this.dataStore.guestsTotal = 0
        this.dataStore.errorMessage = ''
      }
    },
  },

  methods: {
    async loadData() {
      await this.dataStore.getGuestsTotal()
      await this.dataStore.getGuests(0, this.rows)
    },

    onPage(event) {
      this.first = event.first
      this.rows = event.rows

      this.dataStore.getGuests(event.page, event.rows)
    },
  },

  mounted() {
    if (this.authStore.token) {
      this.loadData()
    }
  },
}
</script>
