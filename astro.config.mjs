// @ts-check
import { defineConfig } from 'astro/config';

import tailwindcss from '@tailwindcss/vite';

import vue from '@astrojs/vue';

import sitemap from '@astrojs/sitemap';

// https://astro.build/config
const SITE = 'https://ecofinconseils.com';

export default defineConfig({
  site: SITE,
  vite: {
    plugins: [tailwindcss()]
  },

  integrations: [
    vue(),
    sitemap({
      i18n: {
        defaultLocale: 'fr',
        locales: {
          fr: 'fr-FR',
          en: 'en-US'
        }
      }
    })
  ]
});