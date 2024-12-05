<template>
  <MaNav/>
  <div class="p-8 bg-white min-h-screen">
    <h1 class="text-4xl font-extrabold text-center text-black mb-12">
      Articles captivants pour vous inspirer
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
      <div v-for="article in articles" :key="article.id"
        class="group relative bg-gray-100 shadow-lg rounded-xl transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <!-- Animation à l'intérieur -->
        <div class="p-6 h-full flex flex-col justify-between">
          <div>
            <h2 class="text-xl font-semibold text-black mb-3 group-hover:text-blue-600 transition duration-300 " style="width:300px">
              {{ article.title }}
            </h2>
            <p class="text-gray-700 mb-6">
              {{ article.content }}
            </p>
          </div>
          <router-link :to="`/article/${article.id}`">
            <button
              class="w-full py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
              Voir plus
            </button>
          </router-link>
        </div>
        <!-- Design coin supérieur -->
        <div
          class="absolute top-0 right-0 h-12 w-12rounded-br-xl transform -translate-x-3 translate-y-3 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300">
          <button type="button"
            class="relative inline-flex items-center px-6 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 16">
              <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
              <path
                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
            </svg>
            <span class="sr-only">Notifications</span>
            Commentaires
            <div
              class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2">
              8
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

import MaNav from '@/Layouts/MaNav.vue';

import { ref } from 'vue';

const articles = ref([
  {
    id: 1,
    title: "Comment maîtriser votre temps efficacement",
    content:
      "Découvrez des stratégies simples mais puissantes pour prendre le contrôle de vos journées."
  },
  {
    id: 2,
    title: "Les bienfaits de la méditation quotidienne",
    content:
      "Explorez comment quelques minutes par jour peuvent transformer votre mental et votre bien-être."
  },
  {
    id: 3,
    title: "Créer un espace qui favorise la créativité",
    content:
      "Apprenez à organiser et décorer votre environnement pour encourager l’innovation."
  },
  {
    id: 4,
    title: "Manger mieux sans se priver",
    content:
      "Adoptez une approche équilibrée pour savourer vos repas tout en restant en forme."
  },
  {
    id: 5,
    title: "Pourquoi la gratitude change tout",
    content:
      "Découvrir les impacts positifs d'une simple pratique de reconnaissance sur votre vie."
  },
  {
    id: 6,
    title: "Faire des pauses : une clé pour plus de productivité",
    content:
      "Les pauses stratégiques ne vous ralentissent pas, elles vous boostent."
  }
]);

</script>

<style scoped></style>
