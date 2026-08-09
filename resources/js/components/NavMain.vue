<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
  SidebarGroup,
  SidebarGroupLabel,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from '@/components/ui/sidebar';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import type { NavItem } from '@/types';

defineProps<{
  items: NavItem[];
}>();

const { isCurrentOrParentUrl, isCurrentUrl } = useCurrentUrl();
</script>

<template>
  <SidebarGroup class="px-2 py-0">
    <SidebarGroupLabel>Platform</SidebarGroupLabel>
    <SidebarMenu>
      <SidebarMenuItem v-for="item in items" :key="item.title">
        <SidebarMenuButton :class="{
          'data-[active=true]:rounded-b-none': item.subLinks?.length
          }" as-child
          :is-active="isCurrentOrParentUrl(item.href)" :tooltip="item.title">

          <Link :href="item.href">

            <component :is="item.icon" />
            <span>{{ item.title }}</span>

          </Link>

          <Transition enter-active-class="transition-all duration-300" enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0" leave-active-class="transition-all duration-100"
            leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 -translate-y-2">

            <div class="bg-sidebar-accent/50 rounded-b-md border-sidebar-accent-foreground border-t"
              v-if="isCurrentOrParentUrl(item.href) && item.subLinks?.length">
              <ul class="rounded-b-xl">
                <SidebarMenuItem v-for="subLink in item.subLinks" :key="subLink.title">
                  <SidebarMenuButton as-child>

                    <Link :class="{
                      'text-sm p-5': true,
                      'bg-sidebar-accent': isCurrentUrl(subLink.href)
                    }" :href="subLink.href">
                      <component :is="subLink.icon" />
                      <span>{{ subLink.title }}</span>
                    </Link>
                  </SidebarMenuButton>
                </SidebarMenuItem>
              </ul>
            </div>

          </Transition>
        </SidebarMenuButton>
      </SidebarMenuItem>
    </SidebarMenu>
  </SidebarGroup>
</template>
