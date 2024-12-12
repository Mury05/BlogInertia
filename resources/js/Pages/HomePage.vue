<template>
    <MaNav />
    <main class="bg-gray-50 dark:bg-gray-900 py-16 px-6 sm:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto space-y-12">
            <!-- Section de bienvenue -->
            <section class="text-center bg-white dark:bg-gray-800 shadow-md rounded-xl p-8">
                <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">
                    Bienvenue dans notre blog d'articles !
                </h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                    Organisez et gérez vos articles de manière simple et efficace.
                </p>
                <div class="mt-8">
                    <Link href="/articles" method="get" as="button" type="button"
                        class="py-3 px-8 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all duration-300">
                    Commencer à gérer
                    </Link>
                </div>
            </section>

            <!-- Section des articles récents -->
            <section class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white text-center mb-8">
                    Articles récents
                </h2>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                    <!-- Carte d'article -->
                    <div v-for="(article, index) in articles" :key="article.id"
                        class="bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 h-full">
                        <!-- Image (optionnelle) -->
                        <div class="mb-6">
                            <img :src="`/storage/${article.image}`" alt="Image de l'article"
                                class="w-full h-48 object-cover rounded-lg" />
                        </div>
                        <!-- Titre de l'article -->
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ article.title }}
                        </h3>
                        <!-- Extrait -->
                        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ truncateText(article.body, 100) }}..
                        </p>
                        <!-- Bouton -->
                        <Link :href="`/articles/${article.id}`" method="get" as="button" type="button"
                            class="mt-6 py-3 px-6 text-white font-semibold rounded-lg text-lg block w-full text-center"
                            :class="[
                                index === 0 ? 'bg-teal-600 hover:bg-teal-700' :
                                    index === 1 ? 'bg-orange-600 hover:bg-orange-700' :
                                        index === 2 ? 'bg-indigo-600 hover:bg-indigo-700' :
                                            'bg-gray-600 hover:bg-gray-700'
                            ]">
                        Lire l'article
                        </Link>
                    </div>
                </div>
            </section>


      <!-- Section des catégories -->
      <section class="py-16">
        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white text-center">
          Catégories d'articles
        </h2>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Affichage dynamique des catégories -->
          <div v-for="(category, index) in categories" :key="category.id"
            class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
              {{ category.libelle }}
            </h4>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              {{ category.description }}
            </p>
            <!-- Bouton dynamique -->
            <button class="mt-4 py-2 px-4 text-white font-semibold rounded-lg" :class="[
              index === 0 ? 'bg-teal-600 hover:bg-teal-700' :
                index === 1 ? 'bg-orange-600 hover:bg-orange-700' :
                  index === 2 ? 'bg-indigo-600 hover:bg-indigo-700' :
                    index === 3 ? 'bg-red-600 hover:bg-red-700' :
                      'bg-gray-600 hover:bg-gray-700'
            ]">
              Explorer
            </button>
          </div>
        </div>
      </section>


            <!-- Section des actions rapides -->
            <!-- <section class="bg-gray-800 p-8 text-center rounded-xl shadow-lg">
                <h2 class="text-3xl font-semibold text-white">
                    Actions rapides
                </h2>
                <div class="mt-8 flex justify-center gap-8">
                    <button class="py-3 px-8 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
                        Ajouter un article
                    </button>
                    <button class="py-3 px-8 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
                        Modifier un article
                    </button>
                    <button class="py-3 px-8 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
                        Supprimer un article
                    </button>
                </div>
            </section> -->
        </div>
    </main>
</template>

<script setup>
import MaNav from '@/Layouts/MaNav.vue';
import { Link } from '@inertiajs/vue3';

// Propriétés passées par Laravel via Inertia
const props = defineProps({
    articles: Array,
    categories: Array,
});

// Debug : pour vérifier les données
console.log(props.articles);

// Fonction pour nettoyer et tronquer le texte brut
function truncateText(html, length) {
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = html; // Injecte le HTML brut dans un div temporaire
    const textContent = tempDiv.textContent || ''; // Extrait uniquement le texte brut
    return textContent.slice(0, length) + '...'; // Tronque et ajoute des points de suspension
}
</script>

<style scoped>
/* Styles supplémentaires si nécessaire */
</style>
