<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Dashboard from '@/Pages/Dashboard.vue';

defineProps(['users']);

// Définissez la méthode pour vérifier l'existence du fichier
const fileExists = (avatar) => {
    // Vérifiez si l'avatar est défini et a une valeur
    if (!avatar) return false;

    // Ici, vous pouvez utiliser une logique pour vérifier l'existence de l'avatar
    // Comme une requête API ou une propriété que vous passez lors de la récupération des utilisateurs.
    // Pour l'instant, supposons que vous avez une méthode pour le faire.

    // Par exemple, vous pourriez faire une requête pour vérifier l'existence du fichier
    return true; // Remplacez cela par votre logique réelle
};

</script>

<template>
    <Dashboard>
        <header class="bg-white shadow rounded-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard / Utilisateurs
                </h2>
            </div>
        </header>

        <!-- Start block -->
        <section>
            <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
                <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="flex-1 flex items-center space-x-2">
                            <h5><span class="text-gray-500">Utilisateurs</span></h5>
                            <h5 class="text-gray-500 ml-1">1-{{ users.length }}</h5>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t">
                        <div class="w-full md:w-1/3">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" placeholder="Rechercher un utilisateur"
                                        required=""
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <Link href="/dashboard/new-user"
                                class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Ajouter un utilisateur
                            </Link>

                        </div>

                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4">Username</th>
                                    <th scope="col" class="p-4">Email</th>
                                    <th scope="col" class="p-4">Date de Naissance</th>
                                    <th scope="col" class="p-4">Dernière Mise à Jour</th>
                                    <th scope="col" class="p-4">Administrateur</th>
                                    <th scope="col" class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id" class="border-b hover:bg-gray-100">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center mr-3">

                                            <img v-if="user.avatar && fileExists(user.avatar)"
                                                :src="`/storage/${user.avatar}`" alt="Avatar" class="h-8 w-auto mr-3">
                                            <img v-else src="/storage/avatars/jaXCAEW15ldqnJi8d0UHwQkHVYmKPNEjhjS01J1l.jpg" alt="Default Avatar"
                                                class="h-8 rounded-full w-auto mr-3">
                                            {{ user.name }}
                                        </div>
                                    </th>
                                    <td class="px-4 py-3">
                                        <span
                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-0.5 rounded">{{
                                                user.email }}</span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ user.birthdate }}
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ user.updated_at }}
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <span :class="[user.isAdmin ? 'bg-green-100' : 'bg-red-100' ]"
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">
                                            {{ user.isAdmin ? 'Oui' : 'Non' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex items-center space-x-4">
                                            <button type="button" data-drawer-target="drawer-update-product"
                                                data-drawer-show="drawer-update-product"
                                                aria-controls="drawer-update-product"
                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </button>
                                            <button type="button" data-drawer-target="drawer-read-product-advanced"
                                                data-drawer-show="drawer-read-product-advanced"
                                                aria-controls="drawer-read-product-advanced"
                                                class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                                Preview
                                            </button>
                                            <button type="button" data-modal-target="delete-modal"
                                                data-modal-toggle="delete-modal"
                                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                    viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- End block -->
    </Dashboard>
</template>
