<template>
    <MaNav />
    <div class="p-8 bg-white min-h-screen flex justify-center">
        <div class="bg-white p-8 rounded-xl shadow-2xl max-w-5xl w-full">
            <!-- Titre de l'article -->
            <h1 class="text-4xl font-extrabold text-center text-black mb-6 text-shadow-lg">
                {{ article.title }}
            </h1>

            <!-- Contenu de l'article -->
            <p class="text-gray-800 text-lg mb-8 leading-relaxed text-justify border-l-4 pl-4 border-indigo-500"
                v-html="article.body">
            </p>

            <!-- Détail de publication -->
            <div class="text-center mb-6">
                <small class="text-gray-600 text-sm italic">
                    Publié le : <span class="text-indigo-500">{{ formatDate(article.created_at) }}</span> par
                    <span class="font-semibold text-indigo-500">{{ article.user.name }}</span>
                </small>
            </div>

            <!-- Boutons Éditer et Supprimer -->
            <div class="flex justify-center gap-4">
                <Link method="get" as="button" type="button"
                    class="px-6 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                Éditer</Link>
                <Link :href="`/articles/${article.id}`" method="" as="button" type="button"
                    class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-red-300"
                    @click.prevent="deleteArticle(article.id)">Supprimer</Link>
            </div>

            <!-- Section commentaires -->
            <div class="mt-10 border-t-4 border-indigo-500 pt-6">
                <Comments :comments="article.comments" :article="article" />
            </div>
        </div>
    </div>
</template>

<script setup>
import Comments from './Comments.vue';
import MaNav from '@/Layouts/MaNav.vue';
import { onMounted, ref } from 'vue';
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
const deleteArticle = async (id) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
        // Redirection après suppression, ou gestion d'état
        try {
            await axios.delete(route("dashboard.articles.destroy", id));

        } catch (error) {
            console.error("Erreur lors de la suppression :", error);
        }
        // Inertia.delete(`/dashboard/articles/${id}/destroy`);
    }
};
</script>

<style scoped>
.text-shadow-lg {
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
}
</style>
