<template>
 <Dashboard>
<header class="bg-white shadow rounded-md">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dashboard / Articles
        </h2>
    </div>
</header>
  <div class="px-2 mx-2 rounded-sm bg-white min-h-screen flex flex-col items-center justify-start">
    <div class="flex justify-end w-full mr-8" >

        <Link :href="route('dashboard.articles.create')" >

        <button class="py-3 px-8 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
                            Ajouter un article
                        </button>
                    </Link>
    </div>
    <!-- Si aucun article n'est trouvé -->
    <div v-if="articles.length === 0" class="text-gray-600">
      Aucun article trouvé.
    </div>

    <!-- Si des articles sont présents -->
    <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
      <div v-for="article in articles" :key="article.id"
        class="relative mb-6 bg-white shadow-2xl rounded-lg p-10 overflow-hidden w-full">

        <!-- Contenu de l'article -->
        <div class="flex w-full justify-between items-center mb-6">

          <!-- Titre de l'article avec largeur de 70% et espacement avec le bouton -->
          <h3 class="text-3xl font-bold text-gray-800 w-7/10 mr-4">{{ article.title }}</h3>

          <!-- Bouton de commentaires avec largeur de 30% et espacement avec le svg -->
          <div class="w-3/10 flex justify-end">
            <Link :href="route('articles.show', article.id)" method="get" as="button" type="button"
              class="relative inline-flex items-center justify-center p-2 text-sm font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
              </svg>
              <span class="sr-only">Notifications</span>
              Commentaires
              <div
                class="absolute inline-flex items-center justify-center w-5 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
                {{ article.comments.length }}
              </div>
            </Link>
          </div>
        </div>

        <!-- Corps de l'article -->
        <p class="text-gray-700 mt-6 text-lg leading-relaxed"  v-html="article.body"></p>

        <!-- Catégorie -->
        <div class="mt-6 text-sm text-gray-500">
          Catégorie : <span class="font-semibold">{{ article.category.libelle }}</span>
        </div>

        <!-- Lien Voir Plus -->
        <Link :href="route('articles.show', article.id)" as="button" type="button"
          class="w-full py-3 bg-indigo-500 text-white font-medium rounded-lg hover:bg-indigo-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300 mt-4">
          Voir plus...
        </Link>
      </div>
    </div>
  </div>
</Dashboard>

</template>

<script setup>
import MaNav from '@/Layouts/MaNav.vue';
import Dashboard from '@/Pages/Dashboard.vue';
import { Link } from '@inertiajs/vue3'

// Propriétés passées par Laravel via Inertia
defineProps({
  articles: Array,
});
</script>

<style scoped>
/* Styles supplémentaires si nécessaire */
</style>
