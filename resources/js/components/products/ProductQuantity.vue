<script setup lang='ts'>
// import { ref } from 'vue';
import { Plus } from '@lucide/vue';
import { Minus } from '@lucide/vue';
import Input from '../ui/input/Input.vue';

const quantity = defineModel({
  type: Number,
  default: 1
});

function increment() {
  quantity.value++; 
}

function decrement() {
  if(quantity.value > 1) {
    quantity.value--;
  }
}
</script>

<template>
  <div class="flex gap-x-3 overflow-hidden items-center justify-between border-2 rounded-xl">
    <button v-on:click="increment()" class="px-5 py-2 cursor-pointer border-r-2 hover:bg-gray-100 transition-all duration-400">
      <Plus />
    </button>

    <Input class="border-none text-center focus-visible:ring-[0] shadow-none" v-model="quantity" />

    <button v-on:click="decrement()" class="px-5 py-2 cursor-pointer border-l-2 hover:bg-gray-100 transition-all duration-400">
      <Minus />
    </button>
  </div>
</template>