<script setup lang="ts">
import { Card } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'

defineProps<{
  title: string
  body: string
  highlight?: string
}>()
</script>

<template>
  <section class="bg-[#0A1929] py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mx-auto max-w-4xl">
          <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold text-white md:text-4xl">{{ title }}</h2>
            <div class="mx-auto mt-4 h-1 w-20 rounded-full bg-[#4CAF50]" aria-hidden="true" />
          </div>
          <Card class="border-0 bg-gradient-to-br from-[#0D2137] to-[#0A1929] p-8 md:p-12">
            <p class="mb-6 leading-relaxed text-gray-300">{{ body }}</p>
            <div v-if="highlight" class="flex items-start gap-3 rounded-lg border border-[#4CAF50]/20 bg-[#4CAF50]/10 p-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 h-6 w-6 shrink-0 text-[#4CAF50]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                <polyline points="16 7 22 7 22 13" />
              </svg>
              <p class="text-gray-200">{{ highlight }}</p>
            </div>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
