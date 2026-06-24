<script setup lang="ts">
// import { ref } from 'vue';
import { Plus } from '@lucide/vue';
import { Minus } from '@lucide/vue';
import Input from '../ui/input/Input.vue';

const quantity = defineModel({
  type: Number,
  default: 1,
});

function increment() {
  quantity.value++;
}

function decrement() {
  if (quantity.value > 1) {
    quantity.value--;
  }
}
</script>

<template>
  <div
    class="flex items-center justify-between gap-x-3 overflow-hidden rounded-xl border-2"
  >
    <button
      v-on:click="increment()"
      class="cursor-pointer border-r-2 px-5 py-2 transition-all duration-400 hover:bg-gray-100"
    >
      <Plus />
    </button>

    <Input
      class="border-none text-center shadow-none focus-visible:ring-[0]"
      v-model="quantity"
    />

    <button
      v-on:click="decrement()"
      class="cursor-pointer border-l-2 px-5 py-2 transition-all duration-400 hover:bg-gray-100"
    >
      <Minus />
    </button>
  </div>
</template>
