<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Dashboard from '@/Pages/Dashboard.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import 'dayjs/locale/fr';

dayjs.extend(relativeTime);
dayjs.locale('fr');

defineProps(['user']);

// Vérifie si le fichier de l'avatar existe
const fileExists = (avatar) => {
    return !!avatar; // Retourne true si l'avatar existe
};
</script>

<template>
    <Dashboard>
        <header class="bg-white shadow rounded-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    DAshboard / Utilisateur / Profil de l'utilisateur
                </h2>
            </div>
        </header>

        <section>
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                    <Link href="/dashboard/users">
                    <div class="py-3 text-indigo-600">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </div>

                    </Link>
                    <div class="flex items-center space-x-6">
                        <div>
                            <img v-if="user.avatar && fileExists(user.avatar)" :src="`/storage/${user.avatar}`"
                                alt="Avatar de l'utilisateur" class="h-24 w-24 rounded-full object-cover shadow-md">
                            <svg v-else class="h-24 w-24 rounded-full border-2 border-indigo-600 p-2 shadow-md"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div
                            class="flex flex-col justify-between p-4 rounded-lg">
                            <!-- Informations de l'utilisateur -->
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ user.name }}</h3>
                                <p class="text-sm text-gray-500">{{ user.email }}</p>
                            </div>

                            <!-- Détails supplémentaires -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <span class="text-gray-500 text-sm">Date de naissance :</span>
                                    <span class="ml-2 font-medium text-gray-800">{{ user.birthdate ?? 'Non renseignée'
                                        }}</span>
                                </div>

                                <div class="flex items-center">
                                    <span class="text-gray-500 text-sm">Dernière mise à jour :</span>
                                    <span class="ml-2 font-medium text-gray-800">{{ dayjs(user.updated_at).fromNow()
                                        }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-500 text-sm">Administrateur :</span>
                                    <span
                                        :class="[user.isAdmin ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800']"
                                        class="ml-2 text-xs font-semibold px-2 py-1 rounded-full">
                                        {{ user.isAdmin ? 'Oui' : 'Non' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </Dashboard>
</template>
