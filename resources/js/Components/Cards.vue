<template>
  <div class="bg-white w-64 h-80 p-6 rounded-xl shadow-md flex flex-col justify-center text-center border border-gray-300">
    <h2 class="text-2xl font-bold mb-2">{{ text }}</h2>
    <p class="text-sm text-gray-600">{{ p }}</p>
  </div>
</template>

<script setup>
defineProps({
  text: String,
  p: String
})
</script>
