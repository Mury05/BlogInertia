<template>
  <div class="max-w-7xl mx-auto p-8 bg-gray-50 rounded-xl shadow-lg">
    <h1 class="text-4xl font-semibold text-gray-900 mb-8">Liste des catégories</h1>

    <!-- Champ de filtrage -->
    <div class="mb-6 flex justify-between items-center">
      <input
        type="text"
        v-model="searchQuery"
        placeholder="Filtrer les catégories..."
        class="w-full sm:w-2/3 px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
      />
      <a
        :href="route('categories.create')"
        class="inline-block bg-blue-600 text-white py-3 px-6 ml-4 rounded-lg hover:bg-blue-700 transition-all"
      >
        Ajouter une catégorie
      </a>
    </div>

    <div class="mt-8">
      <!-- Grille des catégories -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <div
          v-for="category in filteredCategories"
          :key="category.id"
          class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col"
        >
          <div class="flex flex-col p-6 space-y-4">
            <p class="font-semibold text-xl text-gray-800">{{ category.libelle }}</p>
            <p class="text-gray-600 text-sm">{{ category.description }}</p>
          </div>

          <div class="flex justify-between items-center bg-gray-50 p-4">
            <a
              :href="route('categories.edit', category.id)"
              class="text-blue-600 hover:text-blue-800 transition-all flex items-center space-x-2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M17.707 2.293a1 1 0 0 1 0 1.414L8.414 13H6v-2l9.293-9.293a1 1 0 0 1 1.414 0z"
                  clip-rule="evenodd"
                />
              </svg>
              <span>Modifier</span>
            </a>
            <form
              @submit.prevent="destroyCategory(category.id)"
              class="flex items-center"
            >
              <button
                type="submit"
                class="text-red-600 hover:text-red-800 transition-all flex items-center space-x-2"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M6 2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm2 2v12h6V4H8z"
                    clip-rule="evenodd"
                  />
                </svg>
                <span>Supprimer</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import axios from "axios";

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
