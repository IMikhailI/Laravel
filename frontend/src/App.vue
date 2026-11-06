<template>
  <Menubar :model="items">
    <template #start>
      <span class="pi pi-building text-2xl mr-4"></span>
    </template>

    <template #item="{ item, props }">
      <router-link v-if="item.route" :to="item.route" v-bind="props.action">
        <span :class="item.icon"></span>
        <span class="ml-2">{{ item.label }}</span>
      </router-link>
    </template>

    <template #end>
      <div class="flex items-center gap-2">
        <div v-if="isAuthenticated && user" class="flex items-center gap-2">
          <span class="pi pi-user"></span>
          <span>{{ user.name }}</span>
          <Button label="Выйти" @click="logout"/>
        </div>

        <form v-else @submit.prevent="login" class="flex items-center gap-2">
          <InputText v-model="email" type="email" placeholder="Email" required/>
          <InputText v-model="password" type="password" placeholder="Пароль" required/>
          <Button type="submit" label="Войти"/>
        </form>
      </div>
    </template>
  </Menubar>

  <div v-if="authError" class="mt-2">
    <small class="error">{{ authError }}</small>
  </div>

  <router-view></router-view>
</template>

<script>
import { useAuthStore } from '@/stores/authStore'

import Button from 'primevue/button'
import Menubar from 'primevue/menubar'
import InputText from 'primevue/inputtext'

export default {
  components: {
    Button,
    Menubar,
    InputText,
  },

  data() {
    return {
      email: '',
      password: '',
      authStore: useAuthStore(),

      items: [
        {
          label: 'Главная',
          icon: 'pi pi-home',
          route: '/',
        },
        {
          label: 'Корпуса',
          icon: 'pi pi-building',
          route: '/buildings',
        },
        {
          label: 'Номера',
          icon: 'pi pi-key',
          route: '/rooms',
        },
        {
          label: 'Гости',
          icon: 'pi pi-users',
          route: '/guests',
        },
      ],
    }
  },

  computed: {
    isAuthenticated() {
      return this.authStore.isAuthenticated
    },
    user() {
      return this.authStore.user
    },
    authError() {
      return this.authStore.errorMessage
    },
  },
  methods: {
    logout() {
      this.authStore.logout()
    },
    login() {
      this.authStore.login({
        email: this.email,
        password: this.password,
      })
    },
  },
  mounted() {
    const token = localStorage.getItem('token')
    if (token) {
      this.authStore.getUser()
    }
  },
}
</script>

<style scoped>
.error {
  color: red;
}
</style>