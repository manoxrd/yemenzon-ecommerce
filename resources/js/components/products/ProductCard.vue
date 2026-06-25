<script setup lang="ts">
import StarReview from '../StarReview.vue';
import AddToCart from './AddToCart.vue';

defineProps<{
  relatedProducts: any[];
}>();
</script>

<template>
  <div
    v-for="item in relatedProducts"
    :key="item.id"
    class="group flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white transition-all duration-300 hover:shadow-xl dark:border-gray-800 dark:bg-gray-900"
  >
    <!-- Image -->
    <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-800">
      <img
        :src="item.image"
        :alt="item.name"
        class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
      />
      <div
        class="absolute top-3 left-3 rounded-full bg-white/90 px-3 py-1.5 text-xs font-bold tracking-wide text-gray-900 shadow-sm backdrop-blur-sm dark:bg-gray-900/90 dark:text-white"
      >
        {{ item.time }}
      </div>
    </div>

    <!-- Content -->
    <div class="flex grow flex-col p-5">
      <span
        class="mb-1.5 text-xs font-bold tracking-widest text-gray-400 uppercase dark:text-gray-500"
        >{{ item.category }}</span
      >
      <h3
        class="mb-2 line-clamp-1 text-lg leading-tight font-bold text-gray-900 dark:text-white"
      >
        {{ item.name }}
      </h3>

      <p
        class="mb-5 line-clamp-2 grow text-sm text-gray-500 dark:text-gray-400"
      >
        {{ item.description }}
      </p>

      <div class="mb-5 flex items-center justify-between">
        <span class="text-xl font-black text-gray-900 dark:text-white">{{
          item.price
        }}</span>
        <StarReview variant="mini" :size="14" />
      </div>

      <AddToCart
        class="w-full rounded-xl bg-black hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200"
      />
    </div>
  </div>
</template>
