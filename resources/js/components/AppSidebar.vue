<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Boxes, LayoutGrid, PackagePlus, Trash2, ChartBarStacked } from '@lucide/vue';
import AppLogo from '@/components/AppLogo.vue';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarHeader,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes/admin';
import { index as categoriesIndex } from '@/routes/admin/categories';
import { index as productsIndex } from '@/routes/admin/products';
import { trash } from '@/routes/admin/products';
import { create } from '@/routes/admin/products';
import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
  {
    title: 'Dashboard',
    href: dashboard(),
    icon: LayoutGrid,
  },
  {
    title: 'Products',
    href: productsIndex(),
    icon: Boxes,
    subLinks: [

      {
        title: 'All Products',
        href: productsIndex(),
        icon: Boxes
      },
      {
        title: 'Create Product',
        href: create(),
        icon: PackagePlus
      },
      {
        title: 'Trashed Products',
        href: trash(),
        icon: Trash2

      }
    ]
  },
  {
    title: 'Categories',
    href: categoriesIndex(),
    icon: ChartBarStacked,
  }
];

const footerNavItems: NavItem[] = [];
</script>

<template>
  <Sidebar collapsible="icon" variant="inset">
    <SidebarHeader>
      <SidebarMenu>
        <SidebarMenuItem>
          <SidebarMenuButton size="lg" as-child>
            <Link :href="dashboard()">
              <AppLogo />
            </Link>
          </SidebarMenuButton>
        </SidebarMenuItem>
      </SidebarMenu>
    </SidebarHeader>

    <SidebarContent>
      <NavMain :items="mainNavItems" />
    </SidebarContent>

    <SidebarFooter>
      <NavFooter :items="footerNavItems" />
      <NavUser />
    </SidebarFooter>
  </Sidebar>
  <slot />
</template>
