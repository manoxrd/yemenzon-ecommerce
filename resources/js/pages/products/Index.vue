<script setup lang='ts'>
import type { Product } from '@/types';


defineProps<{
  products: Product[]
}>();
</script>

<template>
  <div>{{ products }}</div>
</template>