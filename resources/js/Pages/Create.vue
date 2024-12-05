<template>
    <MaNav/>
  <div class="p-8 bg-white min-h-screen flex items-center justify-center">
    <form class="max-w-4xl w-full bg-white shadow-xl rounded-2xl p-8 transition-transform transform hover:scale-105">
      <h2 class="text-3xl font-bold mb-6 text-gray-800">Créer un Nouvel Article</h2>

      <!-- Ligne 1 : Titre et Description -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-1  mb-2">
        <div>
          <label for="title" class="block text-sm font-semibold text-gray-700">Titre de l'Article</label>
          <input
            type="text"
            id="title"
            placeholder="Entrez le titre de l'article"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          />
        </div>
        <div>
          <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
          <textarea
            id="description"
            rows="3"
            placeholder="Une brève description de l'article"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          ></textarea>
        </div>
      </div>

      <!-- Ligne 2 : Contenu et Tags -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <div>
          <label for="body" class="block text-sm font-semibold text-gray-700">Contenu</label>
          <textarea
            id="body"
            rows="3"
            placeholder="Rédigez le contenu de l'article"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          ></textarea>
        </div>
        <div>
          <label for="tags" class="block text-sm font-semibold text-gray-700">Tags</label>
          <input
            type="text"
            id="tags"
            placeholder="Séparez les tags par des virgules"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <div>
          <label for="category" class="block text-sm font-semibold text-gray-700">Catégorie</label>
          <select
            id="category"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          >
            <option value="" disabled selected>Choisir une catégorie</option>
            <option value="tech">Technologie</option>
            <option value="health">Santé</option>
            <option value="business">Business</option>
            <option value="education">Éducation</option>
          </select>
        </div>
        <div>
          <label for="image" class="block text-sm font-semibold text-gray-700">Image</label>
          <input
            type="file"
            id="image"
            accept="image/*"
            class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out hover:border-blue-300"
          />
        </div>
      </div>

      <!-- Bouton de Soumission -->
      <button
        type="submit"
        class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105"
      >
        Soumettre l'Article
      </button>
    </form>
  </div>
</template>

<script setup>
    import MaNav from '@/Layouts/MaNav.vue';
</script>

<style scoped>

  /* Animation d'agrandissement du bouton */
  input, textarea, select {
    transition: all 0.3s ease-in-out;
  }

  button:hover {
    animation: scale-up 0.2s forwards;
  }

  @keyframes scale-up {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(1.05);
    }
  }
</style>

