<template>
<div class="hero relative min-h-screen bg-cover bg-center" style="background-image: url('/image.jpg');">
<NavBar />
    <div class=" text-left text-white mt-40">
      <h2 class="text-7xl font-bold mb-4 ml-6 pl-10">The AI Agent <br> Revolution <br> has Arrived.</h2>
<Link
  href="/agentify"
  class="inline-block mt-8 ml-16 bg-white text-black px-6 py-3 rounded text-xl border border-white hover:bg-transparent hover:text-white transition duration-300">
  Agentify my business
</Link>

    </div>
      </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import NavBar from "./NavBar.vue";
</script>

<style>

</style>