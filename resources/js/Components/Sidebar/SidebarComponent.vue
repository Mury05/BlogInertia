<script setup>
import ApplicationLogo from "../ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <aside class="hidden sm:flex sm:flex-col">
    <Link
      :href="route('dashboard')"
      class="gap-1 inline-flex items-center justify-center h-16 w-52 text-white text-xl font-bold font-mon hover:bg-indigo-50 focus:bg-indigo-100"
    >
      <ApplicationLogo class="block h-9 w-auto fill-indigo-600 text-gray-800" />
      <span class="font-bold text-indigo-600">ArtLog</span>
    </Link>
    <div class="flex-grow pt-20 flex flex-col justify-between text-gray-500 bg-indigo-50">
      <nav class="flex flex-col my-6 space-y-4">
        <Link
          href="/dashboard/"
          class="inline-flex items-center justify-center py-3 border-y border-l border-indigo-300 rounded-s-md hover:bg-indigo-50"
          :class="{
            'text-indigo-600 bg-gray-100 rounded-s-sm': route().current('dashboard'),
          }"
        >
          <span class="sr-only">Articles</span>
          <div class="flex gap-2">
            <svg
              aria-hidden="true"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"
              />
            </svg>
            <div class="font-medium">Articles</div>
          </div>
        </Link>

        <Link
          href="/dashboard/users"
          class="inline-flex items-center justify-center py-3 border-y border-indigo-300 rounded-s-md hover:bg-indigo-50"
          :class="{
            'text-indigo-600 bg-gray-100 rounded-s-sm': route().current(
              'dashboard.users.index'
            ),
          }"
        >
          <span class="sr-only">Users</span>
          <div class="flex gap-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
              />
            </svg>
            <div class="font-medium">Utilisateurs</div>
          </div>
        </Link>

        <Link
          href="/dashboard/new-job"
          class="inline-flex items-center justify-center py-3 border-y border-indigo-300 rounded-s-md hover:bg-indigo-50"
          :class="{
            'text-indigo-600 bg-gray-100 rounded-s-sm': route().current(
              'dashboard.new-job'
            ),
          }"
        >
          <span class="sr-only">New Job</span>
          <div class="flex gap-3">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 4.5v15m7.5-7.5h-15"
              />
            </svg>
            <div class="font-medium">Job</div>
          </div>
        </Link>

        <Link
          href="/dashboard/profile"
          class="inline-flex items-center justify-center py-3 border-y border-indigo-300 rounded-s-md hover:bg-indigo-50"
          :class="{
            'text-indigo-600 bg-gray-100 rounded-s-sm': route().current(
              'dashboard.profile'
            ),
          }"
        >
          <span class="sr-only">Profile</span>
          <div class="flex gap-2">
            <svg
              aria-hidden="true"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              class="h-6 w-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
              />
            </svg>
            <div class="font-medium">Profile</div>
          </div>
        </Link>

        <Link
          href="/categories"
          class="inline-flex items-center justify-center py-3 border-y border-indigo-300 rounded-s-md hover:bg-indigo-50"
          :class="{
            'text-indigo-600 bg-gray-100 rounded-s-sm': route().current(
              'dashboard.profile'
            ),
          }"
        >
          <span class="sr-only">Catégories</span>
          <div class="flex gap-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#666666"
            >
              <path
                d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"
              />
            </svg>
            <div class="font-medium">Catégories</div>
          </div>
        </Link>
      </nav>
    </div>
  </aside>
</template>

<style scoped></style>
