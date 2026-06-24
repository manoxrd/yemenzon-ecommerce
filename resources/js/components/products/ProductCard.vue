<script setup lang='ts'>

defineProps<{
  relatedProducts: any[]
}>()

</script>

<template>
  <div v-for="item in relatedProducts" :key="item.id"
    class="flex flex-col group border border-gray-200 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 bg-white dark:bg-gray-900 dark:border-gray-800">
    <!-- Image -->
    <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-800">
      <img :src="item.image" :alt="item.name"
        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />
      <div
        class="absolute top-3 left-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-gray-900 dark:text-white shadow-sm tracking-wide">
        {{ item.time }}
      </div>
    </div>

    <!-- Content -->
    <div class="p-5 flex flex-col grow">
      <span class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1.5">{{ item.category
        }}</span>
      <h3 class="font-bold text-lg leading-tight mb-2 text-gray-900 dark:text-white line-clamp-1">{{ item.name }}</h3>

      <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-5 grow">
        {{ item.description }}
      </p>

      <div class="flex items-center justify-between mb-5">
        <span class="font-black text-xl text-gray-900 dark:text-white">{{ item.price }}</span>
        <StarReview variant="mini" :size="14" />
      </div>

      <AddToCart
        class="w-full rounded-xl bg-black hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200" />
    </div>
  </div>
</template>