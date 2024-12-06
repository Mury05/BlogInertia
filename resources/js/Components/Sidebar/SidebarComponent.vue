<script setup>
import ApplicationLogo from '../ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <aside class="hidden sm:flex sm:flex-col bg-[#f8faf] shadow-md rounded-lg p-4">
        <Link :href="route('dashboard')"
              class="gap-1 inline-flex items-center justify-center h-16 w-52 text-gray-800 text-2xl font-bold hover:bg-indigo-100 transition-colors duration-300">
            <ApplicationLogo class="block h-10 w-auto fill-indigo-600" />
            <span class="font-bold text-indigo-600">ArtLog</span>
        </Link>
        <div class="flex-grow pt-8 flex flex-col justify-between text-gray-500">
            <nav class="flex flex-col my-6 space-y-2">
                <Link
                    :href="route('dashboard.articles.index')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.articles.index') }">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    <span class="font-medium">Articles</span>
                </Link>

                <Link
                    :href="route('dashboard.users.index')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.users.index') }">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="font-medium">Utilisateurs</span>
                </Link>

                <Link
                    href="/dashboard/new-job"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.new-job') }">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="font-medium">Job</span>
                </Link>

                <Link
                    :href="route('profile.edit')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.profile') }">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="font-medium">Profile</span>
                </Link>
            </nav>
        </div>
    </aside>
</template>

<style scoped>
nav a.active {
    background-color: rgba(99, 102, 241, 0.2); /* Couleur active */
    color: #4f46e5; /* Couleur du texte active */
}

nav a svg {
    color: #4f46e5; /* Couleur des icônes */
}
</style>
