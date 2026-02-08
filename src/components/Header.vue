<script setup lang="ts">
import { ref, computed } from 'vue'
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'

const lang = ref<'fr' | 'en'>('fr')
const mobileMenuOpen = ref(false)

const navItems = computed(() =>
  lang.value === 'fr'
    ? [
        { href: '/', label: 'Accueil' },
        { href: '/services', label: 'Services' },
        { href: '/about', label: 'À propos' },
        { href: '/equipe', label: 'Équipe' },
        { href: '/contact', label: 'Contact' },
      ]
    : [
        { href: '/en', label: 'Home' },
        { href: '/en/services', label: 'Services' },
        { href: '/en/about', label: 'About' },
        { href: '/en/equipe', label: 'Team' },
        { href: '/en/contact', label: 'Contact' },
      ]
)

function setLang(l: 'fr' | 'en') {
  lang.value = l
  window.location.href = l === 'fr' ? '/' : '/en'
}
</script>

<template>
  <header
    class="sticky top-0 z-50 w-full border-b border-gray-800 bg-[#0A1929]/95 backdrop-blur supports-[backdrop-filter]:bg-[#0A1929]/80"
  >
    <div class="container mx-auto flex h-16 items-center justify-between px-4 lg:px-8">
      <a :href="lang === 'fr' ? '/' : '/en'" class="flex items-center font-bold">
        <span class="text-xl text-white">Ecofin</span>
        <span class="text-xl text-[#4CAF50]">conseils</span>
      </a>
      <nav class="hidden gap-6 md:flex">
        <a
          v-for="item in navItems"
          :key="item.href"
          :href="item.href"
          class="text-sm text-gray-300 transition-colors hover:text-[#4CAF50]"
        >
          {{ item.label }}
        </a>
      </nav>
      <div class="flex items-center gap-4">
        <DropdownMenu>
          <DropdownMenuTrigger
            class="flex items-center gap-2 rounded-md px-2 py-1.5 text-sm text-gray-300 transition-colors hover:text-[#4CAF50] focus:outline-none data-[state=open]:text-[#4CAF50]"
            aria-label="Choisir la langue"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
              <path d="M2 12h20" />
            </svg>
            <span>{{ lang === 'fr' ? 'FR' : 'EN' }}</span>
          </DropdownMenuTrigger>
          <DropdownMenuContent class="min-w-[8rem] border-gray-700 bg-[#0A1929]" align="end">
            <DropdownMenuItem class="cursor-pointer text-gray-300 focus:bg-[#0D2137] focus:text-[#4CAF50]" @select="setLang('fr')">
              Français
            </DropdownMenuItem>
            <DropdownMenuItem class="cursor-pointer text-gray-300 focus:bg-[#0D2137] focus:text-[#4CAF50]" @select="setLang('en')">
              English
            </DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
        <button
          type="button"
          class="text-gray-300 md:hidden"
          aria-label="Menu"
          @click="mobileMenuOpen = !mobileMenuOpen"
        >
          <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <line x1="4" x2="20" y1="12" y2="12" />
            <line x1="4" x2="20" y1="6" y2="6" />
            <line x1="4" x2="20" y1="18" y2="18" />
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
          </svg>
        </button>
      </div>
    </div>
    <nav v-show="mobileMenuOpen" class="border-t border-gray-700 py-4 md:hidden">
      <div class="container mx-auto flex flex-col gap-3 px-4">
        <a
          v-for="item in navItems"
          :key="item.href"
          :href="item.href"
          class="py-2 text-gray-300 transition-colors hover:text-[#4CAF50]"
          @click="mobileMenuOpen = false"
        >
          {{ item.label }}
        </a>
      </div>
    </nav>
  </header>
</template>
