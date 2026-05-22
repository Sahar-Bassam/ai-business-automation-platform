<template>
  <Layout>
    <div class="min-h-screen px-14 py-20 ml-16">
      <h1
        class="text-6xl font-bold pb-2 bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
      >
        Agentify Your Business
      </h1>

      <p class="text-lg max-w-2xl mb-12 mt-10">
        Tell us about your business and we’ll design AI agents that automate
        workflows, reduce costs, and scale operations.
      </p>

      <div class="flex gap-10">
        <form class="max-w-2xl space-y-8" @submit.prevent="submitForm">

          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              Company Name
            </label>
            <input
              type="text"
              placeholder="e.g. FireShip Inc."
              v-model="form.companyName"
              :class="errors.companyName
                ? 'border-red-500 focus:ring-2 focus:ring-red-500'
                : 'border-gray-300 focus:ring-2 focus:ring-[#5300E4]'"
              class="border rounded px-4 py-2 focus:outline-none"
            />
            <p v-if="errors.companyName" class="text-red-600 text-sm">
              {{ errors.companyName }}
            </p>
          </div>

          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              Company Website
            </label>
            <input
              type="url"
              placeholder="https://fireship.com"
              v-model="form.website"
              :class="errors.website
                ? 'border-red-500 focus:ring-2 focus:ring-red-500'
                : 'border-gray-300 focus:ring-2 focus:ring-[#5300E4]'"
              class="border rounded px-4 py-2 focus:outline-none"
            />
            <p v-if="errors.website" class="text-red-600 text-sm">
              {{ errors.website }}
            </p>
          </div>
          
          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              Company Size
            </label>
            <select
              v-model="form.companySize"
              class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#5300E4] focus:outline-none"
            >
              <option disabled value="">Select company size</option>
              <option value="small">1–5 employees</option>
              <option value="medium">6–20 employees</option>
              <option value="large">21–50 employees</option>
            </select>

         <div
  v-for="plan in plans"
  :key="plan.id"
  class="mt-4 border p-2 rounded cursor-pointer"
  :class="selectedPlanId === plan.id ? 'border-[#5300E4]' : ''"
  @click="selectedPlanId = plan.id"
>
  <h3 class="font-bold">{{ plan.title }}</h3>
  <p>{{ plan.description }}</p>
  <p class="text-sm text-gray-500">{{ plan.price_range }}</p>
</div>

          </div>

          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              Industry
            </label>
            <input
              type="text"
              placeholder="e.g. E-commerce, Healthcare"
              class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#5300E4] focus:outline-none"
            />
          </div>

        
          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              What are your biggest challenges?
            </label>
            <textarea
              rows="4"
              placeholder="Manual workflows, slow customer support, data overload..."
              class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#5300E4] focus:outline-none"
            ></textarea>
          </div>

       
          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              What do you want AI agents to help with?
            </label>
            <div class="flex flex-wrap gap-4">
              <label class="flex items-center gap-2">
                <input type="checkbox" />
                Customer Support
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" />
                Sales & Lead Qualification
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" />
                Internal Operations
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" />
                Data Analysis & Reporting
              </label>
            </div>
          </div>

          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              When do you want to deploy AI agents?
            </label>
            <select
              class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#5300E4] focus:outline-none"
            >
              <option>Immediately</option>
              <option>Within 1 month</option>
              <option>Within 3 months</option>
              <option>Just exploring</option>
            </select>
          </div>

          <div class="flex flex-col gap-2">
            <label
              class="font-medium bg-gradient-to-r from-[#1B0073] to-[#C500F8] bg-clip-text text-transparent"
            >
              Estimated Budget
            </label>
            <select
              class="border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-[#5300E4] focus:outline-none"
            >
              <option>$1k – $5k</option>
              <option>$5k – $15k</option>
              <option>$15k+</option>
              <option>Not sure yet</option>
            </select>
          </div>

          <button
            type="submit"
            class="mt-8 bg-[#5300E4] text-white px-6 py-3 rounded text-lg hover:bg-transparent hover:text-black transition duration-300 hover:outline-1"
          >
            Purchase Plan
          </button>
        </form>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from "@/layouts/Layout.vue";
import { reactive, ref, watch } from "vue";
import axios from "axios";

const form = reactive({
  companyName: "",
  website: "",
  companySize: "",
});

const selectedPlanId = ref(null);

const errors = reactive({
  companyName: "",
  website: "",
});

function validate() {
  errors.companyName = "";
  errors.website = "";
  let isValid = true;

  if (!form.companyName) {
    errors.companyName = "Company name is required!";
    isValid = false;
  }

  if (!form.website.includes("http") || !form.website) {
    errors.website = "Enter a valid URL!";
    isValid = false;
  }

  return isValid;
}

async function submitForm() {
  console.log("SUBMIT CLICKED");
  console.log("Selected plan:", selectedPlanId.value);

  if (!validate()) {
    console.log("Validation failed");
    return;
  }

  if (!selectedPlanId.value) {
    alert("Please select a plan first");
    return;
  }

  try {
    const res = await axios.post("/purchase-plan", {
      plan_id: selectedPlanId.value,
      company_name: form.companyName,
      website: form.website,
      company_size: form.companySize,
    });

    console.log("SUCCESS", res.data);
  } catch (e) {
    console.error("REQUEST FAILED", e);
  }
}

const plans = ref([]);

watch(() => form.companySize, async (newSize) => {
  if (!newSize) {
    plans.value = [];
    selectedPlanId.value = null;
    return;
  }

  try {
    const res = await axios.get("/api/ai-plans", {
      params: { companySize: newSize },
    });

    plans.value = res.data;
  } catch (err) {
    console.error("Failed to load plans", err);
    plans.value = [];
  }
});


</script>
