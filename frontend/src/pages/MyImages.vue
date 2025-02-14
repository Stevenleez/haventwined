<script setup>
import { ref } from "vue";
import { PhotoIcon, TrashIcon, PencilIcon } from "@heroicons/vue/24/solid";
import axios from "axios";
import { RouterLink } from "vue-router";
import axiosClient from "../axios.js";

const banner = ref({
  company_description: "",
  intro: "",
  email: "",
  phone: "",
  background_image: "",
});

const error = ref("");
const successMessage = ref("");

// Fetch banner data from the server
const fetchBanner = async () => {
  try {
    const response = await axios.get("/api/admin/banner");
    banner.value = response.data;
  } catch (err) {
    error.value = "Failed to fetch banner data.";
  }
};

// Save or update banner data
const saveBanner = async () => {
  const formData = new FormData();
  formData.append("company_description", banner.value.company_description);
  formData.append("intro", banner.value.intro);
  formData.append("email", banner.value.email);
  formData.append("phone", banner.value.phone);

  if (banner.value.background_image instanceof File) {
    formData.append("background_image", banner.value.background_image);
  }

  try {
    const response = await axios.post("/api/admin/banner", formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });
    successMessage.value = "Banner updated successfully!";
    banner.value = response.data;
  } catch (err) {
    error.value = "Failed to save banner data.";
  }
};

// Handle image upload
const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    banner.value.background_image = file;
  }
};

// Delete the banner
const deleteBanner = async () => {
  try {
    await axios.delete("/api/admin/banner");
    banner.value = {};
    successMessage.value = "Banner deleted successfully!";
  } catch (err) {
    error.value = "Failed to delete banner data.";
  }
};

// Fetch banner on page load
fetchBanner();
</script>

<template>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        Admin Panel
      </h1>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
      <!-- Display success or error messages -->
      <div v-if="error" class="mb-4 p-4 bg-red-200 text-red-800">
        {{ error }}
      </div>
      <div v-if="successMessage" class="mb-4 p-4 bg-green-200 text-green-800">
        {{ successMessage }}
      </div>

      <!-- Banner Form -->
      <form @submit.prevent="saveBanner">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <!-- Company Description -->
          <div>
            <label
              for="company_description"
              class="block text-sm font-medium text-gray-700"
              >Company Description</label
            >
            <textarea
              v-model="banner.company_description"
              id="company_description"
              rows="4"
              class="w-full p-2 border rounded"
            ></textarea>
          </div>

          <!-- Intro -->
          <div>
            <label for="intro" class="block text-sm font-medium text-gray-700"
              >Introduction</label
            >
            <textarea
              v-model="banner.intro"
              id="intro"
              rows="4"
              class="w-full p-2 border rounded"
            ></textarea>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700"
              >Email</label
            >
            <input
              v-model="banner.email"
              type="email"
              id="email"
              class="w-full p-2 border rounded"
            />
          </div>

          <!-- Phone -->
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700"
              >Phone</label
            >
            <input
              v-model="banner.phone"
              type="text"
              id="phone"
              class="w-full p-2 border rounded"
            />
          </div>

          <!-- Background Image -->
          <div class="sm:col-span-2">
            <label
              for="background_image"
              class="block text-sm font-medium text-gray-700"
              >Background Image</label
            >
            <input
              type="file"
              @change="handleImageUpload"
              class="w-full p-2 border rounded"
            />
            <img
              v-if="banner.background_image"
              :src="`/storage/${banner.background_image}`"
              alt="Background Image"
              class="mt-2 max-w-xs"
            />
          </div>
        </div>

        <div class="mt-6 flex gap-4">
          <button
            type="submit"
            class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700"
          >
            Save
          </button>
          <button
            type="button"
            @click="deleteBanner"
            class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700"
          >
            Delete
          </button>
        </div>
      </form>
    </div>
  </main>
</template>

<style scoped>
/* You can add custom styles here */
</style>
