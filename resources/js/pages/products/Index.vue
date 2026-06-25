<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import FilteringSidebar from '@/components/products/FilteringSidebar.vue';
import SidebarProvider from '@/components/ui/sidebar/SidebarProvider.vue';
import type { Product } from '@/types';

defineProps<{
  products: Product[];
}>();
</script>

<template>
  <Head title="Products Catalog" />

  <div class="flex justify-start">
      <SidebarProvider class="w-fit">
        <FilteringSidebar />
      </SidebarProvider>
    <div>hi there</div>
  </div>
</template>
