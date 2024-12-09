<template>
  <div class="min-h-screen flex items-center justify-center p-6 bg-gray-100">
    <div class="max-w-3xl w-full bg-white p-6 rounded-lg shadow-lg">
      <h1 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter une catégorie</h1>
      <form @submit.prevent="submit" class="space-y-6">
        <!-- Libellé Input -->
        <div>
          <label for="libelle" class="block text-lg font-medium text-gray-700"
            >Libellé</label
          >
          <input
            v-model="form.libelle"
            id="libelle"
            type="text"
            class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Entrez le libellé de la catégorie"
          />
        </div>

        <!-- Description Input -->
        <div>
          <label for="description" class="block text-lg font-medium text-gray-700"
            >Description</label
          >
          <input
            v-model="form.description"
            id="description"
            type="text"
            class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Entrez une description de la catégorie"
          />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button
            type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-all"
          >
            Enregistrer
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

// Récupérer les catégories depuis les props
const { categories } = usePage().props;

const form = useForm({
  libelle: "",
  description: "",
});

const submit = () => {
  form.post(route("categories.store"), {
    onSuccess: (response) => {
      // Ajouter la catégorie nouvellement créée en haut de la liste
      categories.unshift(response.props.category);
      alert("Catégorie créée avec succès !"); // Ajouter la catégorie en haut
    },
  });
};
</script>
