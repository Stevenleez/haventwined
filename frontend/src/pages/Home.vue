<script setup>
import { ref } from "vue";
import { EnvelopeIcon, PhoneIcon } from "@heroicons/vue/24/solid";
</script>

<template>
  <div class="banner relative px-6 pt-14 lg:px-8">
    <div
      class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
      aria-hidden="true"
    >
      <div
        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
        style="
          clip-path: polygon(
            74.1% 44.1%,
            100% 61.6%,
            97.5% 26.9%,
            85.5% 0.1%,
            80.7% 2%,
            72.5% 32.5%,
            60.2% 62.4%,
            52.4% 68.1%,
            47.5% 58.3%,
            45.2% 34.5%,
            27.5% 76.7%,
            0.1% 64.9%,
            17.9% 100%,
            27.6% 76.8%,
            76.1% 97.7%,
            74.1% 44.1%
          );
        "
      />
    </div>
    <div class="mx-auto max-w-2xl py-20 sm:py-28 lg:py-32">
      <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div
          class="relative rounded-full bg-white bg-opacity-70 px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20"
        >
          Learn more about Haventwined
          <a href="#" class="font-semibold text-indigo-600"
            ><span class="absolute inset-0" aria-hidden="true" />Click me
            <span aria-hidden="true">&rarr;</span></a
          >
        </div>
      </div>
      <div
        class="text-center relative z-10 bg-white bg-opacity-70 p-8 rounded-lg shadow-lg"
      >
        <h1
          class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl"
        >
          Company Description
        </h1>
        <p
          class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8"
        >
          Introduction
        </p>

        <div
          class="mt-10 flex flex-col items-center justify-center gap-y-3 text-gray-900"
        >
          <div class="flex items-center gap-x-2">
            <EnvelopeIcon class="w-6 h-6 text-indigo-600" />
            <span class="text-lg font-medium">support@haventwined.com</span>
          </div>
          <div class="flex items-center gap-x-2">
            <PhoneIcon class="w-6 h-6 text-green-600" />
            <span class="text-lg font-medium">+62 822-9944-9708</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.banner {
  /* background-image: url('https://images.unsplash.com/photo-1593642532973-d31b6557fa68'); */
  background-size: cover;
  background-position: center;
}
</style>
