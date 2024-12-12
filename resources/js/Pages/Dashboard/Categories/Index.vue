<template>
    <Dashboard>
        <header class="bg-white shadow rounded-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard/Categories
                </h2>
            </div>
        </header>
        <div class="max-w-screen-2xl  mx-auto p-8 bg-gray-50 rounded-xl shadow-lg">
            <!-- <h1 class="text-4xl font-semibold text-gray-900 mb-8">Liste des catégories</h1> -->

            <!-- Champ de filtrage -->
            <div class="mb-6 flex justify-between items-center">
                <input type="text" v-model="searchQuery" placeholder="Filtrer les catégories..."
                    class="w-full sm:w-2/3 px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all" />
                <a :href="route('categories.create')"
                    class="inline-block bg-indigo-600 text-white py-3 px-6 ml-4 rounded-lg hover:bg-indigo-700 transition-all">
                    Ajouter une catégorie
                </a>
            </div>
            <div class="mt-8">
                <!-- Grille des catégories -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <div v-for="category in filteredCategories" :key="category.id"
                        class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col">
                        <div class="flex flex-col p-6 space-y-4">
                            <p class="font-semibold text-xl text-gray-800">{{ category.libelle }}</p>
                            <p class="text-gray-600 text-sm">{{ category.description }}</p>
                        </div>

                        <div class="flex justify-between items-center bg-gray-50 p-4">
                            <a :href="route('categories.edit', category.id)"
                                class="text-indigo-600 hover:text-indigo-800 transition-all flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M17.707 2.293a1 1 0 0 1 0 1.414L8.414 13H6v-2l9.293-9.293a1 1 0 0 1 1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Modifier</span>
                            </a>
                            <form @submit.prevent="destroyCategory(category.id)" class="flex items-center">
                                <button type="submit"
                                    class="text-red-600 hover:text-red-800 transition-all flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                    <span>Supprimer</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<script setup>
import { ref, computed } from "vue";
import { Head, usePage } from "@inertiajs/vue3";
import axios from "axios";
import Dashboard from "@/Pages/Dashboard.vue";

const { categories } = usePage().props;

// Variable pour stocker la requête de filtrage
const searchQuery = ref("");

// Fonction pour supprimer une catégorie
const destroyCategory = async (id) => {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?")) {
        try {
            // Faire la requête DELETE pour supprimer la catégorie
            await axios.delete(route("categories.destroy", id));

            // Mettre à jour la liste des catégories après suppression
            const updatedCategories = categories.filter((category) => category.id !== id);

            // Mettre à jour dynamiquement la liste des catégories
            categories.splice(0, categories.length, ...updatedCategories);
            
        Swal.fire({
                icon: 'success',
                title: 'Catégorie supprimée!',
                text: 'Votre catégorie a été supprimée avec succès.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
        } catch (error) {
            console.error("Erreur lors de la suppression :", error);
        }
    }
};

// Computed property pour filtrer les catégories
const filteredCategories = computed(() => {
    if (!searchQuery.value) {
        return categories;
    }
    return categories.filter(
        (category) =>
            category.libelle.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            category.description.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});
</script>
