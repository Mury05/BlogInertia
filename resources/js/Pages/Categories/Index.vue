<template>
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Liste des catégories</h1>

    <a
      :href="route('categories.create')"
      class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all mb-4"
    >
      Ajouter une catégorie
    </a>

    <div class="mt-8">
      <!-- Grille des catégories -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="category in categories"
          :key="category.id"
          class="bg-white shadow-md rounded-lg p-4 flex flex-col"
        >
          <div class="flex flex-col mb-4">
            <p class="font-semibold text-lg text-gray-800">{{ category.libelle }}</p>
            <p class="text-gray-600">{{ category.description }}</p>
          </div>

          <div class="flex space-x-4">
            <a
              :href="route('categories.edit', category.id)"
              class="text-blue-500 hover:text-blue-700 transition-all flex items-center"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 mr-1"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M17.707 2.293a1 1 0 0 1 0 1.414L8.414 13H6v-2l9.293-9.293a1 1 0 0 1 1.414 0z"
                  clip-rule="evenodd"
                />
              </svg>
              Modifier
            </a>
            <form @submit.prevent="destroyCategory(category.id)">
              <button
                type="submit"
                class="text-red-500 hover:text-red-700 transition-all flex items-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 mr-1"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M6 2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm2 2v12h6V4H8z"
                    clip-rule="evenodd"
                  />
                </svg>
                Supprimer
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const { categories } = usePage().props;

const destroyCategory = async (id) => {
  if (confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?")) {
    await axios.delete(route("categories.destroy", id));

    // Recharger la liste des catégories
    await Inertia.get(route("categories.index"));
  }
};

const addCategory = (category) => {
  // Ajoute la nouvelle catégorie en haut de la liste
  categories.unshift(category);
};
</script>
