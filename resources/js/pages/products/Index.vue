<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import type { Product } from '@/types';

defineProps<{
  products: Product[];
}>();
</script>

<template>
  <Head title="Products Catalog" />
  <div>{{ products }}</div>
</template>
