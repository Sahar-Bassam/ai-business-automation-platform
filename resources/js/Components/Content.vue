<template>
  <div>
    <div class="mt-40">
      <h1 class="text-5xl ml-16 font-bold mb-16">Available Services</h1>
      <div class="overflow-hidden w-full mb-5">
        <div ref="trackRight" class="flex gap-6 w-max">
          <Cards
            v-for="card in duplicatedCards"
            :key="card.uid"
            :text="card.text"
            :p="card.p"
          />
        </div>
      </div>

      <div class="overflow-hidden w-full">
        <div ref="trackLeft" class="flex gap-6 w-max">
          <Cards
            v-for="card in duplicatedCards"
            :key="'left-' + card.uid"
            :text="card.text"
            :p="card.p"
          />
        </div>
      </div>
      <div class="flex justify-end my-10 items-center gap-2 mr-10">
        <h1 class="text-xl">Explore the many use-cases of AI</h1>
        <img src="/arrow.png" class="h-6 w-6 ml-2 mt-1 mr-2 hover:ml-7 transition-all duration-300" alt="Arrow">
      </div>

     
      <Footer />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { gsap } from 'gsap'
import Cards from './Cards.vue'
import Footer from './FooterSect.vue'

const trackRight = ref(null)
const trackLeft = ref(null)

const cards = [
  {id:1, text: 'Automated Appointment Scheduling', p: 'AI Agents allow you to easily create appointment scheduling with ease.'},
  {id:2, text: 'Customer Support Chatbots', p: 'Instantly respond to customer inquiries 24/7 with intelligent chatbots.'},
  {id:3, text: 'Process Automation', p: 'Automate repetitive business processes to save time and reduce errors.'},
  {id:4, text: 'Data Analytics', p: 'Gain insights from your business data with AI-powered analytics.'},
  {id:5, text: 'Email Marketing AI', p: 'Generate personalized email campaigns that improve engagement.'},
  {id:6, text: 'Sales Lead Qualification', p: 'Automatically score and prioritize leads for your sales team.'},
  {id:7, text: 'Inventory Management', p: 'Track stock levels and manage inventory efficiently with AI predictions.'},
  {id:8, text: 'Social Media Insights', p: 'Analyze your social media performance and optimize your campaigns.'},
  {id:9, text: 'Document Automation', p: 'Automatically create, organize, and manage business documents.'},
  {id:10, text: 'Fraud Detection', p: 'Protect your business with AI that identifies suspicious activity.'}
]

const duplicatedCards = [...cards, ...cards].map((card, index) => ({
  ...card,
  uid: card.id + '-' + index
}))

onMounted(() => {
  const rightWidth = trackRight.value.scrollWidth / 2
  const leftWidth = trackLeft.value.scrollWidth / 2

  gsap.to(trackRight.value, {
    x: -rightWidth,
    duration: 55,
    ease: 'none',
    repeat: -1
  })
  gsap.fromTo(
    trackLeft.value,
    { x: -leftWidth },
    {
      x: 0,
      duration: 55,
      ease: 'none',
      repeat: -1
    }
  )
})
</script>
