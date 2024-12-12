<template>
    <Dashboard>
        <Head title="Edit Category" />
    <header class="bg-white shadow rounded-md">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard / Categories / Editer une catégorie
            </h2>
        </div>
    </header>
  <div class="flex items-center justify-center p-6 ">
    <div class="max-w-3xl w-full bg-white p-6 rounded-lg shadow-lg">
      <!-- <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modifier la catégorie</h1> -->
      <form @submit.prevent="submit" class="space-y-6">
        <Link href="/dashboard/categories">
                    <div class="py-3 text-indigo-600">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </div>

                </Link>
        <!-- Libellé Input -->
        <div>
          <label for="libelle" class="block text-lg font-medium text-gray-700"
            >Libellé</label
          >
          <input
            v-model="form.libelle"
            id="libelle"
            type="text"
            class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
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
            class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Entrez une description de la catégorie"
          />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button
            type="submit"
            class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition-all"
          >
            Mettre à jour
          </button>
        </div>
      </form>
    </div>
  </div>
</Dashboard>
</template>

<script setup>
import Dashboard from "@/Pages/Dashboard.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
const props = defineProps({
  category: Object,
});

const form = useForm({
  libelle: props.category.libelle,
  description: props.category.description,
});

const submit = () => {
  form.put(route("categories.update", props.category.id), {
    onSuccess: () => {
        Swal.fire({
                icon: 'success',
                title: 'Catégorie modifié!',
                text: 'Votre catégorie a été modifié avec succès.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
    },
  });
};
</script>
