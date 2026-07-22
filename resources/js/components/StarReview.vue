<script setup lang="ts">
import { Star } from '@lucide/vue';

defineProps<{
  variant: string,
  size: number,
  avg_reviews: number | null | undefined
}>();

</script>

<template>
  <div class="flex items-center gap-x-1 font-bold">
    <div class="flex">
      <Star
        v-if="variant === 'mini'"
        :size="size ?? 18"
        fill="#E8A736"
        stroke-width="0"
      />

      <Star
        v-else
        :size="size ?? 18"
        fill="#E8A736"
        stroke-width="0"
        v-for="index in 5"
        :key="index"
      />
    </div>

    <span class="font-normal">{{ Number(avg_reviews).toFixed(1) }}</span>
    <span v-if="variant === 'product'">(240 Reviews)</span>
  </div>
</template>
