<script setup>
    import GuestLayout from "../components/GuestLayout.vue";
    import { RouterLink } from 'vue-router'
    import { ref } from 'vue';
    import axios from 'axios';
    import axiosClient from '../axios.js';

    const data = ref({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    function submit() {
      axiosClient.get('/sanctum/csrf-cookie')
      .then(() => {
        axiosClient.post("/register", data.value)
          .catch(error => {
            if (error.response && error.response.status === 422) {
              if (error.response.data.errors.email) {
                alert("An account with this email already exists.");
              }
            } else {
              console.error(error);
              alert("Something went wrong, please try again.");
            }
          });
      })
      .catch(error => {
        console.error(error);
        alert("Error occurred while fetching CSRF token.");
      });
    }
</script>

<template>
  <GuestLayout>
    <div class="flex flex-auto lg:flex-row min-h-screen">
    <div class="w-full lg:w-1/2 flex flex-col justify-center p-4 md:p-8 bg-white">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
    </div>
    
    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
      Create your account
    </h2>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <form @submit.prevent="submit" class="space-y-4">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
            <div class="mt-2">
              <input 
                name="name" 
                id="name" 
                required=""
                v-model="data.name" 
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm" />
            </div>
          </div>
          
          <div>
            <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
            <div class="mt-2">
              <input 
                type="email" 
                name="email" 
                id="email" 
                autocomplete="email" 
                required=""
                v-model="data.email"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm" />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
            </div>
            <div class="mt-2">
              <input 
                type="password" 
                name="password" 
                id="password" 
                required=""
                v-model="data.password"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm" />
            </div>
          </div>
          
          <div>
            <div class="flex items-center justify-between">
              <label for="passwordConfirmation" class="block text-sm font-medium text-gray-900">Repeat Password</label>
            </div>
            <div class="mt-2">
              <input 
                type="password" 
                name="password" 
                id="passwordConfirmation" 
                required=""
                v-model="data.password_confirmation"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder-gray-400 focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm" />
            </div>
          </div>

          <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
              Create
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          Already have an account?
          {{ '' }}
          <RouterLink :to="{name: 'Login'}"  class="font-semibold text-indigo-600 hover:text-indigo-500">Login here</RouterLink>
        </p>
      </div>
    </div>

    <div class="w-full lg:w-1/2 relative h-[90vh] rounded-1-lg hidden lg-block md:pt-28 md:p-8 bg-gray-100">
      <img class="h-full w-full object-cover" src="https://source.unsplash.com/800x800/?technology,workspace" alt="Login Image" />
    </div>
    </div>
  </GuestLayout>
</template>

<style scoped></style>
