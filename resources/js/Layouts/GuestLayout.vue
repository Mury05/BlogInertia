<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <!-- <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-indigo-600 text-gray-500" />
            </Link> -->
            <Link href="/"
            class="gap-1 inline-flex items-center justify-center h-16 w-52 text-gray-800 text-2xl font-bold">
        <ApplicationLogo class="block h-20 w-20 fill-indigo-600" />
        <span class="font-bold text-indigo-600">ArtLog</span>
        </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-xl sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
