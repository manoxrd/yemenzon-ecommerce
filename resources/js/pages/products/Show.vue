<script setup lang='ts'>
import { Head } from '@inertiajs/vue3';
import type { Product } from '@/types';
import ProductInfo from '@/components/products/ProductInfo.vue';
import Heading from '@/components/Heading.vue';
import Select from '@/components/ui/select/Select.vue';
import SelectContent from '@/components/ui/select/SelectContent.vue';
import SelectTrigger from '@/components/ui/select/SelectTrigger.vue';
import SelectValue from '@/components/ui/select/SelectValue.vue';
import SelectItem from '@/components/ui/select/SelectItem.vue';
import StarReview from '@/components/products/StarReview.vue';
import AddToCart from '@/components/products/AddToCart.vue';

const reviews = [
  {
    id: 1,
    name: 'Sarah Jenkins',
    avatar: 'https://i.pravatar.cc/150?u=sarah',
    date: 'October 12, 2025',
    rating: 5,
    title: 'Perfect!',
    content: 'Absolutely love this! The build quality is fantastic and it arrived much faster than expected. Worth every penny.'
  },
  {
    id: 2,
    name: 'Michael Chen',
    avatar: 'https://i.pravatar.cc/150?u=michael',
    date: 'September 28, 2025',
    rating: 4,
    title: 'Good, but minor packaging issue',
    content: 'Great product overall. It does exactly what it says it will do. Giving it 4 stars because the packaging was a bit damaged, but the item itself is pristine.'
  },
  {
    id: 3,
    name: 'Emily Rodriguez',
    avatar: 'https://i.pravatar.cc/150?u=emily',
    date: 'September 15, 2025',
    rating: 5,
    title: 'Exceeded my expectations',
    content: 'I was skeptical at first, but this completely exceeded my expectations. The design is sleek and modern.'
  },
  {
    id: 4,
    name: 'David Smith',
    avatar: 'https://i.pravatar.cc/150?u=david',
    date: 'August 02, 2025',
    rating: 5,
    title: 'Amazing gift!',
    content: 'Bought this as a gift for my brother and he uses it every single day. Very happy with this purchase!'
  }
];

const relatedProducts = [
  {
    id: 1,
    name: 'Wireless Noise-Cancelling Headphones',
    category: 'Electronics',
    description: 'Immerse yourself in pure sound with our industry-leading noise cancellation technology.',
    time: 'Ends in 2 days',
    price: '$299.00',
    image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&q=80',
    rating: 4.8
  },
  {
    id: 2,
    name: 'Smart Fitness Watch Series 5',
    category: 'Wearables',
    description: 'Track your health, receive notifications, and stay active with built-in GPS.',
    time: 'Ends in 5 hours',
    price: '$199.99',
    image: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80',
    rating: 4.5
  },
  {
    id: 3,
    name: 'Ultra-Slim Laptop Pro',
    category: 'Computers',
    description: 'Powerful performance packed into a beautifully thin, lightweight aluminum chassis.',
    time: 'Limited Stock',
    price: '$1,299.00',
    image: 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=500&q=80',
    rating: 4.9
  },
  {
    id: 4,
    name: 'Professional DSLR Camera',
    category: 'Photography',
    description: 'Capture stunningly detailed photos and 4K video with our flagship camera.',
    time: 'Sale ends soon',
    price: '$899.00',
    image: 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=500&q=80',
    rating: 4.7
  }
];

defineProps<{
  product: Product
}>();


</script>

<template>

  <Head :title="product.name" />

  <div class="max-w-7xl mx-auto px-5 md:px-10 xl:px-12 py-6 sm:py-16 flex flex-col gap-y-18 w-full">

    <section class="flex flex-col sm:flex-row gap-x-8 lg:gap-x-12">
      <div class="flex flex-col gap-y-4 sm:w-1/2">
        <img v-if="product.thumbnail_url" src="" alt="" />
        <div v-else class="bg-gray-500 h-110 w-full rounded-4xl"></div>
      </div>

      <ProductInfo :product="product" />

    </section>

    <section>
      <Heading variant="large" class="font-inter" title="Reviews" />

      <div class="flex justify-between items-center">
        <span>Showing 1-4 of 24 results</span>

        <div>
          <Select default-value="latest">
            <SelectTrigger>
              <SelectValue />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value="latest">Latest</SelectItem>
              <SelectItem value="highest-rating">Highest Rating</SelectItem>
              <SelectItem value="lowest-rating">Lowest Rating</SelectItem>
            </SelectContent>
          </Select>
        </div>
      </div>

      <div class="mt-8 flex flex-col gap-y-6">
        <div v-for="review in reviews" :key="review.id"
          class="flex flex-col gap-y-3 pb-6 border-b border-gray-100 last:border-0 dark:border-gray-800">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-x-4">
              <img :src="review.avatar" :alt="review.name"
                class="w-10 h-10 rounded-full object-cover bg-gray-200 dark:bg-gray-700" />
              <div class="flex flex-col">
                <span class="font-semibold text-sm">{{ review.name }}</span>
                <span class="text-xs text-gray-500">{{ review.date }}</span>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-y-2">
              <span class="font-bold text-lg">{{ review.title }}</span>
              <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-1">
                {{ review.content }}
              </p>

            <div class="flex gap-x-0.5">
              <StarReview :size="20" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <Heading variant="large" class="font-inter" title="You might also like" />
      
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="item in relatedProducts" :key="item.id" class="flex flex-col group border border-gray-200 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 bg-white dark:bg-gray-900 dark:border-gray-800">
          <!-- Image -->
          <div class="relative h-56 overflow-hidden bg-gray-100 dark:bg-gray-800">
            <img :src="item.image" :alt="item.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />
            <div class="absolute top-3 left-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-gray-900 dark:text-white shadow-sm tracking-wide">
              {{ item.time }}
            </div>
          </div>
          
          <!-- Content -->
          <div class="p-5 flex flex-col flex-grow">
            <span class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1.5">{{ item.category }}</span>
            <h3 class="font-bold text-lg leading-tight mb-2 text-gray-900 dark:text-white line-clamp-1">{{ item.name }}</h3>
            
            <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-5 flex-grow">
              {{ item.description }}
            </p>
            
            <div class="flex items-center justify-between mb-5">
              <span class="font-black text-xl text-gray-900 dark:text-white">{{ item.price }}</span>
              <StarReview variant="mini" :size="14" />
            </div>
            
            <AddToCart class="w-full rounded-xl bg-black hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200" />
          </div>
        </div>
      </div>
    </section>

  </div>
</template>