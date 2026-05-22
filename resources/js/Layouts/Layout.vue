<template>
  <div>
    <NavBar class="bg-[#5300E4] p-8"/>
    <slot />
    <FooterSect />
  </div>
</template>

<script setup>
import NavBar from "@/components/NavBar.vue";
import FooterSect from "@/components/FooterSect.vue";
</script>
