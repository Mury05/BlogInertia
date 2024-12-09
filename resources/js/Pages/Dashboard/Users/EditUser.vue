<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dashboard from '@/Pages/Dashboard.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

// Récupération de l'utilisateur
const user = usePage().props.user; // Assurez-vous que c'est la bonne clé pour récupérer l'utilisateur

const form = useForm({
    isAdmin: user.isAdmin // Initialiser l'état avec la valeur actuelle de isAdmin
});

</script>

<template>
    <Dashboard>
        <header class="bg-white shadow rounded-md">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard / Utilisateurs / Attribuer un rôle
                </h2>
            </div>
        </header>
        <section>
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <Link href="/dashboard/users">
                        <div class="py-3 text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </div>
                    </Link>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            User Role
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Changer le rôle de l'utilisateur.
                        </p>
                    </header>
                    <form @submit.prevent="form.put(route('dashboard.users.update', { user: user.id }))" class="mt-6 space-y-6">
                        <div>
                            <div class="flex items-center">
                                <Checkbox class="mx-3 cursor-pointer" name="isAdmin" v-model="form.isAdmin" :checked="form.isAdmin == 1 ? true : false" /> <!-- Utilisez v-model ici -->
                                <InputLabel for="isAdmin" value="Donnez le rôle d'administrateur à cet utilisateur" />
                            </div>
                            <InputError class="mt-2" :message="form.errors.isAdmin" /> <!-- Corrigez le message d'erreur -->
                        </div>
                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0" leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </Dashboard>
</template>
