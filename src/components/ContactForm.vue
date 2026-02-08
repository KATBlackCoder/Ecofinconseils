<script setup lang="ts">
import { ref, computed } from 'vue'

const props = defineProps<{ locale: 'fr' | 'en' }>()

const isSubmitting = ref(false)
const success = ref(false)
const form = ref<HTMLFormElement | null>(null)

const labels = computed(() =>
  props.locale === 'fr'
    ? {
        name: 'Nom complet',
        email: 'Email',
        phone: 'Téléphone',
        subject: 'Sujet',
        message: 'Votre message',
        submit: 'Envoyer',
        sending: 'Envoi en cours...',
        success: 'Message envoyé avec succès !',
        required: 'Ce champ est requis',
        emailInvalid: 'Email valide requis',
      }
    : {
        name: 'Full name',
        email: 'Email',
        phone: 'Phone',
        subject: 'Subject',
        message: 'Your message',
        submit: 'Send',
        sending: 'Sending...',
        success: 'Message sent successfully!',
        required: 'This field is required',
        emailInvalid: 'Valid email required',
      }
)

const errors = ref<Record<string, string>>({})
const subjectPlaceholder = computed(() => (props.locale === 'fr' ? "Demande d'information" : 'Information request'))
const messagePlaceholder = computed(() => (props.locale === 'fr' ? 'Votre message...' : 'Your message...'))

function validate(): boolean {
  const el = form.value
  if (!el) return false
  const data = new FormData(el)
  errors.value = {}
  if (!(data.get('name') as string)?.trim()) errors.value.name = labels.value.required
  const email = (data.get('email') as string)?.trim()
  if (!email) errors.value.email = labels.value.required
  else if (!/^\S+@\S+\.\S+/.test(email)) errors.value.email = labels.value.emailInvalid
  if (!(data.get('subject') as string)?.trim()) errors.value.subject = labels.value.required
  if (!(data.get('message') as string)?.trim()) errors.value.message = labels.value.required
  return Object.keys(errors.value).length === 0
}

async function onSubmit(e: Event) {
  e.preventDefault()
  if (!validate()) return
  isSubmitting.value = true
  success.value = false
  await new Promise((r) => setTimeout(r, 1500))
  success.value = true
  form.value?.reset()
  errors.value = {}
  isSubmitting.value = false
}
</script>

<template>
  <form ref="form" class="space-y-6" @submit="onSubmit">
    <div>
      <label for="contact-name" class="text-gray-300">{{ labels.name }}</label>
      <input
        id="contact-name"
        name="name"
        type="text"
        class="mt-2 w-full rounded-md border border-gray-700 bg-[#0A1929] px-3 py-2 text-white placeholder-gray-500 focus:border-[#4CAF50] focus:outline-none focus:ring-1 focus:ring-[#4CAF50]"
        placeholder="John Doe"
      />
      <p v-if="errors.name" class="mt-1 text-sm text-red-400">{{ errors.name }}</p>
    </div>
    <div>
      <label for="contact-email" class="text-gray-300">{{ labels.email }}</label>
      <input
        id="contact-email"
        name="email"
        type="email"
        class="mt-2 w-full rounded-md border border-gray-700 bg-[#0A1929] px-3 py-2 text-white placeholder-gray-500 focus:border-[#4CAF50] focus:outline-none focus:ring-1 focus:ring-[#4CAF50]"
        placeholder="john@example.com"
      />
      <p v-if="errors.email" class="mt-1 text-sm text-red-400">{{ errors.email }}</p>
    </div>
    <div>
      <label for="contact-phone" class="text-gray-300">{{ labels.phone }}</label>
      <input
        id="contact-phone"
        name="phone"
        type="tel"
        class="mt-2 w-full rounded-md border border-gray-700 bg-[#0A1929] px-3 py-2 text-white placeholder-gray-500 focus:border-[#4CAF50] focus:outline-none focus:ring-1 focus:ring-[#4CAF50]"
        placeholder="+223 XX XX XX XX"
      />
    </div>
    <div>
      <label for="contact-subject" class="text-gray-300">{{ labels.subject }}</label>
      <input
        id="contact-subject"
        name="subject"
        type="text"
        class="mt-2 w-full rounded-md border border-gray-700 bg-[#0A1929] px-3 py-2 text-white placeholder-gray-500 focus:border-[#4CAF50] focus:outline-none focus:ring-1 focus:ring-[#4CAF50]"
        :placeholder="subjectPlaceholder"
      />
      <p v-if="errors.subject" class="mt-1 text-sm text-red-400">{{ errors.subject }}</p>
    </div>
    <div>
      <label for="contact-message" class="text-gray-300">{{ labels.message }}</label>
      <textarea
        id="contact-message"
        name="message"
        rows="5"
        class="mt-2 min-h-[150px] w-full resize-y rounded-md border border-gray-700 bg-[#0A1929] px-3 py-2 text-white placeholder-gray-500 focus:border-[#4CAF50] focus:outline-none focus:ring-1 focus:ring-[#4CAF50]"
        :placeholder="messagePlaceholder"
      />
      <p v-if="errors.message" class="mt-1 text-sm text-red-400">{{ errors.message }}</p>
    </div>
    <p v-if="success" class="text-sm text-[#4CAF50]">{{ labels.success }}</p>
    <button
      type="submit"
      :disabled="isSubmitting"
      class="w-full rounded-md bg-[#4CAF50] px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-[#45a049] disabled:opacity-70"
    >
      {{ isSubmitting ? labels.sending : labels.submit }}
    </button>
  </form>
</template>
