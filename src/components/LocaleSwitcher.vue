<script setup lang="ts">
import { computed } from 'vue'
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'

const props = defineProps<{ locale: 'fr' | 'en' }>()

const ariaLabel = computed(() =>
  props.locale === 'fr' ? 'Choisir la langue' : 'Choose language'
)

const currentLabel = computed(() => (props.locale === 'fr' ? 'FR' : 'EN'))

function setLocale(l: 'fr' | 'en') {
  window.location.href = l === 'fr' ? '/' : '/en'
}
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger
      class="flex items-center gap-2 rounded-md px-2 py-1.5 text-sm text-gray-300 transition-colors hover:text-[#4CAF50] focus:outline-none data-[state=open]:text-[#4CAF50]"
      :aria-label="ariaLabel"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <circle cx="12" cy="12" r="10" />
        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
        <path d="M2 12h20" />
      </svg>
      <span>{{ currentLabel }}</span>
    </DropdownMenuTrigger>
    <DropdownMenuContent class="min-w-[8rem] border-gray-700 bg-[#0A1929]" align="end">
      <DropdownMenuItem class="cursor-pointer text-gray-300 focus:bg-[#0D2137] focus:text-[#4CAF50]" @select="setLocale('fr')">
        Français
      </DropdownMenuItem>
      <DropdownMenuItem class="cursor-pointer text-gray-300 focus:bg-[#0D2137] focus:text-[#4CAF50]" @select="setLocale('en')">
        English
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
