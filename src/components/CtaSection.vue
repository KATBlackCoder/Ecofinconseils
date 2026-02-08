<script setup lang="ts">
import { Button } from '@/components/ui/button'
import AnimateInView from './AnimateInView.vue'

defineProps<{
  title: string
  description: string
  subtext?: string
  ctaText: string
  ctaHref: string
}>()
</script>

<template>
  <section class="bg-gradient-to-t from-black to-[#0A1929] py-16">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="scale">
        <div class="rounded-2xl bg-gradient-to-r from-[#4CAF50] to-[#45a049] p-8 text-center md:p-12">
          <h2 class="text-2xl font-bold text-white md:text-3xl">{{ title }}</h2>
          <p class="mx-auto mb-6 mt-4 max-w-2xl text-white/90">{{ description }}</p>
          <p v-if="subtext" class="mb-6 text-sm text-white/80">{{ subtext }}</p>
          <Button
            as="a"
            :href="ctaHref"
            class="inline-flex h-11 gap-2 bg-white text-[#4CAF50] shadow hover:bg-gray-100"
          >
            {{ ctaText }}
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M5 12h14" />
              <path d="m12 5 7 7-7 7" />
            </svg>
          </Button>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
