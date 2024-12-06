<template>
    <MaNav />
    <div class="p-8 bg-white min-h-screen flex justify-center">
        <div class="bg-white p-8 rounded-xl shadow-2xl max-w-5xl w-full">
            <!-- Titre de l'article -->
            <h1 class="text-4xl font-extrabold text-center text-black mb-6 text-shadow-lg">
                {{ article.title }}
            </h1>

            <!-- Contenu de l'article -->
            <p class="text-gray-800 text-lg mb-8 leading-relaxed text-justify border-l-4 pl-4 border-blue-500"
                v-html="article.body">
            </p>

            <!-- Détail de publication -->
            <div class="text-center mb-6">
                <small class="text-gray-600 text-sm italic">
                    Publié le : <span class="text-blue-500">{{ formatDate(article.created_at) }}</span> par
                    <span class="font-semibold text-blue-500">{{ article.user.name }}</span>
                </small>
            </div>

            <!-- Boutons Éditer et Supprimer -->
            <div class="flex justify-center gap-4">
                <Link :href="`/articles/${article.id}/edit`" method="get" as="button" type="button"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Éditer</Link>
                <Link :href="`/articles/${article.id}`" method="delete" as="button" type="button"
                    class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-red-300"
                    @click.prevent="deleteArticle(article.id)">Supprimer</Link>
            </div>

            <!-- Section commentaires -->
            <div class="mt-10 border-t-4 border-blue-500 pt-6">
                <Comments :comments="article.comments" :article="article" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Comments from './Comments.vue';
import MaNav from '@/Layouts/MaNav.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

// Récupérer l'article depuis les props passées par Inertia
defineProps(['article']);

// Méthode pour formater la date
const formatDate = (date) => {
    return new Date(date).toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};

// Méthode pour supprimer l'article
const deleteArticle = (id) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
        // Redirection après suppression, ou gestion d'état
        Inertia.delete(`/articles/${id}`);
    }
};
</script>

<style scoped>
.text-shadow-lg {
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
}
</style>
