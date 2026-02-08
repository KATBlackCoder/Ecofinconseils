<script setup lang="ts">
import { computed } from 'vue'
import { Badge } from '@/components/ui/badge'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import AnimateInView from './AnimateInView.vue'

const props = withDefaults(defineProps<{ locale?: 'fr' | 'en' }>(), { locale: 'fr' })

const services = computed(() =>
  props.locale === 'en'
    ? [
        { title: 'Banking Intermediary', description: 'Complete banking solutions with BCEAO accreditation', features: ['BCEAO Accreditation N° ML00009/2024', 'Professional and personal credit', 'Wealth management', 'Financing advice'], icon: 'building' as const, colorClass: 'text-blue-400', bgClass: 'bg-blue-400/10', borderColor: 'hover:border-blue-400/20', badge: 'BCEAO Accreditation N° ML00009/2024' as string | undefined },
        { title: 'Insurance Intermediary', description: 'Independent agent for all your insurance needs', features: ['Independent agent', 'Life and health insurance', 'Auto and home insurance', 'Business protection'], icon: 'shield' as const, colorClass: 'text-emerald-400', bgClass: 'bg-emerald-400/10', borderColor: 'hover:border-emerald-400/20', badge: 'Independent Agent' as string | undefined },
        { title: 'Consulting Office', description: 'Strategic expertise and institutional analysis', features: ['Market research', 'Strategic consulting', 'Institutional analysis', 'Project structuring'], icon: 'file' as const, colorClass: 'text-purple-400', bgClass: 'bg-purple-400/10', borderColor: 'hover:border-purple-400/20', badge: undefined as string | undefined },
      ]
    : [
        { title: 'Intermédiaire en Banque', description: 'Solutions bancaires complètes avec agrément BCEAO', features: ['Agrément BCEAO N° ML00009/2024', 'Crédit professionnel et personnel', 'Gestion de patrimoine', 'Conseil en financement'], icon: 'building' as const, colorClass: 'text-blue-400', bgClass: 'bg-blue-400/10', borderColor: 'hover:border-blue-400/20', badge: 'Agrément BCEAO N° ML00009/2024' as string | undefined },
        { title: 'Intermédiaire en Assurance', description: 'Mandataire indépendant pour toutes vos assurances', features: ['Mandataire indépendant', 'Assurance vie et santé', 'Assurance auto et habitation', 'Protection entreprise'], icon: 'shield' as const, colorClass: 'text-emerald-400', bgClass: 'bg-emerald-400/10', borderColor: 'hover:border-emerald-400/20', badge: 'Mandataire Indépendant' as string | undefined },
        { title: "Bureau d'Études", description: 'Expertise stratégique et analyse institutionnelle', features: ['Études de marché', 'Conseil stratégique', 'Analyse institutionnelle', 'Montage de projets'], icon: 'file' as const, colorClass: 'text-purple-400', bgClass: 'bg-purple-400/10', borderColor: 'hover:border-purple-400/20', badge: undefined as string | undefined },
      ]
)
const whyTitle = computed(() => (props.locale === 'en' ? 'Why choose us?' : 'Pourquoi nous choisir ?'))
const whyItems = computed(() =>
  props.locale === 'en'
    ? [
        { title: 'Local Expertise', desc: 'In-depth knowledge of the Malian market and BCEAO regulations' },
        { title: 'Tailored Solutions', desc: 'Personalised advice adapted to your specific needs' },
        { title: 'Extended Network', desc: 'Partnerships with major financial institutions' },
        { title: 'Full Support', desc: 'Personalised follow-up from A to Z in all your projects' },
      ]
    : [
        { title: 'Expertise Locale', desc: 'Connaissance approfondie du marché malien et des réglementations BCEAO' },
        { title: 'Solutions Sur Mesure', desc: 'Conseil personnalisé adapté à vos besoins spécifiques' },
        { title: 'Réseau Étendu', desc: 'Partenariats avec les principales institutions financières' },
        { title: 'Accompagnement Total', desc: 'Suivi personnalisé de A à Z dans tous vos projets' },
      ]
)
</script>

<template>
  <section class="bg-gradient-to-b from-gradient-from to-gradient-to py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <AnimateInView v-for="(service, index) in services" :key="service.title" :stagger="index as 0 | 1 | 2">
          <Card :class="['h-full border-border bg-card/50 transition-all duration-300', service.borderColor]">
            <CardHeader class="border-none pb-2">
              <div :class="['mb-4 flex h-16 w-16 items-center justify-center rounded-lg', service.bgClass]">
                <svg v-if="service.icon === 'building'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', service.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <path d="M2 20V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12" /><path d="M10 20V14a2 2 0 0 0-2-2 2 2 0 0 0-2 2v6" /><path d="M10 20h4" /><path d="M18 20V14a2 2 0 0 0-2-2 2 2 0 0 0-2 2v6" /><path d="M18 20h4" /><path d="M2 12h20" />
                </svg>
                <svg v-else-if="service.icon === 'shield'" xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', service.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" :class="['h-8 w-8', service.colorClass]" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                  <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" /><polyline points="14 2 14 8 20 8" /><line x1="16" x2="8" y1="13" y2="13" /><line x1="16" x2="8" y1="17" y2="17" /><line x1="10" x2="8" y1="9" y2="9" />
                </svg>
              </div>
              <CardTitle class="mb-2 text-2xl text-foreground">
                {{ service.title }}
              </CardTitle>
              <p class="text-muted-foreground">
                {{ service.description }}
              </p>
            </CardHeader>
            <CardContent class="pt-0">
              <ul class="space-y-3">
                <li v-for="feature in service.features" :key="feature" class="flex items-start gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" :class="['mt-0.5 h-5 w-5 shrink-0', service.colorClass]" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" />
                  </svg>
                  <span class="text-sm text-muted-foreground">{{ feature }}</span>
                </li>
              </ul>
              <div v-if="service.badge" class="mt-6 border-t border-border pt-6">
                <Badge class="border-0 bg-primary text-primary-foreground">
                  {{ service.badge }}
                </Badge>
              </div>
            </CardContent>
          </Card>
        </AnimateInView>
      </div>
    </div>
  </section>
  <section class="bg-background py-20">
    <div class="container mx-auto px-4 lg:px-8">
      <AnimateInView variant="slow">
        <div class="mx-auto max-w-4xl">
          <Card class="border-border bg-gradient-to-br from-secondary to-background">
            <CardContent class="p-8 md:p-12">
              <h2 class="mb-8 text-center text-3xl font-bold text-foreground">
                {{ whyTitle }}
              </h2>
              <div class="grid gap-6 md:grid-cols-2">
                <div v-for="item in whyItems" :key="item.title" class="flex items-start gap-4">
                  <div class="mt-2 h-2 w-2 shrink-0 rounded-full bg-primary" aria-hidden="true" />
                  <div>
                    <h3 class="mb-2 font-semibold text-foreground">{{ item.title }}</h3>
                    <p class="text-sm text-muted-foreground">{{ item.desc }}</p>
                  </div>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </AnimateInView>
    </div>
  </section>
</template>
