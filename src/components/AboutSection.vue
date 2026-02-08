<script setup lang="ts">
import { computed } from 'vue'
import { Card } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'

const props = withDefaults(defineProps<{ locale?: 'fr' | 'en' }>(), { locale: 'fr' })

const historyTitle = computed(() => (props.locale === 'en' ? 'Our History' : 'Notre Histoire'))
const historyContent = computed(() =>
  props.locale === 'en'
    ? 'Founded in Bamako, Ecofinconseils has established itself as the preferred partner of financial institutions and their clients. Our unique approach combines local expertise with international standards.'
    : "Fondée à Bamako, Ecofinconseils s'est imposée comme le partenaire privilégié des institutions financières et de leurs clients. Notre approche unique combine expertise locale et standards internationaux."
)
const valuesTitle = computed(() => (props.locale === 'en' ? 'Our Values' : 'Nos Valeurs'))
const valuesList = computed(() =>
  props.locale === 'en'
    ? [
        { title: 'Trust', desc: 'Transparency and integrity in every interaction', icon: 'shield' as const, colorClass: 'text-blue-400', bgClass: 'bg-blue-400/10' },
        { title: 'Excellence', desc: 'High-level professional standards', icon: 'target' as const, colorClass: 'text-[#4CAF50]', bgClass: 'bg-[#4CAF50]/10' },
        { title: 'Innovation', desc: 'Modern solutions adapted to the local context', icon: 'lightbulb' as const, colorClass: 'text-purple-400', bgClass: 'bg-purple-400/10' },
      ]
    : [
        { title: 'Confiance', desc: 'Transparence et intégrité dans chaque interaction', icon: 'shield' as const, colorClass: 'text-blue-400', bgClass: 'bg-blue-400/10' },
        { title: 'Excellence', desc: 'Standards professionnels de haut niveau', icon: 'target' as const, colorClass: 'text-[#4CAF50]', bgClass: 'bg-[#4CAF50]/10' },
        { title: 'Innovation', desc: 'Solutions modernes adaptées au contexte local', icon: 'lightbulb' as const, colorClass: 'text-purple-400', bgClass: 'bg-purple-400/10' },
      ]
)
const missionTitle = computed(() => (props.locale === 'en' ? 'The Strategic Connector' : 'Le Connecteur Stratégique'))
const missionBody = computed(() =>
  props.locale === 'en'
    ? 'We build bridges between financial institutions and their clients, offering 360° expertise: banking, insurance and strategic consulting. Our role is to facilitate, optimise and secure your financial projects.'
    : "Nous créons des ponts entre les institutions financières et leurs clients, en offrant une expertise à 360° : banque, assurance et conseil stratégique. Notre rôle est de faciliter, d'optimiser et de sécuriser vos projets financiers."
)
</script>

<template>
  <section class="bg-gradient-to-b from-black to-[#0A1929] py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mx-auto max-w-4xl">
          <Card class="border-gray-800 p-8 md:p-12">
            <div class="mb-6 flex items-center">
              <div class="mr-4 h-12 w-1 shrink-0 rounded-full bg-[#4CAF50]" aria-hidden="true" />
              <h2 class="text-3xl font-bold text-white">{{ historyTitle }}</h2>
            </div>
            <p class="text-lg leading-relaxed text-gray-300">{{ historyContent }}</p>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
  <section class="bg-[#0A1929] py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mb-12 text-center">
          <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">{{ valuesTitle }}</h2>
          <div class="mx-auto h-1 w-20 rounded-full bg-[#4CAF50]" aria-hidden="true" />
        </div>
      </AnimateInView>
      <div class="mx-auto grid max-w-5xl grid-cols-1 gap-8 md:grid-cols-3">
        <AnimateInView v-for="(value, index) in valuesList" :key="value.title" :stagger="index as 0 | 1 | 2">
          <Card class="h-full border-gray-800 bg-gradient-to-br from-[#0D2137] to-[#0A1929] p-8 text-center transition-colors hover:border-[#4CAF50]">
            <div :class="['mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full', value.bgClass]">
              <svg v-if="value.icon === 'shield'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', value.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
              <svg v-else-if="value.icon === 'target'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', value.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" />
              </svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', value.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.8.8 1.3 1.5 1.5 2.5" />
                <path d="M9 18h6" /><path d="M10 22h4" />
              </svg>
            </div>
            <h3 class="mb-3 text-xl font-bold text-white">{{ value.title }}</h3>
            <p class="text-gray-400">{{ value.desc }}</p>
          </Card>
        </AnimateInView>
      </div>
    </div>
  </section>
  <section class="bg-gradient-to-t from-black to-[#0A1929] py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="scale">
        <div class="mx-auto max-w-4xl">
          <Card class="border-none bg-gradient-to-r from-[#4CAF50] to-[#45a049] p-8 text-center md:p-12">
            <h2 class="mb-4 text-2xl font-bold text-white md:text-3xl">{{ missionTitle }}</h2>
            <p class="mx-auto max-w-3xl text-lg leading-relaxed text-white/90">{{ missionBody }}</p>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
