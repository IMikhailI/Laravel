<template>
  <div class="p-4">
    <h1 class="text-2xl mb-4">Корпуса</h1>

    <p v-if="dataStore.errorMessage" class="text-red-500 mb-3">
      {{ dataStore.errorMessage }}
    </p>

    <DataTable
      :value="dataStore.buildings"
      dataKey="id"
      paginator
      lazy
      :rows="rows"
      :first="first"
      :totalRecords="dataStore.buildingsTotal"
      :loading="dataStore.loading"
      showGridlines
      stripedRows
      :rowsPerPageOptions="[2, 5, 10]"
      @page="onPage"
    >
      <Column field="id" header="ID" />
      <Column field="name" header="Название корпуса" />

      <template #empty>
        Корпуса не найдены.
      </template>
    </DataTable>
  </div>
</template>

<script>
import { useDataStore } from '@/stores/dataStore'
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
      first: 0,
      rows: 5,
    }
  },

  methods: {
    async loadData() {
      await this.dataStore.getBuildingsTotal()
      await this.dataStore.getBuildings(0, this.rows)
    },
    onPage(event) {
      this.first = event.first
      this.rows = event.rows
      this.dataStore.getBuildings(event.page, event.rows)
    },
  },

  mounted() {this.loadData()},
}
</script>
