<script setup lang="ts">
import { Button } from '@/components/ui/button'

/** Hero unique : full (accueil, avec grille + CTA) ou compact (autres pages). */
withDefaults(
  defineProps<{
    title: string
    subtitle: string
    variant?: 'full' | 'compact'
    ctaText?: string
    ctaHref?: string
  }>(),
  { variant: 'compact' }
)
</script>

<template>
  <section
    :class="[
      'relative overflow-hidden bg-gradient-to-br from-[#0A1929] via-[#0D2137] to-black',
      variant === 'full'
        ? 'flex min-h-[calc(100vh-4rem)] flex-col items-center justify-center'
        : 'py-20 md:py-32',
    ]"
  >
    <template v-if="variant === 'full'">
      <div class="hero-grid-pattern absolute inset-0 opacity-30" aria-hidden="true" />
      <div class="absolute top-20 left-10 h-32 w-32 rounded-full bg-[#4CAF50] opacity-10 blur-3xl" aria-hidden="true" />
      <div class="absolute bottom-20 right-10 h-40 w-40 rounded-full bg-[#4CAF50] opacity-10 blur-3xl" aria-hidden="true" />
    </template>
    <div
      :class="[
        'container relative z-10 mx-auto px-4 text-center lg:px-8',
        variant === 'full' ? 'py-20 md:py-28' : '',
      ]"
    >
      <div class="motion-hero-in" :class="variant === 'compact' ? 'mx-auto max-w-3xl' : ''">
        <h1
          :class="[
            'font-bold text-white',
            variant === 'full' ? 'text-4xl tracking-tight md:text-5xl lg:text-6xl' : 'mb-6 text-4xl md:text-5xl',
          ]"
        >
          {{ title }}
        </h1>
        <p
          :class="[
            'text-gray-300',
            variant === 'full' ? 'mx-auto mt-6 max-w-2xl text-lg md:text-xl' : 'text-lg',
          ]"
        >
          {{ subtitle }}
        </p>
        <div v-if="variant === 'full' && ctaText && ctaHref" class="mt-10">
          <Button
            as="a"
            :href="ctaHref"
            class="inline-flex h-11 gap-2 bg-[#4CAF50] text-white shadow hover:bg-[#45a049]"
          >
            {{ ctaText }}
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M5 12h14" />
              <path d="m12 5 7 7-7 7" />
            </svg>
          </Button>
        </div>
      </div>
    </div>
  </section>
</template>
