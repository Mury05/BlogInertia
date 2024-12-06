<template>
    <Dashboard>

        <Head title="New Article" />
        <header class="bg-white shadow rounded-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard/Utilisateurs/Ajouter un utilisateur
                </h2>
            </div>
        </header>

        <div class="p-8  flex items-center justify-center">
            <form @submit.prevent="submit"
                class="max-w-7xl w-full bg-white shadow-xl rounded-2xl p-8 transition-transform transform hover:scle-101">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Créer un Nouvel Article</h2>

                <div class="flex gap-4 justify-center items-center" >

                    <div class="w-1/2" >
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-semibold text-gray-700">Catégorie</label>
                            <select v-model="form.category" id="category"
                                class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out hover:border-indigo-300"
                                required>
                                <option value="" disabled>Sélectionner une catégorie</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{ category.libelle }}
                                </option>
                            </select>
                        </div>

                        <!-- Ligne 1 : Titre -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-semibold text-gray-700">Titre de l'Article</label>
                            <input v-model="form.title" type="text" id="title" placeholder="Entrez le titre de l'article"
                                class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out hover:border-indigo-300"
                                required />
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-semibold text-gray-700">Image</label>
                            <input type="file" id="image" @change="(e) => form.image = e.target.files[0]"
                                class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out hover:border-indigo-300"
                                required />
                        </div>

                        <div>
                            <label for="tags" class="block text-sm font-semibold text-gray-700">Tags</label>
                            <input v-model="form.tags" type="text" id="tags"
                                placeholder="Séparez les tags par des virgules"
                                class="w-full p-4 mt-2 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out hover:border-indigo-300"/>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label for="body" class="block mb-5 text-sm font-semibold text-gray-700">Contenu</label>
                        <textarea v-model="form.body" id="body" placeholder="Rédigez le contenu de l'article"
                            class="w-full p-6 border border-gray-300 rounded-lg bg-gray-50 text-lg text-gray-800 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out hover:border-indigo-300"
                            required>
                        </textarea>
                    </div>
                </div>


                <!-- Ligne 2 : Contenu et Tags -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">



                </div>

                <!-- Ligne 3 : Catégorie et Image -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">

                </div>

                <!-- Bouton de Soumission -->
                <button type="submit"
                    class="w-full py-3 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                    Créer l'Article
                </button>
            </form>
        </div>
    </Dashboard>

</template>

<script setup>
import { onMounted, ref } from 'vue';
import { usePage, useForm, Head } from '@inertiajs/vue3';
import MaNav from '@/Layouts/MaNav.vue';
import Dashboard from '@/Pages/Dashboard.vue';

// Récupérer les catégories passées par Laravel via Inertia
const { categories } = usePage().props;

// Formulaire réactif
const form = useForm({
    title: '',
    body: '',
    category: '',
    tags: '',
    image: null,
});

// Soumission du formulaire
const submit = () => {
    const formData = new FormData();
    formData.append('title', form.title);
    formData.append('body', form.body);
    formData.append('category', form.category);
    formData.append('tags', form.tags);

    // Ajouter le fichier si présent
    if (form.avatar) {
        formData.append('image', form.image);
    }
    form.post(route('articles.store'), {
        data: formData,
        forceFormData: true,
        onSuccess: () => {
            form.reset();
            alert('Article créé avec succès');
        },
    });
};
onMounted(() => {
    tinymce.init({
        selector: '#body',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak code',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | link image | code',
        toolbar_mode: 'floating',
        height: 400,
        menubar: true,
        automatic_uploads: true,
        images_upload_url: '/upload',
        file_picker_types: 'image',
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype === 'image') {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function () {
                        callback(reader.result, {
                            alt: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        },
        setup: function (editor) {
            // Synchroniser le contenu de TinyMCE avec le textarea
            editor.on('change', () => {
                form.body = editor.getContent();
            });
        }
    });
});

</script>

<style scoped>
/* Animation d'agrandissement du bouton */
input,
textarea,
select {
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
