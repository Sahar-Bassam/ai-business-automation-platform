<template>
  <div class="relative z-10 flex items-center justify-between px-20 pt-10">
    <div class="flex items-center gap-2">
      <img src="/fire.svg" alt="Logo" class="h-8 w-8 bg-white rounded-full" />
      <h1 class="text-white text-2xl font-bold">FireShip</h1>
    </div>

    <div class="flex gap-8">
      <a href="/" class="text-white hover:text-gray-300">Home</a>

      <div class="relative group">
        <div class="flex items-center gap-2 cursor-pointer">
          <a href="#" class="text-white">AI Solutions</a>
          <img class="h-5 w-5 mt-1" src="/drop.svg" />
        </div>

        <div
          class="absolute top-full left-0 mt-3 w-56 rounded-xl bg-white text-black shadow-xl border border-gray-100
                 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-opacity duration-200"
        >
          <ul class="py-2 divide-y divide-gray-200">
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
              Customer Support Chatbots
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
              Process Automation
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
              AI Agents for Businesses
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
              Data Analytics
            </li>
          </ul>
        </div>
      </div>

      <a href="#" class="text-white hover:text-gray-300">FAQs</a>
      <div class="flex gap-4">
  <div class="flex gap-4">
<Link href="/login" class="text-white hover:text-gray-300">Login</Link>
<Link href="/register" class="text-white hover:text-gray-300">Register</Link>

</div>

</div>

    </div>

    <div class="flex items-center gap-4 relative">
      <div class="relative">
        <img
          src="/bell.png"
          class="h-5 w-5 cursor-pointer"
          @click="openNotifications"
        />

        <span
          v-if="unreadCount > 0"
          class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-2"
        >
          {{ unreadCount }}
        </span>

        <div
          v-if="showNotifications"
          class="absolute right-0 mt-3 w-64 bg-white text-black rounded shadow-lg"
        >
          <div
            v-for="notification in notifications"
            :key="notification.id"
            class="px-4 py-2 border-b text-sm"
          >
            {{ notification.data.message }}
          </div>

          <div
            v-if="notifications.length === 0"
            class="px-4 py-2 text-sm text-gray-500"
          >
            No notifications
          </div>
        </div>
      </div>

      <button
        class="bg-white text-black px-4 py-2 rounded text-lg border border-white hover:bg-transparent hover:text-white transition duration-300"
      >
        Hire us
      </button>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from "vue";
import axios from "axios";

const unreadCount = ref(0);
const notifications = ref([]);
const showNotifications = ref(false);

const fetchUnreadCount = async () => {
  const res = await axios.get("/api/notifications/unread-count" , { withCredentials: true });
  unreadCount.value = res.data;
};

const openNotifications = async () => {
  showNotifications.value = !showNotifications.value;

  if (showNotifications.value) {
    const res = await axios.get("/api/notifications" , { withCredentials: true } );
    notifications.value = res.data;

    await axios.post("/api/notifications/read" , data , { withCredentials: true });
    unreadCount.value = 0;
  }
};

onMounted(() => {
  fetchUnreadCount();
});
</script>
