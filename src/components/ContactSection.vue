<script setup lang="ts">
import { computed } from 'vue'
import { Card } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'
import ContactForm from './ContactForm.vue'

const props = withDefaults(defineProps<{ locale?: 'fr' | 'en' }>(), { locale: 'fr' })

const infoTitle = computed(() => (props.locale === 'en' ? 'Contact Information' : 'Informations de Contact'))
const contactInfo = computed(() =>
  props.locale === 'en'
    ? [
        { label: 'Bamako, Mali', icon: 'map' as const, colorClass: 'text-blue-400' },
        { label: '+223 XX XX XX XX', icon: 'phone' as const, colorClass: 'text-[#4CAF50]' },
        { label: 'contact@ecofinconseils.ml', icon: 'mail' as const, colorClass: 'text-purple-400' },
        { label: 'Mon - Fri: 8am - 6pm', icon: 'clock' as const, colorClass: 'text-orange-400' },
      ]
    : [
        { label: 'Bamako, Mali', icon: 'map' as const, colorClass: 'text-blue-400' },
        { label: '+223 XX XX XX XX', icon: 'phone' as const, colorClass: 'text-[#4CAF50]' },
        { label: 'contact@ecofinconseils.ml', icon: 'mail' as const, colorClass: 'text-purple-400' },
        { label: 'Lun - Ven : 8h - 18h', icon: 'clock' as const, colorClass: 'text-orange-400' },
      ]
)
</script>

<template>
  <section class="bg-gradient-to-b from-black to-[#0A1929] py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="mx-auto grid max-w-6xl grid-cols-1 gap-12 lg:grid-cols-2">
        <AnimateInView variant="slow">
          <Card class="border-gray-800 p-8">
            <ContactForm :locale="locale" />
          </Card>
        </AnimateInView>
        <AnimateInView variant="slow">
          <div class="space-y-6">
            <h2 class="mb-6 text-2xl font-bold text-white">{{ infoTitle }}</h2>
            <div class="space-y-4">
              <Card v-for="info in contactInfo" :key="info.label" class="flex items-center gap-4 border-gray-800 p-6 transition-colors hover:border-[#4CAF50]">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-[#4CAF50]/10">
                  <svg v-if="info.icon === 'map'" xmlns="http://www.w3.org/2000/svg" :class="['h-6 w-6', info.colorClass]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" /><circle cx="12" cy="10" r="3" />
                  </svg>
                  <svg v-else-if="info.icon === 'phone'" xmlns="http://www.w3.org/2000/svg" :class="['h-6 w-6', info.colorClass]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg>
                  <svg v-else-if="info.icon === 'mail'" xmlns="http://www.w3.org/2000/svg" :class="['h-6 w-6', info.colorClass]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <rect width="20" height="16" x="2" y="4" rx="2" /><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                  </svg>
                  <svg v-else xmlns="http://www.w3.org/2000/svg" :class="['h-6 w-6', info.colorClass]" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" /><polyline points="12 6 12 12 16 14" />
                  </svg>
                </div>
                <p class="text-gray-300">{{ info.label }}</p>
              </Card>
            </div>
          </div>
        </AnimateInView>
      </div>
    </div>
  </section>
</template>
