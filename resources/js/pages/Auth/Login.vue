<template>
  <div>
    <h2 class="text-center text-2xl font-bold tracking-tight text-black my-10">
      Sign in to your account
    </h2>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit.prevent="submit" class="space-y-6 mt-4">
        <TextInput
          name="Email"
          type="email"
          v-model="form.email"
          :error="form.errors.email"
        />

        <TextInput
          name="Password"
          type="password"
          v-model="form.password"
          :error="form.errors.password"
        />
        <div class="flex items-center gap-2">
<label class="flex items-center gap-2">
  <input type="checkbox" v-model="form.remember" class="h-3 w-3 text-brandGreen border-brandGreen rounded">
  Remember me
</label>

        </div>
        <div>
          <button
            type="submit"
            class="flex w-full justify-center rounded-md bg-brandGreen px-3 py-1.5 text-white"
            :disabled="form.processing"
          >
            Sign in
          </button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        <Link href="register" class="text-brandGreen">Sign up</Link>
      </p>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '@/components/TextInput.vue';
const form = useForm({
  email: '',
  password: '' ,
  remember:false,
})

function submit() {
  form.post('/login', {
    onError: () => form.reset('password' , 'remember')
  })
}
</script>
