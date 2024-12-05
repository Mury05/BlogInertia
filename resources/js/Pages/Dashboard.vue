<script setup>
import SidebarComponent from '@/Components/Sidebar/SidebarComponent.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AllUsers from './Dashboard/Users/AllUsers.vue';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template> -->

        <!-- <div class="flex bg-gray-100 min-h-screen">-->

        <!-- ===== Content Component Start ===== -->
        <div class="flex-grow text-gray-800">

            <div class="p-6 sm:p-4 space-y-6">

                <!-- <div class="py-5">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                You're logged in!
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <AllUsers/> -->
                <router-view />

            </div>

        </div>
        <!-- </div> -->



    </AuthenticatedLayout>
</template>
