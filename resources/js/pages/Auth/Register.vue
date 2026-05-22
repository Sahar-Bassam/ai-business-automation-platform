<template>
  <div class="flex flex-col lg:flex-row gap-10 items-start justify-center px-6 py-12">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="my-6 text-center text-2xl font-bold tracking-tight text-black">
        Create your new account
      </h2>

      <form @submit.prevent="submit" class="space-y-6 mt-4">

        <TextInput name="Full Name" v-model="form.name" :error="form.errors.name" />
        <TextInput name="Email" type="email" v-model="form.email" :error="form.errors.email" />
        <TextInput name="Password" v-model="form.password" type="password" :error="form.errors.password" />
        <TextInput
          name="Confirm Password"
          v-model="form.password_confirmation"
          type="password"
        />

        <button
          type="submit"
          class="flex w-full justify-center rounded-md bg-brandGreen px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-brandGreen-hover focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brandGreen"
          :disabled="form.processing"
        >
          Create Account
        </button>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Already have an account?
        <Link href="login" class="text-brandGreen">Login</Link>
      </p>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/components/TextInput.vue';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,

  preview: null, 
});


const submit = () => {
  form.post('/register', {
    onError: () => {
      form.reset('password', 'password_confirmation');
    },
  });
};
</script>

<style scoped>

</style>
