<script setup lang='ts'>
import { Link } from '@inertiajs/vue3';
import { ChevronLeft } from '@lucide/vue';
import { ChevronRight } from '@lucide/vue';
import { Ellipsis } from '@lucide/vue';

defineProps<{
  next_page_url: string;
  prev_page_url: string;
  current_page: number;
  total: number;
  last_page: number;
  first_page_url: string;
  last_page_url: string;
  links: []
}>();

</script>

<template>

  <div class="flex items-center justify-center py-10 gap-x-4">
    <Link :href="prev_page_url ?? ''" :class="{
      'text-muted-foreground opacity-50 pointer-events-none': !prev_page_url
    }
      ">
      <ChevronLeft />
    </Link>

    <Link v-if="current_page > 1" :href="first_page_url" class="flex items-center justify-center">
      1</Link>

    <p v-if="current_page > 2" class="text-muted-foreground">
      <Ellipsis :size="18" />
    </p>

    <Link v-if="current_page > 2" :href="links[current_page - 1]['url']">{{
      current_page - 1 }}</Link>

    <div class="flex bg-accent size-8 rounded-full items-center justify-center">{{ current_page }}</div>


    <Link v-if="current_page < last_page" :href="links[current_page + 1]['url']">{{
      current_page + 1 }}</Link>

    <p v-if="current_page < last_page - 1" class="text-muted-foreground">
      <Ellipsis :size="18" />
    </p>

    <Link v-if="current_page < last_page - 1" :href="last_page_url" class="flex items-center justify-center">
      {{ last_page }}</Link>

    <Link :href="next_page_url ?? ''" :class="{
      'text-muted-foreground opacity-50 pointer-events-none': !next_page_url
    }
      ">
      <ChevronRight />
    </Link>
  </div>

</template>