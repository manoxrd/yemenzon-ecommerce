<script setup lang='ts'>
import { ref } from 'vue';
import type { Product } from '@/types/product.js';
import Heading from '../Heading.vue';
import StarReview from './StarReview.vue';
import ProductPrice from './ProductPrice.vue';
import ProductDescription from './ProductDescription.vue';
import ProductQuantity from './ProductQuantity.vue';
import AddToCart from './AddToCart.vue';

defineProps<{
  product: Product
}>();

const quantity = ref(1);

</script>

<template>
  <div class="py-6 flex flex-col sm:w-1/2">
    <div class="flex flex-col mb-5 gap-y-2">
      <span class="text-sm font-medium tracking-wide text-gray-400 uppercase">
        Electronics
      </span>
      <Heading variant="large" class="font-inter" :title="product.name" />

      <StarReview variant="product" />
    </div>

    <div class="flex flex-col gap-y-3">

      <ProductPrice />

      <ProductDescription>A Great Gaming laptop that is used also for Graphic Design lorme ipsum is here we are trying
        to abolbe this product is what you need wewe</ProductDescription>

        <div class="flex flex-col gap-y-4 mt-6">

          <ProductQuantity v-model="quantity" />
          
          <AddToCart />
        </div>
      </div>

  </div>
</template>