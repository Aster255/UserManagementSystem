<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                User ID
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Input Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Email Address
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Registration Timestamp
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-orange-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <UserRow
                            v-for="user in users.data"
                            :user="user"
                            :users="users"
                        /> -->
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
