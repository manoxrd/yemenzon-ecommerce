<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard, login } from '@/routes';
/* @chisel-registration */
import { register } from '@/routes';
/* @end-chisel-registration */

</script>

<template>

  <Head title="Welcome">
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  </Head>

  <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 lg:p-8 dark:bg-[#0a0a0a]">
    <header class="mb-6 w-full max-w-[335px] text-sm not-has-[nav]:hidden lg:max-w-4xl">
      <nav class="flex items-center justify-between gap-4">
        <div class="text-amber-400 text-2xl">
          Yemenzon
        </div>
        <div>
          <Link v-if="$page.props.auth.user && $page.props.auth?.user?.role == 'admin'" :href="dashboard()"
            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
            Dashboard
          </Link>
          <template v-if="!$page.props.auth.user">
            <Link :href="login()"
              class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
              Log in
            </Link>
            <!-- @chisel-registration -->
            <Link :href="register()"
              class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]">
              Register
            </Link>
            <!-- @end-chisel-registration -->
          </template>
        </div>
      </nav>
    </header>
    <div>
    </div>
  </div>
</template>
