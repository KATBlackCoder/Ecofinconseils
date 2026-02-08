<script setup lang="ts">
import { ref, computed } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'

const props = defineProps<{ locale: 'fr' | 'en' }>()

const isSubmitting = ref(false)
const success = ref(false)
const name = ref('')
const email = ref('')
const phone = ref('')
const subject = ref('')
const message = ref('')

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
  errors.value = {}
  if (!name.value.trim()) errors.value.name = labels.value.required
  if (!email.value.trim()) errors.value.email = labels.value.required
  else if (!/^\S+@\S+\.\S+/.test(email.value)) errors.value.email = labels.value.emailInvalid
  if (!subject.value.trim()) errors.value.subject = labels.value.required
  if (!message.value.trim()) errors.value.message = labels.value.required
  return Object.keys(errors.value).length === 0
}

async function onSubmit(e: Event) {
  e.preventDefault()
  if (!validate()) return
  isSubmitting.value = true
  success.value = false
  await new Promise((r) => setTimeout(r, 1500))
  success.value = true
  name.value = ''
  email.value = ''
  phone.value = ''
  subject.value = ''
  message.value = ''
  errors.value = {}
  isSubmitting.value = false
}
</script>

<template>
  <form class="space-y-6" @submit="onSubmit">
    <div class="space-y-2">
      <Label for="contact-name" class="text-gray-300">{{ labels.name }}</Label>
      <Input
        id="contact-name"
        v-model="name"
        type="text"
        placeholder="John Doe"
        class="border-gray-700 bg-[#0A1929] text-white placeholder:text-gray-500 focus-visible:border-[#4CAF50] focus-visible:ring-[#4CAF50]"
      />
      <p v-if="errors.name" class="text-sm text-red-400">{{ errors.name }}</p>
    </div>
    <div class="space-y-2">
      <Label for="contact-email" class="text-gray-300">{{ labels.email }}</Label>
      <Input
        id="contact-email"
        v-model="email"
        type="email"
        placeholder="john@example.com"
        class="border-gray-700 bg-[#0A1929] text-white placeholder:text-gray-500 focus-visible:border-[#4CAF50] focus-visible:ring-[#4CAF50]"
      />
      <p v-if="errors.email" class="text-sm text-red-400">{{ errors.email }}</p>
    </div>
    <div class="space-y-2">
      <Label for="contact-phone" class="text-gray-300">{{ labels.phone }}</Label>
      <Input
        id="contact-phone"
        v-model="phone"
        type="tel"
        placeholder="+223 XX XX XX XX"
        class="border-gray-700 bg-[#0A1929] text-white placeholder:text-gray-500 focus-visible:border-[#4CAF50] focus-visible:ring-[#4CAF50]"
      />
    </div>
    <div class="space-y-2">
      <Label for="contact-subject" class="text-gray-300">{{ labels.subject }}</Label>
      <Input
        id="contact-subject"
        v-model="subject"
        type="text"
        :placeholder="subjectPlaceholder"
        class="border-gray-700 bg-[#0A1929] text-white placeholder:text-gray-500 focus-visible:border-[#4CAF50] focus-visible:ring-[#4CAF50]"
      />
      <p v-if="errors.subject" class="text-sm text-red-400">{{ errors.subject }}</p>
    </div>
    <div class="space-y-2">
      <Label for="contact-message" class="text-gray-300">{{ labels.message }}</Label>
      <Textarea
        id="contact-message"
        v-model="message"
        rows="5"
        :placeholder="messagePlaceholder"
        class="min-h-[150px] resize-y border-gray-700 bg-[#0A1929] text-white placeholder:text-gray-500 focus-visible:border-[#4CAF50] focus-visible:ring-[#4CAF50]"
      />
      <p v-if="errors.message" class="text-sm text-red-400">{{ errors.message }}</p>
    </div>
    <p v-if="success" class="text-sm text-[#4CAF50]">{{ labels.success }}</p>
    <Button
      type="submit"
      :disabled="isSubmitting"
      class="w-full bg-[#4CAF50] text-white hover:bg-[#45a049] disabled:opacity-70"
    >
      {{ isSubmitting ? labels.sending : labels.submit }}
    </Button>
  </form>
</template>
