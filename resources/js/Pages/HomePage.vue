<template>
  <main class="bg-gray-50 dark:bg-gray-900 py-16 px-6 sm:px-8 lg:px-16">
    <div class="max-w-7xl mx-auto space-y-12">
      <!-- Section de bienvenue -->
      <section class="text-center bg-white dark:bg-gray-800 shadow-md rounded-xl p-8">
        <h1 class="text-4xl font-semibold text-gray-900 dark:text-white">
          Bienvenue dans votre gestionnaire d'articles !
        </h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
          Organisez et gérez vos articles de manière simple et efficace.
        </p>
        <div class="mt-8">
          <button class="py-3 px-8 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all duration-300">
            Commencer à gérer
          </button>
        </div>
      </section>

      <!-- Section des articles récents -->
      <section class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6">
        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white text-center">
          Articles récents
        </h2>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Comment gérer vos articles ?
            </h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Découvrez nos conseils pour une gestion optimale de vos articles.
            </p>
            <button class="mt-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
              Lire l'article
            </button>
          </div>

          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Nouveaux outils pour la gestion
            </h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Découvrez les outils qui rendent la gestion plus facile.
            </p>
            <button class="mt-4 py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700">
              En savoir plus
            </button>
          </div>

          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Astuces de gestion
            </h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Optimisez votre gestion d'articles avec nos astuces simples.
            </p>
            <button class="mt-4 py-2 px-4 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700">
              Voir les astuces
            </button>
          </div>
        </div>
      </section>

      <!-- Section des catégories -->
      <section class="py-16">
        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white text-center">
          Catégories d'articles
        </h2>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
              Gestion des stocks
            </h4>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Gérez vos stocks avec efficacité.
            </p>
            <button class="mt-4 py-2 px-4 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700">
              Explorer
            </button>
          </div>

          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
              Commandes et livraisons
            </h4>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Suivez vos commandes et livraisons facilement.
            </p>
            <button class="mt-4 py-2 px-4 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700">
              Explorer
            </button>
          </div>

          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
              Gestion des fournisseurs
            </h4>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Organisez vos relations avec les fournisseurs.
            </p>
            <button class="mt-4 py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
              Explorer
            </button>
          </div>

          <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-md">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
              Retours et remboursements
            </h4>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
              Simplifiez les retours et remboursements pour vos articles.
            </p>
            <button class="mt-4 py-2 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
              Explorer
            </button>
          </div>
        </div>
      </section>

      <!-- Section des actions rapides -->
      <section class="bg-gray-800 p-8 text-center rounded-xl shadow-lg">
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
      </section>
    </div>
  </main>
</template>

<script>

</script>
