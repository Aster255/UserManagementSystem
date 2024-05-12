<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import UserRow from "./Partials/UserRow.vue";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
defineProps({
    users: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Users Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link :href="route('users.index')">
                    <PrimaryButton class="my-2">Index</PrimaryButton>
                </Link>
                <Link :href="route('users.create')">
                    <PrimaryButton class="my-2 mx-1">Create User</PrimaryButton>
                </Link>
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                User ID
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Email Address
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Username
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-blue-500 text-xs font-semibold text-white uppercase tracking-wider text-center"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <UserRow
                            v-for="user in users.data"
                            :user="user"
                            :users="users"
                        />
                    </tbody>
                </table>

                <Pagination
                    :next="users.next_page_url"
                    :prev="users.prev_page_url"
                    :last="users.last_page"
                    :total="users.total"
                    :currentPage="users.current_page"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
