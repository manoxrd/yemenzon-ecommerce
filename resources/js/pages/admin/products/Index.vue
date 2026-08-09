<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import ProductPrice from '@/components/products/ProductPrice.vue';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import Separator from '@/components/ui/separator/Separator.vue';
import { create } from '@/routes/admin/products';
import { edit } from '@/routes/admin/products';
import { show } from '@/routes/products';
import type { Product } from '@/types';
defineOptions({
  layout: {
    breadcrumbs: [
      {
        title: 'All Products',
        href: '/products',
      },
    ],
  },
});

defineProps<{
  products: Product[];
}>();

</script>

<template>

  <Head title="Products"></Head>

  <div class="flex flex-col gap-y-6 py-4">
    <div class="flex gap-x-3 px-5">
      <div class="flex flex-col gap-y-2">
        <Label for="search">Search</Label>
        <Input id="search" name="search" />
        <InputError />
      </div>

      <div>
        <div>Categories filter</div>
        <div>Stocks filter</div>
        <div>Sorting Options</div>
      </div>

      <div>
        <Button>
          <Link class="" :href="create().url">Create</Link>
        </Button>
      </div>
    </div>

    <Separator class="mx-2" />

    <div class="px-5">
      <div class="w-full overflow-x-auto rounded-lg border border-gray-200 dark:border-sidebar-border">
        <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
          <thead
            class="border-b border-gray-200 bg-gray-50 text-gray-700 dark:border-sidebar-border dark:bg-sidebar dark:text-gray-200">
            <tr>
              <th scope="col" class="w-16 px-4 py-3">
                <span class="sr-only">Image</span>
              </th>
              <th scope="col" class="px-4 py-3 font-medium">Product Name</th>
              <th scope="col" class="px-4 py-3 font-medium">Category</th>
              <th scope="col" class="px-4 py-3 font-medium">
                Price
              </th>
              <th scope="col" class="px-4 py-3 font-medium">
                Stock
              </th>
              <th scope="col" class="px-4 py-3 text-center font-medium">
                Actions
              </th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="product in products" :key="product.id"
              class="border-b border-gray-100 transition-colors last:border-0 hover:bg-gray-50 dark:border-sidebar-border/50 dark:hover:bg-sidebar-accent/50">
              <td class="px-4 py-3">
                <img src="https://placehold.co/100x100?text=Photo" alt="Product Image"
                  class="h-10 w-10 rounded-md border border-gray-200 object-cover dark:border-gray-700" />
              </td>
              <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
                <Link :href="show.url(product.slug)">
                  {{ product.name }}
                </Link>
              </td>
              <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                {{ product.category?.name }}
              </td>
              <td class="px-4 py-3">
                <ProductPrice variant="base" :price="product.price" />
              </td>
              <td class="pr-4 py-3 text-center">
                {{ product.stock }}
              </td>
              <td class="px-4 py-3 text-center">
                <Link
                  :href="edit.url(product.id)"
                  class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                >
                  Edit
                </Link>
              </td>
            </tr>

            <tr v-if="products.length === 0">
              <td colspan="6" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                No products found.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
