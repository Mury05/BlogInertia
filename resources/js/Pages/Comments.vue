<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { ref, computed, onMounted } from 'vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import 'dayjs/locale/fr';
defineProps(['article', 'comments']);
dayjs.extend(relativeTime);
dayjs.locale('fr');

// Référence pour le texte du nouveau commentaire
const newCommentText = ref('');
const form = useForm({
    comment: '',
});
const confirmingCommentDeletion = ref(false);
const commentToDelete = ref(null);
const articleToDelete = ref(null);

const confirmCommentDeletion = (article, comment) => {
    commentToDelete.value = comment;
    articleToDelete.value = article;
    confirmingCommentDeletion.value = true; // Ouvre le modal
};

const deleteComment = () => {
    form.delete(route('articles.comments.destroy', { comment: commentToDelete.value.id, article: articleToDelete.value.id }), {
        preserveScroll: true,
        onSuccess: () => closeModal()
    });
};
const closeModal = () => {
    confirmingCommentDeletion.value = false;
    commentToDelete.value = null;
    articleToDelete.value = null;
};
</script>

<template>
    <div class="flex flex-col w-full">
        <!-- ===== Page Content ===== -->
        <main class="bg-white dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto space-y-10">
                <div class="flex justify-between">
                    <!-- Formulaire de commentaire à gauche -->
                    <section class="w-1/2 pr-6">
                        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Commentaires ({{
                            comments.length
                            }})</h2>
                        <!-- Bloc d'informations sur l'article sous le formulaire -->
                        <div class="mt-10 bg-gray-100 p-6 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">À propos de cet article
                            </h3>
                            <div class="mt-6">
                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ article.title
                                    }}
                                </p>
                                <div class="mt-4">
                                    <span v-for="tag in article.tags.split(',')" :key="tag"
                                        class="inline-block bg-indigo-100 text-indigo-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                                        #{{ tag }}
                                    </span>
                                </div>
                            </div>

                            <!-- <p class="mt-4 text-gray-700 dark:text-gray-300" v-html="article.body">
                            </p> -->
                        </div>
                        <form @submit.prevent="form.post(route('articles.comments.create', article.id), {
                            onSuccess: () => {
                                form.reset(); // Réinitialiser tous les champs après succès
                            }
                        })" class="mt-8">
                            <div class="mb-4">
                                <label for="comment" class="sr-only">Votre commentaire</label>
                                <textarea id="comment" rows="6" v-model="form.comment"
                                    class="block w-full p-4 text-sm text-gray-900 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-400"
                                    placeholder="Écrire un commentaire..." required></textarea>
                            </div>
                            <button type="submit"
                                class="w-full py-3 px-6 bg-indigo-500 text-white rounded-lg font-medium shadow-md hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-300 transition-all duration-300 ease-in-out">
                                Publier un commentaire
                            </button>
                        </form>


                    </section>

                    <!-- Liste des commentaires à droite -->

                    <section class="w-1/2 pl-6">
                        <article v-for="comment in comments" :key="comment.id"
                            class="p-6 mt-6 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700 space-y-4">
                            <footer class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img v-if="comment.user && comment.user.avatar"
                                        :src="`/storage/${comment.user.avatar}`" alt="Avatar"
                                        class="border-2 border-green-600 h-8 w-auto rounded-full mr-3">
                                    <svg v-else class="p-1 border-2 border-green-600 h-8 rounded-full w-auto mr-3"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                    <div class="ml-3">
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">{{
                                            comment.user ? comment.user.name : 'Utilisateur anonyme' }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400"><time datetime="2022-02-08"
                                                title="8 février 2022">{{  dayjs(comment.created_at).fromNow() }}</time></p>
                                    </div>
                                </div>



                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-all duration-200">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>
                                        </button>
                                    </template>

                                    <template #content>
                                        <DropdownLink>
                                            Edit
                                        </DropdownLink>
                                        <DropdownLink @click="confirmCommentDeletion(article, comment)" method=""
                                            as="button">
                                            Delete
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </footer>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ comment.comment }}
                            </p>

                            <!-- Réactions -->
                            <div class="flex items-center mt-4 space-x-6">
                                <button type="button"
                                    class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                    </svg>
                                    Reply
                                </button>
                            </div>


                        </article>

                        <Modal :show="confirmingCommentDeletion" @close="closeModal">
                            <div class="p-6">
                                <h2 class="text-lg font-medium text-gray-900">
                                    Êtes-vous sûr de vouloir supprimer ce commentaire ?
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    Une fois votre commentaire supprimé, toutes ses ressources et données seront
                                    définitivement
                                    supprimées.
                                </p>
                                <div class="mt-6 flex justify-end">
                                    <SecondaryButton @click="closeModal">
                                        Annuler
                                    </SecondaryButton>
                                    <DangerButton class="ms-3" @click="deleteComment">
                                        Supprimer le commentaire
                                    </DangerButton>
                                </div>
                            </div>
                        </Modal>

                    </section>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
/* Styles spécifiques si nécessaire */
</style>
