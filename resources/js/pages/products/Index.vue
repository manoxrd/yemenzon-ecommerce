<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { router } from "@inertiajs/vue3";
import { ref } from 'vue';
import PaginationLinks from '@/components/admin/PaginationLinks.vue';
import FilteringSidebar from '@/components/products/FilteringSidebar.vue';
import ProductCard from '@/components/products/ProductCard.vue';
import SidebarProvider from '@/components/ui/sidebar/SidebarProvider.vue';
import SidebarTrigger from '@/components/ui/sidebar/SidebarTrigger.vue';
import type { Category, Product } from '@/types';

defineProps<{
  products: { data: Product[]; next_page_url: string; prev_page_url: string; current_page: number; total: number; last_page: number; first_page_url: string; last_page_url: string; links: [] };
  categories: Category[];
}>();

const query = new URLSearchParams(window.location.search);

const currentCategory = ref(query.get('category') || '');

const currentRating = query.get('rating') ?? 'any';

const maxPrice = query.get('max_price') || 100;

const minPrice = query.get('min_price') || 25;

const onCategorySelect = (category: any) => {
  router.reload({ data: { category: category.name, page: '1' }, only: ['products'] });
};

const onReviewSelect = (index: number) => {
  router.reload({ data: { rating: index }, only: ['products'] });
};

const onPriceRangeSelect = (priceRange: number[]) => {
  router.reload({ data: { min_price: priceRange[0], max_price: priceRange[1] }, only: ['products'] });
};

const clear = () => {
  window.location.search = '';
}

</script>

<template>

  <Head title="Products Catalog" />

  <div class="flex min-h-screen bg-background justify-start">
    <SidebarProvider class="justify-center">
      <FilteringSidebar :categories="categories" :selected-rating="currentRating" :max-price="maxPrice"
        :min-price="minPrice" v-model="currentCategory" @select-category="onCategorySelect"
        @filter-by-review="onReviewSelect" @select-price-range="onPriceRangeSelect" @clear-all-filters="clear" />

      <div class="flex-1 p-6">
        <div class="flex items-center gap-3 mb-6">
          <SidebarTrigger class="md:hidden" />
          <p class="text-sm text-muted-foreground whitespace-nowrap">{{ products.total }} Products</p>
          <div class="flex-1 border-t border-border"></div>
          <p class="text-sm text-muted-foreground whitespace-nowrap">Page {{ products.current_page }} of {{
            products.last_page }}</p>
        </div>
        <div v-if="products.data.length" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          <ProductCard v-for="product in products.data" :key="product.id" :product="product" />
        </div>
        <div v-else class="w-full h-screen text-center pt-25 text-xl font-inter">No Products Match these Filters</div>

        <PaginationLinks v-if="products.data.length" :next_page_url="products.next_page_url" :prev_page_url="products.prev_page_url" :current_page="products.current_page" :total="products.total" :last_page="products.last_page" :first_page_url="products.first_page_url" :last_page_url="products.last_page_url" :links="products.links" />
      </div>
    </SidebarProvider>
  </div>
</template>