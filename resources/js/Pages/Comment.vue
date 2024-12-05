<template>
    <main class="bg-white dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto space-y-10">
            <div class="flex justify-between">
                <!-- Formulaire de commentaire à gauche -->
                <section class="w-1/2 pr-6">
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Discussion (20)</h2>
                    <form class="mt-8">
                        <div class="mb-4">
                            <label for="comment" class="sr-only">Votre commentaire</label>
                            <textarea id="comment" rows="6"
                                class="block w-full p-4 text-sm text-gray-900 border rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-400"
                                placeholder="Écrire un commentaire..." required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-3 px-6 bg-blue-500 text-white rounded-lg font-medium shadow-md hover:bg-blue-600 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-300 transition-all duration-300 ease-in-out">
                            Publier un commentaire
                        </button>
                    </form>

                    <!-- Bloc d'informations sur l'article sous le formulaire -->
                    <div class="mt-10 bg-gray-100 p-6 rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">À propos de cet article</h3>
                        <p class="mt-4 text-gray-700 dark:text-gray-300">
                            Cet article présente des stratégies innovantes pour améliorer l'expérience utilisateur dans
                            le développement de produits numériques. Il met en lumière les meilleurs outils de
                            conception UX et donne des conseils pratiques pour les designers, qu'ils soient débutants ou
                            expérimentés.
                        </p>
                        <div class="mt-6">
                            <p class="text-gray-700 dark:text-gray-300">
                                Lisez cet article pour découvrir comment les outils modernes peuvent transformer votre
                                manière de concevoir des expériences interactives et comment les intégrer efficacement
                                dans votre workflow de design.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Liste des commentaires à droite -->
                <section class="w-1/2 pl-6">
                    <!-- Commentaire -->
                    <article
                        class="p-6 mt-6 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700 space-y-4">
                        <footer class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">
                                <div class="ml-3">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">Michael Gough</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><time datetime="2022-02-08"
                                            title="8 février 2022">8 févr. 2022</time></p>
                                </div>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-all duration-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                        </footer>

                        <p class="text-gray-600 dark:text-gray-300">
                            Article très direct. Vaut vraiment le temps de lire. Merci ! Mais les outils ne sont que des
                            instruments pour les concepteurs UX. La connaissance des outils de conception est aussi
                            importante que la création de la stratégie de conception.
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
                    <article
                        class="p-6 mt-6 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700 space-y-4">
                        <footer class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">
                                <div class="ml-3">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">Michael Gough</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><time datetime="2022-02-08"
                                            title="8 février 2022">8 févr. 2022</time></p>
                                </div>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-all duration-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                        </footer>

                        <p class="text-gray-600 dark:text-gray-300">
                            Article très direct. Vaut vraiment le temps de lire. Merci ! Mais les outils ne sont que des
                            instruments pour les concepteurs UX. La connaissance des outils de conception est aussi
                            importante que la création de la stratégie de conception.
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
                    <article
                        class="p-6 mt-6 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700 space-y-4">
                        <footer class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">
                                <div class="ml-3">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">Michael Gough</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><time datetime="2022-02-08"
                                            title="8 février 2022">8 févr. 2022</time></p>
                                </div>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-all duration-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                        </footer>

                        <p class="text-gray-600 dark:text-gray-300">
                            Article très direct. Vaut vraiment le temps de lire. Merci ! Mais les outils ne sont que des
                            instruments pour les concepteurs UX. La connaissance des outils de conception est aussi
                            importante que la création de la stratégie de conception.
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
                    <article
                        class="p-6 mt-6 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700 space-y-4">
                        <footer class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">
                                <div class="ml-3">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">Michael Gough</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><time datetime="2022-02-08"
                                            title="8 février 2022">8 févr. 2022</time></p>
                                </div>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white transition-all duration-200">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>
                        </footer>

                        <p class="text-gray-600 dark:text-gray-300">
                            Article très direct. Vaut vraiment le temps de lire. Merci ! Mais les outils ne sont que des
                            instruments pour les concepteurs UX. La connaissance des outils de conception est aussi
                            importante que la création de la stratégie de conception.
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


                </section>
            </div>
        </div>
    </main>
</template>

<script>

</script>

<style></style>