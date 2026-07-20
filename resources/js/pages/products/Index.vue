<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { router } from "@inertiajs/vue3";
import { computed } from 'vue';
import FilteringSidebar from '@/components/products/FilteringSidebar.vue';
import SidebarProvider from '@/components/ui/sidebar/SidebarProvider.vue';
import type { Category, Product } from '@/types';

const props = defineProps<{
  products: Product[];
  category: Category | null;
  categories: Category[];
}>();

const currentCategory = computed(() => props.category?.name ?? '');

const onCategorySelected = (category: any) => {

  if (currentCategory.value !== category.name) {

    console.log(category);
    router.reload({ data: {category: category.name}, only: ['products', 'category'] });
  }
};

</script>

<template>

  <Head title="Products Catalog" />

  <div class="flex justify-start">
    <SidebarProvider class="w-fit">
      <FilteringSidebar :categories="categories" :currentCategory="currentCategory" @select-category="onCategorySelected" />
    </SidebarProvider>

    <div>
      
      <div v-for="product in products" :key="product.id">
        <h2>{{ product.name }}</h2>
        <p>{{ product.description }}</p>
        <span>{{ product.price }}</span>
      </div>
      <!-- {{ category }} -->
      <!-- {{ products }} -->
    </div>
  </div>
</template>