<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    avatar: null, // Initialisez à null
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Upload Avatar
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                Update your profile picture.
            </p>
        </header>

        <form
            @submit.prevent="form.post(route('profile.update.avatar'), { forceFormData: true })"
            class="mt-6 space-y-6"
        >
            <div>
                <InputLabel for="avatar" value="Avatar" />
                <input
                    id="avatar"
                    type="file"
                    class="mt-1 block w-full"
                    @change="(e) => form.avatar = e.target.files[0]"
                />
                <InputError class="mt-2" :message="form.errors.avatar" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
