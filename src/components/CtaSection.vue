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
  <section class="bg-gradient-to-t from-gradient-from to-gradient-to py-16">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="scale">
        <div class="rounded-2xl bg-gradient-to-r from-primary to-primary/90 p-8 text-center md:p-12">
          <h2 class="text-2xl font-bold text-primary-foreground md:text-3xl">{{ title }}</h2>
          <p class="mx-auto mb-6 mt-4 max-w-2xl text-primary-foreground/90">{{ description }}</p>
          <p v-if="subtext" class="mb-6 text-sm text-primary-foreground/80">{{ subtext }}</p>
          <Button
            as="a"
            :href="ctaHref"
            class="inline-flex h-11 gap-2 bg-primary-foreground text-primary shadow hover:bg-primary-foreground/90"
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
