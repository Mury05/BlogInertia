<script setup>
import ApplicationLogo from "../ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <aside class="hidden sm:flex sm:flex-col bg-[#f8faf] shadow-md rounded-lg p-4">
        <Link :href="route('articles')"
            class="gap-1 inline-flex items-center justify-center h-16 w-52 text-gray-800 text-2xl font-bold hover:bg-indigo-100 transition-colors duration-300">
        <ApplicationLogo class="block h-10 w-auto fill-indigo-600" />
        <span class="font-bold text-indigo-600">ArtLog</span>
        </Link>
        <div class="flex-grow pt-8 flex flex-col justify-between text-gray-500">
            <nav class="flex flex-col my-6 space-y-2">
                <Link :href="route('home')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('home') }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap=" round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                <span class="font-medium">Home</span>
                </Link>
                <Link :href="route('dashboard.articles.index')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.articles.index') }">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <span class="font-medium">Articles</span>
                </Link>

                <Link :href="route('dashboard.users.index')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.users.index') }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>


                <span class="font-medium">Utilisateurs</span>
                </Link>


                <Link :href="route('categories.index')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('categories.index') }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>


                <span class="font-medium">Categories</span>
                </Link>
                <Link :href="route('profile.edit')"
                    class="flex items-center justify-start p-3 rounded-md hover:bg-indigo-100 transition-colors duration-300"
                    :class="{ 'text-indigo-600 bg-indigo-200': route().current('dashboard.profile') }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

                <span class="font-medium">Profile</span>
                </Link>
            </nav>
        </div>
    </aside>
</template>

<style scoped>
nav a.active {
    background-color: rgba(99, 102, 241, 0.2);
    /* Couleur active */
    color: #4f46e5;
    /* Couleur du texte active */
}

nav a svg {
    color: #4f46e5;
    /* Couleur des icônes */
}
</style>
