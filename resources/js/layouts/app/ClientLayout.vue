<script setup lang="ts">
import AppClient from '@/components/AppClient.vue';
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import { Toaster } from '@/components/ui/sonner';
</script>

<template>
  <AppShell variant="client">
    <AppClient />
    <Toaster position="top-center" />
    <AppContent variant="client">
      <slot />
    </AppContent>
  </AppShell>
</template>
