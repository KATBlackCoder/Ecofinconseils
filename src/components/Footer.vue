<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{ locale: 'fr' | 'en' }>()

const links = computed(() =>
  props.locale === 'en'
    ? [
        { href: '/en', label: 'Home' },
        { href: '/en/services', label: 'Services' },
        { href: '/en/about', label: 'About' },
        { href: '/en/equipe', label: 'Team' },
        { href: '/en/contact', label: 'Contact' },
      ]
    : [
        { href: '/', label: 'Accueil' },
        { href: '/services', label: 'Services' },
        { href: '/about', label: 'À propos' },
        { href: '/equipe', label: 'Équipe' },
        { href: '/contact', label: 'Contact' },
      ]
)
const quickLinksTitle = computed(() => (props.locale === 'en' ? 'Quick links' : 'Liens Rapides'))
const description = computed(() =>
  props.locale === 'en'
    ? 'Your trusted partner for banking, insurance and strategic consulting in Bamako.'
    : "Votre partenaire de confiance pour la banque, l'assurance et le conseil stratégique à Bamako."
)
const allRights = computed(() => (props.locale === 'en' ? 'All rights reserved.' : 'Tous droits réservés.'))
const address = 'Bamako, Mali'
const phone = '+223 XX XX XX XX'
const email = 'contact@ecofinconseils.ml'
const year = new Date().getFullYear()
</script>

<template>
  <footer class="border-t border-border bg-background text-muted-foreground">
    <div class="container mx-auto px-4 py-12 lg:px-8">
      <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        <div>
          <div class="mb-4 flex items-center font-bold">
            <span class="text-xl text-foreground">Ecofin</span>
            <span class="text-xl text-primary">conseils</span>
          </div>
          <p class="mb-4 text-sm text-muted-foreground">{{ description }}</p>
          <div class="flex gap-4">
            <a href="#" class="text-muted-foreground transition-colors hover:text-primary" aria-label="Facebook">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
              </svg>
            </a>
            <a href="#" class="text-muted-foreground transition-colors hover:text-primary" aria-label="Twitter">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" />
              </svg>
            </a>
            <a href="#" class="text-muted-foreground transition-colors hover:text-primary" aria-label="LinkedIn">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                <rect width="4" height="12" x="2" y="9" />
                <circle cx="4" cy="4" r="2" />
              </svg>
            </a>
          </div>
        </div>
        <div>
          <h3 class="mb-4 font-semibold text-foreground">{{ quickLinksTitle }}</h3>
          <ul class="space-y-2">
            <li v-for="link in links" :key="link.href">
              <a :href="link.href" class="text-sm text-muted-foreground transition-colors hover:text-primary">
                {{ link.label }}
              </a>
            </li>
          </ul>
        </div>
        <div>
          <h3 class="mb-4 font-semibold text-foreground">Contact</h3>
          <ul class="space-y-3">
            <li class="flex items-center gap-2 text-sm text-muted-foreground">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
              {{ address }}
            </li>
            <li class="flex items-center gap-2 text-sm text-muted-foreground">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
              </svg>
              <a :href="`tel:${phone}`" class="transition-colors hover:text-primary">{{ phone }}</a>
            </li>
            <li class="flex items-center gap-2 text-sm text-muted-foreground">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-primary" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
              </svg>
              <a :href="`mailto:${email}`" class="transition-colors hover:text-primary">{{ email }}</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="mt-8 border-t border-border pt-8 text-center">
        <p class="text-sm text-muted-foreground">© {{ year }} Ecofinconseils. {{ allRights }}</p>
      </div>
    </div>
  </footer>
</template>
