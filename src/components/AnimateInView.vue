<script setup lang="ts">
import { computed } from 'vue'

/** Wrapper pour animation au scroll (data-animate-inview) — le script global dans BaseLayout ajoute .in-view */
interface Props {
  variant?: 'default' | 'slow' | 'scale'
  stagger?: 0 | 1 | 2 | 3
  class?: string
}
const props = withDefaults(defineProps<Props>(), { variant: 'default' })
const attrs = computed(() => ({
  'data-animate-inview': props.variant === 'default' ? true : props.variant,
  'data-stagger': props.stagger !== undefined ? String(props.stagger) : undefined,
}))
</script>

<template>
  <div
    v-bind="attrs"
    :class="props.class"
  >
    <slot />
  </div>
</template>
