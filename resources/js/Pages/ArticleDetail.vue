<template>
  <MaNav />
  <div class="p-8 bg-white min-h-screen flex justify-center">
    <div class="bg-white p-8 rounded-xl shadow-2xl max-w-5xl w-full">
      <!-- Titre de l'article -->
      <h1 class="text-4xl font-extrabold text-center text-black mb-6 text-shadow-lg">
        Titre captivant de l'article
      </h1>

      <!-- Contenu de l'article -->
      <p class="text-gray-800 text-lg mb-8 leading-relaxed text-justify border-l-4 pl-4 border-blue-500">
        Voici le contenu de l'article. Il décrit des informations intéressantes, qui captent l'attention du lecteur.
        L'article peut être aussi long que nécessaire pour expliquer en profondeur chaque aspect du sujet.
      </p>

      <!-- Détail de publication -->
      <div class="text-center mb-6">
        <small class="text-gray-600 text-sm italic">
          Publié le : <span class="text-blue-500">5 Décembre 2024</span> par
          <span class="font-semibold text-blue-500">John Doe</span>
        </small>
      </div>

      <!-- Boutons Éditer et Supprimer -->
      <!-- <div class="flex justify-center gap-4">
        <Link href="/edit" method="get" as="button" type="button"
          class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">Éditer</Link>
        <Link href="/edit" method="get" as="button" type="button"
          class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-red-300">Supprimer</Link>
      </div> -->

      <!-- Section commentaires -->
      <div class="mt-10 border-t-4 border-blue-500 pt-6">
        <Comments />
      </div>
    </div>
  </div>
</template>

<script setup>
import Comments from './Comments.vue';
import MaNav from '@/Layouts/MaNav.vue';
// import { Link } from '@inertiajs/vue3';
</script>

<style scoped>

.text-shadow-lg {
  text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
}
</style>
