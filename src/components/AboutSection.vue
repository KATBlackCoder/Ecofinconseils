<script setup lang="ts">
import { Card } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'

export interface AboutValue {
  title: string
  desc: string
  icon: string
}

export interface AboutHistory {
  title: string
  content: string
}

export interface AboutValues {
  title: string
  list: AboutValue[]
}

export interface AboutMission {
  title: string
  body: string
}

defineProps<{
  history: AboutHistory
  values: AboutValues
  mission: AboutMission
}>()

const iconColors: Record<string, { colorClass: string; bgClass: string }> = {
  shield: { colorClass: 'text-blue-400', bgClass: 'bg-blue-400/10' },
  target: { colorClass: 'text-primary', bgClass: 'bg-primary/10' },
  lightbulb: { colorClass: 'text-purple-400', bgClass: 'bg-purple-400/10' },
}
</script>

<template>
  <section class="bg-gradient-to-b from-gradient-from to-gradient-to py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mx-auto max-w-4xl">
          <Card class="border-border p-8 md:p-12">
            <div class="mb-6 flex items-center">
              <div class="mr-4 h-12 w-1 shrink-0 rounded-full bg-primary" aria-hidden="true" />
              <h2 class="text-3xl font-bold text-foreground">{{ history.title }}</h2>
            </div>
            <p class="text-lg leading-relaxed text-muted-foreground">{{ history.content }}</p>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
  <section class="bg-background py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mb-12 text-center">
          <h2 class="mb-4 text-3xl font-bold text-foreground md:text-4xl">{{ values.title }}</h2>
          <div class="mx-auto h-1 w-20 rounded-full bg-primary" aria-hidden="true" />
        </div>
      </AnimateInView>
      <div class="mx-auto grid max-w-5xl grid-cols-1 gap-8 md:grid-cols-3">
        <AnimateInView v-for="(value, index) in values.list" :key="value.title" :stagger="(index as 0 | 1 | 2)">
          <Card class="h-full border-border bg-gradient-to-br from-secondary to-background p-8 text-center transition-colors hover:border-primary">
            <div :class="['mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full', iconColors[value.icon]?.bgClass]">
              <svg v-if="value.icon === 'shield'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', iconColors[value.icon]?.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg>
              <svg v-else-if="value.icon === 'target'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', iconColors[value.icon]?.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" />
              </svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', iconColors[value.icon]?.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.8.8 1.3 1.5 1.5 2.5" />
                <path d="M9 18h6" /><path d="M10 22h4" />
              </svg>
            </div>
            <h3 class="mb-3 text-xl font-bold text-foreground">{{ value.title }}</h3>
            <p class="text-muted-foreground">{{ value.desc }}</p>
          </Card>
        </AnimateInView>
      </div>
    </div>
  </section>
  <section class="bg-gradient-to-t from-gradient-from to-gradient-to py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="scale">
        <div class="mx-auto max-w-4xl">
          <Card class="border-none bg-gradient-to-r from-primary to-primary/90 p-8 text-center md:p-12">
            <h2 class="mb-4 text-2xl font-bold text-primary-foreground md:text-3xl">{{ mission.title }}</h2>
            <p class="mx-auto max-w-3xl text-lg leading-relaxed text-primary-foreground/90">{{ mission.body }}</p>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
