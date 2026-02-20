<script setup lang="ts">
import { Card } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'

export interface TeamMember {
  name: string
  role: string
  bio: string
  photo?: string
  linkedin?: string
  email?: string
}

export interface TeamCta {
  title: string
  body: string
  email: string
}

const FALLBACK_IMAGES = [
  'https://images.unsplash.com/photo-1739300293504-234817eead52?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400',
  'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400',
  'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400',
  'https://images.unsplash.com/photo-1580489944761-15a19d654956?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400',
]

defineProps<{
  members: TeamMember[]
  cta: TeamCta
}>()
</script>

<template>
  <section class="bg-gradient-to-b from-gradient-from to-gradient-to py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <AnimateInView v-for="(member, index) in members" :key="member.name" :stagger="(index as 0 | 1 | 2 | 3)">
          <Card class="group h-full overflow-hidden border-border transition-all duration-300 hover:border-primary">
            <div class="relative aspect-square overflow-hidden">
              <img
                :src="member.photo || FALLBACK_IMAGES[index % FALLBACK_IMAGES.length]"
                :alt="member.name"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                loading="lazy"
                width="400"
                height="400"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-60" aria-hidden="true" />
            </div>
            <div class="p-6">
              <h3 class="mb-1 text-xl font-bold text-foreground">{{ member.name }}</h3>
              <p class="mb-3 text-sm text-primary">{{ member.role }}</p>
              <p class="mb-4 text-sm text-muted-foreground">{{ member.bio }}</p>
              <div class="flex gap-3">
                <a
                  v-if="member.linkedin && member.linkedin !== '#'"
                  :href="member.linkedin"
                  target="_blank"
                  rel="noopener noreferrer"
                  class="text-muted-foreground transition-colors hover:text-primary"
                  aria-label="LinkedIn"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z" /><rect width="4" height="12" x="2" y="9" /><circle cx="4" cy="4" r="2" />
                  </svg>
                </a>
                <a
                  v-if="member.email"
                  :href="`mailto:${member.email}`"
                  class="text-muted-foreground transition-colors hover:text-primary"
                  aria-label="Email"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <rect width="20" height="16" x="2" y="4" rx="2" /><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                  </svg>
                </a>
              </div>
            </div>
          </Card>
        </AnimateInView>
      </div>
    </div>
  </section>
  <section class="bg-background py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="scale">
        <div class="mx-auto max-w-4xl">
          <Card class="border-border bg-gradient-to-br from-secondary to-background p-8 text-center md:p-12">
            <h2 class="mb-4 text-2xl font-bold text-foreground md:text-3xl">{{ cta.title }}</h2>
            <p class="mx-auto mb-6 max-w-2xl text-muted-foreground">{{ cta.body }}</p>
            <a :href="`mailto:${cta.email}`" class="inline-flex items-center text-primary transition-colors hover:text-primary/90">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <rect width="20" height="16" x="2" y="4" rx="2" /><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
              </svg>
              {{ cta.email }}
            </a>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
