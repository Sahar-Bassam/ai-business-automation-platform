<template>
  <div>
    <label for="input" class="block text-sm font-medium text-black">{{ name }}</label>
    <div class="mt-2">
      <input
        :type="type"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        required
        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 outline-gray-300 focus:outline-2 focus:outline-brandGreen placeholder:text-gray-400 sm:text-sm"
        :class="error ? 'outline-red-500' : '' "
        />
      <small class="text-red-500">{{ error }}</small>
    </div>
  </div>
</template>

<script setup>
defineProps({
  name: {
    type: String,
    required: true
  },
  type: {
    type: String,
    default: 'text'
  },
  modelValue: {
    type: String,
    default: ''
  },
  error: {
    type: String,
    default: ''
  }
});
</script>
