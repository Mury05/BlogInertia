<template>
    <MaNav />
    
    <div class="p-8 bg-white min-h-screen flex flex-col items-center justify-start">
      <h1 class="text-4xl font-extrabold text-center text-black mb-12">
        Créer un nouvel article
      </h1>
  
      <form @submit.prevent="submit" class="w-full max-w-lg">
        <div class="mb-4">
          <label for="title" class="block text-sm font-semibold text-gray-800">Titre</label>
          <input
            v-model="form.title"
            type="text"
            id="title"
            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg"
            required
          />
        </div>
  
        <div class="mb-4">
          <label for="body" class="block text-sm font-semibold text-gray-800">Contenu</label>
          <textarea
            v-model="form.body"
            id="body"
            rows="4"
            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg"
            required
          ></textarea>
        </div>
  
        <div class="mb-4">
          <label for="category" class="block text-sm font-semibold text-gray-800">Catégorie</label>
          <select
            v-model="form.category"
            id="category"
            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg"
            required
          >
            <option value="" disabled>Sélectionner une catégorie</option>
            <option v-for="category in categories" :key="category.id" :value="category.id">
              {{ category.libelle }}
            </option>
          </select>
        </div>
  
        <button
          type="submit"
          class="w-full py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300"
        >
          Créer l'article
        </button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { usePage, useForm } from '@inertiajs/vue3';
  import MaNav from '@/Layouts/MaNav.vue';
  
  // Récupérer les catégories passées par Laravel via Inertia
  const { categories } = usePage().props;
  
  const form = useForm({
    title: '',
    body: '',
    category: '',
  });
  
  const submit = () => {
    form.post(route('articles.store'), {
      onSuccess: () => {
        form.reset();
        alert('Article créé avec succès');
      },
    });
  };
  </script>
  