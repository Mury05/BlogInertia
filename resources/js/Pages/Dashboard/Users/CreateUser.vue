<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import Dashboard from '@/Pages/Dashboard.vue';

const form = useForm({
    name: '',
    email: '',
    birthdate: '',
    avatar: null, // Stocker le fichier ici
    isAdmin: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    const formData = new FormData();

    // Ajouter tous les champs au FormData
    formData.append('name', form.name);
    formData.append('email', form.email);
    formData.append('birthdate', form.birthdate);
    formData.append('password', form.password);
    formData.append('password_confirmation', form.password_confirmation);

    // Ajouter le fichier si présent
    if (form.avatar) {
        formData.append('avatar', form.avatar);
    }

    // Envoyer via Inertia
    form.post(route('admin.users.store'), {
        data: formData,
        onFinish: () => form.reset('password', 'password_confirmation'),
        forceFormData: true, // Important pour qu'Inertia sache que c'est un FormData
    });
};
</script>

<template>
<Dashboard>

    <Head title="Register User" />
    <header class="bg-white shadow rounded-md">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard/Utilisateurs/Ajouter un utilisateur
            </h2>
        </div>
    </header>
    <div class="flex items-center justify-center">
        <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-2xl sm:rounded-lg">

            <form @submit.prevent="submit">
                <Link href="/dashboard/users">
                    <div class="py-3 text-indigo-600">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                    </div>

                </Link>
                <div>

                    <InputLabel for="name" value="Name" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-4">
                    <InputLabel for="birthdate" value="Date de naissance" />

                    <TextInput id="birthdate" type="date" class="mt-1 block w-full" v-model="form.birthdate"
                        autocomplete="date" />

                    <InputError class="mt-2" :message="form.errors.birthdate" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                        autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />

                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                        v-model="form.password_confirmation" required autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="mt-4">
                    <InputLabel for="avatar" value="Avatar" />

                    <TextInput id="avatar" type="file" class="mt-1 block w-full"
                        @change="(e) => form.avatar = e.target.files[0]" />

                    <InputError class="mt-2" :message="form.errors.avatar" />
                </div>

                <div class="mt-6 block">
                    <label class="flex items-center">
                        <Checkbox name="isAdmin" v-model:checked="form.isAdmin" />
                        <span class="ms-2 text-sm text-gray-600">Rôle Administrateur</span>
                    </label>
                    <InputError class="mt-2" :message="form.errors.isAdmin" />

                </div>

                <div class="mt-4 flex items-center justify-end">

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</Dashboard>

</template>
